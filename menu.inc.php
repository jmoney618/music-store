<?php
@session_start();
echo("
	<a href='index.php'><h2><span id=\"logo\">Jose's</span><br>&nbsp;<span id='store'>Music Store</span></h2></a>
	<nav>
		<ul>
			<li><a href='index.php'>Home |</a></li>
			<li><a href='selection.php'>Select Albums |</a></li>
			<li><a href='photos.php'>View my Artists |</a></li>
			<li><a href='contact.php'>Contact Us |</a></li>
			<li><a href='login.php'>Login</a></li>"
            .logout().
        "<ul>
	</nav>
	<hr id='divider'>
");

function logout() {
    if ( isset($_SESSION['user']) )
    {
        return ("<li><a href='logout.php'> | Logout</a></li>");
    }
}