<?php include './controllers/authController.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="main1.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


  <title>Organisation user registration</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form-wrapper auth">
        <h3 class="text-center form-title">Register</h3>
        <?php if (count($errors) > 0): ?>
  <div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
    <li>
      <?php echo $error; ?>
    </li>
    <?php endforeach;?>
  </div>
<?php endif;?>
        <form action="signup.php" method="post">
           <div class="form-group">
            <label for ="firstname">First Name</label>
            <input type="text" class="form-control form-control-lg" id=firstname name="firstname"
          </div>
        <div class="form-group">
            <label for ="surname">Surname</label>
            <input type="text" class="form-control form-control-lg" id=surname name="surname"
          </div>
        </div>
              <label for ="gender">Gender</label>
                <div>
                  <label for="male" class="radio-inline"><input type="radio" name="gender" value="m" id="male">Male</label>
                  <label for="female" class="radio-inline"><input type="radio" name="gender" value="f" id="female">Female</label>
        </div>
             <label for ="language">Language</label>
                <div>
                  <label for="Afrikaans" class="radio-inline"><input type="radio" name="language" value="a" id="afrikaans">Afrikaans</label>
                  <label for="English" class="radio-inline"><input type="radio" name="language" value="e" id="english">English</label>
                  <label for="Other" class="radio-inline"><input type="radio" name="language" value="o" id="other">Other</label>
        </div>
              <label for ="qualification">Qualification</label>
                <div>
                  <label for="Secondary" class="radio-inline"><input type="radio" name="qualification" value="sec" id="secondary">Secondary</label>
                  <label for="Diploma" class="radio-inline"><input type="radio" name="qualification" value="dip" id="diploma">Diploma</label>
                  <label for="BachelorsDegree" class="radio-inline"><input type="radio" name="qualification" value="bach" id="bachelors">Bachelors</label>
                  <label for="HonoursDegree" class="radio-inline"><input type="radio" name="qualification" value="hons" id="honours">Honours</label>
                  <label for="HigherDegree" class="radio-inline"><input type="radio" name="qualification" value="high" id="higher">Other</label>
        </div>
                 <label for ="department">Department</label>
                <div>
                  <label for="Finance" class="radio-inline"><input type="radio" name="department" value="fin" id="finance">Finance</label>
                  <label for="HR" class="radio-inline"><input type="radio" name="department" value="hr" id="hr">HR</label>
                  <label for="Production" class="radio-inline"><input type="radio" name="department" value="prod" id="production">Production</label>
                  <label for="IT" class="radio-inline"><input type="radio" name="department" value="it" id="it">IT</label>
                  <label for="management" class="radio-inline"><input type="radio" name="department" value="manag" id="management">Management</label>
        </div>
            <div class="form-group">
            <label for ="email">Email</label>
            <input type="text" class="form-control" id=email name="email"
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label>Password Confirm</label>
            <input type="password" name="passwordConf" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <button type="submit" name="signup-btn" class="btn btn-lg btn-block">Sign Up</button>
          </div>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
      </div>
    </div>
  </div>
</body>
</html>