<!DOCTYPE html>
<head>
    <title>Register Here</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login1.css">
</head>
<body>
    
        <div class="breadcrumb-container" >
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb py-2">
                    <li class="breadcrumb-item">
                        <a href="index.php">Back To HomePage</a>
                </ol>
            </nav>
        </div>
    <div class="container">
        <div class="card">
            <div class="inner-box" id="card">
                <div class="card-front">
                    <h2>LOGIN</h2>
                    <form id="login-form" class="form" role="form" method="post" action="api/login_submit.php">
                        <input type="email" class="input-text" name="email" placeholder="Your Email Id" required>
                        <input type="password" class="input-text" name="password" placeholder="Password" minlength="6" required>
                        <button type="submit" class="submit-btn">Submit</button>
                        <input type="checkbox" ><span>Remember me</span>
                    </form>
                    <button type="button" class="btn" onclick="openRegister()">I'm New Here</button>
                    <a href="">Forget Password</a>
                </div>
                <div class="card-back">
                    <h2>REGISTER</h2>
                    <form id="signup-form" class="form" role="form" method="post" action="api/signup_submit.php">
                        <input type="text" class="input-text" name="full_name" placeholder="Your Name" maxlength="10" required>
                        <input type="email" class="input-text" name="email" placeholder="Your Email Id" required>
                        <input type="text" class="input-text" name="phone" placeholder="Phone Number" maxlength="10" minlength="10" required>
                        <input type="password" class="input-text" name="password" placeholder="Password" minlength="6" required>
                        <button type="submit" class="submit-btn">Submit</button>
                        <input type="checkbox" ><span>Remember me</span>
                    </form>
                    <button type="button" class="btn" onclick="openLogin()">I've an account</button>
                    <a href="" >Forget Password</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        var card= document.getElementById("card");

        function openRegister(){
            card.style.transform = "rotateY(-180deg)";
        }

        function openLogin(){
            card.style.transform = "rotateY(0deg)";
        }

    </script>

</body>
</html>