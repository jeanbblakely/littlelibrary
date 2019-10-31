<?php
/* Smarty version 3.1.30, created on 2017-10-19 13:35:41
  from "C:\xampp\htdocs\littlelibrary5\templates\catalog.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e88e0dc3b926_03293192',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e741e8eeed0033cd0500b3c69f6298e8b946e04e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\littlelibrary5\\templates\\catalog.tpl',
      1 => 1508411295,
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
function content_59e88e0dc3b926_03293192 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\smarty\\libs\\plugins\\function.html_options.php';
$_smarty_tpl->_subTemplateRender("file:shared/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:shared/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:shared/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<main id="catalog">
    <h2>Catalog of Books</h2>
    <!-- form method="get" id="catalogForm" action="index.php">
		<fieldset>
		<legend>Search Criteria</legend>
			<input type="hidden" name="action" value="show_catalog_page">
			<label for="idKeyword">Search for keyword: </label>
			<input type="text" id="idKeyword" name="keyword" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
">
			<label for="idCategories">Limit to:</label>
			<?php ob_start();
echo $_smarty_tpl->tpl_vars['category']->value;
$_prefixVariable1=ob_get_clean();
echo smarty_function_html_options(array('name'=>'category','options'=>$_smarty_tpl->tpl_vars['categories']->value,'selected'=>$_prefixVariable1,'id'=>'idCategories'),$_smarty_tpl);?>

			<label for="idLibraries">At library:</label>
			<?php ob_start();
echo $_smarty_tpl->tpl_vars['library']->value;
$_prefixVariable2=ob_get_clean();
echo smarty_function_html_options(array('name'=>'library','options'=>$_smarty_tpl->tpl_vars['libraries']->value,'selected'=>$_prefixVariable2,'id'=>'idLibraries'),$_smarty_tpl);?>

			<input type="submit" id="submitSearch" value="search">
		</fieldset>
	</form-->
    <table>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['book_catalog']->value, 'book');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['book']->value) {
?>
		<tr>
			<td>
				<form action="index.php" id="editform" method="post">
                    <input type="hidden" name="action" value="edit_book_form">
                    <input type="hidden" name="book_id" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->getID();?>
">
                    <input type="submit" value="Edit" id="idSubmitEdit">
                </form>
				<form action="index.php" id="deleteform" method="post">
                    <input type="hidden" name="action" value="delete_book">
                    <input type="hidden" name="book_id" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->getID();?>
">
                    <input type="submit" value="Delete" id="idSubmitDelete">
                </form>
			</td>
			<td>
				<img src="<?php echo $_smarty_tpl->tpl_vars['book']->value->getImage();?>
" alt="Cover Image" width="100">
			</td>
			<td>
				<b><?php echo $_smarty_tpl->tpl_vars['book']->value->getTitle();?>
 </b><br>
				by <?php echo $_smarty_tpl->tpl_vars['book']->value->getAuthor();?>

			</td>
		</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</table>
</main>

<?php $_smarty_tpl->_subTemplateRender("file:shared/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
