<html>
    <head>
        <script>
            window.onload = function() {
                document.getElementById("msgCard").style.display = "none";
            }
        
            // Wait for the page to load first
            function changeMessage(title, sub, msg)
            {
                document.getElementById("msgCard").style.display = "block";
                document.getElementById("msgTitle").innerHTML = title;
                document.getElementById("msgSub").innerHTML = sub;
                document.getElementById("msgContent").innerHTML = msg;
            }

            function hideMessage() {
                document.getElementById("msgCard").style.display = "none";
            }
        </script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo SITENAME ?></title>
<!-- 

Highway Template

https://templatemo.com/tm-520-highway

-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/fontAwesome.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/light-box.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/templatemo-style.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/templatemo-styleigor.css">

        <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <script src="<?php echo URLROOT; ?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    </head>
