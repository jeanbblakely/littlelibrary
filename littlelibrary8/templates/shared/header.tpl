<header>
	<h1>Little Library</h1>
	<!--- <h2><a href="index.php?action=show_login_page">Login</a></h2> --->
	<h2>{if ($user != "")}
			{$user}
		{/if}
		
		{if ($image != "")}
			<img src="uploads/{$image}" alt="Profile Image" height = "25" width="25">
		{/if} &nbsp;
	<a href="index.php?action=login_logout">{$logInOut|default:'Login'}</a></h2>
</header>