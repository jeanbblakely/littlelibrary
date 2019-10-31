{include file='shared/head.tpl'}
{include file='shared/header.tpl'}
{include file='shared/nav.tpl'}

<main id="catalog">
    <h2>Catalog of Books</h2>
    <table>
	{foreach item=book from=$book_catalog}
		<tr>
			<td>
				<img src="{$book->getImage()}" alt="Cover Image" width="100">
			</td>
			<td>
				<b>{$book->getTitle()} </b><br>
				by {$book->getAuthor()}
			</td>
		</tr>
	{/foreach}
	</table>
</main>

{include file='shared/footer.tpl'}