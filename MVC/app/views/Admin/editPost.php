<?php require APPROOT . '/views/includes/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/templatemo-styleigor.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/adminLogin.css">
<body>

<?php require APPROOT . '/views/includes/nav.php'; ?>

    <div class="page-heading">
        <div class="container">
            <div class="heading-content">
                <h1>Edit <em>Post</em></h1>
            </div>
        </div>
    </div>

</style>   
</head>    
<body>    
    <form>  
        <div class="container">   
            <label>Title : </label>   
            <input type="text" placeholder="Title" name="editTitle" required>  
            <label>Description : </label>   
            <input type="text" placeholder="Description" name="editDescription" required>  
            <label>Media source : </label>   
            <input type="text" placeholder="Media source" name="editMediaSource" required>  
            <button type="submit" id="addPost" name="editPost">Edit</button> 
        </div>   
    </form>     
</body>     
</html> 
<?php require APPROOT . '/views/includes/footer.php'; ?>