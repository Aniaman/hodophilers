<!-- Log In page -->
<?php $this->load->helper('cookie'); ?>
<div class="container">
  <div class="row vh-100 d-flex justify-content-center">
    <div class="col-12 align-self-center">
      <div class="row">
        <div class="col-lg-5 mx-auto">
          <div class="card">
            <div class="card-body p-0 auth-header-box">
              <div class="text-center p-3">
                <a href="<?= base_url('admin-login') ?>" class="logo logo-admin">
                  <img src="<?= base_url('admin_assets/assets/images/2106778703.jpg') ?> " height="50" alt="logo" class="auth-logo">
                </a>
                <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Let's Get Started Hodophillers</h4>
                <p class="text-muted  mb-0">Sign in to continue to Hodophillers.</p>
              </div>
            </div>
            <div class="card-body p-0">
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active p-3" id="LogIn_Tab" role="tabpanel">
                  <?php if ($error = $this->session->flashdata('LoginFailed')) { ?>
                    <div class="alert alert-danger alert-dismissible fade show border-0 b-round" role="alert">
                      <?= $error;  ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php } ?>
                  <?= form_open('login', 'class="form-horizontal auth-form"') ?>

                  <div class="form-group mb-2">
                    <label class="form-label" for="username">Email Id</label>
                    <div class="input-group">
                      <input type="email" class="form-control" value="<?= get_cookie('rememberme[email]') ?>" name="emailId" placeholder="Enter your Email Id">
                    </div>
                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                  </div><!--end form-group-->

                  <div class="form-group mb-2">
                    <label class="form-label" for="userpassword">Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" name="password" value="<?= get_cookie('rememberme[password]') ?>" id="userpassword" placeholder="Enter password">
                    </div>
                    <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                  </div><!--end form-group-->

                  <div class="form-group row my-3">
                    <div class="col-sm-6">
                      <div class="custom-control custom-switch switch-success">
                        <input type="checkbox" name="remember" class="custom-control-input" id="customSwitchSuccess">
                        <label class="form-label text-muted" for="customSwitchSuccess">Remember me</label>
                      </div>
                    </div><!--end col-->
                    <div class="col-sm-6 text-end">
                      <a href="<?= base_url('forgot-password'); ?> " class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>
                    </div><!--end col-->
                  </div><!--end form-group-->

                  <div class="form-group mb-0 row">
                    <div class="col-12">
                      <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ms-1"></i></button>
                    </div><!--end col-->
                  </div> <!--end form-group-->
                  </form><!--end form-->

                </div>
              </div>
            </div><!--end card-body-->
            <div class="card-body bg-light-alt text-center">
              <span class="text-muted d-none d-sm-inline-block">Hodophillers © <script>
                  document.write(new Date().getFullYear())
                </script></span>
            </div>
          </div><!--end card-->
        </div><!--end col-->
      </div><!--end row-->
    </div><!--end col-->
  </div><!--end row-->
</div><!--end container-->
<!-- End Log In page -->