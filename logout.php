<?php

// destroy the session and redirect to login
session_start();
session_destroy();

header("Location: home.php");
exit();
 