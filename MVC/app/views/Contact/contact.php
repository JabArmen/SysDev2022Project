<?php require APPROOT . '/views/includes/header.php'; ?>

<body>

  <?php require APPROOT . '/views/includes/nav.php'; ?>

  <style>
    /* Popup container - can be anything you want */
    .popup {
      position: relative;
      display: inline-block;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* The actual popup */
    .popup .popuptext {
      visibility: hidden;
      width: 160px;
      background-color: #555;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 8px 0;
      position: absolute;
      z-index: 1;
      bottom: 125%;
      left: 50%;
      margin-left: -80px;
    }

    /* Popup arrow */
    .popup .popuptext::after {
      content: "";
      position: absolute;
      top: 100%;
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: #555 transparent transparent transparent;
    }

    /* Toggle this class - hide and show the popup */
    .popup .show {
      visibility: visible;
      -webkit-animation: fadeIn 1s;
      animation: fadeIn 1s;
      animation: fade;
    }

    /* Add animation (fade in the popup) */
    @-webkit-keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }
  </style>

  <div class="page-heading">
    <div class="container">
      <div class="heading-content">
        <h1>Contact <em>Us</em></h1>
      </div>
    </div>
  </div>

  <form id="form" class="my-form" method="post" action="">
    <div class="container">
      <h1>Get in touch with us!</h1>
      <ul>
        <li>
          <select name="service">
            <option selected disabled>-- Please choose an option --</option>
            <option value="wedding">Wedding Video</option>
            <option value="businessad">Business Advertisement</option>
            <option value="musicvideo">Music Video</option>
          </select>
        </li>
        <li>
          <div class="grid grid-2">
            <input name="name" type="text" placeholder="Name" required>
            <input name="surname" type="text" placeholder="Surname" required>
          </div>
        </li>
        <li>
          <div class="grid grid-2">
            <input name="email" type="email" placeholder="Email" required>
            <input name="telephone" type="tel" placeholder="Phone">
          </div>
        </li>
        <li>
          <textarea name="message" placeholder="Message" required></textarea>
        </li>
        <li>
          <input type="checkbox" id="terms">
          <label for="terms">I confirm that this information is correct</label>
        </li>
        <li>
          <div class="grid grid-3">
            <div class="required-msg">REQUIRED FIELDS</div>
            <div class="popup">
              <span class="popuptext" id="myPopup">Form Submitted!</span>
              <button class="btn-grid" type="submit" name="submit" disabled>
                <span class="back">
                  <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/email-icon.svg" alt="">
                </span>
                <span class="front">SUBMIT</span>
              </button>
            </div>
            <button class="btn-grid" type="reset" disabled>
              <span class="back">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/eraser-icon.svg" alt="">
              </span>
              <span class="front">RESET</span>
            </button>
          </div>
        </li>
      </ul>
    </div>
  </form>
  <div class="services">
    <div class="container" href="https://www.facebook.com/login.php">
      <div class="col-md-4 col-sm-6">
        <div class="service-item">
          <div class="icon">
            <img src="<?php echo URLROOT; ?>/img/fb.png" alt="">
          </div>
          <div class="text">
            <h4>Facebook</h4>
            <p>Follow us on facebook to see all the updates!</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="service-item">
          <div class="icon">
          <a href="https://www.instagram.com/shortlightproductions/">
            <img src="<?php echo URLROOT; ?>/img/ig.jpg" alt="">
          </div>
          <div class="text">
            <h4>Instagram</h4>
            <p>Follow our Instagram page to view all of our clients</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="service-item">
          <div class="icon">
            <img src="<?php echo URLROOT; ?>/img/mail.png" alt="">
          </div>
          <div class="text">
            <h4>Email</h4>
            <p>If you have any questions, feel free to send us an email!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style>
  .overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    transition: opacity 500ms;
    visibility: hidden;
    opacity: 0;
    z-index: 9999;
  }

  .overlay:target {
    visibility: visible;
    opacity: 1;
  }

  #popup1 {
    font-family: poppins;
  }

  #popup1 .popup {
    margin: 0px auto;
    padding: 50px 20px;
    background: #fff;
    border-radius: 0px;
    height: 200px;
    width: 690px;
    position: relative;
    text-align: center;
    top: 50% !important;
    position: fixed !important;
    -moz-transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    right: 0px;
    left: 0;
  }

  #popup1 .popup h2 {
    margin-top: 0;
    color: #333;
  }

  #popup1 .popup .close {
    position: absolute;
    top: 0px;
    right: 0px;
    transition: all 200ms;
    font-size: 30px;
    font-weight: normal;
    text-decoration: none;
    text-align: center;
    background: #333;
    border-radius: 0;
    cursor: pointer;
    float: right;
    padding: 0;
    color: #fff;
    margin-top: 0;
    margin-right: 0;
    height: 40px;
    width: 40px;
    line-height: 45px;
  }

  #popup1 .popup .close:hover {
    color: #06D85F;
  }

  #popup1 .popup .content {
    max-height: 30%;
    overflow: auto;
  }

  #popup1 .newletter-title h2 {
    font-size: 24px;
    text-transform: uppercase;
    color: #000;
    font-weight: 700;
    letter-spacing: 3px;
    margin: 0 0 15px;
  }

  #popup1 .box-content label {
    font-weight: 400;
    max-width: 560px;
    display: inline-block;
    margin-bottom: 5px;
    font-size: 14px;
    line-height: 26px;
  }

  .newletter-popup {
    background: #fff;
    top: 50% !important;
    position: fixed !important;
    padding: 0;
    text-align: center;
    -moz-transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
  }

  #popup1 #frm_subscribe #subscribe_pemail {
    background: #EBEBEB none repeat scroll 0% 0%;
    border: medium none;
    height: 40px;
    width: 65%;
    margin: 20px 0;
    padding-left: 15px;
  }

  #popup1 #frm_subscribe a {
    cursor: pointer;
    border: none;
    background: #333;
    padding: 3px 25px;
    text-transform: uppercase;
    font-size: 14px;
    color: #fff;
    font-weight: 600;
    line-height: 34px;
    display: inline-block;
    border-radius: 0;
    letter-spacing: 2px;
  }

  #popup1 .box-content .subscribe-bottom {
    margin-top: 20px;
  }

  #popup1 .box-content .subscribe-bottom #newsletter_popup_dont_show_again {
    display: inline-block;
    margin: 0;
    vertical-align: middle;
    margin-top: -1px;
  }

  #popup1 .box-content .subscribe-bottom label {
    margin: 0;
    font-weight: 400;
    max-width: 650px;
    display: inline-block;
    margin-bottom: 5px;
    font-size: 12px;
  }
</style>
  <div id="popup1" class="overlay">
  <div class="popup"> <a class="close" id="closeB" href="#">&times;</a>
    <div id="dialog" class="window">

      <div class="box">
        <div class="newletter-title">
          <h2>Your form has been submitted</h2>
          <h3>We'll be in touch soon!</h3>
        </div>
        <div class="box-content newleter-content">
          <label>Shortlight Productions</label>

          <!-- /#frm_subscribe -->
        </div>
        <!-- /.box-content -->
      </div>
    </div>
  </div>
</div>
  <?php 
    if(isset($data['confirm'])){
      include APPROOT . '/views/includes/popup.php'; 
      unset($data['confirm']);
      }?>

  <?php require APPROOT . '/views/includes/footer.php'; ?>