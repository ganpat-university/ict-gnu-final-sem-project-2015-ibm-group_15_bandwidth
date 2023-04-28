
<!DOCTYPE html>
<html>
    <head>
        <title>login form</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    
<body>
    <form action="login.php" method="post">
        <h2>Admin LOGIN</h2>
        <?PHP if (isset($_GET['error'])) { ?>
            <p class="error"> <?php echo htmlspecialchars($_GET['error']); ?> </p>
        <?php }?>
        <label>User Name</label>
        <input type="text" name="uname" placeholder="Enter User Name" required pattern="[a-zA-Z0-9]+" maxlength="10"><br>

        <label>Password</label>
        <input type="password" name="passwd" placeholder="Enter password"><br>
        <button type="submit"> LOGIN </button>


    </form>
</body>

</html>