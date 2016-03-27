<?php
    session_start();
    if(isset($_SESSION['user'])){
        header('location:dash.php');
    }else{
        if (isset($_POST['user'])) {
            $_SESSION['user']['name'] = $_POST['user'];
            $_SESSION['user']['botsession'] = "";
            header('location:dash.php');
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>


    <title>Welcome to arya.ai</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/creative.css" />

    <!-- Custom CSS -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body id="page-top">

        <header> <br><br>
            <img src="logo_arya.png" alt="Smiley face" height="40%" width="40%">
                <div class="header-content">
                    <div class="header-content-inner">
                        <form  method="POST" action="index.php"> 
                            <div id="wrapper">
                                <div id="login">
                                    <p> 
                                        <label for="username" class="uname" > Your email or username </label>
                                        <input style="color:#0E3048;" id="username" name="user" required="required" type="text" placeholder="Please Enter Here"/>
                                    </p>
                                </div>                       
                            </div>
                            <button type="submit" style="margin-top: 100px;" href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</button>
                        </form>
                    </div>
                </div>
            </header>

        <script type="text/javascript" src="lib/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="lib/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>
































