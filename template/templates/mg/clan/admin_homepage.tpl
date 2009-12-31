<p>Here you can edit the clan main page. This will be vissible for everybody. To go back click <a href="{$display_settings.public_dir}/clan-admin/">Here</a>
            <form action='{$display_settings.public_dir}/clan-admin/homepage' method='post'>
            <input type='hidden' name='state' value='process' />
            	<table style='border: 0;'>
                	<tr>
                    	<td colspan='2' id='clan_td'>
                        	<textarea name='clan[text]' id='text' cols='50' rows='15'>{$clan.page_0}</textarea><br />
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