<p class='page-subnav'>Inventory | {mgurl link_text='Crafting' slug='crafting'}</p>

{if $notice != ''}<div id='item-notice' class='{$fat} notice-box'>{$notice}</div>{/if}
{section name=item_index loop=$inventory}
{assign var='item' value=$inventory[item_index]}
<div class='item-box'>
    <div align='center'>
        <p><img src='{$item.image}' border='0' alt='{$item.name}' /></p>
        <p style='font-weight: bold;'>{mgurl link_text="`$item.quantity` `$item.name`" slug='item' args="?item[id]=`$item.id`"}</p>
    </div>
</div>
{sectionelse}
<p><em>You have no items in your inventory.</em></p>
{/section}

<br clear='all' />
<div class='pages'>{$pagination}</div>
