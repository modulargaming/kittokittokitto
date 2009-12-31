<?php
/**
 * Chat
 *
 * @authors Copy112 <copy112@gmail.com> & Joff <spud2k_2000@msn.com>
 * @copyright Copy112 & Joff 2009
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 * @package Ajax Chat for MG (modulargaming)
 * @version 0.2
 **/

	if($_POST['message'] != ''){
	
		$allowedTags='<strong><em><u><h1><h2><h3><h4><h5><h6><img>';
		$allowedTags.='<li><ol><ul><span><div><br><ins><del>';
		
		$message = strip_tags(stripslashes($_POST['message']),$allowedTags);
		
		$time = date("Y-m-d H:i:s");
		
		$chat_input = new Chat($db);
		$chat_input->setUsername ($username);
		$chat_input->setMessage ($message);
		$chat_input->setTime ($time);
		$chat_input->Save();
		$renderer->display('user/chat.tpl');
	}

 else {
	$renderer->display('user/chat.tpl');
}

?>