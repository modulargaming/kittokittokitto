{if $clan_available == 1}<ul>{/if}
{section name=clan loop=$clan_list}
    <li>{mgurl slug='clan-admin/adduser' link_text=$clan_list[clan].name args=$clan_list[clan].id}</li>
{sectionelse}
<p><em>There are no users waiting to join your clan.</em></p>
{/section}
{if $clan_available == 1}</ul>{/if}