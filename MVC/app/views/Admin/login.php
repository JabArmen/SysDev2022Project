<?php require APPROOT . '/views/includes/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/templatemo-styleigor.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/adminLogin.css">
<body>

<?php require APPROOT . '/views/includes/nav.php'; ?>

    <div class="page-heading">
        <div class="container">
            <div class="heading-content">
                <h1>Admin <em>Login</em></h1>
            </div>
        </div>
    </div>

</style>   
</head>    
<body>    
    <form>  
        <div class="container">   
            <label>Username : </label>   
            <input type="text" placeholder="Enter Username" name="username" required>  
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" required>  
            <button type="submit">Login</button> 
            <div style="text-align: center;">
            <input type="checkbox"> Remember me</div>   
            <div class="forgotpassword" style="text-align: center;"> Forgot <a href="<?php echo URLROOT; ?>/admin/forgot"> password? </a>   
            </div>
        </div>   
    </form>     
</body>     
</html> 
<?php require APPROOT . '/views/includes/footer.php'; ?>