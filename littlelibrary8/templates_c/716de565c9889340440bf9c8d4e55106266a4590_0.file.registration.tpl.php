<?php
/* Smarty version 3.1.30, created on 2018-04-03 20:04:58
  from "C:\xampp\htdocs\littlelibrary8\templates\registration.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac3c24a1ee924_00572523',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '716de565c9889340440bf9c8d4e55106266a4590' => 
    array (
      0 => 'C:\\xampp\\htdocs\\littlelibrary8\\templates\\registration.tpl',
      1 => 1522778690,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shared/head.tpl' => 1,
    'file:shared/header.tpl' => 1,
    'file:shared/nav.tpl' => 1,
    'file:shared/footer.tpl' => 1,
  ),
),false)) {
function content_5ac3c24a1ee924_00572523 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:shared/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:shared/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:shared/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<main>
	<h2>User Registration</h2>
	<form action="index.php" method="post" id="registrationform" enctype="multipart/form-data">
		<input type="hidden" id="idHidden" name="action" value="upload_file" >
    	<span class="error"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['message']->value)===null||$tmp==='' ? '' : $tmp);?>
</span>
    	<label for "idImage">Upload Profile Image:</label>
    	<input type="file"  id="fileToUpload" name="fileToUpload">
    	<input type="submit" value="Upload Image" name="idSubmit">
    </form>
	<form method="post" id="registrationform" action="index.php">
    	
		<input type="hidden" id="idHidden" name="action" value="process_registration_form" >
		<span class="error"><?php echo $_smarty_tpl->tpl_vars['fields']->value->getError('firstname');?>
</span>
		<label for="idFirstName">* First Name: </label>
		<input type="text" id="idFirstName" name="firstname" value="<?php echo $_smarty_tpl->tpl_vars['fields']->value->getValue('firstname');?>
">
		<span class="error"><?php echo $_smarty_tpl->tpl_vars['fields']->value->getError('lastname');?>
</span>
		<label for="idLastName">* Last Name: </label>
		<input type="text" id="idLastName" name="lastname" value="<?php echo $_smarty_tpl->tpl_vars['fields']->value->getValue('lastname');?>
">
		<span class="error"><?php echo $_smarty_tpl->tpl_vars['fields']->value->getError('email');?>
</span>
		<label for="idEmail">* E-mail: </label>
		<input type="email" id="idEmail" name="email" value="<?php echo $_smarty_tpl->tpl_vars['fields']->value->getValue('email');?>
">
		<span class="error"><?php echo $_smarty_tpl->tpl_vars['fields']->value->getError('phone');?>
</span>
		<label for="idPhone">Phone: </label>
		<input type="tel" id="idPhone" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['fields']->value->getValue('phone');?>
">
		<span class="error"><?php echo $_smarty_tpl->tpl_vars['fields']->value->getError('password');?>
</span>
		<label for="idPassword">* Password: </label>
		<input type="password" name="password" value="<?php echo $_smarty_tpl->tpl_vars['fields']->value->getValue('password');?>
">
		<input type="submit" value="Send Now" id="idSubmit">
	</form>
</main>

<?php $_smarty_tpl->_subTemplateRender("file:shared/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
