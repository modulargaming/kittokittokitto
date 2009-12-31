
<div id="messagediv">
<form id="message" method='POST'>
	<textarea name="message"></textarea>
	<input type="submit" name="submit" value="post" onclick="updater('messagediv','message','scripts/user/chat.php');">
</form>
</div>

<div id="chat_result" style="height:300px;overflow:auto;">
<textarea name="message" id="messagetext">
</textarea>
</div>

{literal}

<script type="text/javascript">
function addmessage()
{
  new Ajax.Request( 'scripts/user/chat.php', {
     method: 'post',
     parameters: $('message').serialize(),
     onSuccess: function( transport ) {
       $('messagetext').value = '';
     }
  } );
}
</script>

<script type="text/javascript">
function getMessages()
{
  new Ajax.Updater( 'chat_result', 'getchat.php', {
    onSuccess: function() { window.setTimeout( getMessages, 5000 ); }
  } );
}
getMessages();

</script>



{/literal}