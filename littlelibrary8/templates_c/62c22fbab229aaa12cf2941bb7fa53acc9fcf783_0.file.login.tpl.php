<?php
/* Smarty version 3.1.30, created on 2017-10-27 12:57:01
  from "C:\xampp\htdocs\littlelibrary7\templates\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59f310fd830e90_14525643',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '62c22fbab229aaa12cf2941bb7fa53acc9fcf783' => 
    array (
      0 => 'C:\\xampp\\htdocs\\littlelibrary7\\templates\\login.tpl',
      1 => 1509101805,
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
function content_59f310fd830e90_14525643 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:shared/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:shared/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:shared/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<main>
	<h2>Login</h2>
	
	
	<form action="." id="loginform" method="post">
	<fieldset>
        <legend>User Login</legend>
		<label for="idEmail">Email:</label>
		<input type="email" name="email" id="idEmail" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" required>
		<label for="idPassword">Password:</label>
		<input type="password" name="password" id="idPassword" value="" required>
		<input type="hidden" name="action" value="login_user">
		<label>&nbsp;</label>
		<input type="submit" value="Login">
		<br>
	</fieldset>
	</form>
	<p class="error"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['message']->value)===null||$tmp==='' ? '' : $tmp);?>
</p>
	
	
	<form action="." id="registrationform" method="post">
	<fieldset>
        <legend>User Registration</legend>
        <input type="hidden" name="action" value="show_registration_page">
		<label for"idRegister">Not yet a user?</label>
		<input type="submit" value="Register" id="idRegister">
	</fieldset>
	</form>
</main>

<?php $_smarty_tpl->_subTemplateRender("file:shared/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
