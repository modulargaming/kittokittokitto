<p>On this page you can see all jump_page form the database. Click on one to edit it.
<br><a href="new"> click here if you want to add a new jump page.</a></p>
{if $jump_available == 1}<ul>{/if}
{section name=jump loop=$jump_list}
    <li>{mgurl slug='admin-jump' link_text=$jump_list[jump].page_title args=$jump_list[jump].id}</li>
{sectionelse}
<p><em>There are no Slugs, thats impossible. This needs to be an error.</em></p>
{/section}
{if $jump_available == 1}</ul>{/if}
