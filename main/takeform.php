<html>
<head>
<title>Thanks For Contacting Us</title>
</head>
<body>
<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  # We'll make a list of error messages in an array
  $messages = array();
# Allow only reasonable email addresses
if (!preg_match("/^[\w\+\-.~]+\@[\-\w\.\!]+$/", $email)) {
$messages[] = "That is not a valid email address.";
}
# Allow only reasonable real names
if (!preg_match("/^[\w\ \+\-\'\"]+$/", $name)) {
$messages[] = "The real name field must contain only " .
"alphabetical characters, numbers, spaces, and " .
"reasonable punctuation. We apologize for any inconvenience.";
}
$message = $_POST['message'];
# Make sure the message has a body
if (preg_match('/^\s*$/', $message)) {
$messages[] = "Your message was blank. Did you mean to say " .
"something?"; 
}
  if (count($messages)) {
    # There were problems, so tell the user and
    # don't send the message yet
    foreach ($messages as $message) {
      echo("<p>$message</p>\n");
    }
    echo("<p>Click the back button and correct the problems. " .
      "Then click Send Your Message again.</p>");
  } else {
    # Send the email - we're done
mail("ben@benpetroski.com",
      "Email from benpetroski.com",
      $message,
      "From: $name <$email>\r\n" .
      "Reply-To: $name <$email>\r\n"); 
  }
?>
</body>
</html>