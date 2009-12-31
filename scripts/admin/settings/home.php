<?php
/**
 * Settings Admin
 *
 * @author Copy112s <copy112@gmail.com>
 * @copyright Copy112, 2008
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 * @package Settings admin for MG (modulargaming)
 * @version 1.0
 **/
switch($_REQUEST['state'])
{
    default:
    {
        $settings = new Settings($db);
        $settings = $settings->findOneById($APP_CONFIG['settings_row']);
            $SETTINGS = array(
                'start_currency' => $settings->getStartCurrency(),
                'enable_register' => $settings->getEnableRegister(),
                'enable_clans' => $settings->getEnableClans(),
                'enable_userpages' => $settings->getEnableUserpages(),
            	'clan_cost' => $settings->getClanCost(),
            	'clan_register' => $settings->getClanRegister(),
            );

        if($_SESSION['settings_notice'] != null)
        {
            $renderer->assign('notice',$_SESSION['settings_notice']);
            unset($_SESSION['settings_notice']);
        } 

        $renderer->assign('settings',$SETTINGS);
        $renderer->display('admin/settings/home.tpl');

        break;
    } // end default

    case 'post':
    {
        $ERRORS = array();
        
        $SETTINGS_ARRAY = array(
			'start_currency' => stripinput($_POST['settings']['start_currency']),
        	'enable_register' => stripinput($_POST['settings']['enable_register']),
        	'enable_clans' => stripinput($_POST['settings']['enable_clans']),
        	'enable_userpages' => stripinput($_POST['settings']['enable_userpages']),
       		'clan_cost' => stripinput($_POST['settings']['clan_cost']),
        	'clan_register' => stripinput($_POST['settings']['clan_register']),
		);
        
        $settings = new Settings($db);
        $settings = $settings->findOneById('1');

		$settings->setStartCurrency($SETTINGS_ARRAY['start_currency']);
		$settings->setEnableRegister($SETTINGS_ARRAY['enable_register']);
		$settings->setEnableClans($SETTINGS_ARRAY['enable_clans']);
		$settings->setEnableUserpages($SETTINGS_ARRAY['enable_userpages']);
		$settings->setClanCost($SETTINGS_ARRAY['clan_cost']);
		$settings->setClanRegister($SETTINGS_ARRAY['clan_register']);
		$settings->save();
            
		$_SESSION['settings_notice'] = "You have updated the settings. ";
		redirect('admin-settings');
        
		break;
    }
} // end state switch
?>
