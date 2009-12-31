<?php
/**
 * User Page
 *
 * @author Copy112s <copy112@gmail.com>
 * @copyright Copy112, 2008
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 * @package User Page for MG (modulargaming)
 * @version 0.1
 **/
$uri->name(array("username"));
$user_name = stripinput($_URI['username']);


$profile = new User($db);
$profile = $profile->findOneByUserName($user_name);

if($profile == null)
{
    $ERRORS[] = 'Invalid user specified.';
} // end bad user
if(sizeof($ERRORS) > 0)
{
	draw_errors($ERRORS);
}
else
{
	$PROFILE = array(
        'text' => $profile->getUserPage(),
    );
    $renderer->assign('profile',$PROFILE); 
    $renderer->display('user/page.tpl');
}
?>