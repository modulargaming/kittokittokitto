<div style="float: left; width:50%">
{$currency_plural}: {$cash|number_format}{$currency_plural}<br />
Balance: {$bank|number_format}{$currency_plural}<br />
Interest per day: {$interest|number_format}{$currency_plural}
<br />
<form id="form" class="fValidator-form" action='{$display_settings.public_dir}/bank/' method='post'>
<input type='hidden' name='state' value='deposit' />
Amount:<br />
<input type='text' name='money' maxlength='25' class="fValidate['required'] iMask" alt="{literal}{
						type:'number',
						groupSymbol: ',',
						groupDigits: 3,
						decSymbol: '',
						decDigits: 0,
						stripMask: false
					}{/literal}" value="0" />
<br />
<input type="submit" value="Deposit" />
</form>
<form id="form" class="fValidator-form" action='{$display_settings.public_dir}/bank/' method='post'>
<input type='hidden' name='state' value='withdraw' />
Amount:<br />
<input type='text' name='money' maxlength='25' class="fValidate['required'] iMask" alt="{literal}{
						type:'number',
						groupSymbol: ',',
						groupDigits: 3,
						decSymbol: '',
						decDigits: 0,
						stripMask: false
					}{/literal}" value="0" />
<br />
<input type="submit" value="Withdraw" />
</form>
<form id="form" class="fValidator-form" action='{$display_settings.public_dir}/bank/' method='post'>
<input type='hidden' name='state' value='wire' />
Send to:<br />
<input type='text' name='user' maxlength='25' class="fValidate['required']" /><br />
Amount:<br />
<input type='text' name='money' maxlength='25' class="fValidate['required'] iMask" alt="{literal}{
						type:'number',
						groupSymbol: ',',
						groupDigits: 3,
						decSymbol: '',
						decDigits: 0,
						stripMask: false
					}{/literal}" value="0" />
<br />
<input type="submit" value="Wire" />
</form>
</div>
Banker:<br />
{$message}
