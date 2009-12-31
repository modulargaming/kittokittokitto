<?php
/**
 * Character related class. 
 *
 * This file is part of 'Modular Gaming'.
 *
 * <insert license info here>
 *
 * @author Panagiotis Kalogiratos (Nodens) <ntt@abnormalfreq.com>
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 **/
class Char extends ActiveTable
{
    protected $table_name = 'char';
    protected $primary_key = 'char_id';
    protected $LOOKUPS = array(
        array(
	    'local_table' => 'char',
            'local_key' => 'user_id',
            'foreign_table' => 'user',
            'foreign_key' => 'user_id',
            'join_type' => 'inner',
	),
        array(
            'local_key' => 'char_race_id', 
            'foreign_table' => 'char_race',
            'foreign_key' => 'char_race_id',
            'join_type' => 'inner',
	    'write' => true,
        ),
    );
    protected $RELATED = array(
        'user' => array(
            'class' => 'User',
	    'local_table' => 'char',
            'local_key' => 'user_id',
	    'foreign_table' => 'user',
            'foreign_key' => 'user_id',
	    'one' => true,
        ),
    );

    public function makeActiveChar()
    {
        $user = $this->grabUser();

        // Should never happen...
        if($user == null)
        {
            return false;
        }

        $user->setActiveCharId($this->getCharId());
        $user->save();
        
        return true;
    } // end public function makeActiveChar
} // end char
?>
