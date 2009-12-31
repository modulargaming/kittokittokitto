<?php
/**
 * Shop classfile.
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
 * @author Kerstens 'Zenk0' Maxim <thorpion.zenk0@gmail.com>
 * @copyright Kerstens Maxim 2008-2009
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 * @package Modulargaming
 * @subpackage Usershops
 * @version 1.0.0
 **/

/**
 * Shop
 *
 * @uses ActiveTable
 * @author Kerstens 'Zenk0' Maxim <thorpion.zenk0@gmail.com>
 * @copyright Kerstens Maxim 2008-2009
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 * @package Modulargaming
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 **/
class Usershop extends ActiveTable
{
	protected $table_name = 'user_shops';
	protected $primary_key = 'shop_id';


	/**
	 * Get the full URL to the shopkeeper image.
	 *
	 * @return string URL
	 **/
	public function getImageUrl()
	{
		global $APP_CONFIG;

		return "{$APP_CONFIG['public_dir']}/resources/shopkeepers/{$this->getShopImage()}";
	} // end getImageUrl
} // end Shop

?>
