<?php
/* Smarty version 3.1.30, created on 2017-10-17 15:39:51
  from "C:\xampp\htdocs\littlelibrary4\templates\contact.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e60827788440_55368886',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7dec2b4e0ccd62f835a13c6610f626e1d7430556' => 
    array (
      0 => 'C:\\xampp\\htdocs\\littlelibrary4\\templates\\contact.tpl',
      1 => 1506670886,
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
function content_59e60827788440_55368886 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\smarty\\libs\\plugins\\function.html_options.php';
$_smarty_tpl->_subTemplateRender("file:shared/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:shared/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:shared/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<main>
	<h2>Contact Us</h2>
	<form method="post" id="contactform" action="index.php">
		<input type="hidden" id="idHidden" name="action" value="process_contact_form" >
		<label for="idName">* Name: </label>
		<input type="text" id="idName" name="name" required="required">
		<label for="idEmail">* E-mail: </label>
		<input type="email" id="idEmail" name="email" required="required">
		<label for="idPhone">Phone: </label>
		<input type="tel" id="idPhone" name="phone">
		<label for="idDate">Date: </label>
		<input type="date" id="idDate" name="date">
		<label for="idLibraries">Select Library:</label>
		<?php echo smarty_function_html_options(array('name'=>'library','values'=>$_smarty_tpl->tpl_vars['libraries']->value,'output'=>$_smarty_tpl->tpl_vars['libraries']->value,'id'=>'idLibraries'),$_smarty_tpl);?>

		<label for="idComments">* Comments: </label>
		<textarea id="myComments" name="comments" rows="2" cols="20" required="required"></textarea>
		<input type="submit" value="Send Now" id="idSubmit">
	</form>
</main>

<?php $_smarty_tpl->_subTemplateRender("file:shared/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
