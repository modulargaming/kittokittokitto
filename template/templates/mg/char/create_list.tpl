{section name=char loop=$races}
    {include file='char/_createchar_box.tpl' char=$races[char]}
{sectionelse}
<p>It appears you can't make any more characters!</p>
{/section}
