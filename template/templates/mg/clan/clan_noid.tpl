<p>This is the clan page. Here can you see clans and make your own clan.
<br /><br />
{$clan_message}
</p>
{$clan}

<p>There are a number of clans. Click on them to go to their pages.</p>
{if $clan_available == 1}<ul>{/if}
{section name=clan loop=$clan_list}
    <li>{mgurl slug='clan' link_text=$clan_list[clan].name args=$clan_list[clan].id}</li>
{sectionelse}
<p><em>There are no clans, so please make your own.</em></p>
{/section}
{if $clan_available == 1}</ul>{/if}
