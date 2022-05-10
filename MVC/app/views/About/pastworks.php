<?php require APPROOT . '/views/includes/header.php'; ?>
<body>

<?php require APPROOT . '/views/includes/nav.php'; ?>

    <div class="page-heading">
        <div class="container">
            <div class="heading-content">
                <h1>Past<em> Works</em></h1>
            </div>
        </div>
    </div>

<div class="container">
    <?php foreach($data as $post){
  echo "<h1>".$post->post_title.'</h1>
    <div class="youtubevideo">
      <iframe width="760" height="515"
      src="'.$post->post_media_source.'">
      </iframe>
      <p>'.$post->description.'</p>
      <br><br>
    </div>';
    }?>
  </div>

  <div class="services">
    <div class="container-fluid d-flex">
      
      <div class="col-6">
          <a href="https://www.instagram.com/shortlightproductions/">
          <div class="service-item">
            <div class="icon">
                <img src="<?php echo URLROOT; ?>/img/ig.jpg" alt="">
            </div>
            <div class="text">
              <h4>Instagram</h4>
              <p>Follow our Instagram page to view all of our clients</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-6">
          <a href="#">
          <div class="service-item">
            <div class="icon">
                <img src="<?php echo URLROOT; ?>/img/email.png" alt="">
            </div>
            <div class="text">
                <h4>Email</h4>
                <p>If you have any questions, feel free to send us an email!</p>
            </div>
          </div>
        </a>
      </div>

    </div>
  </div>
<?php require APPROOT . '/views/includes/footer.php'; ?>