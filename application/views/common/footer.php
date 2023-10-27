</main>
<footer id="colophon" class="site-footer footer-primary">
  <div class="top-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <aside class="widget widget_text">
            <h3 class="widget-title">
              About Hodophilers
            </h3>
            <div class="textwidget widget-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
            </div>
            <!-- <div class="award-img">
              <a href="#"><img src="<?= base_url(); ?>assets/images/logo6.png" alt=""></a>
              <a href="#"><img src="<?= base_url(); ?>assets/images/logo2.png" alt=""></a>
            </div> -->
          </aside>
        </div>
        <div class="col-lg-3 col-md-6">
          <aside class="widget widget_text">
            <h3 class="widget-title">CONTACT INFORMATION</h3>
            <div class="textwidget widget-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              <ul>
                <li>
                  <a href="tel:<?= isset($contactDetails) && !empty($contactDetails['companyContact']) ?$contactDetails['companyContact'] :"" ?>">
                    <i class="fas fa-phone-alt"></i>
                    <?=  isset($contactDetails) && !empty($contactDetails['companyContact']) ? "( +91 ) " . $contactDetails['companyContact'] :"" ?>
                  </a>
                </li>
                <li>
                <a href="mailto:<?= isset($contactDetails) && !empty($contactDetails['companyEmail'])? $contactDetails['companyEmail']:""; ?>"><i class="fas fa-envelope"></i><?= isset($contactDetails) && !empty($contactDetails['companyEmail'])? $contactDetails['companyEmail']:""; ?> </a>
                </li>
                <li>
                  <i class="fas fa-map-marker-alt"></i>
                  <?= isset($contactDetails) && !empty($contactDetails['companyAddress'])? $contactDetails['companyAddress'] : ""; ?>
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
            <a href="<?= base_url(); ?>"><img class="white-logo" src="admin_assets/assets/images/<?= $contactDetails['companyLogo']; ?>" width ="80" height="80" alt="logo"></a>
          </div>
        </div>
        <div class="col-md-5">
          <div class="copy-right text-right">Copyright © <script>document.write(/\d{4}/.exec(Date())[0])</script> Hodophilers. All rights reserveds</div>
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
      <form class="search-form" role="search" method="get">
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
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.js"></script>
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
<script>
  (function() {
    var js = "window['__CF$cv$params']={r:'80e2a444efec0db6',t:'MTY5NTk3Mzg5My45NzkwMDA='};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../../cdn-cgi/challenge-platform/h/g/scripts/jsd/dffb14d6/main.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";
    var _0xh = document.createElement('iframe');
    _0xh.height = 1;
    _0xh.width = 1;
    _0xh.style.position = 'absolute';
    _0xh.style.top = 0;
    _0xh.style.left = 0;
    _0xh.style.border = 'none';
    _0xh.style.visibility = 'hidden';
    document.body.appendChild(_0xh);

    function handler() {
      var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;
      if (_0xi) {
        var _0xj = _0xi.createElement('script');
        _0xj.innerHTML = js;
        _0xi.getElementsByTagName('head')[0].appendChild(_0xj);
      }
    }
    if (document.readyState !== 'loading') {
      handler();
    } else if (window.addEventListener) {
      document.addEventListener('DOMContentLoaded', handler);
    } else {
      var prev = document.onreadystatechange || function() {};
      document.onreadystatechange = function(e) {
        prev(e);
        if (document.readyState !== 'loading') {
          document.onreadystatechange = prev;
          handler();
        }
      };
    }
  })();
</script>
</body>

</html>