<table><tr><td><form action="{$display_settings.public_dir}/usershops/" method="post"><input type="submit" name="action" value="home"></form></td>
<td><form action="{$display_settings.public_dir}/usershops/" method="post"><input type="submit" name="action" value="list"></form></td>
<td><form action="{$display_settings.public_dir}/usershops/" method="post"><input type="submit" name="action" value="till"></form></td>
<td><form action="{$display_settings.public_dir}/usershops/" method="post"><input type="submit" name="action" value="history"></form></td></tr></table>
<p>You can update the look and the name of your shop here.</p><br />
{if $notice != ''}<div id='item-notice' class='{$fat} notice-box'>{$notice}</div>{/if}
<div align='center'>
    <form action='{$display_settings.public_dir}/usershops/' method='post'>
        <table class='inputTable' width='50%'>
            <tr>
                <td class='inputTableRow inputTableSubhead'>
                    <label for='shopname'>Shopname</label>
                </td>
                <td class='inputTableRow' id='shopname'>
                    <div id='shopname_cell' style='display: inline;'>
                        <input type='text' name='shopname' value="{$shop.name}" id='shopname' maxlength='25' class='to_field' />
                    </div>
                    <span class='validate textfieldRequiredMsg'>Please fill out a shopname.</span>
                </td>
            </tr>
            <tr>
                <td class='inputTableRow inputTableSubhead' valign="top">
                    <label for='welcome'>Shop front</label>
                </td>
                <td class='inputTableRow' id='welcome'>
                    <textarea name='welcome' cols='60' rows='15'>{$shop.welcome}</textarea><br />
                </td>
            </tr>
            <tr>
                <td class='inputTableRowAlt' colspan='2' style='text-align: right;'>
                    <input type="hidden" name="action" value="home" />
                    <input type='submit' value='Send' />
                </td>
            </tr>
        </table>
    </form>
</div>

{literal}
<script type='text/javascript'>
    var to_1 = new Spry.Widget.ValidationTextField("shopname", "none", {useCharacterMasking:true, validateOn:['change','blur']});    
</script>
{/literal}