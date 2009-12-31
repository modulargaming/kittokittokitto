{if $user_available == 1}<ul>{/if}
{section name=user loop=$user_list}
    <li>{mgurl slug='clan-admin/kickuser' link_text=$user_list[user].name args=$user_list[user].id}</li>
{sectionelse}
<p><em>There are no users in this clan.</em></p>
{/section}
{if $user_available == 1}</ul>{/if}