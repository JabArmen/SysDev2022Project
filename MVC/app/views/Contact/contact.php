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
          <a href="https://www.instagram.com/shortlightproductions/" target="_blank">
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
  <script>
    function logSubmit(event) {
      event.preventDefault();
      var popup = document.getElementById("myPopup");

      popup.classList.toggle("show");
      setTimeout(function() {
        popup.classList.toggle("show");
      }, 2000);
      event.preventDefault();

    }
    const form = document.getElementById('form');
    form.addEventListener('submit', logSubmit);
  </script>

  <?php require APPROOT . '/views/includes/footer.php'; ?>