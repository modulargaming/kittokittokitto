<?php
/**
 * Pet profile. 
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
 * @subpackage Pets
 * @version 1.0.0
 **/
 
$uri->name(array("pet_id"));
$pet_id = stripinput($_URI['pet_id']);

$pet = new Pet($db);
$pet = $pet->findOneByUserPetId($pet_id);

if($pet == null)
{
    draw_errors('Invalid pet specified.');
}
else
{
    $owner = $pet->grabUser();
    
    $PET = array(
        'id' => $pet->getUserPetId(),
        'name' => $pet->getPetName(),
        'owner' => array(
            'id' => $owner->getUserId(),
            'name' => $owner->getUserName(),
        ),
        'specie' => $pet->getSpecieName(),
        'hunger' => $pet->getHungerText(),
        'happiness' => $pet->getHappinessText(),
        'birthdate' => $User->formatDate($pet->getCreatedAt()),
        'profile' => $pet->getProfile(),
        'image' => $pet->getImageUrl(),
    );
    
    $renderer->assign('pet',$PET);
    $renderer->display('pets/profile.tpl');
} // end display pet
?>
