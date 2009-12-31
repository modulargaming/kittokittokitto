<?php
/**
 * Deletes a character. 
 *
 * This file is part of 'Modular Gaming'.
 *
 * <insert license info here>
 *
 * @author Panagiotis Kalogiratos (Nodens) <ntt@abnormalfreq.com>
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 **/

$renderer->display('char/topnav.tpl');

switch($_REQUEST['state'])
{
    default:
    {
        $CHAR_LIST = array();
        foreach($User->grabChars() as $char)
        {
            $CHAR_LIST[] = array(
                'id' => $char->getCharId(),
                'name' => $char->getName(),
//                'image' => $pet->getImageUrl(),
            );
        } // end char loop

        $renderer->assign('chars',$CHAR_LIST);
        $renderer->display('char/abandon_list.tpl');

        break;
    } // end default

    case 'abandon':
    {
        $ERRORS = array();
        $char_id = stripinput($_REQUEST['char_id']);
        
        $char = new Char($db);
        $char = $char->findOneByCharId($char_id);
        
        if($char == null)
        {
            $ERRORS[] = 'Character not found.';
        }
        else
        {
            if($char->getUserId() != $User->getUserId())
            {
                $ERRORS[] = 'That is not your character!';
            } // end not your char
        } // end got char

        if(sizeof($ERRORS) > 0)
        {
            draw_errors($ERRORS);
        }
        else
        {
            $char->destroy();
            redirect('chars');
        }

        break;
    } // end case active
} // end state switch
?>
