<?php
/**
 * Displays a list of battle targets
 *
 * This file is part of 'Modular Gaming'.
 *
 * <insert license info here>
 *
 * @author Panagiotis Kalogiratos ntt@abnormalfreq.com>
 **/
$CHAR_LIST_LIST = array();
	$chars_list = new Char($db);
	$chars_list = $chars_list->findBy(array());
	$user_id = $User->getUserId();
	$char_user = new User($db);

	foreach($chars_list as $char_list)
	{		
	/** Ugly way to do this since it has too much sql. Need to change implementation at a
	  * later time, for performance. -- Nodens
	 **/
		$char_user = $char_list->grabUser();

		if($char_list->getUserId() != $user_id && $char_user->getActiveCharId() == $char_list->getCharId())
		{
   			$CHAR_LIST_LIST[] = array(
   	  	  	'id' => $char_list->getCharId(),
   		  	'name' => $char_list->getName(),
   			);
		}
	} // end target list
	
	$renderer->assign('char_list',$CHAR_LIST_LIST);
	$renderer->assign('char_available',(bool)sizeof($CHAR_LIST_LIST));
	$renderer->display('battle/battlelist.tpl');
?>
