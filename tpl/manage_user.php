<?php

session_start();
include ("../includes/user_data.php");
include_once("header.php");

if (isset($_POST['login']) && isset($_POST['pw']) && $_POST['pw'] !== "" && isset($_POST['verif']) && strcmp($_POST['pw'], $_POST['verif']) === 0 && isset($_POST['sm']))
{
	if (create_user($_POST['login'], $_POST['pw'], 2))
		echo "Account successfully created";
	else
		echo "Sorry, something went wrong... Try again later !";
}
else if (isset($_POST['sm']))
	echo "Please fill in all the fields";
?>
<html>
To create a new account, feel free to validate your inscription:<br />
	<form action="#" method="post" name="inscrition">
Identifiant:	<input type="text" name="login" value="" />
Mot de passe:	<input type="password" name="pw" value="" />
Verification:	<input type="password" name="verif" value="" />
				<input type="submit" name="sm" value="Valider" />
	</form><br />
<?php

if (isset($_SESSION['username']) && isset($_SESSION['user_info']['user_type'])
	&& $_SESSION['user_info']['user_type'] != 1)
{
	if (isset($_POST['unsm']))
	{
		if (delete_user($_SESSION['user_info']['user_id']))
			echo "We're sorry to see you leave so soon... Come back as soon as you want !";
		else
			echo "You thought you could leave us so easily... You are so naive ! Buy more.";
	}
}

?>
To unsubscribe and delete your account click here:<br />
	<form action="#" method="post" name="unsubscribe">
		<input type="submit" name="unsm" value="Don't do this, you fool !" />
	</form>
</html>
