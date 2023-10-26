<main id="content" class="site-main">
            <!-- Inner Banner html start-->
            <section class="inner-banner-wrap">
               <div class="inner-baner-container" style="background-image: url(<?= base_url(); ?>assets/images/inner-banner.jpg);">
                  <div class="container">
                     <div class="inner-banner-content">
                        <h1 class="inner-title">Destination</h1>
                     </div>
                  </div>
               </div>
               <div class="inner-shape"style ="background-image: url(<?= base_url(); ?>assets/images/banner-pattern.png);"></div>
            </section>
            <!-- Inner Banner html end-->
            <!-- destination field html end -->
            <section class="destination-section destination-page">
               <div class="container">
               <div class="destination-inner destination-three-column">
      <div class="row">
        <?php
        if (isset($destinationDetails) && !empty($destinationDetails)) {
          $i = 0;
        ?>
          <div class="col-lg-7">
            <div class="row">
              <?php
              foreach ($destinationDetails as $key => $destinationValue) {
                $i = $i + 1; ?>
                <div class="col-sm-6">
                  <div class="desti-item overlay-desti-item">
                    <figure class="desti-image">
                      <img src="<?= base_url(); ?>admin_assets/assets/images/destination/<?= $destinationValue['images'] ?>" alt="">
                    </figure>
                    <div class="meta-cat bg-meta-cat">
                      <a href="#"><?= !empty($destinationValue['destinationName']) ? $destinationValue['destinationName'] : ""  ?></a>
                    </div>
                    <div class="desti-content">
                      <h3>
                        <a href="#"><?= !empty($destinationValue['packageName']) ? $destinationValue['packageName'] : ""  ?></a>
                      </h3>
                      <div class="rating-start" title="Rated 5 out of 4">
                        <span style="width: 53%"></span>
                      </div>
                    </div>
                  </div>
                </div>
            <?php
                if ($i == 2)
                  break;
              }
            }
            ?>
            </div>
          </div>
          <?php
          if (isset($destinationDetails) && !empty($destinationDetails)) {

          ?>
            <div class="col-lg-5">
              <div class="row">
                <?php
                for ($j = 2; $j < sizeof($destinationDetails); $j++) {
                ?>
                  <div class="col-md-6 col-xl-12">
                    <div class="desti-item overlay-desti-item">
                      <figure class="desti-image">
                        <img src="<?= base_url(); ?>admin_assets/assets/images/destination/<?= $destinationDetails[$j]['images'] ?>" alt="">
                      </figure>
                      <div class="meta-cat bg-meta-cat">
                        <a href="#"><?= !empty($destinationDetails[$j]['destinationName']) ? $destinationDetails[$j]['destinationName'] : ""  ?></a>
                      </div>
                      <div class="desti-content">
                        <h3>
                          <a href="#"><?= !empty($destinationDetails[$j]['packageName']) ? $destinationDetails[$j]['packageName'] : ""  ?></a>
                        </h3>
                        <div class="rating-start" title="Rated 5 out of 5">
                          <span style="width: 100%"></span>
                        </div>
                      </div>
                    </div>
                  </div>
              <?php
                }
              }
              ?>
              </div>
            </div>
      </div>

    </div>
               </div>
            </section>
            <!-- destination section html start -->
            <!-- subscribe section html start -->
            <section class="subscribe-section" style="background-image: url(assets/images/img16.jpg);">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-7">
                        <div class="section-heading section-heading-white">
                           <h5 class="dash-style">HOLIDAY PACKAGE OFFER</h5>
                           <h2>HOLIDAY SPECIAL 25% OFF !</h2>
                           <h4>Sign up now to recieve hot special offers and information about the best tour packages, updates and discounts !!</h4>
                           <div class="newsletter-form">
                              <form>
                                 <input type="email" name="s" placeholder="Your Email Address">
                                 <input type="submit" name="signup" value="SIGN UP NOW!">
                              </form>
                           </div>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Eaque adipiscing, luctus eleifend temporibus occaecat luctus eleifend tempo ribus.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- subscribe html end -->
         </main>