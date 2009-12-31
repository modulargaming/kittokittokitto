<p>To make a new clan, just fill in a few details. As soon as your hit <em>Submit</em>, you will have a new clan! The price is 
currently {$cost|mgcurrency}</p>

<p>If you cannot read the security code - those blue letters in the image - click it to generate a new one. This is just to make sure you are not a computer!</p>

<div align='center'>
    <form action='{$display_settings.public_dir}/{$self.slug}' method='post'>
        <input type='hidden' name='state' value='process' />
        
        <table class='inputTable'>
            <tr>
                <td class='inputTableRow inputTableSubhead'>
                    <label for='username'>Clan Name</label>
                </td>
                <td class='inputTableRow' id='username_td'>
                    <input type='text' name='user[user_name]' id='user_name' value='' maxlength='25' /> <span class='tiny'>(You can put some funky stuff in!) <!-- FUNKY CAT MEBE?!?! --></span><br />
                    <span class='textfieldRequiredMsg valid'>You must pick a Clan Name.</span>
                </td>
            </tr>

            <tr>
                <td class='inputTableRowAlt inputTableSubhead'>
                    <label for='gender'>Access</label>
                </td>
                <td class='inputTableRowAlt' id='gender_td'>
                    {html_options id='gender' name=user[gender] options=$genders}<span class='tiny'>(public means all can join, private needs invitation!)</span><br />
                    <span class='selectInvalidMsg valid'>You must specify the access level.</span>
                </td>
            </tr>

            <tr>
                <td class='inputTableRow inputTableSubhead' align='center'>
                    <a href="#" onclick="javascript:document.getElementById('captchaimage').src = '{$display_settings.public_dir}/captcha.php?' + Math.random();return false;">
                        <img id="captchaimage" src="{$display_settings.public_dir}/captcha.php" alt="CAPTCHA image" style='border: 0;' />
                    </a>
                </td>
                <td class='inputTableRow' id='code_td'>
                    <input type='text' name='captcha_code' id='captcha_code' value='' /><br />
                    <span class='textfieldRequiredMsg valid'>You must enter the code.</span>
                </td>
            </tr>

            <tr>
                <td colspan='2' class='inputTableRow' style='text-align: right;'>
                    <input type='submit' value='Submit' />
                </td>
            </tr>

        </table>
    </form>
</div>

{literal}
<script type='text/javascript'>
    var passwordTheSame = function(value,options) {
        var other_value = document.getElementById('password').value;
        if(value != other_value) return false;

        return true;
    } // end anon

    var user_name = new Spry.Widget.ValidationTextField("username_td", "none", {useCharacterMasking:true, validateOn:['change','blur']});    
    var gender = new Spry.Widget.ValidationSelect('gender_td',{validateOn:['blur','change'], invalidValue: '0'});
    var captcha = new Spry.Widget.ValidationTextField("code_td", "none", {useCharacterMasking:true, validateOn:['change','blur']});    
</script>
{/literal}
