<?php
session_start();
require "path.php";
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['admin']);

header('location: '.BASE_URL);