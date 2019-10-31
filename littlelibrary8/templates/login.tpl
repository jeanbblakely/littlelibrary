{include file='shared/head.tpl'}
{include file='shared/header.tpl'}
{include file='shared/nav.tpl'}

<main>
	<h2>Login</h2>
	
	{* login form *}
	<form action="." id="loginform" method="post">
	<fieldset>
        <legend>User Login</legend>
		<label for="idEmail">Email:</label>
		<input type="email" name="email" id="idEmail" value="{$email|default: ''}" required>
		<label for="idPassword">Password:</label>
		<input type="password" name="password" id="idPassword" value="" required>
		<input type="hidden" name="action" value="login_user">
		<label>&nbsp;</label>
		<input type="submit" value="Login">
		<br>
	</fieldset>
	</form>
	<p class="error">{$message|default:''}</p>
	
	{* link to registration form *}
	<form action="." id="registrationform" method="post">
	<fieldset>
        <legend>User Registration</legend>
        <input type="hidden" name="action" value="show_registration_page">
		<label for"idRegister">Not yet a user?</label>
		<input type="submit" value="Register" id="idRegister">
	</fieldset>
	</form>
</main>

{include file='shared/footer.tpl'}