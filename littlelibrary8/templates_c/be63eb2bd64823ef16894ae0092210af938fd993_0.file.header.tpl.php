<?php
/* Smarty version 3.1.30, created on 2018-04-03 20:18:28
  from "C:\xampp\htdocs\littlelibrary8\templates\shared\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac3c5741d0dd5_27350739',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be63eb2bd64823ef16894ae0092210af938fd993' => 
    array (
      0 => 'C:\\xampp\\htdocs\\littlelibrary8\\templates\\shared\\header.tpl',
      1 => 1522779503,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac3c5741d0dd5_27350739 (Smarty_Internal_Template $_smarty_tpl) {
?>
<header>
	<h1>Little Library</h1>
	<!--- <h2><a href="index.php?action=show_login_page">Login</a></h2> --->
	<h2><?php if (($_smarty_tpl->tpl_vars['user']->value != '')) {?>
			<?php echo $_smarty_tpl->tpl_vars['user']->value;?>

		<?php }?>
		
		<?php if (($_smarty_tpl->tpl_vars['image']->value != '')) {?>
			<img src="uploads/<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" alt="Profile Image" height = "25" width="25">
		<?php }?> &nbsp;
	<a href="index.php?action=login_logout"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['logInOut']->value)===null||$tmp==='' ? 'Login' : $tmp);?>
</a></h2>
</header><?php }
}
