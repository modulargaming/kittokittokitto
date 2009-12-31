<div align='center'>	
    <table class='inputTable' width='50%' style='margin-left: auto; margin-right: auto;'>
        <tr>
            <td class='inputTableRow inputTableSubhead' width='40%'>Character</td>
            <td class='inputTableRow'>{$char.name} (Level:{$char.level|number_format})</td>
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'>User</td>
            <td class='inputTableRowAlt'>{$char.owner}</td> 
        </tr>   

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Strength</td>
            <td class='inputTableRowAlt'>{$char.strength|number_format}</td> 
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Dexterity</td>
            <td class='inputTableRowAlt'>{$char.dexterity|number_format}</td> 
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Constitution</td>
            <td class='inputTableRowAlt'>{$char.constitution|number_format}</td> 
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Intelligence</td>
            <td class='inputTableRowAlt'>{$char.intelligence|number_format}</td> 
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Wisdom</td>
            <td class='inputTableRowAlt'>{$char.wisdom|number_format}</td> 
        </tr>

        <tr>
            <td class='inputTableRowAlt inputTableSubhead'>Charisma</td>
            <td class='inputTableRowAlt'>{$char.charisma|number_format}</td> 
        </tr>        
    </table>
</div>
