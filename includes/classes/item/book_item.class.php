<?php
/**
* A book item that can be read to a pet.
*
* @uses ActiveTable
* @package ModularGaming
* @subpackage Items
* @copyright 2009 Zenk0
* @author Zenk0
* @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
**/
class Book_Item extends Item
{
/**
* Read a book to a specified pet.
*
* Increases pet's total books read and destroys the item.
*
* @param Pet $pet
* @return string The success message.
**/
public function read(Pet $pet,$quantity)
{
if($quantity > $this->getQuantity())
{
throw new ArgumentError("This stack does not have $quantity items.");
}

// Add 1 to the pet's total read books.
$pet->setBooksRead(($pet->getBooksRead() + 1));

//prepare the text that will be displayed to the user
$text = "You have read {$pet->getPetName()} {$this->makeActionText($quantity)}.";

//take care of the iteù, delete it if the quantity of used items is the same as the amount of owned copies
if($quantity == $this->getQuantity())
{
$this->destroy();
}
//lower quantity
else
{
$this->setQuantity(($this->getQuantity() - $quantity));
$this->save();
}

return $text;
} // end read

} // end Book_Item

?>

