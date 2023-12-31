<!doctype html>
<html lang="en">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php $ci = new CI_Controller();
  $ci =& get_instance();
  $ci->load->helper('url');
  $ci->load->model('General_model', 'gm');
  $contactDetails = $ci->gm->fetch_single_data('contactdetails', array());
  ?>
      <!-- favicon -->
      <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/images/favicon.png">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/bootstrap/css/bootstrap.min.css" media="all">
      <!-- Fonts Awesome CSS -->
      <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendors/fontawesome/css/all.min.css">
      <!-- jquery-ui css -->
      <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendors/jquery-ui/jquery-ui.min.css">
      <!-- modal video css -->
      <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendors/modal-video/modal-video.min.css">
      <!-- light box css -->
      <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendors/lightbox/dist/css/lightbox.min.css">
      <!-- slick slider css -->
      <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendors/slick/slick.css">
      <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendors/slick/slick-theme.css">
      <!-- google fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&amp;family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&amp;display=swap" rel="stylesheet">
      <!-- Custom CSS -->
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">
      <title>Travele | Travel & Tour HTML5 template </title>
   </head>
   <body>
      <div id="siteLoader" class="site-loader">
         <div class="preloader-content">
            <img src="<?= base_url(); ?>assets/images/loader1.gif" alt="">
         </div>
      </div>
      <div id="page" class="full-page">
	  <header id="masthead" class="site-header header-primary">
  <!-- header html start -->
  <div class="top-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 d-none d-lg-block">
          <div class="header-contact-info">
            <ul>
              <li>
                <a href="tel:<?= $contactDetails['companyContact'] ?>"><i class="fas fa-phone-alt"></i><?= $contactDetails['companyContact'] ?> </a>
              </li>
              <li>
                <a href="mailto:<?= $contactDetails['companyEmail']; ?>"><i class="fas fa-envelope"></i><?= $contactDetails['companyEmail']; ?> </a>
              </li>
              <li>
                <i class="fas fa-map-marker-alt"></i> <?= $contactDetails['companyAddress']; ?>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 d-flex justify-content-lg-end justify-content-between">
          <div class="header-social social-links">
            <ul>
              <li><a href="<?= $contactDetails['facebookLink']; ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
              <li><a href="<?= $contactDetails['twitterLink']; ?>"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="<?= $contactDetails['instagramLink']; ?>"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
              <li><a href="<?= $contactDetails['linkedinLink']; ?>"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
              <li><a href="<?= $contactDetails['youtubeLink']; ?>"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bottom-header">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="site-identity mt-2 mb-2">
        <a href="<?= base_url(); ?>">
          <img class="white-logo" src="admin_assets/assets/images/<?= $contactDetails['companyLogo']; ?>" alt="logo">
          <img class="black-logo" src="admin_assets/assets/images/<?= $contactDetails['companyLogo']; ?>" alt="logo">
        </a>
      </div>
      <div class="main-navigation d-none d-lg-block">
        <nav id="navigation" class="navigation">
          <ul>
            <li>
              <a href="<?= base_url(); ?>">Home</a>
            </li>
            <li>
              <a href="<?= base_url('about-us') ?>">About</a>

            </li>
            <li>
              <a href="<?= base_url('destination') ?>">Destination</a>

            </li>
            <li>
              <a href="single-page.html">Package</a>

            </li>
            <li>
              <a href="#">Contact</a>

            </li>
            <li>
              <a href="#">Sign in</a>
            </li>
            <li>
              <a href="#">Sign up</a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="header-btn">
        <a href="#" class="button-primary">BOOK NOW</a>
      </div>
    </div>
  </div>
  <div class="mobile-menu-container"></div>
</header>
         <main id="content" class="site-main">
            <div class="no-content-section 404-page" style="background-image: url(<?= base_url(); ?>assets/images/404-img.jpg);">
               <div class="container">
                  <div class="no-content-wrap">
                     <span>404</span>
                     <h1>Oops! That page can't be found</h1>
                     <h4>It looks like nothing was found at this location. Maybe try one of the links below or a search?</h4>
                     <div class="search-form-wrap">
                        <form class="search-form">
                           <input type="text" name="search" placeholder="Search...">
                           <button class="search-btn"><i class="fas fa-search"></i></button>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="overlay"></div>
            </div>
         </main>
         <footer id="colophon" class="site-footer footer-primary">
            <div class="top-footer">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-3 col-md-6">
                        <aside class="widget widget_text">
                           <h3 class="widget-title">
                              About Travel
                           </h3>
                           <div class="textwidget widget-text">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                           </div>
                           <div class="award-img">
                              <a href="#"><img src="<?= base_url(); ?>assets/images/logo6.png" alt=""></a>
                              <a href="#"><img src="<?= base_url(); ?>assets/images/logo2.png" alt=""></a>
                           </div>
                        </aside>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <aside class="widget widget_text">
                           <h3 class="widget-title">CONTACT INFORMATION</h3>
                           <div class="textwidget widget-text">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                              <ul>
                                 <li>
                                    <a href="#">
                                       <i class="fas fa-phone-alt"></i>
                                       +01 (977) 2599 12
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#">
                                       <i class="fas fa-envelope"></i>
                                       <span class="__cf_email__" data-cfemail="0c6f63617c6d62754c6863616d6562226f6361">[email&#160;protected]</span>
                                    </a>
                                 </li>
                                 <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    3146  Koontz, California
                                 </li>
                              </ul>
                           </div>
                        </aside>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <aside class="widget widget_recent_post">
                           <h3 class="widget-title">Latest Post</h3>
                           <ul>
                              <li>
                                 <h5>
                                    <a href="#">Life is a beautiful journey not a destination</a>
                                 </h5>
                                 <div class="entry-meta">
                                    <span class="post-on">
                                       <a href="#">August 17, 2021</a>
                                    </span>
                                    <span class="comments-link">
                                       <a href="#">No Comments</a>
                                    </span>
                                 </div>
                              </li>
                              <li>
                                 <h5>
                                    <a href="#">Take only memories, leave only footprints</a>
                                 </h5>
                                 <div class="entry-meta">
                                    <span class="post-on">
                                       <a href="#">August 17, 2021</a>
                                    </span>
                                    <span class="comments-link">
                                       <a href="#">No Comments</a>
                                    </span>
                                 </div>
                              </li>
                           </ul>
                        </aside>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <aside class="widget widget_newslatter">
                           <h3 class="widget-title">SUBSCRIBE US</h3>
                           <div class="widget-text">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                           </div>
                           <form class="newslatter-form">
                              <input type="email" name="s" placeholder="Your Email..">
                              <input type="submit" name="s" value="SUBSCRIBE NOW">
                           </form>
                        </aside>
                     </div>
                  </div>
               </div>
            </div>
            <div class="buttom-footer">
               <div class="container">
                  <div class="row align-items-center">
                     <div class="col-md-5">
                        <div class="footer-menu">
                           <ul>
                              <li>
                                 <a href="#">Privacy Policy</a>
                              </li>
                              <li>
                                 <a href="#">Term & Condition</a>
                              </li>
                              <li>
                                 <a href="#">FAQ</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="col-md-2 text-center">
                        <div class="footer-logo">
                           <a href="#"><img src="<?= base_url(); ?>assets/images/travele-logo.png" alt=""></a>
                        </div>
                     </div>
                     <div class="col-md-5">
                        <div class="copy-right text-right">Copyright © 2021 Travele. All rights reserveds</div>
                     </div>
                  </div>
               </div>
            </div>
         </footer>
         <a id="backTotop" href="#" class="to-top-icon">
            <i class="fas fa-chevron-up"></i>
         </a>
         <!-- custom search field html -->
            <div class="header-search-form">
               <div class="container">
                  <div class="header-search-container">
                     <form class="search-form" role="search" method="get" >
                        <input type="text" name="s" placeholder="Enter your text...">
                     </form>
                     <a href="#" class="search-close">
                        <i class="fas fa-times"></i>
                     </a>
                  </div>
               </div>
            </div>
         <!-- header html end -->
      </div>

      <!-- JavaScript -->
      <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="<?= base_url(); ?>assets/js/jquery.js"></script>
      <script src="../../../cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
      <script src="<?= base_url(); ?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
      <script src="<?= base_url(); ?>assets/vendors/jquery-ui/jquery-ui.min.js"></script>
      <script src="<?= base_url(); ?>assets/vendors/countdown-date-loop-counter/loopcounter.js"></script>
      <script src="<?= base_url(); ?>assets/js/jquery.counterup.js"></script>
      <script src="<?= base_url(); ?>assets/vendors/modal-video/jquery-modal-video.min.js"></script>
      <script src="<?= base_url(); ?>assets/vendors/masonry/masonry.pkgd.min.js"></script>
      <script src="<?= base_url(); ?>assets/vendors/lightbox/dist/js/lightbox.min.js"></script>
      <script src="<?= base_url(); ?>assets/vendors/slick/slick.min.js"></script>
      <script src="<?= base_url(); ?>assets/js/jquery.slicknav.js"></script>
      <script src="<?= base_url(); ?>assets/js/custom.min.js"></script>
   <script>(function(){var js = "window['__CF$cv$params']={r:'80e2a4ae1b480d81',t:'MTY5NTk3MzkxMC43ODQwMDA='};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../../cdn-cgi/challenge-platform/h/g/scripts/jsd/dffb14d6/main.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";var _0xh = document.createElement('iframe');_0xh.height = 1;_0xh.width = 1;_0xh.style.position = 'absolute';_0xh.style.top = 0;_0xh.style.left = 0;_0xh.style.border = 'none';_0xh.style.visibility = 'hidden';document.body.appendChild(_0xh);function handler() {var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;if (_0xi) {var _0xj = _0xi.createElement('script');_0xj.innerHTML = js;_0xi.getElementsByTagName('head')[0].appendChild(_0xj);}}if (document.readyState !== 'loading') {handler();} else if (window.addEventListener) {document.addEventListener('DOMContentLoaded', handler);} else {var prev = document.onreadystatechange || function () {};document.onreadystatechange = function (e) {prev(e);if (document.readyState !== 'loading') {document.onreadystatechange = prev;handler();}};}})();</script></body>
</html>