<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LogIn Form</title>

    <link rel="stylesheet" href="design.css">
</head>

<body>

    <div class="login-container">

        <div class="login-box">

            <h2>LogIn Form</h2>

            <form action="check.php" method="POST">

                <div class="input-box">
                    <input type="text" placeholder="Username" required name="username">
                   
                </div>

                <div class="input-box">
                    <input type="password" placeholder="Enter password" required name="password">
                   
                </div>

               
                <div class="options">

                    <label>
                        <input type="checkbox" name="remember">
                        <span>Save login information</span>
                    </label>

                    <a href="#">Forgot password?</a>

                </div>

                <button type="submit" class="login-btn">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    Login
                </button>

            </form>

            <div class="create-account">
                Don't have an account?
                <a href="#">Create Account</a>
            </div>

        </div>

    </div>

</body>
</html>