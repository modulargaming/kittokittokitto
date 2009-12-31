<?php
/**
 * Shop inventory classfile.
 *
 * This file is part of 'Modular Gaming'.
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
 * @author Kerstens 'Zenk0' Maxim <thorpion.zenk0@gmail.com>
 * @copyright Kerstens Maxim 2008-2009
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 * @package Modulargaming
 * @subpackage Usershop - Items
 * @version 1.0.0
 **/

/**
 * Shop <=> Item Type mapping to represent what items the shop has for sale.
 *
 * @uses ActiveTable
 * @package Modulargaming
 * @subpackage Usershop - Items
 * @author Kerstens 'Zenk0' Maxim <thorpion.zenk0@gmail.com>
 * @copyright Kerstens Maxim 2008-2009
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 **/
class UserShopInventory extends ActiveTable
{
	protected $table_name = 'shop_inventory';
	protected $primary_key = 'shop_inventory_id';
	protected $LOOKUPS = array(
		array(
			'local_key' => 'item_type_id',
			'foreign_table' => 'item_type',
			'foreign_key' => 'item_type_id',
			'join_type' => 'inner',
		),
		array(
			'local_table' => 'item_type',
			'local_key' => 'item_class_id',
			'foreign_table' => 'item_class',
			'foreign_key' => 'item_class_id',
			'join_type' => 'inner',
		),
	);

	/**
	 * Update/delete the stock row for a purchase.
	 *
	 * This will subtract the appropriate quantity OR delete the row, if none
	 * of the particular stocked item is left after the sale.
	 *
	 * @param integer $quantity The quantity of the stock that has been bought.
	 * @return bool
	 **/
	public function sell($quantity)
	{
		// Subtract from quantity if this isn't the whole supply.
		if($quantity < $this->getQuantity())
		{
			$this->setQuantity(($this->getQuantity() - $quantity));
			$this->save();
		}
		else // Otherwise, delete the row (0 supply = don't show it)
		{
			$this->destroy();
		}

		return true;
	} // end sell

   /**
	 * Return the full URL to the item's image.
	 *
	 * @return string URL
	 **/
	public function getImageUrl()
	{
		global $APP_CONFIG;

		return "{$APP_CONFIG['public_dir']}/resources/items/{$this->getRelativeImageDir()}/{$this->getItemImage()}";
	} // end getImageUrl
} // end UserShopInventory

?>
