<?php
if(isset($_POST['submit'])) {

    $username = $_POST['username'];
    $agency = $_POST['subject'];
    $emailAddress = $_POST['email'];

    $message = "
    Name: " . $_POST['username'] . 
    "Email : " . $_POST['email'] .
    "<br><br>Rank : <br>" . $_POST['subject'] .
    "<br><br>Message : <br>" . $_POST['body'];
    switch($_POST['subject']){
        case 'Developer':
            $message .= "<br><br>ادمن داخل اللعبة <br>" .
            "<br><br>Question1 : <br>" . $_POST['dev-scriptsprache'] .
            "<br><br>Question2 : <br>" . $_POST['dev-vorstellung'] .
            "<br><br>Question3 : <br>" . $_POST['dev-since'] .
            "<br><br>Question4 : <br>" . $_POST['dev-network'] .
            "<br><br>Question5 : <br>" . $_POST['dev-time'];
            break;
    

    require '../phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer();
    $mail->isSMTP();

    // Enter SMTP outbox:
    $mail->Host = ""; // e.g. smtp.1und1.de

    $mail->IsHTML(true);
    $mail->SMTPAuth = true;

    // Login and password of the recipient email
    $mail->Username = "w"; // e.g. info@techkings.de
    $mail->Password = "w"; // Password Email / Username

    // Encryption protocol
    $mail->SMTPSecure = "tls";
    $mail->Port = 25; // Port for SMTP

    $mail->Subject = "Request via Website";
    $mail->Body = $message;
    $mail->setFrom("qoqoazzeh@de.com", $username); // Deliverer email
    $mail->addAddress('qoqoazzeh@de.com'); // email recipient


    try{
        if($mail->send()){
            header("Location: ../succeed.html");
            exit();
        } else {
            header("Location: ../error.html");
        }
    } catch(Exception $e){
        echo $e->getMessage();
    }
}