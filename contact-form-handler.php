<?php
    header("Location: index.html");
    $name = Trim(stripslashes($_POST['name']));
    $visitor_email = Trim(stripslashes($_POST['email']));
    $number = Trim(stripslashes($_POST['number']));
    $address = Trim(stripslashes($_POST['address']));
    $selectService = $_POST['service'];


    //validation
    $validationOK=true;
    if (Trim($name)=="") $validationOK=false;
    if (Trim($visitor_email)=="") $validationOK=false;
    if (!$validationOK) {
        header("Location: notvalid.html");
        exit;
    }

    $email_from = 'elitebuilder@comcast.net';

    $email_subject = "$name";

    $email_body = "User Name: $name.\n".
                    "User Email: $visitor_email.\n".
                        "User Number: $number.\n".
                            "User Address: $address.\n".
                                "User Service: $selectService.\n";


    $to = "elitebuilder@comcast.net";

    $headers = "From: $email_from \r\n";
    $headers = "Reply-to: $visitor_email \r\n";

    $success = mail($to, $email_subject, $email_body, $headers);

    if ($success){
        header("Location: valid.html");
      }
      else{
        header("Location: notvalid.html");
      }


    

?>