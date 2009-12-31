<?php
$USER_LIST_LIST = array();
	$users_list = new User($db);
	$users_list = $users_list->findBy(array());

	foreach($users_list as $user_list)
	{
   		$USER_LIST_LIST[] = array(
   	  	  'id' => $user_list->getUserId(),
   		  'name' => $user_list->getUserName(),
   		);
	} // end user list
	
	$renderer->assign('user_list',$USER_LIST_LIST);
	$renderer->assign('user_available',(bool)sizeof($USER_LIST_LIST));
	$renderer->display('user/list.tpl');
?>