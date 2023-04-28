<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  
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
      width: 400px;
      background-color: #fff;
      padding: 30px;
      padding-right: 50px;
      border-radius: 10px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }
    
    /* Style form inputs and labels */
    label {
      display: block;
      margin-bottom: 10px;
      color: #333;
    }
    
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
  <form action="login.php" method="post">
    <h1>Login</h1>
    
    <label for="Email">Email:</label>
    <input type="Email" name="Email" id="Email" required>
    
    <label for="Password">Password:</label>
    <input type="Password" name="Password" id="Password" required>
    
    <input type="submit" value="Login">

    <p>Don't have an account yet?<a style="text-decoration:none;" href="signup.php"> Sign Up here </a></p>
  </form>
  </body>
</html>