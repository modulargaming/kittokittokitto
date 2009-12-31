<h2 class="page-title">Choose a City</h2>
{if $user_available == 1}<ul>{/if}
{section name=user loop=$user_list}
    <li>{mgurl slug='city' link_text=$user_list[user].name args=$user_list[user].id}</li>
{sectionelse}
<p><em>You don´t have a city yet.</em></p>
{/section}
{if $user_available == 1}</ul>{/if}