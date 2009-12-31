<p>Here you can edit if the clan should be public or private. To go back click <a href="{$display_settings.public_dir}/clan-admin/">Here</a>
            <form action='{$display_settings.public_dir}/clan-admin/access' method='post'>
            <input type='hidden' name='state' value='process' />
            	<table style='border: 0;'>
	                <tr>
	                	<td colspan='2' id='clan_2_td'>
	                		<input type='radio' name='clan[access]' value='public' checked='checked' />Public <span class='tiny'>(Everybody will be able to join this clan!)</span><br />
	                		<input type='radio' name='clan[access]' value='private' />Private <span class='tiny'>(They needs to be acepted before they can join!)</span>
	                	</td>
	                </tr>
    	            <tr>
        	            <td>
            	            <input type='submit' value='Send!' />
                	    </td>
        	        </tr>
 	           </table>
            </form>
        </p>