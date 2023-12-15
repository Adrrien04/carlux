<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CARLUX</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        html {
            scroll-behavior: smooth;
        }
        a:hover{
            color: white;
            transition: 0.5s;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat';


        }
        h1 {
            font-size: 50px;
            color: white;
            font-weight: lighter;
            text-align: center;
            letter-spacing: 15px;
        }


        #container {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url(img/vivid-blurred-colorful-wallpaper-background.jpg) ;
            background-size: cover;

        }

        .bouton {
            position: absolute;
            bottom: 300px;

        }

        .textesousbouton {
            position: absolute;
            bottom: 250px;
            text-decoration-color: white;
        }

        .wave{
            position: absolute;
            width: 100%;
            height: 150px;
            top: 0;
            left: 0;
            background-image: url("img/wave.png");
            animation: wave 10s linear infinite;
        }
        .wave::before{
            content: '';
            position: absolute;
            width: 100%;
            height: 150px;
            top: 0;
            left: 0;
            background-image: url("img/wave.png");
            opacity: .2;
            animation: wave-reverse 10s linear infinite;
        }
        .wave::after{
            content: '';
            position: absolute;
            width: 100%;
            height: 150px;
            top: 0;
            left: 0;
            background-image: url("img/wave.png");
            opacity: .2;
            animation-delay: -4s;
            animation: wave 8s linear infinite;
        }
        @keyframes wave {
            0%{
                background-position: 0;
            }
            100%{
                background-position: 1280px;
            }

        }

        @keyframes wave-reverse {
            0%{
                background-position: 1280px;
            }
            100%{
                background-position: 0;
            }

        }
    </style>
</head>
<body>
<div id="container">
    <h1> BIENVENUE  SUR  CARLUX</h1>
    <div class="wave"></div>
    <div class="bouton">
        <a href=main.php style="text-decoration: none">
            <img src="img/logo.png" width="500" height=auto>
        </a>
    </div>
    <div class="textesousbouton">
        <a href="#timeline" style="text-decoration: none">
            <p style="color: white"> ACCEDER A CARLUX </p> </div>
    </a>
</div>


</body>