<div align='center'>
    <div style='width: 40%;'>
        <p><em>Let's play rock, paper, scissors!  You will choose to play as rock, paper, or scissors.  I will also choose one.  If the game ends in a tie, you lose nothing and I lose nothing.  If you win you get {$prize|mgcurrency}.  However if I win, you have to pay me {$cost|mgcurrency}!</em></p>
        <p><em>So are you to chicken to try?</em></p>
        {if $result != ''}<p id='result' class='{$fat} notice-box'><em>{$result}</em></p>{/if}
    </div>
</div>

<form action='{$display_settings.public_dir}/rps-game' method='post'>
    <input type='hidden' name='state' value='choose' />

    <table align='center' class='inputTable'>
        <tr>
            <td class='inputTableRow inputTableSubhead'>
                <label for='choice'>Choice</label>
            </td>
            <td class='inputTableRow' id='choice_td'>
                {html_options name='choice' id='choice' options=$choices}
            </td>
        </tr>
        <tr>
            <td class='inputTableRowAlt' colspan='2' style='text-align: center;'>
                <input type='submit' value='Go!' />
            </td>
        </tr>
    </table>
</form>

{literal}
<script type='text/javascript'>
    var choice = new Spry.Widget.ValidationSelect('choice_td',{validateOn: ['change']});
</script>
{/literal}