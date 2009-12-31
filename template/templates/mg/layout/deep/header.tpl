<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" xmlns:spry='http://ns.adobe.com/spry'>
    <head>
        <title>{if $page_title eq ''}{$site_name} | Welcome{else}{$site_name} | {$page_title}{/if}</title>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>
        <style type="text/css" media="screen">
            @import url( {$display_settings.public_dir}/resources/styles/style.css );
        </style>
        
        {foreach from=$spry.css item=css_file}
        <link href="{$display_settings.public_dir}/resources/script/spry/widgets/{$css_file}" rel="stylesheet" type="text/css" />
        {/foreach}
        
        <script type='text/javascript' src='{$display_settings.public_dir}/resources/script/fat.js'></script>
        <script type='text/javascript' src='{$display_settings.public_dir}/resources/script/yasashii.js'></script>
		
		<script type='text/javascript' src='{$display_settings.public_dir}/resources/script/prototype/prototype.js'></script> 
        <script type='text/javascript' src='{$display_settings.public_dir}/resources/script/prototype/effects.js'></script>
        <script type='text/javascript' src='{$display_settings.public_dir}/resources/script/prototype/window.js'></script>
        <script type='text/javascript' src='{$display_settings.public_dir}/resources/script/prototype/window_effects.js'></script>
	<script type='text/javascript' src='{$display_settings.public_dir}/resources/script/jquery.min.js'></script>
        <script type='text/javascript' src='{$display_settings.public_dir}/resources/script/autocomplete/jquery.autocomplete.min.js'></script>
        <link href="{$display_settings.public_dir}/resources/script/autocomplete/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
		<link href='{$display_settings.public_dir}/resources/themes/default.css' rel='stylesheet' type='text/css' ></link>
        <link href='{$display_settings.public_dir}/resources/themes/mgcube.css' rel='stylesheet' type='text/css' ></link>
		
		
        
        {foreach from=$spry.js item=js_file}
        <script type="text/javascript" src="{$display_settings.public_dir}/resources/script/spry/widgets/{$js_file}"></script>
        {/foreach}
        
        {if $include_tinymce == 1}{include file='layout/tinymce.tpl' theme=$tinymce_theme}{/if}
    </head>
    <body>
<div class="container">
	
	<div class="main">

		<div class="header">
		
			<div class="title">
				  <h1><a id='site_name' href='{$display_settings.public_dir}'>{$site_name}</a></h1>
			</div>

		</div>

        
        <div class="sidenav">
            <div id='left-column'>
                {if $logged_in == true}
                {include file="layout/navlinks_logged_in.tpl"}
                {include file="layout/user_box.tpl"}
                {else}
                {include file="layout/navlinks_not_logged_in.tpl"}
                {/if}
            </div>
</div>

            		<div class="content">
<div class="item">
                {if $site_notice != ''}{include file='layout/event.tpl' notice=$site_notice}{/if}
{if $randevent!=""}
<div id="randomevent" style="width: 60%; border: 1px solid #eee; padding: 2px; margin: 10px; margin-left: 20%; margin-right: 20%; background: #fff; -moz-border-radius: 5px;">
<div style="padding: 5px; float: left; -moz-border-radius: 5px; border: 1px solid #D5DEEE; margin-right: 4px;">
{/if}

{if $randimg!=""}
<img src="{$randimg}" width="{$randimgsize}" height="{$randimgsize}" alt="" />
{/if} 
                <h2 class="page-title">{$page_html_title}</h2>

                <!-- Page beging here. -->

