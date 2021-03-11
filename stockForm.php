<?php
if(isset($_POST['btnStockSubmit'])) {

    // EMAIL AND SUBJECT OF EMAIL BEING SENT
    $email_to = "info@cinecopters.co.uk";
    $subject = "Stock Submission Form";



    //ERROR MESSAGES IF DIED FUCNTION IS CALLED (SEMI-REDUNDANT BECAUSE SEND BUTTON WONT BE ENABLED UNTIL INPUT FIELDS ARE FILLED CORRECTLY ANYWAY)
    function died($error) {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    // IF NOTHING ENTERED THEN THROW ERROR MESSAGE
    if(!isset($_POST['name']) ||
        !isset($_POST['email'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
    }


  //ADDING EACH NEWLY ADDED ITEM TO AN ARRAY
  $stockTitle = array();
    foreach($_POST['stockNew'] as $stockKey => $stockNew) {
      $stockTitle[] = "\r\nStock Reel: " . $stockNew;
    }
    
  $tcInTitle = array();
    foreach($_POST['tcInNew'] as $tcInKey => $tcInNew) {
      $tcInTitle[] = "TC In: ". $tcInNew;
    }
    // echo "<pre>"; print_r($tcInTitle); echo "</pre>";

  $tcOutTitle = array();
    foreach($_POST['tcOutNew'] as $tcOutKey => $tcOutNew) {
      $tcOutTitle[] = "TC Out: " . $tcOutNew;
    }
    // echo "<pre>"; print_r($tcOutTitle); echo "</pre>";


  //GROUPING THE BELOW ARRAYS TOGETHER SO THEY CAN BE SORTED BY INDEX AND GROUPED TOGETHER. ie. index 1 of each of the arrays is grouped together
  $addStock = array_map(null, $stockTitle, $tcInTitle, $tcOutTitle);


  //GETTING THE NAME EMAIL PHONE MESSAGE FROM THE FORM AND PUTTING IT INTO VARIABLES
    $full_name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $company = $_POST['company'];
    $stock = $_POST['stock'];
    $tcIn = $_POST['tcIn'];
    $tcOut = $_POST['tcOut'];
    $newItem = $addStockValue; 


//CHECKING TO MAKE SURE VALID EMAIL IS ENTERED
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The e-mail you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";

//CHECKING TO MAKE SURE VALID NAME IS ENTERED
  if(!preg_match($string_exp,$full_name)) {
    $error_message .= 'The name you entered does not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }


//THE FORMAT OF THE EMAIL BEING SENT. CLEAN STRING CLEANING ANY WHITE SPACE
    $email_message .= "Name: ".clean_string($full_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Company: ".clean_string($company)."\r\n\r\n";
    $email_message .= "Stock Reel: ".clean_string($stock)."\n";
    $email_message .= "TC In: ".($tcIn). "\r\n TC Out: " .  ($tcOut)."\n";

//LOOPING THROUGH THE GROUPED ARRAY AND ADDING EACH GROUPED VALUE TO THE EMAIL
    foreach($addStock as $addStockList){
      foreach($addStockList as $key=>$addStockValue){
        $email_message .= ($addStockValue). "\r\n";
      }
  }

//MAKING THE EMAIL INBOX SHOW THE PERSONS FIRST AND LAST NAME RATHER THAN THEIR EMAIL (NOT SURE HOW)
    $email_from = $full_name.'<'.$email_from.'>';


//CREATING HEADERS FOR THE EMAIL PROVIDER
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $subject, $email_message, $headers);


?>

<!-- HTML THANKS OR SUCCESSFUL SENT MESSAGE -->
<?php include("phpIncludes/homeMeta.php") ?>
<?php include("phpIncludes/header.php") ?>
<?php include("phpIncludes/nav.php") ?>

<div class="container" id="stockThanksMsg">
  <h1>Thanks!</h1>  <h4>Your stock request is flying to us now.  We'll get back to you ASAP!</h4>
  <a href="showreelstock.php">
    <button class="btn btn-danger">Buy More Stock</button>
  </a>
</div>


<?php include ("phpIncludes/footer.php") ?>



<?php
}
?>