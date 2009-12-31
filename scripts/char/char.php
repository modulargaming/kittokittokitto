<?php
/**
 * Displays a user's character screen 
 *
 * This file is part of 'Modular Gaming'.
 *
 * <insert license info here>
 *
 * @author Panagiotis Kalogiratos ntt@abnormalfreq.com>
 **/

$ERRORS = array();
$uri->name(array("char_id"));
$active_char_id = stripinput($_URI['char_id']);

$char = new Char($db);
$char = $char->findOneByCharId($active_char_id);
$owner = new User($db);
$owner = $char->grabUser();

if($char == null)
{
    $ERRORS[] = gettext('Invalid user specified.');
} // end bad user

if(sizeof($ERRORS) > 0)
{
	draw_errors($ERRORS);
}
else
{
	if($User->getUserId() == $owner->getUserId())
	{
    		$CHAR = array(
        		'name' => $char->getName(),
        		'owner' => $owner->getUserName(),
			'level' => $char->getLevel(),
			'strength' => $char->getStrength(),
			'dexterity' => $char->getDexterity(),
			'constitution' => $char->getConstitution(),
			'intelligence' => $char->getIntelligence(),
			'wisdom' => $char->getWisdom(),
			'charisma' => $char->getCharisma(),
			'xp' => $char->getXp(),
		);
	}
	else
	{
    		$CHAR = array(
        		'name' => $char->getName(),
        		'owner' => $owner->getUserName(),
//        		'gender' => $user->getGender(),
			'level' => $char->getLevel(),
		);
	}
 
	$renderer->assign('char',$CHAR);
	$renderer->display('char/char.tpl');
} // end no errors
?>
