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

$settings = new Settings($db);
$settings = $settings->findOneById($APP_CONFIG['settings_row']);
$settings = array(
        'clan_register' => $settings->getClanRegister(),
        'clan_cost' => $settings->getClanCost(),
);

if($user_new_clan_check['clan_id'] == 0)
{

	//How much it will cost to make a new clan. If 0 it is free.
	$cost = $SETTINGS['clan_cost'];

    $GENDER = array(
        'public' => 'Public',
        'private' => 'Private',
    );

    switch($_REQUEST['state'])
    {
	    default:
	    {
		
		    array_unshift($GENDER,'Select one...');
		
            $renderer->assign('genders',$GENDER);
            $renderer->assign('cost',$cost);
		    $renderer->display('clan/new_clan_form.tpl');
		
		    break;
	    } // end default
	
	    case 'process':
	    {
		    $ERRORS = array();
		
		    if($settings['clan_register'] == 0) 
		    {
			    $ERRORS[] = 'Clan registration has been disabled.';
				
		    }
		    if(!isset($_SESSION['security_code']))
		    {
			    $ERRORS[] = 'Internal CAPTCHA error. Please report this if it persists.';
		    }
		    elseif(strtolower($_POST['captcha_code']) != strtolower($_SESSION['security_code']))
		    {
			    $ERRORS[] = "Incorrect security code specified.";
			}
				
			$USER = array(
				'name' => stripinput($_POST['user']['user_name']),
            	'gender' => stripinput($_POST['user']['gender']),

			);
		
			if($USER['name'] == null)
			{
				$ERRORS[] = 'You cannot create a clan with a blank clan name.';
			}
			elseif(preg_match('/^[A-Z0-9_!@#\$%\^&\*\(\)\.-]*$/i',$USER['name']) == false)
			{
				$ERRORS[] = 'Invalid characters in your clan name. Try A-Z0-9_!@#$%^&*().,;:.';
			}
			elseif(strlen($USER['name']) > 25)
			{
				$ERRORS[] = 'There is a maxlength=25 attribute on that input tag for a reason.';
			}
			elseif(($User->getCurrency()) < $cost)
			{
				$ERRORS[] = 'You can not afford to make a clan.';
			}
			else
			{
				$clan_check = new Clan($db);
				$clan_check = $clan_check->findOneByClanName($USER['name']);
			
				if(is_a($clan_check,'Clan') == true)
				{
					$ERRORS[] = 'That clan name is already taken.';
				}
			
			}
        
			if(sizeof($ERRORS) > 0)
			{
				draw_errors($ERRORS);
			}
			else
			{			
				// Create a clan and set some base attrs.
				$User->subtractCurrency($cost);
				$new_clan = new Clan($db);
				$new_clan->setClanName($USER['name']);
            	$new_clan->setAccess($USER['gender']);
				$new_clan->save();
			
				$user_new_clan_get = new Clan($db);
				$user_new_clan_get = $user_new_clan_get->findOneByClanName($USER['name']);
			
				$user_new_clan_get = array(
            		'clan_id' => $user_new_clan_get->getClanId(),
            	);
            
            	$user_new_clan = new User($db);
            	$user_new_clan = $user_new_clan->findOneByUserName($username);
            	$user_new_clan->setClanId($user_new_clan_get['clan_id']);
            	$user_new_clan->setClanAccess('3');//Set supperadmin access
            	$user_new_clan->save();
	
				redirect('clan');
			} // end success
			
			break;
		} // end process
	} // end switch
}
else 
{
	redirect('clan');
}
?>
