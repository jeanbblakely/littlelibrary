<?php
/* Smarty version 3.1.30, created on 2017-10-19 14:39:14
  from "C:\xampp\htdocs\littlelibrary5\templates\editbook.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e89cf22df427_48181931',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59a071751cc07fc2226638aca6bc67517e1bff9b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\littlelibrary5\\templates\\editbook.tpl',
      1 => 1508416749,
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
function content_59e89cf22df427_48181931 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\smarty\\libs\\plugins\\function.html_options.php';
$_smarty_tpl->_subTemplateRender("file:shared/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:shared/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:shared/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<main>
	<h2>Contact Us</h2>
	<form method="post" id="editbookform" action="index.php">
		<input type="hidden" id="idHidden" name="action" value="update_book" >
		<input type="hidden" id="idID" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
		<label for="idTitle">*Title: </label>
		<input type="text" id="idTitle" name="title" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" required="required">
		<label for="idAuthor">*Author: </label>
		<input type="text" id="idAuthor" name="author" value="<?php echo $_smarty_tpl->tpl_vars['author']->value;?>
" required="required">
		<label for="idCategory">Category:</label>
		<?php echo smarty_function_html_options(array('name'=>'category','options'=>$_smarty_tpl->tpl_vars['categories']->value,'selected'=>$_smarty_tpl->tpl_vars['categoryID']->value,'id'=>"idCategory"),$_smarty_tpl);?>

		<label for="idLibrary">Library:</label>
		<?php echo smarty_function_html_options(array('name'=>'library','options'=>$_smarty_tpl->tpl_vars['libraries']->value,'selected'=>$_smarty_tpl->tpl_vars['libraryID']->value,'id'=>"idLibrary"),$_smarty_tpl);?>

		<label for="idPages">Pages: </label>
		<input type="text" id="idPages" name="pages" value="<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
">
		<label for="idPublisher">Publisher: </label>
		<input type="text" id="idPublisher" name="publisher" value="<?php echo $_smarty_tpl->tpl_vars['publisher']->value;?>
">
		<label for="idCost">Cost: </label>
		<input type="text" id="idCost" name="cost" value="<?php echo $_smarty_tpl->tpl_vars['cost']->value;?>
">
		<input type="submit" value="Update" id="idSubmit">
	</form>
</main>

<?php $_smarty_tpl->_subTemplateRender("file:shared/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
