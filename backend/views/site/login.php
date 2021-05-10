
<h1>Sign In Form</h1>
<div id="wrapper">
	<form id="signin" method="POST" action="" autocomplete="off">
        <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
		<input type="text" id="user" name="LoginForm[username]" placeholder="username" />
		<input type="password" id="pass" name="LoginForm[password]" placeholder="password" />
		<button type="submit">&#xf0da;</button>
	</form>
</div>
