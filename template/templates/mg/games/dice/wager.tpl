<div align='center'>
    <div style='width: 80%;'>
    	<div style="float: left; width:70%">
	        <p><em>Want to play Dice? I am going to roll one dice and if the value on the dice matches your value, you win and I'll give you {$prize|mgcurrency}. But if it does not match you have to give me {$cost|mgcurrency}!</em></p>
   		     <p><em>Well? You wanna try?</em></p>
   		     {if $result != ''}<p id='result' class='{$fat} notice-box'><em>{$result}</em></p>{/if}
    	</div>
    	<div style="float: left; width:20%">
    		<img src="{$display_settings.public_dir}/resources/images/dice.png" />
    	</div>
    </div>
</div>
<div style="float: right; width:100%">
<form action='{$display_settings.public_dir}/dice-game' method='post'>
    <input type='hidden' name='state' value='guess' />
    
    <table align='center' class='inputTable'>
        <tr>
            <td class='inputTableRow inputTableSubhead'>
                <label for='card'>Number</label>
            </td>
            <td class='inputTableRow' id='card_td'>
                {html_options name='card' id='card' options=$cards}
            </td>
        </tr>
        <tr>
            <td class='inputTableRowAlt' colspan='2' style='text-align: center;'>
                <input type='submit' value='Roll the dice!' />
            </td>
        </tr>
    </table>
</form>
</div>

{literal}
<script type='text/javascript'>
    var card = new Spry.Widget.ValidationSelect('card_td',{validateOn:['change']});
</script>
{/literal}
