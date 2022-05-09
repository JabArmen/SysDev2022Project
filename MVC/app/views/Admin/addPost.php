<?php require APPROOT . '/views/includes/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/templatemo-styleigor.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/adminLogin.css">
<body>

<?php require APPROOT . '/views/includes/nav.php'; ?>

    <div class="page-heading">
        <div class="container">
            <div class="heading-content">
                <h1>Add <em>Post</em></h1>
            </div>
        </div>
    </div>

</style>   
</head>    
<body>    
    <form>  
        <div class="container">   
            <label>Title : </label>   
            <input type="text" placeholder="Title" name="title" required>  
            <label>Description : </label>   
            <input type="password" placeholder="Description" name="description" required>  
            <label>Media source : </label>   
            <input type="password" placeholder="Media source" name="mediaSource" required>  
            <button type="submit" id="addPost" name="addPost">Add</button> 
        </div>   
    </form>     
</body>     
</html> 
<?php require APPROOT . '/views/includes/footer.php'; ?>