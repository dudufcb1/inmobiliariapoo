<?php
session_start();
$_SESSION = [];
include 'includes/config/database.php';
header('Location: ./login.php');
