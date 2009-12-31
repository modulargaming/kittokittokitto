<?php
/**
 * Dice Game
 * A game where the user choose a number, then the computer will take a random number 
 * from 1-6 and if the numbers are the same, the user gets points.
 *
 * @author Copy112s <copy112@gmail.com>
 * @copyright Copy112, 2008
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 * @package User Page for MG (modulargaming)
 * @version 0.1
 **/

$CARDS = array(
    '1' => '1',
    '2' => '2',
    '3' => '3',
    '4' => '4',
    '5' => '5',
	'6' => '6',
);
$prize = 50;
$cost = 10;

switch($_REQUEST['state'])
{
    default:
    {
        $CARD_LIST = array('' => 'Select one...');
        foreach($CARDS as $i => $name)
        {
            $CARD_LIST[$i] = $name;
        }
       
        if($_SESSION['dice_game'] != null)
        {
            $renderer->assign('result',$_SESSION['dice_game']);
            unset($_SESSION['dice_game']);
        }
        
        $renderer->assign('cost',$cost);
        $renderer->assign('prize',$prize);
        $renderer->assign('cards',$CARD_LIST);
        $renderer->display('games/dice/wager.tpl');

        break;
    } // end default

    case 'guess':
    {
        $guess = stripinput($_POST['card']);

        if(in_array($guess,array_keys($CARDS)) == false)
        {
            draw_errors('You have to pick a number.');
        }

	if($User->getCurrency()<10){
	   draw_errors('You have to have enough money to play!');
	}
        else
        {
            $random = array_rand($CARDS);
            $choice = $CARDS[$random];

            if($random == $guess)
        	{
                $User->addCurrency($prize);
                
                $_SESSION['dice_game'] = "Got your number? Alright...The dice shows <strong>$choice</strong>! I guess that is ".format_currency($prize)." to you...";
            }
            else
        	{
                $User->subtractCurrency($cost);
                
                $_SESSION['dice_game'] = "Got your number? Alright...The dice shows <strong>$choice</strong>! Woohoo, that will be ".format_currency($cost)."!";
            }

            redirect('dice-game');
        } // end card selected

        break;
    } // end guess
} // end state switch

?>
