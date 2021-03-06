<?php
/**
 * Edit a item.
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
 * @subpackage Items 
 * @version 1.0.0
 **/

$ERRORS = array();
$item_id = (int)stripinput($_REQUEST['item']['id']);
$item = new ItemType($db);
$item = $item->findOneByItemTypeId($item_id);
$YN = array('Y' => 'Yes','N' => 'No');

if($item == null)
{
    $ERRORS[] = 'Invalid item specified.';
}

if(sizeof($ERRORS) > 0)
{
    draw_errors($ERRORS);
}
else
{
    switch($_REQUEST['state'])
    {
        default:
        {
            if($item != null)
            {
                $ITEM = array(
                    'show_edit_materials' => $item->hasMaterials(),
                    'id' => $item->getItemTypeId(),
                    'type' => $item->getClassDescr(),
                    'name' => $item->getItemName(),
                    'image' => $item->getItemImage(),
                    'description' => $item->getItemDescr(),
                    'unique' => $item->getUniqueItem(),
                    'transferable' => $item->getTransferableItem(),
                );
            } // end edit mode

            $fields = $item->listAttributes();
            foreach($fields as $field)
            {
                // This prepopulates the item name in the search field.
                $item_tmp = null;
                if($field['type'] == 'item') 
                {
                    $item_tmp = new ItemType($db);
                    $item_tmp = $item_tmp->findOneByItemTypeId($item->get($field['name']));
                    
                    $value = array($item->get($field['name']),); 
                    if($item_tmp != null)
                    {
                        $value[] = $item_tmp->getItemName(); 
                    }
                    
                    $ITEM[$field['name']] = $value;
                    continue;
                } // end item specific

                $ITEM[$field['name']] = $item->get($field['name']);
            } // end extra field loop
            
            $YN = array_merge(array('' => 'Select one...'),$YN);
            $renderer->assign('yes_no',$YN);
            $renderer->assign('extra_fields',$fields);
            $renderer->assign('item',$ITEM);
            $renderer->display('admin/items/edit.tpl');

            break;
        } // end default

        case 'save':
        {
            $ITEM = array(
                'name' => trim(stripinput($_POST['item']['name'])),
                'image' => trim(stripinput($_POST['item']['image'])),
                'description' => trim(clean_xhtml($_POST['item']['description'],false)),
                'transferable' => $_POST['item_transferable'],
                'unique' => $_POST['item_unique'],
            );
            
            // Load the data for extra, item-specific fields.
            $EXTRA = array();
            $fields = $item->listAttributes();
            foreach($fields as $field)
            {
                $EXTRA[$field['name']] = trim(stripinput($_POST['extra'][$field['name']]));

                // If it's a select, make sure the ID is valid. These are 
                // usually used for picking an option from another table, so 
                // the item could break if this is crap...
                if($field['type'] == 'select')
                {
                    if(in_array($EXTRA[$field['name']],array_keys($field['values'])) == false)
                    {
                        $ERRORS[] = "Invalid option specified for {$field['label']}.";
                    }
                } // end validate select
            } // end field loop
            
            if($ITEM['name'] == null)
            {
                $ERRORS[] = 'No name specified.';
            }
            elseif(strlen($ITEM['name']) > 50)
            {
                $ERRORS[] = 'There is a maxlength=50 on that field for a reason.';
            }

            if($ITEM['image'] == null)
            {
                $ERRORS[] = 'No image specified.';
            }
            elseif(strlen($ITEM['image']) > 200)
            {
                $ERRORS[] = 'There is a maxlength=200 on that field for a reason.';
            }

            if($ITEM['description'] == null)
            {
                $ERRORS[] = 'No description specified.';
            }

            if(in_array($ITEM['unique'],array_keys($YN)) == false)
            {
                $ERRORS[] = 'Item uniqueness not specified.';
            }
            
            if(in_array($ITEM['transferable'],array_keys($YN)) == false)
            {
                $ERRORS[] = 'Item transerability not specified.';
            }

            if(sizeof($ERRORS) > 0)
            {
                draw_errors($ERRORS);
            }
            else
            {
                $item->setItemName($ITEM['name']);
                $item->setItemImage($ITEM['image']);
                $item->setItemDescr($ITEM['description']);
                $item->setUniqueItem($ITEM['unique']);
                $item->setTransferableItem($ITEM['transferable']);

                // Do the extra fields.
                foreach($EXTRA as $column => $value)
                {
                    $item->set($value,$column);
                } // end sets for extras
                
                $item->save();

                $_SESSION['item_notice'] = "You have saved <strong>{$item->getItemName()}</strong>.";
                redirect('admin-items');
            } // end no errors

            break;
        } // end save
    } // end state switch
} // end no errors
?>
