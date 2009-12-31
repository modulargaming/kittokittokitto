{$shop.name} - owned by <a href="http://www.daikopets.com/profile/{$shop.userid}">{$shop.username}</a><br /> <br />
{$shop.welcome}<br />
<hr />
<div align="center"><table><tr>
{section name=index loop=$items}
{assign var='item' value=$items[index]}
{if $smarty.section.index.iteration % 3 == 1}
</tr><tr>
{/if}
<td><div class='item-box' align='center'>
    <p><img src='{$item.image}' alt='{$item.name}' border='0' /></p>
    
    <div class='item-box-detail' style='text-align: center;'> 
        <p style='font-weight: bold;'>{$item.name}</p>
        <p><strong>Price</strong>: {$item.price|number_format}</p>
        <p><strong>Supply</strong>: {$item.quantity|number_format}</p>
        <form action='{$display_settings.public_dir}/usershops/{$shop.id}' method='post'>
            <input type='hidden' name='state' value='buy' />
            <input type='hidden' name='stock_id' value='{$item.id}' />
          
            <table class='inputTable' width='95%' style='font-size: small;'>
                <tr>
                    <td colspan='2' class='inputTableRowAlt' style='text-align: center;'>
                        <input type='submit' value='Buy' />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div></td>
{sectionelse}
<td><p align='center'><em>{$shop.name} is all out of items to sell!<br /> Check back later.</em></p></td>
{/section}
</tr></table></div>