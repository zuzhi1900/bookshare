<?php 
# Starting the users session
session_start();
require 'connect/database.php';
require 'classes/users.php';
require 'classes/general.php';
require 'classes/bcrypt.php'; // Including bcrypt.php

// error_reporting(0);

$users 		= new Users($db);
$general 	= new General();
$bcrypt 	= new Bcrypt(12); // Instantiating the Bcrypt class

$errors = array();

if ($general->logged_in() === true)  { // check if the user is logged in
	$user_id 	= $_SESSION['id']; // Getting user's id from the session
	$user 		= $users->userdata($user_id); // Getting all the data about the logged in user.
}

ob_start(); // Added to avoid a common error of 'header already sent'