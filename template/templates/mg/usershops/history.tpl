<table><tr><td><form action="{$display_settings.public_dir}/usershops/" method="post"><input type="submit" name="action" value="home"></form></td>
<td><form action="{$display_settings.public_dir}/usershops/" method="post"><input type="submit" name="action" value="list"></form></td>
<td><form action="{$display_settings.public_dir}/usershops/" method="post"><input type="submit" name="action" value="till"></form></td>
<td><form action="{$display_settings.public_dir}/usershops/" method="post"><input type="submit" name="action" value="history"></form></td></tr></table>
<p>You can update the look and the name of your shop here.</p>

<br /><br />
{if $notice != ''}<div id='item-notice' class='{$fat} notice-box'>{$notice}</div>{/if}
<div align="center"><table width="55%">
  <tr>
    <td><b></b></td>
    <td><b>Name</b></td>
    <td><b>User</b></td>
    <td><b>Price</b></td>
  </tr>
{section name=item_index loop=$history}
{assign var='item' value=$history[item_index]}
  <tr>
    <td><img src='{$item.url}' border='0' alt='{$item.name}' /></td>
    <td align="center">{$item.item_name}</td>
    <td>{$item.username}</td>
    <td align="center">{$item.points}</td>
  </tr>
{sectionelse}
<tr><td colspan="6"><em>You haven't sold anything yet.</em></td></tr>
{/section}
</table></div>