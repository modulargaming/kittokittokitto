<table><tr><td><form action="{$display_settings.public_dir}/usershops/" method="post"><input type="submit" name="action" value="home"></form></td>
<td><form action="{$display_settings.public_dir}/usershops/" method="post"><input type="submit" name="action" value="list"></form></td>
<td><form action="{$display_settings.public_dir}/usershops/" method="post"><input type="submit" name="action" value="till"></form></td>
<td><form action="{$display_settings.public_dir}/usershops/" method="post"><input type="submit" name="action" value="history"></form></td></tr></table>
<p>You can see how much yuo've earned and withdraw money from your shop till.</p>

<br /><br />
{if $notice != ''}<div id='item-notice' class='{$fat} notice-box'>{$notice}</div>{/if}
<form action="" method="post">
<div align="center">
<input type="hidden" name="action" value="till">
<table>
  <tr>
    <td><b>Earnings</b></td>
    <td>{$till}</td>
  </tr>
  <tr>
    <td><b>Withdraw</b></td>
    <td><input type="text" name="amount" value="0" size="8" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="Withdraw"></td>
  </tr>
</form>
</table>
</div>