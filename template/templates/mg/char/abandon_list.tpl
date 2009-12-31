<p>Your character's life energy will return to the Source. Where all life comes from!</p>

<p>Understand that once your character's energy returns to the source he is <strong>GONE FOREVER</strong>!</p>

{section name=char loop=$chars}
<div class='char-box'>
    <div align='center'>
        <p id='pet_{$chars[char].id}'><strong>{$chars[char].name}</strong></p>

        {if $chars[char].active == 0}
        <form action='{$display_settings.public_dir}/abandon-char' method='post' onSubmit="return confirm('Are you SURE?')">
            <input type='hidden' name='state' value='abandon' />
            <input type='hidden' name='char_id' value='{$chars[char].id}' />
            <input type='submit' value='Return to the Source' />
        </form>
        {/if}
    </div>
</div>
{sectionelse}
<div align='center'>
    <p><em>You do not have any characters to return to the Source.</em></p>
</div>
{/section}
