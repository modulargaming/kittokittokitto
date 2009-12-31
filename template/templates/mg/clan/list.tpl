<p>Here can you see all the users in this clan.</p>
{if $clan_available == 1}<ul>{/if}
{section name=clan loop=$clan_list}
    <li>{mgurl slug='admin-clan' link_text=$clan_list[clan].name args=$clan_list[clan].id}</li>
{sectionelse}
<p><em>There are no clans.</em></p>
{/section}
{if $clan_available == 1}</ul>{/if}
