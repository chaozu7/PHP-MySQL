 <?php
 
/*	
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);


    // Set the recipient email address. Update this to YOUR desired email address.
    $recipient = "<mail.do.testo2019@gmail.com>";

    // Set the email subject.
    $subject = "New contact from $name";

    // Build the email content.
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

   
    $email_headers = "From: $name <$email>";

    
    mail($recipient, $subject, $email_content, $email_headers); 

*/




    $newsletter = $_POST['newsletter'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    if($newsletter == 1) {
        
        require_once 'connect_msql.php';
        
        $mail_base = "INSERT into newsletter (name, email) values ('".$_POST["name"]."','".$_POST["email"]."')";
        mysqli_query($mysql_connection, $mail_base);
      
        mysqli_close($mysql_connection);
    } 

            
 ?>