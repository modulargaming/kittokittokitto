<h2 class="page-title">View - {$city.name}</h2>
<div id="map">
	<div id="y1">
		<div id="c_map1"><div id="{$building_places.1}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/1"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
		<div id="c_map2"><div id="{$building_places.2}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/2"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
	</div>
	<div id="y2">
		<div id="c_map3"><div id="{$building_places.3}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/3"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
		<div id="c_map4"><div id="{$building_places.4}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/4"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
		<div id="c_map5"><div id="{$building_places.5}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/5"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
	</div>	
	<div id="y3">
		<div id="c_map6"><div id="{$building_places.6}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/6"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
		<div id="c_map7"><div id="{$building_places.7}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/7"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
		<div id="c_map8"><div id="{$building_places.8}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/8"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
		<div id="c_map9"><div id="{$building_places.9}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/9"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
	</div>
	<div id="y4">
		<div id="c_map10"><div id="{$building_places.10}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/10"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
		<div id="c_map11"><div id="{$building_places.11}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/11"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
		<div id="c_map12"><div id="{$building_places.12}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/12"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
		<div id="c_map13"><div id="{$building_places.13}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/13"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
	</div>
	<div id="y5">
		<div id="c_map14"><div id="{$building_places.14}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/14"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
		<div id="c_map15"><div id="{$building_places.15}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/15"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
		<div id="c_map16"><div id="{$building_places.16}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/16"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
	</div>
	<div id="y6">
		<div id="c_map17"><div id="{$building_places.17}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/17"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
		<div id="c_map18"><div id="{$building_places.18}"><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/18"><img src="{$display_settings.public_dir}/resources/city/transparent.gif" style="width:50px; height:50px; border:0;" /></a></div></div>
	</div>
</div>	
<div align='center'>	
    <table class='inputTable' width='50%' style='margin-left: auto; margin-right: auto;'>
        <tr>
            <td class='inputTableRow inputTableSubhead' width='40%'>Name</td>
            <td class='inputTableRow'>{$city.name}</td>
        </tr>
        
        <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Population</td>
            <td class='inputTableRowAlt'>{$city.pop|number_format}</td> 
        </tr>

	 <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Building</td>
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Building</td>
            <td class='inputTableRowAlt'>{$city.bbuilding}</td> 
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Building finished</td>
            <td class='inputTableRowAlt'>{$city.btime}</td> 
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Building new level</td>
            <td class='inputTableRowAlt'>{$city.blvl|number_format}</td> 
        </tr>

	 <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Resources</td>
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Wood</td>
            <td class='inputTableRowAlt'>{$city.wood|number_format}</td> 
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Clay</td>
            <td class='inputTableRowAlt'>{$city.clay|number_format}</td> 
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Stone</td>
            <td class='inputTableRowAlt'>{$city.stone|number_format}</td> 
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Iron</td>
            <td class='inputTableRowAlt'>{$city.iron|number_format}</td> 
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Gold</td>
            <td class='inputTableRowAlt'>{$city.gold|number_format}</td> 
        </tr>

	 <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Warehouse</td>
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'><a 
href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/lumberjack">Woodcutter level</a></td>
            <td class='inputTableRowAlt'>{$city.lumberjack|number_format}</td> 
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/claymine">Clay Mine level</a></td>
            <td class='inputTableRowAlt'>{$city.clay_mine|number_format}</td> 
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'><a 
href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/stonebreak">Stone Mine level</a></td>
            <td class='inputTableRowAlt'>{$city.stone_break|number_format}</td> 
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/ironmine">Iron Mine level</a></td>
            <td class='inputTableRowAlt'>{$city.iron_mine|number_format}</td> 
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'><a href="{$display_settings.public_dir}/{$self.slug}/{$city_id}/build/goldmine">Gold Mine level</a></td>
            <td class='inputTableRowAlt'>{$city.gold_mine|number_format}</td> 
        </tr>    
    </table>
</div>
