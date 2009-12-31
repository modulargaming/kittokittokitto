<div id='user-box'>
    <ul id='user-info'>
        <li><strong>Username</strong>: {mgurl link_text=$user->getUserName() slug='profile' args=$user->getUserId()}</li>
        <li><strong>{$currency_plural}</strong>: {$user->getCurrency()|number_format}</li>
        <li><strong>Character</strong>: {if $active_char == null}<em>None!</em>{else}{mgurl link_text=$active_char->getName() slug='stats' args=$active_char->getCharId()}{/if}</li>
	<li><strong>Pet</strong>: {if $active_pet == null}<em>None!</em>{else}{mgurl link_text=$active_pet->getPetName() slug='pet' args=$active_pet->getUserPetId()}{/if}</li>
    </ul>
    <ul id='user-actions'>
        <li>{mgurl link_text='Search' slug='search'}</li>
        <li>{mgurl link_text='Preferences' slug='preferences'}</li>
        <li>{mgurl link_text='Logout' slug='logoff'}</li>
    </ul>
</div>
