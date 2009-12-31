<div align='center'>
    <div class='char-box' style='float:none;'>
        <div align='center'>
            No Image
        </div>
        <p><strong>{$char.name}</strong>: {$char.description}</p>
    </div>

    <p>To create your <strong>{$char.name}</strong>, just choose a name!</p>
    
    <form action='{$display_settings.public_dir}/create-char' method='post'>
        <input type='hidden' name='state' value='spawn' />
        <input type='hidden' name='char[race_id]' value='{$char.id}' />
        
        <table class='inputTable' width='20%'>
            <tr>
                <td class='inputTableRow inputTableSubhead'>
                    <label for='name'>Name</label>
                </td>
                <td class='inputTableRow' id='name_td'>
                    <input type='text' name='char[name]' id='name' maxlength='25' /><br />
                    <span class='textfieldRequiredMsg valid'>You must pick a name.</span>
                </td>
            </tr>
            <tr>
                <td class='inputTableRow'>&nbsp;</td>
                <td align='right' class='inputTableRow'> 
                    <input type='submit' value='Create' />
                </td>
            </tr>
        </table>
    </form>
</div>

{literal}
<script type='text/javascript'>
    var name = new Spry.Widget.ValidationTextField("name_td", "none", {useCharacterMasking:true, validateOn:['change','blur']});    
</script>
{/literal}
