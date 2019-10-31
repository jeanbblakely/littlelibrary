{include file='shared/head.tpl'}
{include file='shared/header.tpl'}
{include file='shared/nav.tpl'}

<main>
	<h2>User Registration</h2>
	<form action="index.php" method="post" id="registrationform" enctype="multipart/form-data">
		<input type="hidden" id="idHidden" name="action" value="upload_file" >
    	<span class="error">{$message|default:''}</span>
    	<label for "idImage">Upload Profile Image:</label>
    	<input type="file"  id="fileToUpload" name="fileToUpload">
    	<input type="submit" value="Upload Image" name="idSubmit">
    </form>
	<form method="post" id="registrationform" action="index.php">
    	
		<input type="hidden" id="idHidden" name="action" value="process_registration_form" >
		<span class="error">{$fields->getError('firstname')}</span>
		<label for="idFirstName">* First Name: </label>
		<input type="text" id="idFirstName" name="firstname" value="{$fields->getValue('firstname')}">
		<span class="error">{$fields->getError('lastname')}</span>
		<label for="idLastName">* Last Name: </label>
		<input type="text" id="idLastName" name="lastname" value="{$fields->getValue('lastname')}">
		<span class="error">{$fields->getError('email')}</span>
		<label for="idEmail">* E-mail: </label>
		<input type="email" id="idEmail" name="email" value="{$fields->getValue('email')}">
		<span class="error">{$fields->getError('phone')}</span>
		<label for="idPhone">Phone: </label>
		<input type="tel" id="idPhone" name="phone" value="{$fields->getValue('phone')}">
		<span class="error">{$fields->getError('password')}</span>
		<label for="idPassword">* Password: </label>
		<input type="password" name="password" value="{$fields->getValue('password')}">
		<input type="submit" value="Send Now" id="idSubmit">
	</form>
</main>

{include file='shared/footer.tpl'}