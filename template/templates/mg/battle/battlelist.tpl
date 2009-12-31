<p>Choose your target.</p>

{if $char_available == 1}<ul>{/if}
{section name=char loop=$char_list}
	<li>{mgurl slug='battle' link_text=$char_list[char].name args=$char_list[char].id}</li>
{sectionelse}
<p><em>There are no targets online.</em></p>
{/section}
{if $char_available == 1}</ul>{/if}
