<?php

    include "library/connection.php";

      $msg = ""; // Initialize the message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $time = time();

    // Validate that passwords match
    if ($password !== $confirmpassword) {
        $msg = '<div class="alert alert-danger alert-dismissible" style="margin-left:30%; text-align:center;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Oops!</strong> Passwords do not match.
                </div>';
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if the email already exists
        $stmt = $db->prepare("SELECT * FROM `customers` WHERE `email` = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result();
        $num = $res->num_rows;

        if ($num > 0) {
            $msg = '<div class="alert alert-danger alert-dismissible" style="margin-left:30%; text-align:center;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Oops!</strong> Your email already exists in our database. Try with another email.
                    </div>';
        } else {
            $stmt = $db->prepare("INSERT INTO `customers` (`name`, `email`, `password`, `phone`, `address`, `timestamp`) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssi", $name, $email, $hashed_password, $phone, $address, $time);
            $stmt->execute();

            header("Location: index.php");
            exit();
        }
    }
}


    include "library/header.php";

?>

<style type="text/css">
    :root {
    --background: #1a1a2e;
    --color: #ffffff;
    --primary-color: #0f3460;
}

* {
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

body {
    margin: 0;
    box-sizing: border-box;
/*    font-family: "poppins";*/
    background: var(--background);
    color: var(--color);
    letter-spacing: 1px;
    transition: background 0.2s ease;
    -webkit-transition: background 0.2s ease;
    -moz-transition: background 0.2s ease;
    -ms-transition: background 0.2s ease;
    -o-transition: background 0.2s ease;
}

a {
    text-decoration: none;
    color: var(--color);
}

h1 {
    font-size: 2.5rem;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    position: relative;
    width: 30.2rem;
}
.form-container {
    border: 1px solid hsla(0, 0%, 65%, 0.158);
    box-shadow: 0 0 36px 1px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    backdrop-filter: blur(20px);
    z-index: 99;
    padding: 2rem;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
}

.login-container form input {
    display: block;
    padding: 14.5px;
    width: 100%;
    margin: 2rem 0;
    color: var(--color);
    outline: none;
    background-color: #9191911f;
    border: none;
    border-radius: 5px;
    font-weight: 500;
    letter-spacing: 0.8px;
    font-size: 15px;
    backdrop-filter: blur(15px);
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
}

.login-container form input:focus {
    box-shadow: 0 0 16px 1px rgba(0, 0, 0, 0.2);
    animation: wobble 0.3s ease-in;
    -webkit-animation: wobble 0.3s ease-in;
}

.login-container form button {
    background-color: var(--primary-color);
    color: var(--color);
    display: block;
    padding: 13px;
    border-radius: 5px;
    outline: none;
    font-size: 18px;
    letter-spacing: 1.5px;
    font-weight: bold;
    width: 100%;
    cursor: pointer;
    margin-bottom: 2rem;
    transition: all 0.1s ease-in-out;
    border: none;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    -o-transition: all 0.1s ease-in-out;
}

.login-container form button:hover {
    box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.15);
    transform: scale(1.02);
    -webkit-transform: scale(1.02);
    -moz-transform: scale(1.02);
    -ms-transform: scale(1.02);
    -o-transform: scale(1.02);
}

.circle {
    width: 8rem;
    height: 8rem;
    background: var(--primary-color);
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    position: absolute;
}

.illustration {
    position: absolute;
    top: -14%;
    right: -2px;
    width: 90%;
}

.circle-one {
    top: 0;
    left: 0;
    z-index: -1;
    transform: translate(-45%, -45%);
    -webkit-transform: translate(-45%, -45%);
    -moz-transform: translate(-45%, -45%);
    -ms-transform: translate(-45%, -45%);
    -o-transform: translate(-45%, -45%);
}

.circle-two {
    bottom: 0;
    right: 0;
    z-index: -1;
    transform: translate(45%, 45%);
    -webkit-transform: translate(45%, 45%);
    -moz-transform: translate(45%, 45%);
    -ms-transform: translate(45%, 45%);
    -o-transform: translate(45%, 45%);
}

.register-forget {
    margin: 1rem 0;
    display: flex;
    justify-content: space-between;
}
.opacity {
    opacity: 0.6;
}

.theme-btn-container {
    position: absolute;
    left: 0;
    bottom: 2rem;
}

.theme-btn {
    cursor: pointer;
    transition: all 0.3s ease-in;
}

.theme-btn:hover {
    width: 40px !important;
}

@keyframes wobble {
    0% {
        transform: scale(1.025);
        -webkit-transform: scale(1.025);
        -moz-transform: scale(1.025);
        -ms-transform: scale(1.025);
        -o-transform: scale(1.025);
    }
    25% {
        transform: scale(1);
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -o-transform: scale(1);
    }
    75% {
        transform: scale(1.025);
        -webkit-transform: scale(1.025);
        -moz-transform: scale(1.025);
        -ms-transform: scale(1.025);
        -o-transform: scale(1.025);
    }
    100% {
        transform: scale(1);
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -o-transform: scale(1);
    }
}

</style>

    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <!-- <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" style="height: 600px;" /> -->
                <h2  style="color: white;">CREATE AN ACCOUNT  </h2>
                
                <?php print isset($msg) ? $msg : ""; ?>

                <form method="post" action="">
                     <input type="text" placeholder="Username"name="username" required/>
                     <input type="text" placeholder="Email" name="email"  required/>
                     <input type="password" placeholder="Password" name="password"  required />
                     <input type="confirmpassword" placeholder="Confirm Password" name="confirmpassword"  required />
                     <input type="text" placeholder="Phone" name="phone"   required/>  
                     <input type="text" placeholder="Location/Address" name="address"  required/>
                     <!-- <input type="time" placeholder="timestamp"name="time"   required/>   -->
                    
                    <button style="color: white;">REGISTER </button>
                </form>
                <div class="register-forget ">
                    <a style="color: white;" href="login.php">Already have an Account ?</a>
                    <a  style="color: white;" href="password.php">FORGOT PASSWORD </a>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>

<!-- to register a user. -->


<?php

   include "library/footer.php";

?>