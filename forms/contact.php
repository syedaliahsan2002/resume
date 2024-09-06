<?php
  // Replace with your real receiving email address
  $receiving_email_address = 'syedaliahsan2002@gmail.com';

  // Get form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Validate email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Invalid email format');
  }

  // Create email headers
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  // Create email content
  $full_message = "You have received a new message from the contact form:\n\n";
  $full_message .= "Name: $name\n";
  $full_message .= "Email: $email\n";
  $full_message .= "Message: $message\n";

  // Send the email
  $success = mail($receiving_email_address, $subject, $full_message, $headers);

  if ($success) {
    echo 'Message sent successfully!';
  } else {
    echo 'Error sending message.';
  }
?>
