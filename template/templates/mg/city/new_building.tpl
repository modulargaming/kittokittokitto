<h2 class="page-title">{$page_html_title} - New Building</h2>
<p>You can now choose a building you want to build.</p>

{if $btime != null}
<p>You are currently constructing a building. You can not build a new building before it has completed constructing.</p>
{/if}

{if $city.lumberjack == "0"}
<p><h2>Woodcutter</h2></p>
<p>Woodcutter will increase your wood production.<br /><br />
<b>This level:</b> 20 Wood<br />
<b>Next level:</b> 30 Wood<br /></p>
<form action="{$display_settings.public_dir}/{$self.slug}/{$id}/build/new/{$id2}" method='post'>
	<input type="hidden" name='building' value="Lumberjack">
	<input type='hidden' name='state' value='process' />
	<input type="submit" value="Build">
</form> 
{/if}

{if $city.clay_mine == "0"}
<p><h2>Clay Mine</h2></p>
<p>Clay Mine will increase your clay production.<br /><br />
<b>This level:</b> 20 Clay<br />
<b>Next level:</b> 30 Clay<br /></p>
<form action="{$display_settings.public_dir}/{$self.slug}/{$id}/build/new/{$id2}" method='post'>
	<input type="hidden" name='building' value="clay_mine">
	<input type='hidden' name='state' value='process' />
	<input type="submit" value="Build">
</form> 
{/if}

{if $city.stone_break == "0"}
<p><h2>Stone Mine</h2></p>
<p>Stone Minewill increase your Stone production.<br /><br />
<b>This level:</b> 20 Stone<br />
<b>Next level:</b> 30 Stone<br /></p>
<form action="{$display_settings.public_dir}/{$self.slug}/{$id}/build/new/{$id2}" method='post'>
	<input type="hidden" name='building' value="stone_break">
	<input type='hidden' name='state' value='process' />
	<input type="submit" value="Build">
</form> 
{/if}

{if $city.iron_mine == "0"}
<p><h2>Iron Mine</h2></p>
<p>Iron Mine will increase your Stone production.<br /><br />
<b>This level:</b> 20 Iron<br />
<b>Next level:</b> 30 Iron<br /></p>
<form action="{$display_settings.public_dir}/{$self.slug}/{$id}/build/new/{$id2}" method='post'>
	<input type="hidden" name='building' value="iron_mine">
	<input type='hidden' name='state' value='process' />
	<input type="submit" value="Build">
</form> 
{/if}

{if $city.gold_mine == "0"}
<p><h2>Gold Mine</h2></p>
<p>Gold Mine will increase your Gold production.<br /><br />
<b>This level:</b> 20 Gold<br />
<b>Next level:</b> 30 Gold<br /></p>
<form action="{$display_settings.public_dir}/{$self.slug}/{$id}/build/new/{$id2}" method='post'>
	<input type="hidden" name='building' value="gold_mine">
	<input type='hidden' name='state' value='process' />
	<input type="submit" value="Build">
</form> 
{/if}
