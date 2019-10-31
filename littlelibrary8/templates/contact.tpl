{include file='shared/head.tpl'}
{include file='shared/header.tpl'}
{include file='shared/nav.tpl'}

<main>
	<h2>Contact Us</h2>
	<form method="post" id="contactform" action="index.php">
		<input type="hidden" id="idHidden" name="action" value="process_contact_form" >
		<span class="error">{$fields->getError('name')}</span>
		<label for="idName">* Name: </label>
		<input type="text" id="idName" name="name" value="{$fields->getValue('name')}">
		<span class="error">{$fields->getError('email')}</span>
		<label for="idEmail">* E-mail: </label>
		<input type="email" id="idEmail" name="email" value="{$fields->getValue('email')}">
		<span class="error">{$fields->getError('phone')}</span>
		<label for="idPhone">Phone: </label>
		<input type="tel" id="idPhone" name="phone" value="{$fields->getValue('phone')}">
		<span class="error">{$fields->getError('date')}</span>
		<label for="idDate">Date: </label>
		<input type="date" id="idDate" name="date" "{$fields->getValue('date')}">
		<span class="error">{$fields->getError('libraryID')}</span>
		<label for="idLibraries">Select Library:</label>
		{html_options name=library options=$libraries selected={$fields->getValue('libraryID')} id="idLibraries"}
		<span class="error">{$fields->getError('comments')}</span>
		<label for="idComments">* Comments: </label>
		<textarea id="myComments" name="comments" rows="2" cols="20">{$fields->getValue('comments')}</textarea>
		<input type="submit" value="Send Now" id="idSubmit">
	</form>
</main>

{include file='shared/footer.tpl'}