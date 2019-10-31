{include file='shared/head.tpl'}
{include file='shared/header.tpl'}
{include file='shared/nav.tpl'}

<main>
	<h2>Welcome to the Little Library</h2>
	<p class="error">{$message|default:''}</p>
	<img src="templates/images/aLibrary.jpg" alt="image of empty library" width="216" height="240">
</main>

{include file='shared/footer.tpl'}