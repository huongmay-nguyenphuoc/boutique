<?php

require_once '../classes/admin.php';

require_once '../classes/user.php';

session_start();

if (isset($_POST['removeUser'])) {
    $alert = "Are you sure?";
}

if (isset($_POST['confirmremoveUser'])) {
    $_SESSION['admin']->deleteUser();
}