<?php
/* Smarty version 3.1.30, created on 2018-03-21 16:32:58
  from "C:\xampp\htdocs\littlelibrary8\templates\confirmcontact.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ab27b2ae235e1_54268651',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bef788d5e88d83d2d56474502616eccfaa737395' => 
    array (
      0 => 'C:\\xampp\\htdocs\\littlelibrary8\\templates\\confirmcontact.tpl',
      1 => 1508938798,
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
function content_5ab27b2ae235e1_54268651 (Smarty_Internal_Template $_smarty_tpl) {
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
		Name: <?php echo $_smarty_tpl->tpl_vars['fields']->value->getValue('name');?>
<br>
		Email: <?php echo $_smarty_tpl->tpl_vars['fields']->value->getValue('email');?>
<br>
		<?php if (($_smarty_tpl->tpl_vars['fields']->value->getValue('phone') != '')) {?>
			Phone: <?php echo $_smarty_tpl->tpl_vars['fields']->value->getValue('phone');?>
 <br>
		<?php }?>
		<?php ob_start();
echo $_smarty_tpl->tpl_vars['fields']->value->getValue('date');
$_prefixVariable1=ob_get_clean();
if (($_prefixVariable1 != '')) {?>
			Date: <?php echo $_smarty_tpl->tpl_vars['fields']->value->getValue('date');?>
 <br>
		<?php }?>
		<?php ob_start();
echo $_smarty_tpl->tpl_vars['fields']->value->getValue('libraryID');
$_prefixVariable2=ob_get_clean();
if (($_prefixVariable2 != '')) {?>
			Library: <?php ob_start();
echo $_smarty_tpl->tpl_vars['fields']->value->getValue('libraryID');
$_prefixVariable3=ob_get_clean();
echo $_smarty_tpl->tpl_vars['libraries']->value[$_prefixVariable3];?>
 <br>
		<?php }?>
		Comments: <?php echo $_smarty_tpl->tpl_vars['fields']->value->getValue('comments');?>
			
	</p>
	<form method="post" action="index.php">
		<input type="hidden" name="action" value="show_contact_page" id="idBack">
		<input type="submit" value="Back" id="idBack">
	</form>
</main>

<?php $_smarty_tpl->_subTemplateRender("file:shared/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
