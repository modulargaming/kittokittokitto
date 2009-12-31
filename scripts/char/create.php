<?php
/**
 * Allows a user to create a new character. 
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
        $races = new CharRace($db);
        $races = $races->findByAvailable('Y');

        $RACES_LIST = array();
        foreach($races as $race)
        {
            $DATA = array(
                'id' => $race->getCharRaceId(),
                'name' => $race->getRaceName(),
                'description'=> $race->getRaceDescr(),
//                'image' => null, 
            );

            // There may be no colors build for this pet. Don't blow up if that is the
            // case.
/**            $color = PetSpecie_PetSpecieColor::randomColor($specie->getPetSpecieId(),$db);
            if($color != null)
            {
                $DATA['image'] = "{$APP_CONFIG['public_dir']}/resources/pets/{$specie->getRelativeImageDir()}/{$color->getColorImg()}";
            }
**/            
            $RACES_LIST[] = $DATA;
        } // end races loop

        $renderer->assign('races',$RACES_LIST);
        $renderer->display('char/create_list.tpl');

        break;
    } // end default

    case 'details':
    {
        $ERRORS = array();
        $id = stripinput($_REQUEST['races']['id']);

        // Does the user have too many chars?
        if(sizeof($User->grabChars()) >= $APP_CONFIG['max_chars'])
        {
            $ERRORS[] = "You already have {$APP_CONFIG['max_chars']} characters!";
        }
        else
        {
            $race = new CharRace($db);
            $race = $race->findOneBy(array(
                'char_race_id' => $id,
                'available' => 'Y',
            ));

            if($race == null)
            {
                $ERRORS[] = 'Invalid race ID specified.';
            } // end no char
/**            else
            {
                $colors = new PetSpecie_PetSpecieColor($db);
                $colors = $colors->findBy(array(
                    'pet_specie_id' => $specie->getPetSpecieId(),
                    array(
                        'table' => 'pet_specie_color',
                        'column' => 'base_color',
                        'value' => 'Y',
                    ),
                ));

                $COLOR_LIST = array('' => 'Select one...');
                foreach($colors as $color)
                {
                    // $COLOR_LIST[$color->getPetSpeciePetSpecieColorId()] = $color->getColorName();
                    $COLOR_LIST[$color->getColorImg()] = $color->getColorName();
                }
               
                if(sizeof($COLOR_LIST) == 1)
                {
                    $ERRORS[] = 'Since there are no available colors for this pet, you cannot adopt it!';
                }
            } // end try to load color **/
        } // end user has acceptable number of chars

        if(sizeof($ERRORS) > 0)
        {
            draw_errors($ERRORS);
        }
        else
        {
            $CHAR = array(
                'id' => $race->getCharRaceId(),
                'name' => $race->getRaceName(),
                'description'=> $race->getRaceDescr(),
//                'image' => null, 
//                'image_dir' => $specie->getRelativeImageDir(),
            );

/**            $color = PetSpecie_PetSpecieColor::randomColor($specie->getPetSpecieId(),$db);
            if($color != null)
            {
                $PET['image'] = "{$APP_CONFIG['public_dir']}/resources/pets/{$specie->getRelativeImageDir()}/{$color->getColorImg()}";
            }**/
         
            $renderer->assign('char',$CHAR);
//            $renderer->assign('colors',$COLOR_LIST);
            $renderer->display('char/create_details.tpl');
        } // end char is valid

        break;
    } // end details

    case 'spawn':
    {
        $ERRORS = array();
        $race_id = stripinput($_POST['char']['race_id']);
//        $color_id = stripinput($_POST['pett']['color_id']);
        $char_name = stripinput($_POST['char']['name']);

        // Does the user have too many chars?
        if(sizeof($User->grabChars()) >= $APP_CONFIG['max_chars'])
        {
            $ERRORS[] = "You already have {$APP_CONFIG['max_pets']} characters!";
        }
        
        // Char name OK?
        if($char_name == null)
        {
            $ERRORS[] = 'Blank character name specified.';
        }
        elseif(strlen($char_name) > 25)
        {
            $ERRORS[] = 'There is a maxlength=25 attribute on that input tag for a reason.';
        }
		elseif(preg_match('/^[A-Z0-9_!@#\$%\^&\*\(\);:,\.-]*$/i',$char_name) == false)
        {
            $ERRORS[] = 'Invalid characters in character name. No spaces allowed!';
        }
        else
        {
            $other_char = new Char($db);
            $other_char = $other_char->findOneByName($char_name);

            if($other_char != null)
            {
                $ERRORS[] = 'That name is already in use.';
            }
        } // end do name-in-use checks
       
        // Check species.
        $race = new CharRace($db);
        $race = $race->findOneBy(array(
            'char_race_id' => $race_id,
            'available' => 'Y',
        ));

        if($race == null)
        {
            $ERRORS[] = 'Invalid race ID specified.';
        } // end no char
/**        else
        {
            $color = new PetSpecie_PetSpecieColor($db);
            $color = $color->findOneBy(array(
                array(
                    'table' => 'pet_specie_color',
                    'column' => 'color_img',
                    'value' => $color_id,
                ),
                array(
                    'table' => 'pet_specie',
                    'column' => 'pet_specie_id',
                    'value' => $specie->getPetSpecieId(),
                ),
                array(
                    'table' => 'pet_specie_color',
                    'column' => 'base_color',
                    'value' => 'Y',
                ),
            ));

            if($color == null)
            {
                $ERRORS[] = 'Invalid color specified.';
            }
        } // end pet exists **/
       
        if(sizeof($ERRORS) > 0)
        {
            draw_errors($ERRORS);
        } 
        else
        {
            // Add char.
            $char = new Char($db);
            $char->setUserId($User->getUserId());
            $char->setCharRaceId($race->getCharRaceId());
//            $char->setPetSpecieColorId($color->getPetSpecieColorId());
            $char->setName($char_name);
	    $char->setLevel(1);
	    $char->setStrength(10+$race->getStrMod());
	    $char->setDexterity(10+$race->getDexMod());
	    $char->setConstitution(10+$race->getConMod());
	    $char->setIntelligence(10+$race->getIntMod());
	    $char->setWisdom(10+$race->getWisMod());
	    $char->setCharisma(10+$race->getCharMod());
	    $char->setXp(1);
	    $char->setHpMax(1000);
	    $char->setHp(1000);
	    $char->setStaminaMax(1000);
	    $char->setStamina(1000);
	    $char->setManaMax(1000);
	    $char->setMana(1000);
            $char->setCreatedAt($char->sysdate());
            $char->save();

            // If the user has no other pets, make this the active one.
            if(sizeof($User->grabChars()) == 0)
            {
                $char->makeActiveChar();
            }

            // Session mog
            $_SESSION['hilight_char_id'] = $char->getCharId();
            
            // Redirect
            redirect('chars');
        } // end no errors; DO IT
        
        break;
    } // end spawn
} // end state switch
?>
