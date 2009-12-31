<p>You are on the way to leaving your clan! If you do not want to leave click on the navigation to get somewhere else. If you want to leave, click on leave.</p>

<div align='center'>
    <form action='{$display_settings.public_dir}/{$self.slug}' method='post'>
        <input type='hidden' name='state' value='process' />
        
        <table class='inputTable'>
            <tr>
                <td colspan='2' class='inputTableRow' style='text-align: right;'>
                    <input type='submit' value='Leave' /><span class='tiny'>(No turning back after this!)</span>
                </td>
            </tr>

        </table>
    </form>
</div>
