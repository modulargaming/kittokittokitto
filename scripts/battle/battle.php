<?php
/**
 * Battle system 0.2.5
 *
 * This file is part of 'Modular Gaming'.
 *
 * Licensed under the GPLv3 license
 *
 * @author Curtis curtis@modulargaming.com>
 **/

$ERRORS = array();

/**
$action = $_REQUEST['action'];
$action = stripinput($action);

            switch($action){

                case 'pvp':
                    battle_player();
                    break;

            }

function battle_player(){
**/

/**
	Init attacker/defender users and their chars
**/

$uri->name(array("enemy_id"));
$enemyid= stripinput($_URI['enemy_id']);

$enemy = new Char($db);
$enemy = $enemy->findOneByCharId($enemyid);

$enemy_user = new User($db);
$enemy_user = $enemy->grabUser();

$attacker_user = new User($db);
$attacker_user = $attacker_user->findOneByUserId($User->getUserId());

$attacker = new Char($db);
$attacker = $attacker->findOneByCharId($attacker_user->getActiveCharId());

if($enemy == null)
{
    $ERRORS[] = gettext('Invalid user specified.');
} // end bad user


if(sizeof($ERRORS) > 0)
{
    draw_errors($ERRORS);
}
else
{
    $ATTACKER = array(
	'name' => $attacker->getName(),
	'char_id' => $attacker->getCharId(),
    	'level' => $attacker->getLevel(),
    	'strength' => $attacker->getStrength(),
    	'dexterity' => $attacker->getDexterity(),
    	'constitution' => $attacker->getConstitution(),
    	'intelligence' => $attacker->getIntelligence(),
    	'wisdom' => $attacker->getWisdom(),
    	'charisma' => $attacker->getCharisma(),
    	'hp' =>  $attacker->getHp(),
    	'xp' => $attacker->getXp(),
    );
}

    $ENEMY = array(
	'name' => $enemy->getName(),
	'char_id' => $enemy->getCharId(),
    	'level' => $enemy->getLevel(),
    	'strength' => $enemy->getStrength(),
    	'dexterity' => $enemy->getDexterity(),
    	'constitution' => $enemy->getConstitution(),
    	'intelligence' => $enemy->getIntelligence(),
    	'wisdom' => $enemy->getWisdom(),
    	'charisma' => $enemy->getCharisma(),
    	'hp' =>  $enemy->getHp(),
    	'xp' => $enemy->getXp(),
    );
 
  /*  $aspeed = ($attacker->getDexterity() );
    $espeed = ($enemy->getDexterity() );
    $apower = ($attacker->getStrength() );
    $epower = ($enemy->getStrength() );
    $adefense = ($attacker->getConstitution);
    $edefense = ($enemy->getConstitution);
*/

 $aspeed = ($ATTACKER[dexterity]);
    $espeed = ($ENEMY[dexterity]);
    $apower = ($ATTACKER[strength]);
    $epower = ($ENEMY[strength]);
    $adefense = ($ATTACKER[constitution]);
    $edefense = ($ENEMY[constitution]);
   
 // Attacker's Stats -- check the end to see the results of all this calc.
    $arepeat = ($aspeed / $espeed);
    $aattackstr = ceil($arepeat);
    if ($aattackstr <= 0) {
        $aattackstr = 1;
    } else {
    $aattackstr = ceil($aattackstr);
    }

    // Enemy's Stats -- Check the end again
    $erepeat = ($espeed / $aspeed);
    $eattackstr = ceil($erepeat);
    if ($eattackstr <= 0) {
        $eattackstr = 1;
    } else {
    $eattackstr = ceil($eattackstr);
    }

    //leinad
    //1. I'll use an || $round=100 too..if the level is too high the battle can last a lots of cycles :/
    for ($round = 0; $ATTACKER[hp] >= 0 && $ENEMY[hp] >= 0; $round++ || $round=100){

    $cagen = rand(1,$aspeed);
    $cegen = rand(1,$espeed);
    $cagen = ceil($cagen);
    $cegen = ceil($cegen);

    if ($cagen == $cegen) {
        $cagen = 2;
        $cegen = 1;
    }
    if ($cagen >= $cegen) {
    $brand = rand(50, 125);

    $admg = ($apower - $edefense);
    $admg = ceil($admg);
    if ($admg < 1) {
    $admg = 1;
    }
    $admg = ($admg  * ($brand / 100));

    $dnh = rand(1,10);
    if ($dnh == 3) {
    $admg = $admg * 2;
    $hitmsg = " --  Nice! Double Damage!";
    } elseif ($dnh == 7) {
    $admg = $admg * .5;
    $hitmsg = " -- Half Damage";
    } else {
    $admg = $admg;
    $hitmsg = "  ";
    }
    $admg = round($admg, 0);
    // O.o, Better miss system.
    $smiss=$aspeed - $espeed;
    if ($brand >= $smiss) {
        $miss = 25;
    } else {
        $miss = 75;
    }

    if(rand(1,$miss) <= ($miss / 5)){
    $abr = "<a href='{$APP_CONFIG['public_dir']}/stats/$ATTACKER[char_id]'><b>$ATTACKER[name]</b></A> hits <A href='{$APP_CONFIG['public_dir']}/stats/$ENEMY[char_id]'><b>$ENEMY[name]</b></A> but was deflected!<br>"; 
    }else{
    $ENEMY[hp] =  ($ENEMY[hp] - $admg);
    $abr = "<a href='{$APP_CONFIG['public_dir']}/stats/$ATTACKER[char_id]'><b>$ATTACKER[name]</b></A> hits <A href='{$APP_CONFIG['public_dir']}/stats/$ENEMY[char_id]'><b>$ENEMY[name]</b></A>, and lowers his health by <b>$admg</b> damage! ($ENEMY[hp] left)$hitmsg<br>";
    }

    unset($hitmsg);
    if ($ATTACKER[hp] <= 0) {
    $gain = "<br>" . $ENEMY[user_id] . " is the winner!";
    // Cash first
    if ($ATTACKER[cash] > 0){
    $ecashgain = 0;
    } else {
    $ecashgain = 0;
    }
    
    $gain .= "You have been knocked unconcious by <b>" . $ENEMY[user_id] . "</b>.<br>";
    
    // EXP - This is fun due to the other stuff we need to call.
    $eexpgain = (rand(5, 10) * $ATTACKER[level]);
    $eexpgain = ceil($eexpgain);
    $gain .= "Your enemy <b>" . $ENEMY[user_id] . "</b> has earned <b>" . $eexpgain . "</b> EXP<br>";



$eexpgain=($ENEMY[exp]+$eexpgain);
$enemy = $enemy->setExp($eexpgain);
//$enemy = $enemy->setCredits+$ecashgain();

$attacker = $attacker->setHp(0);

    }//else
        }//if
echo $abr;
if(isset($gain)){
echo $gain;
}

        }//    if ($cagen >= $cegen)
//    }//for

//}//function battle_player

//    $renderer->assign('output',$OUTPUT);
//    $renderer->display('battle/battle.tpl');
?>


