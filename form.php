<?php

use PHPMailer\PHPMailer\PHPMailer;
require __DIR__ . '/vendor/autoload.php';

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {

    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $age = $_POST['age'];
    $service = $_POST['service'];
    $message = $_POST['message'];

    if (empty($firstName)) {
        $errors[] = 'Krstné meno nieje vyplnené.';
    }

    if (empty($lastName)) {
        $errors[] = 'Priezvisko nieje vyplnené.';
    }

    if (empty($email)) {
        $errors[] = 'Email nieje vyplnený.';
    }

    if (empty($city)) {
        $errors[] = 'Mesto nieje vyplnené.';
    }

    if (empty($state)) {
        $errors[] = 'Štát nieje vyplnený.';
    }

    if (empty($age)) {
        $errors[] = 'Vek nieje vyplnený.';
    }

    if (empty($service)) {
        $errors[] =  'Mám záujem nieje vyplnené.';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }


    if (!empty($errors)) {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    } else {
        $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
        // specify SMTP credentials
        $mail->isSMTP();
        $mail->Host = 'smtp.endora.cz';
        $mail->SMTPAuth = true;
        $mail->Username = 'adelazavrsanova@adelazavrsanova.sk';
        $mail->Password = 'Odfnxivs1';
        $mail->SMTPSecure = 'STARTTLS';
        $mail->Port = 31111;

        $mail->setFrom($email, 'Meno odosielatela');
        $mail->addAddress('adela@adelazavrsanova.sk', 'Adela Završanová');
        $mail->Subject = 'Nová správa z vašej stránky';

        // Enable HTML if needed
        $mail->isHTML(true);

        $bodyParagraphs = ["Meno: {$firstName}", "Priezvisko: {$lastName}", "Email: {$email}", "Mesto: {$city}", "Štát: {$state}", "Vek: {$age}", "Služby: {$service}",   "Správa:", nl2br($message)];
        $body = join('<br />', $bodyParagraphs);
        $mail->Body = $body;

        //echo $body;
        if(!($mail->send())){
            $errorMessage = 'Oops, something went wrong. Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="Adela Završanová, Cvičenie, Zdravý životný štýl, Zdravá strava">
    <meta name="keywords" content="Adela Završanová">
    <meta name="author" content="Stanislav Jendrišák">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon-->
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />

    <!-- Goggole Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--CSS style-->
    <link rel="stylesheet" href="css/style_form.css">

    <title>Adela Završanová</title>
</head>
<body>
<div class="container-fluid g-0">
      <div class="row g-0 align-items-center justify-content-center">
        <div class="col-xl-8 col-lg-8 col-lg-8 align-self-center background">
          <div class="d-flex justify-content-center mt-4">
            <a href="index.html">
              <img class="img-hover"
                src="img/adel-logo.png"
                alt="logo-A"
                width="300"
                height="150"
              />
            </a>
          </div>
          <h1> Ďakujem </h1>
          <h2> Ozvem sa ti čo najskôr :-) </h2>
          <div class="d-flex justify-content-center mt-4">
            <a class="button" href="index.php">Domov</a>
          </div>
        </div>
      </div>
              <!-- <?php
        echo "<pre>";
        echo print_r($_POST,true);
        echo "</pre>";
        ?> -->
    </div>
</body>
</html>
