<?php
if(isset($_POST['btnSubmit'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "info@cinecopters.co.uk";
    $subject = "Contact Submission Form";



    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
    }

    $full_name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $theirSubject = $_POST['theirSubject'];
    $company = $_POST['company'];
    $message= $_POST['message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The e-mail you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$full_name)) {
    $error_message .= 'The name you entered does not appear to be valid.<br />';
  }
  if(strlen($message) < 2) {
    $error_message .= 'The message you entered does not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "Name: ".clean_string($full_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Subject: ".clean_string($theirSubject)."\n";
    $email_message .= "Company: ".clean_string($company)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
    $email_from = $full_name.'<'.$email_from.'>';


// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $subject, $email_message, $headers); 


?>

<!-- include your own success html here -->
<?php include("phpIncludes/homeMeta.php") ?>
<?php include("phpIncludes/header.php") ?>
<?php include("phpIncludes/nav.php") ?>

<div class="container" id="stockThanksMsg">
  <h1>Thanks!</h1>  <h4>Your message is flying to us now.  We'll get back to you ASAP!</h4><br>
  <h4>If you need an urgent respose give us a call!</h4>
  <a href="contact.php#contactDetails">
    <button class="btn btn-danger">24/7 Contact Numbers </button>
  </a>
</div>

<?php include ("phpIncludes/footer.php") ?>



<?php
}
?>