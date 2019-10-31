{include file='shared/head.tpl'}
{include file='shared/header.tpl'}
{include file='shared/nav.tpl'}

<main>
	<h2>Thank you for contacting us!</h2>
	We have received the following information:
	<p>
		Name: {$fields->getValue('name')}<br>
		Email: {$fields->getValue('email')}<br>
		{if ($fields->getValue('phone') != "")}
			Phone: {$fields->getValue('phone')} <br>
		{/if}
		{if ({$fields->getValue('date')} != "")}
			Date: {$fields->getValue('date')} <br>
		{/if}
		{if ({$fields->getValue('libraryID')} != "")}
			Library: {$libraries[{$fields->getValue('libraryID')}]} <br>
		{/if}
		Comments: {$fields->getValue('comments')}			
	</p>
	<form method="post" action="index.php">
		<input type="hidden" name="action" value="show_contact_page" id="idBack">
		<input type="submit" value="Back" id="idBack">
	</form>
</main>

{include file='shared/footer.tpl'}