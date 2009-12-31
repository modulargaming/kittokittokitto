<p>All of your inactive characters are in stasis, safe from harm.</p>

{section name=char loop=$chars}
<div class='char-box'>
    <div align='center'>
        <p id='char_{$chars[char].id}'{if $chars[char].fade == 1} class='{$fat} notice-box'{/if}><strong>{$chars[char].name}</strong></p>

        {if $chars[char].active == 0}
        <form action='{$display_settings.public_dir}/chars/' method='post'>
            <input type='hidden' name='state' value='active' />
            <input type='hidden' name='char_id' value='{$chars[char].id}' />
            <input type='submit' value='Activate' />
        </form>
        {/if}
    </div>
</div>
{sectionelse}
<div align='center'>
    <p><em>You do not have any characters.</em></p>
</div>
{/section}
