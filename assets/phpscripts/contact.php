<?php
    /*  
        Template name    : Technoit - IT Solutions & Business Services Multipurpose Responsive Website Template
        Author           : ZRTHEMES
        Version          : 1.0
        File Description : Contact PHP file of the template
    */
    //this is your Email address
    //kinldy update your email here
    $to = "apolline.fert@gmail.com"; 
    $from = $_POST['email']; 
    //this is the sender's Email address
    //this is firt name
    $first_name = $_POST['name'];
    //this is last name
    $last_name = $_POST['name'];
    //this is subject
    $subject = "Form Subject Here: ";
    //this is message body
    $message = "Message " . $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];

    $headers = "From:" . $from . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject,$message,$headers2); 

    if (isset($_POST['message'])) {
        $entete  = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'From: apolline.fert@gmail.com' . "\r\n";
        $entete .= 'Reply-to: ' . $_POST['email'];

        $message = '<h1>Message envoyé depuis la page Contact de FSE</h1>
        <p><b>Email : </b>' . $_POST['email'] . '<br>
        <p><b>nom : </b>' . $_POST['name'] . '<br>
        <b>Message : </b>' . htmlspecialchars($_POST['message']) . '</p>';

        $retour = mail('apolline.fert@gmail.com', 'Envoi depuis page Contact', $message, $entete);
        if($retour)
            echo '<p>Votre message a bien été envoyé.</p>';
    }
?>