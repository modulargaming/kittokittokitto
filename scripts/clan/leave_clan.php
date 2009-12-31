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

$user_new_clan_check = new User($db);
$user_new_clan_check = $user_new_clan_check->findOneByUserName($username);
		
$user_new_clan_check = array(
'clan_id' => $user_new_clan_check->getClanId(),
);

if($user_new_clan_check['clan_id'] != 0)
{
	
    switch($_REQUEST['state'])
    {
	    default:
    	{
		
	    	$renderer->display('clan/leave_clan.tpl');
		
		    break;
	    } // end default
	
	    case 'process':
	    {
            
            $user_new_clan = new User($db);
            $user_new_clan = $user_new_clan->findOneByUserName($username);
            $user_new_clan->setClanId('0');
            $user_new_clan->setClanAccess('0');//Remove the supperadmin access
            $user_new_clan->save();
	
			// Log the user in and send him back home.
			redirect('clan');
		} // end success
			
		break;
	} // end process
}
else {
redirect('clan');
}

?>
