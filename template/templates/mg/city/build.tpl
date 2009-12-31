<p>Upgrade {$building}.<br />
It is going to take {$take_time} and will be ready {$redy_time}.<br />
Are you sure you want to build it? <br />
<br>
Resource Cost:
<ul>
<li>{$wood} Wood and you have {$current_wood}</li>
<li>{$clay} Clay and you have {$current_clay}</li>
<li>{$stone} Stone and you have {$current_stone}</li>
<li>{$iron} Iron and you have {$current_iron}</li>
<li>{$gold} Gold and you have {$current_gold}</li>
</ul>
<br />
</p>
<form action="{$display_settings.public_dir}/{$self.slug}/{$city_id}">
	<input type="submit" value="Cancel">
</form>
<form action="{$display_settings.public_dir}/{$self.slug}/{$city_id}/{$mode}/{$id}" method="post">
	<input type='hidden' name='state' value='process' />
	<input type="submit" value="Build it!">
</form>
