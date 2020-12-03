<?php 

// Starting the session, necessary 
// for using session variables 
session_start(); 

// Declaring and hoisting the variables 
$username = ""; 
$email = ""; 
$errors = array(); 
$_SESSION['success'] = ""; 

// DBMS connection code -> hostname, 
// username, password, database name 
$db = mysqli_connect('localhost', 'root', '', 'register form'); 

// Registration code 
if (isset($_POST['reg_user'])) { 

	// Receiving the values entered and storing 
	// in the variables 
	// Data sanitization is done to prevent 
	// SQL injections 
	$full_name = mysqli_real_escape_string($db, $_POST['name']); 
	$email = mysqli_real_escape_string($db, $_POST['email']); 
	$mobile = mysqli_real_escape_string($db, $_POST['mobile']); 
	$country = mysqli_real_escape_string($db, $_POST['country']); 
        $gender = mysqli_real_escape_string($db, $_POST['gender']); 

	// Ensuring that the user has not left any input field blank 
	// error messages will be displayed for every blank input 
	if (empty($username)) { array_push($errors, "Username is required"); } 
	if (empty($email)) { array_push($errors, "Email is required"); } 
	

	
		

	// If the form is error free, then register the user 
	if (count($errors) == 0) { 
		
		
		
		// Inserting data into table 
		$query = "INSERT INTO regform (full_name, email, mobile,country,gender) 
				VALUES('$full_name', '$email', '$mobile', '$country', '$gender')"; 
		
		mysqli_query($db, $query); 

		
	} 
} 



?> 
