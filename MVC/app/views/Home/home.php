<?php require APPROOT . '/views/includes/header.php'; ?>

<body>

    <?php require APPROOT . '/views/includes/nav.php'; ?>

    <div id="video-container">
        <div class="video-overlay"></div>
        <div class="video-content">
            <div class="inner">
                <!-- <h1>Welcome to <em>ShortLight</em></h1>
              <p>Business Advertisement</p>
              <p>Wedding Videos</p>
              <p>Music Videos</p> -->
                <br><br><br><br>
                <div class="scroll-icon">
                    <a class="scrollTo" data-scrollTo="portfolio" href="#"><img src="<?php echo URLROOT; ?>/img/scroll-icon.png" alt=""></a>
                </div>
            </div>
        </div>
        <video autoplay="" loop="" muted>
            <source src="<?php echo URLROOT; ?>/introvideo.mp4" type="video/mp4" />
        </video>
    </div>
    <div class="container-fluid d-flex" id="homepagebox">
        <div class="col-md-4 col-sm-6" id="service1">
            <div class="portfolio-item">
                <a href="<?php echo URLROOT; ?>/img/big_portfolio_item_4.png" data-lightbox="image-1">
                    <div class="thumb">
                        <div class="hover-effect">
                            <div class="hover-content">
                                <h1>Business <em>Advertisement</em></h1>
                                <p>Awesome Subtittle Goes Here</p>
                            </div>
                        </div>
                        <div class="image" id="service1">
                            <img src="<?php echo URLROOT; ?>/img/portfolio_item_4.png">
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 col-sm-6" id="service2">
            <div class="portfolio-item">
                <a href="<?php echo URLROOT; ?>/img/big_portfolio_item_4.png" data-lightbox="image-2">
                    <div class="thumb">
                        <div class="hover-effect">
                            <div class="hover-content">
                                <h1>Wedding <em>Video</em></h1>
                                <p>Awesome Subtittle Goes Here</p>
                            </div>
                        </div>
                        <div class="image" id="service1">
                            <img src="<?php echo URLROOT; ?>/img/portfolio_item_4.png">
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 col-sm-6" id="service3">
            <div class="portfolio-item">
                <a href="<?php echo URLROOT; ?>/img/big_portfolio_item_4.png" data-lightbox="image-3">
                    <div class="thumb">
                        <div class="hover-effect">
                            <div class="hover-content">
                                <h1>Music <em>Video</em></h1>
                                <p>Awesome Subtittle Goes Here</p>
                            </div>
                        </div>
                        <div class="image" id="service1">
                            <img src="<?php echo URLROOT; ?>/img/portfolio_item_4.png">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <?php require APPROOT . '/views/includes/footer.php'; ?>