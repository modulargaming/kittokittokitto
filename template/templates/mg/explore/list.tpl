<p>Here you can see all locations in this game.</p>

{if $location_available == 1}<ul>{/if}
{section name=location loop=$location_list}
    <li>{mgurl slug=$location_list[location].slug link_text=$location_list[location].name }</li>
{sectionelse}
<p><em>There are no locations in this game.</em></p>
{/section}
{if $location_available == 1}</ul>{/if}

