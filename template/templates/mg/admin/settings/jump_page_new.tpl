<div align='center'>
    <form action='{$display_settings.public_dir}/{$self.slug}/{$id}' method='post'>
        <input type='hidden' name='state' value='process' />
        
        <table class='inputTable'>
            <tr>
                <td class='inputTableRow inputTableSubhead'>
                    <label for='page_title'>Page Title</label>
                </td>
                <td class='inputTableRow' id='page_title_td'>
                    <input type='text' name='jump[page_title]' id='page_title' value='' /></span><br />
                </td>
            </tr>
            
            <tr>
                <td class='inputTableRowAlt inputTableSubhead'>
                    <label for='page_html_title'>Page Html Title</label>
                </td>
                <td class='inputTableRowAlt' id='page_html_title_td'>
                    <input type='text' name='jump[page_html_title]' id='page_html_title' value='' /><br />
                </td>
            </tr>

            <tr>
                <td class='inputTableRow inputTableSubhead'>
                    <label for='layout_type'>Layout Type</label>
                </td>
                <td class='inputTableRow' id='layout_type_td'>
                    <input type='text' name='jump[layout_type]' id='layout_type' value='deep' /><br />
                </td>
            </tr>
        
			<tr>
                <td class='inputTableRow inputTableSubhead'>
                    <label for='page_slug'>Page Slug</label>
                </td>
                <td class='inputTableRow' id='page_slug_td'>
                    <input type='text' name='jump[page_slug]' id='page_slug' value='' /><br />
                </td>
            </tr>
			
			<tr>
                <td class='inputTableRow inputTableSubhead'>
                    <label for='access_level'>Access Level</label>
                </td>
                <td class='inputTableRow' id='access_level_td'>
                    <input type='text' name='jump[access_level]' id='access_level' value='public' /><br />
                </td>
            </tr>
			
			<tr>
                <td class='inputTableRow inputTableSubhead'>
                    <label for='restricted_permission_api_name'>Permission Api Name</label>
                </td>
                <td class='inputTableRow' id='restricted_permission_api_name_td'>
                    <input type='text' name='jump[restricted_permission_api_name]' id='restricted_permission_api_name' value='' /><br />
                </td>
            </tr>
			
			<tr>
                <td class='inputTableRow inputTableSubhead'>
                    <label for='php_script'>php Script</label>
                </td>
                <td class='inputTableRow' id='php_script_td'>
                    <input type='text' name='jump[php_script]' id='php_script' value='' /><br />
                </td>
            </tr>
			
			<tr>
                <td class='inputTableRow inputTableSubhead'>
                    <label for='include_tinymce'>Include Tinymce</label>
                </td>
                <td class='inputTableRow' id='include_tinymce_td'>
                    <input type='text' name='jump[include_tinymce]' id='include_tinymce' value='N' /><br />
                </td>
            </tr>
			
			<tr>
                <td class='inputTableRow inputTableSubhead'>
                    <label for='active'>Active</label>
                </td>
                <td class='inputTableRow' id='active_td'>
                    <input type='text' name='jump[active]' id='active' value='Y' /><br />
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