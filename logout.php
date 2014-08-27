<?php

//Ends the session
session_destroy();

//Eliminates all session variables
session_unset();

header('Location: index.php');