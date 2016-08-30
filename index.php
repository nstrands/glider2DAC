<?php
  if (isset($_POST["submit"])) {
      $glider = $_POST['glider'];
      $date = $_POST['date'];
      $time = $_POST['time'];
      $gliderDos = $_POST['gliderDos'];
      $ctd = $_POST['ctd'];
      $contributors = $_POST['contributors'];
      $project = $_POST['project'];
      $message = $_POST['message'];
      $funding = $_POST['funding'];
      $name = $_POST['name'];
      $email = $_POST['email'];

      $from = 'Glider 2 DAC GTS'; 
      $to = 'nstrands18@gmail.com, kerfoot@marine.rutgers.edu, tnmiles@marine.rutgers.edu'; 
      $subject = 'New Glider to DAC GTS ';

      $body = "From: $name\n 
                E-Mail: $email\n 
                Glider: $glider\n 
                Deployment Date: $date\n 
                Deployment Time: $time\n
                GliderDos Version: $gliderDos\n
                CTD Serial: $ctd\n
                Contributors: $contributors\n
                Project Name: $project\n  
                Message:\n $message\n
                Funding Source: $funding\n";
    //Form Validation
    if (!$_POST['name']) {
      $errName = 'Please enter your name';
    }
    if (!$_POST['glider']) {
      $errGlider = 'Please enter the Glider Name';
    }
    if (!$_POST['date']) {
      $errDate = 'Please enter the Deployment Date';
    }
    if (!$_POST['time']) {
      $errTime = 'Please enter the Deployment Time';
    }
    if (!$_POST['gliderDos']) {
      $errDos = 'Please enter the Glider Dos Version';
    }
    if (!$_POST['ctd']) {
      $errCtd = 'Please enter the CTD Serial Number';
    }
    if (!$_POST['contributors']) {
      $errContributors = 'Please enter the names of the Project Contributors';
    }
    if (!$_POST['project']) {
      $errProject = 'Please enter the Project Name';
    }
    if (!$_POST['funding']) {
      $errFunding = 'Please enter the funding source';
    }
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errEmail = 'Please enter a valid email address';
    }

    // If there are no errors, send the email
    if (!$errName && !$errGlider && !$errDate && !$errTime && !$errDos && !$errCtd && !$errContributors && !$errProject && !$errFunding && !$errEmail) {
      if (mail ($to, $subject, $body, $from)) {
        $result='<div class="alert alert-success">Thanks.</div>';
      } else {
        $result='<div class="alert alert-danger">Sorry there was an error sending your info. Please try again.</div>';
      }
    }
      }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Glider 2 DAC and GTS</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <form class="form-horizontal" role="form" method="post" action="index.php">
        <div class="form-group">
          <label for="glider" class="col-sm-2 control-label">Glider</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="glider" name="glider" placeholder="Glider Name" value="">
            <?php echo "<p class='text-danger'>$errName</p>";?>
          </div>
        </div>
        <div class="form-group">
          <label for="date" class="col-sm-2 control-label">Deployment Date</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="date" name="date" placeholder="Date" value="">
            <?php echo "<p class='text-danger'>$errDate</p>";?>
          </div>
        </div>
        <div class="form-group">
          <label for="time" class="col-sm-2 control-label">Deployment Time</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" id="time" name="time" placeholder="Time" value="">
            <?php echo "<p class='text-danger'>$errTime</p>";?>
          </div>
        </div>
        <div class="form-group">
          <label for="gliderDos" class="col-sm-2 control-label">GliderDos Version</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="gliderDos" name="gliderDos" placeholder="Version #" value="">
            <?php echo "<p class='text-danger'>$errDos</p>";?>
          </div>
        </div>
        <div class="form-group">
          <label for="ctd" class="col-sm-2 control-label">CTD Serial Number</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="ctd" name="ctd" placeholder="Serial Number" value="">
            <?php echo "<p class='text-danger'>$errCtd</p>";?>
          </div>
        </div>
        <div class="form-group">
          <label for="contributors" class="col-sm-2 control-label">Contributors (comma separated)</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="contributors" name="contributors" placeholder="contributors" value="">
            <?php echo "<p class='text-danger'>$errContributors</p>";?>
          </div>
        </div>
        <div class="form-group">
          <label for="project" class="col-sm-2 control-label">Project Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="project" name="project" placeholder="project" value="">
            <?php echo "<p class='text-danger'>$errProject</p>";?>
          </div>
        </div>
        <div class="form-group">
          <label for="message" class="col-sm-2 control-label">Project Description and Goals</label>
          <div class="col-sm-10">
            <textarea class="form-control" rows="4" name="message"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="funding" class="col-sm-2 control-label">Funding Source</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="funding" name="funding" placeholder="source" value="">
            <?php echo "<p class='text-danger'>$errFunding</p>";?>
          </div>
        </div>
        <div class="form-group">
          <label for="name" class="col-sm-2 control-label">Submitters Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="">
            <?php echo "<p class='text-danger'>$errName</p>";?>
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
            <?php echo "<p class='text-danger'>$errName</p>";?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10 col-sm-offset-2">
            <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10 col-sm-offset-2">
            <?php echo $result; ?>  
          </div>
        </div>
      </form>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
