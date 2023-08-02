
<?php

// Inialize session
session_start();

// Delete certain session
unset($_SESSION['id']);
// Delete all session variables
// session_destroy();
session_destroy();

echo '<meta http-equiv="refresh" content="2;url=index.php">';

// Jump to login page
//header('Location: index.php');

?>
