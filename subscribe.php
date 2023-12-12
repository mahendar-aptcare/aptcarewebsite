<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate and sanitize the email address
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    
    // Validate the email address
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // Save the email address to a file, database, or send it to an email service
        // For simplicity, let's save it to a text file
        $file = fopen("subscribers.txt", "a"); // Open the file in append mode
        fwrite($file, $email . "\n"); // Write the email to the file
        fclose($file); // Close the file

        // You can also perform additional actions here, such as sending a confirmation email, etc.

        echo "Subscription successful! Thank you for subscribing.";
    } else {
        echo "Invalid email address. Please try again.";
    }
}
?>
