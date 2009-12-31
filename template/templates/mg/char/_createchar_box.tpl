<div class='char-box'>
    <div align='center'>
        No Image
    </div>
    <p><strong>{$char.name}</strong>: {$char.description}</p>

    <div align='center'>
        <form action='{$display_settings.public_dir}/create-char/' action='get'>
            <input type='hidden' name='state' value='details' />
            <input type='hidden' name='races[id]' value='{$char.id}' />
            <input type='submit' value='Become {$char.name}'/>
        </form>
    </div>
</div>
