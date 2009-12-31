{literal}
<style type="text/css">
label {
	color: #000;
	float:left;
	text-align: right;
}

div.row {
  clear: both;
  padding-top: 10px;
  }

div.row span.label {
  float: left;
  width: 150px;
  text-align: right;
  }

div.row span.form1 {
  float: left;
  width: 100px;
  text-align: left;
}
div.row span.form2 {
  float: left;
  width: 100px;
  text-align: left;
} 

fieldset {
	border: 1px solid #003333;
	padding: 10px;
	float: left;
	position: relative;
}
	
input, textarea, .options {
	font: .9em "lucida sans", verdana, sans-serif;
	padding: 0.2em;
}

.options input {
	float: none;
	padding-left: 0;
}
div.buttons {
	clear: both;
	float: left;
	width: 300px;
	padding-top: 20px;
}

.options label {
	font: .9em "lucida sans", verdana, sans-serif;
	color: #000;
	text-transform: none;
}

#innerform {
	float: left;
	padding: 15px;
}

.clearthis {
	clear: both;
}

</style>
{/literal}

{if $notice != ''}<p id='notice_box' class='{$fat} notice-box'>{$notice}</p>{/if}
<p>Here you can edit many of mg´s settings. For an example the users starting points.</p>
<form action='{$display_settings.public_dir}/{$self.slug}' method='post'>
<input type='hidden' name='state' value='post' />
	<div id="innerform">
		<div class="row">
   			<span class="label"><label class="highlight" for="fm_email">Starting Currency:</label></span>
	  		<span class="formw"><input name="settings[start_currency]" id="start_currency" maxlength="15" type="text" value="{$settings.start_currency}"></span>
  		</div>
		<div class="row">
    		<span class="label"><label class="highlight" for="fm_name">Enable Register:</label></span>
	  		<span class="form1"><input type="radio" name="settings[enable_register]" id="enable_register" value="1" {if $settings.enable_register == 1}checked="checked"{/if}>Yes</span>
	  		<span class="form2"><input type="radio" name="settings[enable_register]" id="enable_register" value="0" {if $settings.enable_register == 0}checked="checked"{/if}>No</span>
	  	</div>
	  	<div class="row">
    		<span class="label"><label class="highlight" for="fm_name">Enable Clans:</label></span>
	  		<span class="form1"><input type="radio" name="settings[enable_clans]" id="enable_clans" value="1"{if $settings.enable_clans == 1}checked="checked"{/if}>Yes</span>
	  		<span class="form2"><input type="radio" name="settings[enable_clans]" id="enable_clans" value="0"{if $settings.enable_clans == 0}checked="checked"{/if}>No</span>
	  	</div>
	  	<div class="row">
    		<span class="label"><label class="highlight" for="fm_name">Enable User Pages:</label></span>
	  		<span class="form1"><input type="radio" name="settings[enable_userpages]" id="enable_userpages" value="1"{if $settings.enable_userpages == 1}checked="checked"{/if}>Yes</span>
	  		<span class="form2"><input type="radio" name="settings[enable_userpages]" id="enable_userpages" value="0"{if $settings.enable_userpages == 0}checked="checked"{/if}>No</span>
	  	</div>
	  	<div class="row">
   			<span class="label"><label class="highlight" for="fm_email">New Clan Cost:</label></span>
	  		<span class="formw"><input name="settings[clan_cost]" id="clan_cost" maxlength="15" type="text" value="{$settings.clan_cost}"></span>
  		</div>
	  	<div class="row">
    		<span class="label"><label class="highlight" for="fm_name">Enable Clan Register:</label></span>
	  		<span class="form1"><input type="radio" name="settings[clan_register]" id="clan_register" value="1"{if $settings.clan_register == 1}checked="checked"{/if}>Yes</span>
	  		<span class="form2"><input type="radio" name="settings[clan_register]" id="clan_register" value="0"{if $settings.clan_register == 0}checked="checked"{/if}>No</span>
	  	</div>
	  	<input type="submit" value="submit!">
	</div>
</form>