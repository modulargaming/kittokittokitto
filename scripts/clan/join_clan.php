<?php
/**
 * Allows a user to create a new clan.
 *
 * This file is part of 'Modular Gaming'.
 *
 * <insert license info here>
 *
 * @author Copy112 (Copy112) <copy112@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 **/

$uri->name(array("clan_id"));
$clan_id = stripinput($_URI['clan_id']);

//Get the user clan id.
$user_clan = new User($db);
$user_clan = $user_clan->findOneByUserName($username);
$user_clan = array(
		'clan_id' => $user_clan->getClanId(),
		'user_is' => $user_clan->getUserId
);

if($user_clan['clan_id'])
{
	echo "<p>You are alredy a member of a clan. To join a new you first need to leave your old clan.</p>";
}
else
{

    switch($_REQUEST['state'])
    {
	    default:
	    {
            $renderer->assign('clan_id',$clan_id);
		    $renderer->display('clan/join_clan.tpl');
		
		    break;
	    } // end default
	
	    case 'process':
	    {
		    $ERRORS = array();
				
			$USER = array(
				'clan_id' => stripinput($_POST['user']['clan_id']),
			);
        
			if(sizeof($ERRORS) > 0)
			{
				draw_errors($ERRORS);
			}
			else
			{
				$clan_access = new Clan($db);
            	$clan_access = $clan_access->findOneByClanId($USER['clan_id']);
            	$clan_access->getAccess();
            	$CLAN_ARRAY = array(
					'access' => $clan_access->getAccess(),
				);
            	
				if($CLAN_ARRAY['access'] == 'public')
				{
				$user_join_clan = new User($db);
            	$user_join_clan = $user_join_clan->findOneByUserName($username);
            	$user_join_clan->setClanId($USER['clan_id']);
            	$user_join_clan->save();
				}
            	else
            	{
            	$user_join_clan2 = new Clanj($db);
            	$user_join_clan2->setClanId($USER['clan_id']);
            	$user_join_clan2->setUserName($username);
            	$user_join_clan2->setUserId($USER['user_id']);
            	$user_join_clan2->save();
            	}
				redirect('clan');
			} // end success
			
			break;
		} // end process
	} // end switch
}
?>
