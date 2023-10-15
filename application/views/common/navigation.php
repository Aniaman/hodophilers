<header id="masthead" class="site-header header-primary">
  <!-- header html start -->
  <div class="top-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 d-none d-lg-block">
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
        <div class="col-lg-4 d-flex justify-content-lg-end justify-content-between">
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
              <a href="index.html">Home</a>
            </li>
            <li>
              <a href="#">About</a>

            </li>
            <li>
              <a href="#">Destination</a>

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