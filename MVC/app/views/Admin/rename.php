<?php require APPROOT . '/views/includes/header.php'; ?>
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/templatemo-styleigor.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/adminLogin.css">
<body>

<?php require APPROOT . '/views/includes/nav.php'; ?>

    <div class="page-heading">
        <div class="container">
            <div class="heading-content">
                <h1>Admin <em>Rename</em></h1>
            </div>
        </div>
    </div>
<body>    
    <form method="post" action="">  
        <div class="container">
            <p>Please enter a valid username that is in need of a password change!</p>
            <label>Username : </label>
            <input type="text" placeholder="Enter New Username" name="name" required>
            <br> </br>
            <button type="submit" id="rename" name="rename">Rename</button>
            <div style="text-align: center;">
            </div>
            <?php

        if($data !=[]){
            echo '<div class="alert alert-danger" role="alert">'.$data['msg'].'</div>';
        }
        ?>
</form>     
</body>     
</html> 
<?php require APPROOT . '/views/includes/footer.php'; ?>