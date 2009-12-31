<p>Here you can edit the clan main page. To go back click <a href="{$display_settings.public_dir}/clan-admin/">Here</a>
            <form action='{$display_settings.public_dir}/clan-admin/page7' method='post'>
            <input type='hidden' name='state' value='process' />
            	<table style='border: 0;'>
                	<tr>
                    	<td colspan='2' id='clan_td'>
                        	<textarea name='clan[text]' id='text' cols='50' rows='15'>{$clan.page_7}</textarea><br />
                    	</td>
	                </tr>
	                <tr>
	                	<td colspan='2' id='clan_2_td'>
	                		<input type='radio' name='clan[access]' value='public' checked='checked' />Public <span class='tiny'>(Everybody will be able to access this page!)</span><br />
	                		<input type='radio' name='clan[access]' value='private' />Private <span class='tiny'>(Only clan members can access this page!)</span>
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