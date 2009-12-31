<?php
function smarty_modifier_mgp2nl($html)
{
    return str_replace('/p><p',"/p>\n\n<p",$html);
} // end smarty_modifier_mgcurrency
?>
