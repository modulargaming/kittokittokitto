<table><tr><td><form action="{$display_settings.public_dir}/usershops/" method="post"><input type="submit" name="action" value="home"></form></td>
<td><form action="{$display_settings.public_dir}/usershops/" method="post"><input type="submit" name="action" value="list"></form></td>
<td><form action="{$display_settings.public_dir}/usershops/" method="post"><input type="submit" name="action" value="till"></form></td>
<td><form action="{$display_settings.public_dir}/usershops/" method="post"><input type="submit" name="action" value="history"></form></td></tr></table>
<p>You can update the look and the name of your shop here.</p>

<br /><br />
{if $notice != ''}<div id='item-notice' class='{$fat} notice-box'>{$notice}</div>{/if}
<form action="" method="post">
<input type="hidden" name="action" value="list">
<table width="100%">
  <tr>
    <td></td>
    <td width="15%"><b>Name</b></td>
    <td width="40%"><b>Description</b></td>
    <td width="10%"><b>Quantity</b></td>
    <td width="10%"><b>Price</b></td>
    <td width="5%"><b>Delete</b></td>
  </tr>
{section name=item_index loop=$items}
{assign var='item' value=$items[item_index]}
  <tr>
    <td><img src='{$item.image}' border='0' alt='{$item.name}' /></td>
    <td align="center">{$item.name}</td>
    <td>{$item.description}</td>
    <td align="center">{$item.quantity}</td>
    <td><input type="text" maxlength="7" size="7" name="item[update][{$item.id}]" value="{$item.price}" /></td>
    <td align="center"><input type="text" maxlength="3" size="3" name="item[delete][{$item.id}]" value="0" /></td>
  </tr>
{sectionelse}
<tr><td colspan="6"><em>You have no items in your shop.</em></td></tr>
{/section}
<tr><td colspan="5"></td><td><input type="submit" value="Update shop" />
</form>
</table>