<?php
include "includes/config.inc.php";
$chat = new Chat($db);
$chat = $chat->findBy(array());
	if ($chat == '')
	{
		echo "No data available. Please post a message. ";
	} else {	
		
		foreach($chat as $chat_list)
		{
		    echo"<table>";
			echo "<tr><td><b>" . $chat_list->getUsername() . "</b></td><td>" . $chat_list->getMessage() . "</td></tr>";
			echo"</table>";
		}

	}
	
?>
