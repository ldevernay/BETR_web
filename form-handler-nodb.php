<?php
// Emails form data to you and the person submitting the form
// This version requires no database.
// Set your email below
// FIXME
$myemail = "ldevernay@simplon.co"; // Replace with your email, please

// Receive and sanitize input
$name = $_POST['name'];
$society = $_POST['society'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// set up email
$msg = "Nouveau contact via le site!\nNom: " . $name . "\nSociété: " . $society . "\nEmail: " . $email . "\nNuméro de téléphone: " . $phone . "\nEmail: " . $email;
$msg = wordwrap($msg,70);
mail($myemail,"Nouveau contact via le site",$msg);
mail($email,"Merci pour votre message. Nous vous contacterons dès que possible.",$msg);
echo 'Merci pour votre message. <a href="index.html">Cliquez ici pour retourner sur le site.</a>";

?>
