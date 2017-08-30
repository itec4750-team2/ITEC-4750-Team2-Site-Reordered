<?php
function emailToken($emailLink, $email){
$emailLink = "http:" . $emailLink;	
$emailLinkStr = '<a href"' . $emailLink . '">'. $emailLink . '</a>';
// receipient email from forgotpassword page
$to  = $email;

// subject
$subject = 'MGA Password Reset Request';

// message
$message = '
<html>
<head>
  <title>MGA Survey Password Reset Request</title>
</head>
<body>
  <p>To reset your password, please visit the following link: <br/> </p>
 <p>'.
 $emailLinkStr
 .'</p>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: ' . $email . "\r\n";
$headers .= 'From: MGA Survey Admins <surveyadmin@mga.edu>' . "\r\n";

$headers .= 'Bcc: kate.n.markham@gmail.com' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);

//Use to check if email fails
//echo $emailLinkStr;
}
?>