<?php
class City extends ActiveTable
{
	protected $table_name = 'city';
    protected $primary_key = 'user_id';
    
    //Wood Add and Subtract
    public function addWood($amount) 
    {
        // Force-cast to an int, just to be safe.
        $amount = (integer)$amount;
        $this->setWood(($this->getWood() + $amount));

        return $this->save();
    } // end addWood
    public function subtractWood($amount)
    {
        // Force-cast to an int, just to be safe.
        $amount = (integer)$amount;
        
        return $this->addWood("-$amount");
    } // end subtractWood
    
    //Clay Add and Subtract
    public function addClay($amount) 
    {
        // Force-cast to an int, just to be safe.
        $amount = (integer)$amount;
        $this->setClay(($this->getClay() + $amount));

        return $this->save();
    } // end addClay
	public function subtractClay($amount)
    {
        // Force-cast to an int, just to be safe.
        $amount = (integer)$amount;
        
        return $this->addClay("-$amount");
    } // end subtractClay
    
    //Stone Add and Subtract
    public function addStone($amount) 
    {
        // Force-cast to an int, just to be safe.
        $amount = (integer)$amount;
        $this->setStone(($this->getStone() + $amount));

        return $this->save();
    } // end addStone
    public function subtractStone($amount)
    {
        // Force-cast to an int, just to be safe.
        $amount = (integer)$amount;
        
        return $this->addStone("-$amount");
    } // end subtractStone
    
    //Iron Add and Subtract
    public function addIron($amount) 
    {
        // Force-cast to an int, just to be safe.
        $amount = (integer)$amount;
        $this->setIron(($this->getIron() + $amount));

        return $this->save();
    } // end addIron
    public function subtractIron($amount)
    {
        // Force-cast to an int, just to be safe.
        $amount = (integer)$amount;
        
        return $this->addIron("-$amount");
    } // end subtractIron
    
    //Gold Add and Subtract
    public function addGold($amount) 
    {
        // Force-cast to an int, just to be safe.
        $amount = (integer)$amount;
        $this->setGold(($this->getGold() + $amount));

        return $this->save();
    } // end addGold
    public function subtractGold($amount)
    {
        // Force-cast to an int, just to be safe.
        $amount = (integer)$amount;
        
        return $this->addGold("-$amount");
    } // end subtractGold

} // end City
?>