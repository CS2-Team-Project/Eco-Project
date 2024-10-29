//write logic for account creation, passwords etc

<?php

session_start();
if(isset($_POST['submitted'])){
    require_once('connectdb.php'); // we will need to implement a connection to the db for accounts
    $username= isset($_POST['username'])?$_POST['username']:false;
    $password= isset($_POST['password'])?password_hash($_POST['password'],PASSWORD_DEFAULT):false;
    $email= isset($_POST['email'])?$_POST['email']:false;

    if(!$username||!$password||!$email){
        echo "One or more required fields are missing. Please fill in all fields.";
        exit;
    } // considering if users should ahve usernames or just emails
    
    // Prevent duplicate usernames by running through the db and checking if the usernames match
    $checkUser= $db->prepare("SELECT username FROM users WHERE username = ?");
    $checkUser-> execute(array($username)); $existingUser= $checkUser->fetch();
    
    if($existingUser){echo "Username already exists. Please choose a different username."; exit;}
    
    // Check if email already exists same way checkUser does
    $checkEmail= $db->prepare("SELECT email FROM users WHERE email = ?");
    $checkEmail-> execute(array($email)); $existingEmail= $checkEmail->fetch();
    
    if($existingEmail){echo "Email address is already in use. Please use a different email."; exit;}
    try{
        $stat= $db->prepare("INSERT INTO users (uid, username, password, email) VALUES (uid, ?, ?, ?)");
        $stat-> execute(array($username, $password, $email)); $uid= $db->lastInsertId();
        header("Location:success.php");
         exit;
    }catch(PDOException $ex){
        echo "There was an error in the database <br>";
        echo "Error details: <em>" . $ex->getMessage() . "</em>";
    }
}
?>