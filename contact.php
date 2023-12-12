<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate data (you may want to add more validation)
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill out all fields.";
        exit;
    }

    // Set up email parameters
    $to = "info@aptcare.ai"; // Change this to your email address
    $subject = "New Contact Form Submission";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    // Compose the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n\n";
    $email_message .= "Message:\n$message";

    // Send the email
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Thank you for your message. We will get back to you soon!";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // If the form is not submitted through POST method, redirect to the contact page
    header("Location: contact.php");
}

?>
