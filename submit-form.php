<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["Email"], FILTER_SANITIZE_EMAIL);
    $name = filter_var($_POST["Name"], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST["Message"], FILTER_SANITIZE_STRING);
    $consent = isset($_POST["Consent"]) ? "Yes" : "No";

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Email details
    $to = "filmespedro01@gmail.com"; // Replace with your email
    $subject = "New Contact Form Submission from $name";
    $body = "Name: $name\nEmail: $email\nMessage: $message\nConsent: $consent";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message. Please try again.";
    }
} else {
    echo "Invalid request method.";
}
?>