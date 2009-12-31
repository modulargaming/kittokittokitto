<script type="text/javascript" src="{$display_settings.public_dir}/resources/tinymce/tiny_mce_gzip.js"></script>

<script type="text/javascript">
{literal}
tinyMCE_GZ.init({
	plugins : 'style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,'+ 
        'searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras',
	themes : 'simple,advanced',
	languages : 'en',
	disk_cache : true,
	debug : false
        theme_advanced_buttons1 : "justifyleft,justifycenter,justifyright,separator,bold,italic,underline,strikethrough,separator,forecolor,backcolor,separator,code,separator,bullist,numlist",
        theme_advanced_buttons2 : "fontselect,fontsizeselect,separator,link,unlink,image,separator,indent,outdent",
        theme_advanced_buttons3 : ""
        button_tile_map : true
        entity_encoding : "raw"
        verify_html : false
        cleanup : false

});
{/literal}
</script>

<script language="javascript" type="text/javascript">
    {literal}tinyMCE.init({
        mode : "textareas",
        plugins : 'style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,'+
        'searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras',
        theme : "{/literal}{$theme}{literal}",
        theme_advanced_buttons1 : "justifyleft,justifycenter,justifyright,separator,bold,italic,underline,strikethrough,separator,forecolor,backcolor,separator,code,separator,bullist,numlist",
        theme_advanced_buttons2 : "fontselect,fontsizeselect,separator,link,unlink,image,separator,indent,outdent",
        theme_advanced_buttons3 : ""
	button_tile_map : true
	entity_encoding : "raw"
	verify_html : false
	cleanup : false


    });{/literal}
</script>
