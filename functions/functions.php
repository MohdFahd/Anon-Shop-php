<?php 
function redirct($url,$mess)
{
    // session_start();

    // Set the message in the session.
    $_SESSION['messsage'] = $mess;

    // Redirect the user to the specified URL.
    header('Location: ' . $url);

    // Stop the execution of the script.
    exit();
}

?>