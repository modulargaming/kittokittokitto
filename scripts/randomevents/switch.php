<?php
/**
 * Random Events
 *
 * @author Lewis Delicata
 * @link http://modulargaming.com
 * @copyright Modular Gaming
 * @version 0.0.0.1
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 **/

$credits=$User->getCurrency();
$random = rand(1,1350);
$randompoints = rand(500,1000);
$renderer->assign("randimgsize","85");
switch($random){
case 1:
case 2:
case 3:
case 4:
case 5:
case 6:
case 7:
case 8:
$User->addCurrency($randompoints);
$renderer->assign("randevent","You found $randompoints<sup></sup>");
$User->Save();
break;
case 9:
case 10:
case 11:
case 12:
case 13:
case 14:
if($credits>=100){
$User->subtractCurrency(100);
$renderer->assign("randevent","A passing Kitto stole 100<sup></sup> off of you.");
$renderer->assign("randimg","/resources/pets/kitto/blue.jpg");
$User->Save();
}
else{
$renderer->assign("randevent","A passing Zutto tried to mug you.");
$renderer->assign("randimg","/resources/pets/zutto/blue.jpg");
}
break;
case 15:
$User->addCurrency(15000);
$renderer->assign("randevent","A random person gave you 15,000<sup>CP</sup> for helping them.");
//$renderer->assign("randimg","/resources/pets/Migios/white.jpg");
$User->Save();
break;
case 20:
                // Try and find a stack of this item in the user's inventory.
                $give = new Item($db);
                $give = $give->findOneBy(array(
                    'user_id' => $User->getUserId(),
                    'item_type_id' => 28,
                ));

                // If the user has none, create a new stack.
                if($give == null)
                {
                    $give = new Item($db);
                    $give->setUserId($User->getUserId());
                    $give->setItemTypeId(28);
                } // end make new stack
                
                $give->setQuantity($give->getQuantity() + 1);
                $give->Save();
$renderer->assign("randevent","You found a Gold Colour Potion.");
//$renderer->assign("randimg","/resources/items/potions/gold.png");
$renderer->assign("randimgsize","75");
break;
}
?>
