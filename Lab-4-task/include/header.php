<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?></title>
    <script src="https://kit.fontawesome.com/4db96eb076.js" crossorigin="anonymous"></script>
    <style>
        nav {
            display: flex;
            justify-content: space-between;
        }

        nav a {
            text-decoration: none;
            color: black;
            font-size: 1.5em;
            margin-right: 15px;
            justify-content: space-around;
        }

        .footer {
            align-items: center;
            border: 1px solid;
            padding-left: 650px;
            justify-content: center;
        }
        a:hover{
            background-color: aliceblue;
        }

    </style>
</head>

<body>
    <header>
        <nav>
            <img src="../image/logoipsum-250.svg" alt="logo">
            <span>
                <a href="A.php">Home Page</a>
                <?php
                    if($islogedin){
                        echo 'Login as <a href= "E_dashboard.ph">'. $_SESSION['name']."</a>";
                    }
                    else{
                        echo '<a href="C_login.php">Login</a>';
                        echo '<a href="B_registation.php">Registation</a>';
                    }
                ?>
            </span>
        </nav>
    </header>