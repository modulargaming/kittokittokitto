<?php
/**
 * Handle the usershops
 *
 * This file is part of 'Kitto_Kitto_Kitto'.
 *
 * @author Zenk0 <thorpion.zenk0@gmail.com>
 * @copyright Zenk0, 2008
 * @package Modular gaming
 * @subpackage Core
 * @version 1.0.0
 **/

$ERRORS = array();
$uri->name(array("shop_id"));
$id = stripinput($_URI['shop_id']);


if(!empty($id) && is_numeric($id)){
  $shop = new Usershop($db);
  $shop = $shop->findOneByShopId($id);

  if($shop == null)
  {
	  draw_errors('Invalid shop ID specified.');
  }
  else
  {
	  switch($_REQUEST['state'])
	  {
		  default:
		  {
			  $ITEMS = array();
			  $items = new Item($db);
			  $stock = $items->getByLocation(array('user_id' => $shop->getUserId(), 'location' => 'usershop'));
			  if($stock != null){
				foreach($stock as $item)
				{
				  if($item->getPrice() > 0){
					$ITEMS[] = array(
						  'id' => $item->getUserItemId(),
						  'name' => $item->getItemName(),
						  'image' => $item->getImageUrl(),
						  'price' => $item->getPrice(),
						  'quantity' => $item->getQuantity(),
					  );
				  }
				} // end stock loop
			  }
			  $user_id = $shop->getUserId();
			  $owner = new User($db);
			  $owner = $owner->findOneByUserId($user_id);
			  $SHOP = array(
				  'id' => $shop->getShopId(),
				  'userid' => $owner->getUserId(),
				  'username' => $owner->getUserName(),
				  'name' => $shop->getShopName(),
				  'image' => $shop->getImageUrl(),
				  'welcome' => $shop->getWelcomeText(),
			  );

			  if($_SESSION['shop_notice'] != null)
			  {
				  $renderer->assign('notice',$_SESSION['shop_notice']);
				  unset($_SESSION['shop_notice']);
			  } // end shop notice

			  $renderer->assign('items',$ITEMS);
			  $renderer->assign('shop',$SHOP);
			  $renderer->display('usershops/shop.tpl');

			  break;
		  } // end default

		  case 'buy':
		  {
			  $ERRORS = array();
			  $stock_id = stripinput($_REQUEST['stock_id']);

			  $user_id = $shop->getUserId();
			  $owner = new User($db);
			  $owner = $owner->findOneByUserId($user_id);

			  $stock = new Item($db);
			  $stock = $stock->findOneBy(array('user_item_id' => $stock_id, 'user_id' => $shop->getUserId(), 'location' => 'usershop'));

			  if($stock->getUserId() == $User->getUserId()){
				$ERRORS[] = "You're the owner, why are you buying your own items?";
			  }
			  if($stock == null)
			  {
				  $ERRORS[] = 'That item is not in stock.';
			  }
			  else
			  {
				  // Eh? This shouldn't ever happen...clean the records
				  // up and show an error.
				  if($stock->getQuantity() == 0)
				  {
					  $stock->destroy();
					  $ERRORS[] = 'That item is not in stock.';
				  } // end odd case
			  } // end stock entry exists

			  if($stock->getPrice() > $User->getCurrency())
			  {
				  $ERRORS[] = 'You cannot afford that purchase.';
			  }

			  if(sizeof($ERRORS) > 0)
			  {
				  draw_errors($ERRORS);
			  }
			  else
			  {
				  // Take away their money and add it to the shop's till
				  $User->subtractCurrency($stock->getPrice());
				  if($shop->getTill() == "" || $shop->getTill() == '0'){
					$shop->setTill($stock->getPrice());
				  }else{
					$shop->setTill($shop->getTill() + $stock->getPrice());
				  }
				  $shop->save();

				  //log the transaction
				  $history = new ShopHistory($db);
				  $history->setShopId($shop->getShopId());
				  $history->setItemId($stock->getItemTypeId());
				  $history->setPrice($stock->getPrice());
				  $history->setUserId($User->getUserId());
				  $history->save();

				  $log = new UserLog($db);
				  $log->log("usershop-buy", $User->getUserName() . " has bought <b>{$stock->getItemName()}</b> from {$owner->getUserName()}'s usershop for {$stock->getPrice()} daicoins.");

				  // The purchase has been made, let's move it to the inventory.
				  $stock->getItem('1');

				  // Remove the stock from the shope.
				  $item_name = $stock->getItemName(); // store this for later.

				  // Stock could #destroy() itself during the #sell(), so don't
				  // use it anymore.
				  unset($stock);

				  $_SESSION['shop_notice'] = "You have purchased <strong>{$item_name}</strong> for ".format_currency($total)."!";

				  redirect("usershops/{$shop->getShopId()}");
			  } // end do purchase

			  break;
		  } // end purchase
	  } // end switch
  } // end shop exists
}else{
  $shopi = new Usershop($db);
  $shop = $shopi->findOneByUserId($User->getUserId());
  if($shop == null){
	$_POST['action'] = "create";
  }
  if($_POST['action']== "home"){
	$_POST['action']= '';
  }

  switch($_POST['action']){
	default:
	  if(!empty($_POST['shopname'])){
		$shop->setShopName($_POST['shopname']);
		$shop->setWelcomeText($_POST['welcome']);
		$shop->save();

		$_SESSION['shop_notice'] = "You have updated your shop succesfully!";
		redirect("usershops");
	  }else{
		$renderer->assign("notice", $_SESSION['shop_notice']);
		$renderer->assign("shop", array('name' => $shop->getShopName(), 'welcome' => $shop->getWelcomeText()));
		unset($_SESSION['shop_notice']);
		$renderer->display("usershops/front.tpl");
	  }
	break;
	case 'create':
	  if(!empty($_POST['shopname'])){
		if($shop ==null){
		  $shopi->setUserId($User->getUserId());
		  $shopi->setShopName($_POST['shopname']);
		  $shopi->setWelcomeText($_POST['welcome']);
		  $shopi->setLimit('1');
		  $shopi->save();
		  $User->substractCurrency("1000");
		   //$log = new UserLog($db);
		  //$log->log("usershop-create", "{$User->getUsername()} has created a usershop");

		}
		redirect("usershops");
	  }else{
		$renderer->display("usershops/create.tpl");
	  }
	break;
	case 'till':
	  if(!empty($_POST['amount'])){
		if($_POST['amount'] <= $shop->getTill()){
		  $till = $shop->getTill() - $_POST['amount'];
		  $shop->setTill($till);
		  $shop->save();
		  $User->addCurrency($_POST['amount']);
		  $log = new UserLog($db);
		  $log->log("usershop-till", "{$User->getUsername()} has taken {$_POST['amount']} daicoins out of his till, leaving {$shop->getTill()} daicoins.");
		  $_SESSION['shop_notice'] = "The money has been taken out of your shop's till.";
		}else{
		  $_SESSION['shop_notice'] = "You can't take that much from your shop's till!";
		}
		redirect("usershops");
	  }
	  $renderer->assign("till", $shop->getTill());
	  $renderer->display("usershops/till.tpl");
	break;
	case 'history':
		$history = new ShopHistory($db);
		$history = $history->findBy(array('shop_id' => $shop->getShopId()));

		foreach($history as $his){
			$us = new User($db);
			$us = $us->findOneByUserId($his->getUserId());

			$it = new ItemType($db);
			$it = $it->findOneByItemTypeId($his->getItemId());

			$HISTORY_LIST[] = array("url" => $it->getImageUrl(), "item_name" => $it->getItemName(), "username" => $us->getUserName(), "points" => $his->getPrice());
		}
		$renderer->assign("history", $HISTORY_LIST);
		$renderer->display("usershops/history.tpl");
	break;
	case 'list':
	  if(is_array($_POST['item'])){
		foreach($_POST['item']['update'] as $key => $value){
		  $update = new Item($db);
		  $update = $update->findOneBy(array('user_item_id' => $key, 'user_id' => $User->getUserId(), 'location' => 'usershop'));
		  $update->setPrice($value);
		  $update->save();
		}
		foreach($_POST['item']['delete'] as $key => $value){
		  if($value > 0){
			$delete = new Item($db);
			$delete = $delete->findOneBy(array('user_item_id' => $key, 'user_id' => $User->getUserId(), 'location' => 'usershop'));
			if($value <= $delete->getQuantity()){
			   $log = new UserLog($db);
			   $log->log("usershop-item-remove", "{$User->getUsername()} has taken {$delete->getQuantity()} {$delete->getItemName()} out of his usershop.");

			  $delete->moveItem('inventory', $value);
			}
		  }

		}
		$_SESSION['notice'] = "Your shop inventory has been updated succesfully.";
	  }
	  $itemlist = new Item($db);
	  $ITEMS = $itemlist->getByLocation(array('location' => 'usershop', 'user_id' => $User->getUserId()));
	  $DISPLAY_ITEMS = array();
	  if(count($ITEMS) > 0){
		foreach($ITEMS as $item)
		{
			$DISPLAY_ITEMS[] = array(
				'id' => $item->getUserItemId(),
				'image' => $item->getImageUrl(),
				'name' => $item->getInflectedItemName(),
				'description' => $item->getItemDescr(),
				'price' => $item->getPrice(),
				'quantity' => number_format($item->getQuantity()),
			);
		} // end items loop
	  }
	  $renderer->assign("items", $DISPLAY_ITEMS);
	  $renderer->assign("notice", $_SESSION['notice']);
	  unset($_SESSION['notice']);
	  $renderer->display("usershops/list.tpl");
	break;
  }
}
?>
