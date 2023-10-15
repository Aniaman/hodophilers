<section class="home-slider-section">
  <div class="home-slider">

    <?php
    if (isset($slidersDetails) && !empty($slidersDetails)) {
      foreach ($slidersDetails as $key => $sliderValue) { ?>
        <div class="home-banner-items">
          <div class="banner-inner-wrap" style="background-image: url(<?= base_url(); ?>assets/images/<?= $sliderValue['images'] ?>);"></div>
          <div class="banner-content-wrap">
            <div class="container">
              <div class="banner-content text-center">
                <h2 class="banner-title"><?= !empty($sliderValue['heading']) ? $sliderValue['heading'] : ""  ?></h2>
                <p><?= !empty($sliderValue['subHeading']) ? $sliderValue['subHeading'] : ""  ?></p>

              </div>
            </div>
          </div>
          <div class="overlay"></div>
        </div>
    <?php }
    }
    ?>



  </div>
</section>
<!-- slider html start -->
<!-- Home search field html start -->
<div class="trip-search-section shape-search-section" style="background-image: url(<?= base_url(); ?>assets/images/slider-pattern.png);">
  <div class="slider-shape" style="background-image: url(<?= base_url(); ?>assets/images/slider-pattern.png);"></div>
  <div class="container">
    <div class="trip-search-inner white-bg d-flex">
      <div class="input-group">
        <label> Search Destination* </label>
        <input type="text" name="s" placeholder="Enter Destination">
      </div>
      <div class="input-group">
        <label> Pax Number* </label>
        <input type="text" name="s" placeholder="No.of People">
      </div>
      <div class="input-group width-col-3">
        <label> Checkin Date* </label>
        <i class="far fa-calendar"></i>
        <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
      </div>
      <div class="input-group width-col-3">
        <label> Checkout Date* </label>
        <i class="far fa-calendar"></i>
        <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
      </div>
      <div class="input-group width-col-3">
        <label class="screen-reader-text"> Search </label>
        <input type="submit" name="travel-search" value="INQUIRE NOW">
      </div>
    </div>
  </div>
</div>
<section class="destination-section">
  <div class="container">
    <div class="section-heading">
      <div class="row align-items-end">
        <div class="col-lg-7">
          <h5 class="dash-style">POPULAR DESTINATION</h5>
          <h2>TOP NOTCH DESTINATION</h2>
        </div>
        <div class="col-lg-5">
          <div class="section-disc">
            Aperiam sociosqu urna praesent, tristique, corrupti condimentum asperiores platea ipsum ad arcu. Nostrud. Aut nostrum, ornare quas provident laoreet nesciunt.
          </div>
        </div>
      </div>
    </div>
    <?php


    ?>
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
      <div class="btn-wrap text-center">
        <a href="#" class="button-primary">MORE DESTINATION</a>
      </div>
    </div>
  </div>
</section>
<section class="package-section">
  <div class="container">
    <div class="section-heading text-center">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <h5 class="dash-style">EXPLORE GREAT PLACES</h5>
          <h2>POPULAR PACKAGES</h2>
          <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit, blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum magnis maxime curae placeat.</p>
        </div>
      </div>
    </div>
    <div class="package-inner">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="package-wrap">
            <figure class="feature-image">
              <a href="#">
                <img src="assets/images/img5.jpg" alt="">
              </a>
            </figure>
            <div class="package-price">
              <h6>
                <span>$1,900 </span> / per person
              </h6>
            </div>
            <div class="package-content-wrap">
              <div class="package-meta text-center">
                <ul>
                  <li>
                    <i class="far fa-clock"></i>
                    7D/6N
                  </li>
                  <li>
                    <i class="fas fa-user-friends"></i>
                    People: 5
                  </li>
                  <li>
                    <i class="fas fa-map-marker-alt"></i>
                    Malaysia
                  </li>
                </ul>
              </div>
              <div class="package-content">
                <h3>
                  <a href="#">Sunset view of beautiful lakeside resident</a>
                </h3>
                <div class="review-area">
                  <span class="review-text">(25 reviews)</span>
                  <div class="rating-start" title="Rated 5 out of 5">
                    <span style="width: 60%"></span>
                  </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit luctus nec ullam. Ut elit tellus, luctus nec ullam elit tellpus.</p>
                <div class="btn-wrap">
                  <a href="#" class="button-text width-6">Book Now<i class="fas fa-arrow-right"></i></a>
                  <a href="#" class="button-text width-6">Wish List<i class="far fa-heart"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="package-wrap">
            <figure class="feature-image">
              <a href="#">
                <img src="assets/images/img6.jpg" alt="">
              </a>
            </figure>
            <div class="package-price">
              <h6>
                <span>$1,230 </span> / per person
              </h6>
            </div>
            <div class="package-content-wrap">
              <div class="package-meta text-center">
                <ul>
                  <li>
                    <i class="far fa-clock"></i>
                    5D/4N
                  </li>
                  <li>
                    <i class="fas fa-user-friends"></i>
                    People: 8
                  </li>
                  <li>
                    <i class="fas fa-map-marker-alt"></i>
                    Canada
                  </li>
                </ul>
              </div>
              <div class="package-content">
                <h3>
                  <a href="#">Experience the natural beauty of island</a>
                </h3>
                <div class="review-area">
                  <span class="review-text">(17 reviews)</span>
                  <div class="rating-start" title="Rated 5 out of 5">
                    <span style="width: 100%"></span>
                  </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit luctus nec ullam. Ut elit tellus, luctus nec ullam elit tellpus.</p>
                <div class="btn-wrap">
                  <a href="#" class="button-text width-6">Book Now<i class="fas fa-arrow-right"></i></a>
                  <a href="#" class="button-text width-6">Wish List<i class="far fa-heart"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="package-wrap">
            <figure class="feature-image">
              <a href="#">
                <img src="assets/images/img7.jpg" alt="">
              </a>
            </figure>
            <div class="package-price">
              <h6>
                <span>$2,000 </span> / per person
              </h6>
            </div>
            <div class="package-content-wrap">
              <div class="package-meta text-center">
                <ul>
                  <li>
                    <i class="far fa-clock"></i>
                    6D/5N
                  </li>
                  <li>
                    <i class="fas fa-user-friends"></i>
                    People: 6
                  </li>
                  <li>
                    <i class="fas fa-map-marker-alt"></i>
                    Portugal
                  </li>
                </ul>
              </div>
              <div class="package-content">
                <h3>
                  <a href="#">Vacation to the water city of Portugal</a>
                </h3>
                <div class="review-area">
                  <span class="review-text">(22 reviews)</span>
                  <div class="rating-start" title="Rated 5 out of 5">
                    <span style="width: 80%"></span>
                  </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit luctus nec ullam. Ut elit tellus, luctus nec ullam elit tellpus.</p>
                <div class="btn-wrap">
                  <a href="#" class="button-text width-6">Book Now<i class="fas fa-arrow-right"></i></a>
                  <a href="#" class="button-text width-6">Wish List<i class="far fa-heart"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-wrap text-center">
        <a href="#" class="button-primary">VIEW ALL PACKAGES</a>
      </div>
    </div>
  </div>
</section>