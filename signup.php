<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  
  <style>
    /* Center the form on the page */
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #748AB0;
    }
    
    form {
      width: 450px;
      background-color: #fff;
      padding: 30px;
      padding-right: 60px;
      border-radius: 30px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }
    
    /* Style form inputs and labels */
    label {
      display: block;
      margin-bottom: 10px;
      color: #333;
    }
    
    input[type="text"],
    input[type="Email"],
    input[type="Password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: none;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      font-size: 16px;
    }
    
    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }
    
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
    
    /* Style form validation error messages */
    input:invalid {
      border-color: #ff6347;
    }
    
    input:invalid:focus {
      box-shadow: 0px 0px 10px rgba(255, 99, 71, 0.5);
    }
    
    .error-message {
      color: #ff6347;
      margin-top: 5px;
      font-size: 14px;
    }
  </style>
</head>
<body>
<form action="register.php" method="post">
  <h1><center>Sign Up</center></h1>

  <label for="Fname">First Name:</label>
  <input type="text" name="Fname" id="Fname" required>
  <?php if (isset($errors['Fname'])): ?>
    <div class="error-message"><?php echo $errors['Fname']; ?></div>
  <?php endif; ?>

  <label for="Lname">Last Name:</label>
  <input type="text" name="Lname" id="Lname" required>
  <?php if (isset($errors['Lname'])): ?>
    <div class="error-message"><?php echo $errors['Lname']; ?></div>
  <?php endif; ?>

  <label for="Email">Email:</label>
  <input type="email" name="Email" id="Email" required>
  <?php if (isset($errors['Email'])): ?>
    <div class="error-message"><?php echo $errors['Email']; ?></div>
  <?php endif; ?>

  <label for="Password">Password:</label>
  <input type="password" name="Password" id="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
    title="Must contain at least one number, one uppercase and lowercase letter, and be at least 8 characters long.">
  <?php if (isset($errors['Password'])): ?>
    <div class="error-message"><?php echo $errors['Password']; ?></div>
  <?php endif; ?>

  <label for="ConfirmPassword">Confirm Password:</label>
  <input type="password" name="ConfirmPassword" id="ConfirmPassword" required>
  <?php if (isset($errors['ConfirmPassword'])): ?>
    <div class="error-message"><?php echo $errors['ConfirmPassword']; ?></div>
  <?php endif; ?>

  <input type="submit" value="Sign Up">
  <p>Already have an account? <a href="index1.php">Log in here</a></p>
</form>
<script>
  var password = document.getElementById("Password")
  var confirm_password = document.getElementById("ConfirmPassword");

  function validatePassword() {
    if (password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Passwords do not match");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
</script>
</body>
</html>
