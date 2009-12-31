<p>Welcome to {$site_name} clan maker! To make a new clan, just fill in a few details. As soon as your hit <em>Submit</em>, you will have a new clan! The price is {$cost|mgcurrency}</p>

<div align='center'>
    <form action='{$display_settings.public_dir}/{$self.slug}' method='post'>
        <input type='hidden' name='state' value='process' />
        <input type='hidden' name='user[clan_id]' id='user_clan_id' value='{$clan_id}' />
        
        <table class='inputTable'>
            <tr>
                <td colspan='2' class='inputTableRow' style='text-align: right;'>
                    <input type='submit' value='Submit' />
                </td>
            </tr>
        </table>
    </form>
</div>
