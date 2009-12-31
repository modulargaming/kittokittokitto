<?php
/**
 * A simple Rock Paper Scissors game.  Based on magic trick game.
 *
 * This file is part of 'Kitto_Kitto_Kitto'.
 *
 * 'Kitto_Kitto_Kitto' is free software; you can redistribute
 * it and/or modify it under the terms of the GNU
 * General Public License as published by the Free
 * Software Foundation; either version 3 of the License,
 * or (at your option) any later version.
 * 
 * 'Kitto_Kitto_Kitto' is distributed in the hope that it will
 * be useful, but WITHOUT ANY WARRANTY; without even the
 * implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE.  See the GNU General Public
 * License for more details.
 * 
 * You should have received a copy of the GNU General
 * Public License along with 'Kitto_Kitto_Kitto'; if not,
 * write to the Free Software Foundation, Inc., 51
 * Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @author Nicholas 'Owl' Evans <owlmanatt@gmail.com>
 * @copyright Nicolas Evans, 2007
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 * @package Kitto_Kitto_Kitto
 * @subpackage Games
 * @version 1.0.0
 **/

$CHOICES = array(
    'Rock' => 'Rock',
    'Paper' => 'Paper',
    'Scissors' => 'Scissors',
);

$prize = 100;
$cost = 50;

switch($_REQUEST['state'])
{
    default:
    {
        $CHOICE_LIST = array('' => 'Select one...');
        foreach($CHOICES as $i => $name)
        {
            $CHOICE_LIST[$i] = $name;
        }

        if($_SESSION['rps_game'] != null)
        {
            $renderer->assign('result',$_SESSION['rps_game']);
            unset($_SESSION['rps_game']);
        }

        $renderer->assign('cost',$cost);
        $renderer->assign('prize',$prize);
        $renderer->assign('choices',$CHOICE_LIST);
        $renderer->display('games/rps/wager.tpl');

        break;
    }

    case 'choose':
    {
        $choice = stripinput($_POST['choice']);

        if(in_array($choice,array_keys($CHOICES)) == false)
        {
            draw_errors('You have to choose rock, paper, or scissors!');
        }

	if($User->getCurrency()<50){
	   draw_errors('You have to have enough money to play!');
	}
        else
        {
            $random = array_rand($CHOICES);
            $choicei = $CHOICES[$random];
            if($random == $choice)
            {
                $_SESSION['rps_game'] = "Rock!  Paper!  Scissors!  Shoot!  I chose $choicei!  What did you choose?  You chose $choice?  That means it's a tie!  Nothing happens...";
            }
            elseif(($choice == "Rock" && $choicei == "Paper") || ($choice == "Paper" && $choicei == "Scissors") || ($choice == "Scissors" && $choicei == "Rock"))
            {
                $User->subtractCurrency($cost);

                $_SESSION['rps_game'] = "Rock!  Paper!  Scissors!  Shoot!  I chose $choicei!  What did you choose?  You chose $choice?  That means I win!  Yes!  That'll be " . format_currency($cost) . " please!  Feel free to play again.";
            }
            else
            {
                $User->addCurrency($prize);

                $_SESSION['rps_game'] = "Rock!  Paper!  Scissors!  Shoot!  I chose $choicei!  What did you choose?  You chose $choice?  That means I lose...  Drat.  I guess I have to pay you " . format_currency($prize) . ".  I guess you can play again.";
            }

            redirect('rps-game');
        }

        break;
    }
}

?>
