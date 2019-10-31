<?php
/* Smarty version 3.1.30, created on 2017-10-17 15:40:03
  from "C:\xampp\htdocs\littlelibrary4\templates\confirmcontact.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e608338d5c22_07062033',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '346dda7f1189f2eda6d310d93eb5131e6cee7edf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\littlelibrary4\\templates\\confirmcontact.tpl',
      1 => 1506670494,
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
function content_59e608338d5c22_07062033 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:shared/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:shared/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:shared/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<main>
	<h2>Thank you for contacting us!</h2>
	We have received the following information:
	<p>
		Name: <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
<br>
		Email: <?php echo $_smarty_tpl->tpl_vars['email']->value;?>
<br>
		<?php if (($_smarty_tpl->tpl_vars['phone']->value != '')) {?>
			Phone: <?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
 <br>
		<?php }?>
		<?php if (($_smarty_tpl->tpl_vars['date']->value != '')) {?>
			Date: <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
 <br>
		<?php }?>
		<?php if (($_smarty_tpl->tpl_vars['library']->value != "none")) {?>
			Library: <?php echo $_smarty_tpl->tpl_vars['library']->value;?>
 <br>
		<?php }?>
		Comments: <?php echo '<?php ';?>echo $comments;<?php echo '?>';?>			
	</p>
	<form method="post" action="index.php">
		<input type="hidden" name="action" value="show_contact_page" id="idBack">
		<input type="submit" value="Back" id="idBack">
	</form>
</main>

<?php $_smarty_tpl->_subTemplateRender("file:shared/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
