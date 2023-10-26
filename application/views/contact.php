 <!-- Inner Banner html start-->
 <section class="inner-banner-wrap">
               <div class="inner-baner-container" style="background-image: url(<?= base_url(); ?>assets/images/inner-banner.jpg);">
                  <div class="container">
                     <div class="inner-banner-content">
                        <h1 class="inner-title">Contact Us</h1>
                     </div>
                  </div>
               </div>
               <div class="inner-shape"style ="background-image: url(<?= base_url(); ?>assets/images/banner-pattern.png);"></div>
            </section>
            <!-- Inner Banner html end-->
            <!-- contact form html start -->
            <div class="contact-page-section">
               <div class="contact-form-inner">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="contact-from-wrap">
                              <div class="section-heading">
                                 <h5 class="dash-style">GET IN TOUCH</h5>
                                 <h2>CONTACT US TO GET MORE INFO</h2>
                                 <p>Aperiam sociosqu urna praesent, tristique, corrupti condimentum asperiores platea ipsum ad arcu. Nostrud. Esse? Aut nostrum, ornare quas provident laoreet nesciunt odio voluptates etiam, omnis.</p>
                              </div>
                              <form class="contact-from">
                                 <p>
                                    <input type="text" name="name" placeholder="Your Name*">
                                 </p>
                                 <p>
                                    <input type="email" name="email" placeholder="Your Email*">
                                 </p>
                                 <p>
                                    <textarea rows="8" placeholder="Your Message*"></textarea>
                                 </p>
                                 <p>
                                    <input type="submit" name="submit" value="SUBMIT MESSAGE">
                                 </p>
                              </form>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="contact-detail-wrap">
                              <h3>Need help ?? Feel free to contact us !</h3>
                              <p>Penatibus numquam? Non? Aliqua tempore est deserunt sequi itaque, nascetur, consequuntur conubianigp, explicabo? Primis convallis ullam. Egestas deserunt eius molestias app incididunt.</p>
                              <p>Nostra doloribus blandit et semper ultrices, quibusdam dignissimos! Netus recusandae, rerum cupidatat. Perferendis aptent wisi.</p>
                              <div class="details-list">
                                 <ul>
                                    <li>
                                       <span class="icon">
                                          <i class="fas fa-map-signs"></i>
                                       </span>
                                       <div class="details-content">
                                          <h4>Location Address</h4>
                                          <span><?=isset( $contactDetails) &&!empty($contactDetails['companyAddress']) ?$contactDetails['companyAddress']:""; ?></span>
                                       </div>
                                    </li>
                                    <li>
                                       <span class="icon">
                                          <i class="fas fa-envelope-open-text"></i>
                                       </span>
                                       <div class="details-content">
                                          <h4>Email Address</h4>
                                          <span><a href="mailto:<?=isset( $contactDetails) &&!empty($contactDetails['companyEmail']) ?$contactDetails['companyEmail']:""; ?>" class="__cf_email__" ><?=isset( $contactDetails) &&!empty($contactDetails['companyEmail']) ?$contactDetails['companyEmail']:""; ?></a></span>
                                       </div>
                                    </li>
                                    <li>
                                       <span class="icon">
                                          <i class="fas fa-phone-volume"></i>
                                       </span>
                                       <div class="details-content">
                                          <h4>Phone Number</h4>
                                          <span>Telephone: <?=isset( $contactDetails) &&!empty($contactDetails['companyContact']) ?$contactDetails['companyContact']:""; ?></span>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                              <div class="contct-social social-links">
                                 <h3>Follow us on social media..</h3>
                                 <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="map-section">
               <?=isset( $contactDetails) &&!empty($contactDetails['mapLink']) ?$contactDetails['mapLink']:""; ?>
               </div>
            </div>