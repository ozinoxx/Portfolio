<?php // <-- Här öppnar vi PHP-taggen.

if (isset($_POST['submit'])) { // Här kollar vi om "Skicka"-knappen är klickad och vad som ska hända efter att den är klickad.

  // Kollar ifall förnamnet INTE är ifyllt och ger isåfall ett felmeddelande till användaren.
  if (!$_POST['firstName']) {
    $error = "- Please enter your first name.";
  }

  // Kollar ifall efternamnet INTE är ifyllt och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
  if (!$_POST['lastName']) {
    $error = "<br>- Please enter your last name.";
  }

  // Kollar ifall e-postadressen INTE är ifylld och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
  if (!$_POST['email']) {
    $error .= "<br>- Please enter your email adress.";
  }

  // Kollar ifall meddelandet INTE är ifyllt och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
  if (!$_POST['message']) {
    $error .= "<br>- Please enter your message.";
  }

  // Kollar ifall svaret är något annat än 5 och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
  if (intval($_POST['human']) !== 5) {
    $error .= "<br>- Please verify your not a robot.";
  }

  // Här kollar vi ifall det finns några fel och om det finns så skriver vi ut dem åt användaren.
  if ($error) {
    $result = "Oh no! An Error! Please correct the following: $error";
  }

  // Skickar mejlet ifall alla fält är ifyllda och inga fel finns.
  else {

    // PHPs mailfunktion.
    mail(
      "ozinoxx@hotmail.com", // <-- Adressen dit mejlet skickas
      "Subject line", // <-- Mejlets ämnesrad.
      "Name: " .$_POST['firstName']. // <-- Det användaren har angett som förnamn i formuläret.
      "Name: " .$_POST['lastName']. // <-- Det användaren har angett som efternamn i formuläret.
      "\r\nEmail: " .$_POST['email']. // <-- Det användaren har angett som e-postadress i formuläret. \r\n gör radbrytningar i själva mejlet.
      "\r\nMessage: " .$_POST['message'] // <-- Det användaren har angett som meddelande i formuläret. \r\n gör radbrytningar i själva mejlet.
    );

    // Texten som visas efter att mejlet skickats.
    {
      $result = "Thank you! We will be in touch shortly.";
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

    <nav class="navbar navbar-light navbar-toggleable-sm bg-faded justify-content-between">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a href="/" class="navbar-brand"><img class="img-fluid" src="media/jjlogo.png" alt="Responsive image" width="80px"></a>
    <div class="navbar-collapse collapse justify-content-between" id="collapsingNavbar2">
        <div><!--placeholder to evenly space flexbox items and center links--></div>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home<span class="sr-only">Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact Me</a>
            </li>
        </ul>
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item"><a class="nav-link" href="https://github.com/ozinoxx" target="_blank"><i class="fa fa-github"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
        </ul>
    </div>
</nav>



<form method="post">
  <?php echo $result; //prints out error to screen ?>
  <input type="text" name="firstName" placeholder="First name" value="<?php echo $_post['firstName']; ?>" autofocus >
  <input type="text" name="lastName" placeholder="Last name" value="<?php echo $_post['lastName']; ?>">

  <input type="email" name="email" placeholder="E-mail" value="<?php echo $_post['email']; ?>">

  <textarea rows="10" name="message" placeholder="Your message..."><?php echo $_post['message']; ?></textarea>

  <!-- Anti-spam fält som kollar ifall användaren räknat rätt. -->
  <input type="text" name="human" placeholder="What is 3 + 2?">

  <input type="submit" class="button" name="submit" value="Send message">
</form>
