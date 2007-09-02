<?php
/**
 *  
 **/

/**
 * Pet 
 * 
 * @uses ActiveTable
 * @package Kitto_Kitto_Kitto
 * @subpackage Core 
 * @copyright 2007 Nicholas Evans
 * @author Nick 'Owl' Evans <owlmanatt@gmail> 
 * @license GNU GPL v2 {@link http://www.gnu.org/licenses/gpl-2.0.txt}
 **/
class Pet extends ActiveTable
{
    protected $table_name = 'user_pet';
    protected $primary_key = 'user_pet_id';
    protected $LOOKUPS = array(
        array(
            'local_key' => 'pet_specie_id', 
            'foreign_table' => 'pet_specie',
            'foreign_key' => 'pet_specie_id',
            'join_type' => 'inner',
        ),
        array(
            'local_key' => 'pet_specie_color_id', 
            'foreign_table' => 'pet_specie_color',
            'foreign_key' => 'pet_specie_color_id',
            'join_type' => 'inner',
        ),
    );
    protected $RELATED = array(
        'user' => array(
            'class' => 'User',
            'local_key' => 'user_id',
            'foreign_key' => 'user_id',
            'one' => true,
        ),
    );

    /**
     * Get the full URL for this pet's image.
     * 
     * @return string 
     **/
    public function getImageUrl()
    {
        global $APP_CONFIG;
        
        return "{$APP_CONFIG['public_dir']}/resources/pets/{$this->getRelativeImageDir()}/{$this->getColorImg()}";
    } // end getImageUrl

    /**
     * Make this its owner's active pet.
     * 
     * @return bool 
     **/
    public function makeActive()
    {
        $user = $this->grabUser();

        // Should never happen...
        if($user == null)
        {
            return false;
        }

        $user->setActiveUserPetId($this->getUserPetId());
        $user->save();
        
        return true;
    } // end public function makeActive

    /**
     * Add the appropriate amount to the pet's hunger level. 
     * 
     * @param integer $amount 
     * @return bool 
     **/
    public function consume($amount)
    {
        $hunger = $this->getHunger() + $amount;
        if($hunger > $this->getMaxHunger())
        {
            $hunger = $this->getMaxHunger();
        }
        
        $this->setHunger($hunger);

        return $this->save();
    } // end consume

    /**
     * Add the appropriate amount to the pet's happiness level. 
     * 
     * @param integer $amount 
     * @return bool 
     **/
    public function play($amount)
    {
        $happy = $this->getHappiness() + $amount;
        if($happy > $this->getMaxHappiness())
        {
            $happy = $this->getMaxHappiness();
        }
        
        $this->setHappiness($happy);

        return $this->save();
    } // end consume

} // end Pet

?>