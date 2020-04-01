<?php include './controllers/authController.php' ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />-->
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">



  <title>Reset password</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form-wrapper auth login">

        <form action="reset_password.php" method="post">
        <h3 class="text-center form-title">Reset Your Password</h3>
        <?php if (count($errors) > 0): ?>
        <div class="alert alert-danger">
          <?php foreach ($errors as $error): ?>
          <li>
          <?php echo $error; ?>
    </li>
    <?php endforeach;?>
  </div>
<?php endif;?>


          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control form-control-lg">
          </div>
           <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="passwordconf" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <button type="submit" name="reset-password-btn" class="btn btn-lg btn-block">Reset Password</button>
          </div>
        </form>
       
      </div>
    </div>
  </div>
</body>
</html>