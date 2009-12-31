<div style="float: left; width:50%">
You: {$cash|number_format}<br />
Clan: {$bank|number_format}<br />
<br />
<form id="form" class="fValidator-form" action='{$display_settings.public_dir}/clan/{$clan_id}/donate' method='post'>
<input type='hidden' name='state' value='process' />
Amount:<br />
<input type='text' name='clan[money]' maxlength='25' class="fValidate['required'] iMask" alt="{literal}{
type:'number',
groupSymbol: ',',
groupDigits: 3,
decSymbol: '',
decDigits: 0,
stripMask: false
}{/literal}" value="0" />
<br />
<input type="submit" value="Donate" />
</form>
</div>
History:<br />
{if $clan_available == 1}<ul>{/if}
{section name=clan loop=$clan_list}
    <li>{$clan_list[clan].user_name} has {$clan_list[clan].action} {$clan_list[clan].amount}</li>
{sectionelse}
<p><em>Nobody has donated.</em></p>
{/section}
{if $clan_available == 1}</ul>{/if}
