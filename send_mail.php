<?php
// send_mail.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = 'your_email@example.com';
        $subject = "New Contact Form Submission";
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "<script>alert('Message sent successfully!'); window.history.back();</script>";
        } else {
            echo "<script>alert('Failed to send message. Please try again.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Please fill out all fields correctly.'); window.history.back();</script>";
    }
}
?>