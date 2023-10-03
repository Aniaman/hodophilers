<div class="container">
  <div class="row vh-100 d-flex justify-content-center">
    <div class="col-12 align-self-center">
      <div class="row">
        <div class="col-lg-5 mx-auto">
          <div class="card">
            <div class="card-body p-0 auth-header-box">
              <div class="text-center p-3">
                <a href="index.html" class="logo logo-admin">
                  <img src="assets/images/logo-sm-dark.png" height="50" alt="logo" class="auth-logo">
                </a>
                <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Let's Get Started Hodophillers</h4>
                <p class="text-muted  mb-0">Sign in to continue to Hodophillers.</p>
              </div>
            </div>
            <div class="card-body">
              <?= form_open('reset-password', 'class="form-horizontal auth-form"')  ?>
              <form class="form-horizontal auth-form" action="index.html">
                <div class="form-group mb-2">
                  <label class="form-label" for="username">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" name="password" id="email" placeholder="Enter your new password">
                  </div>
                  <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                </div><!--end form-group-->
                <div class="form-group mb-2">
                  <label class="form-label" for="username">Confirm Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" name="confirmPassword" id="email" placeholder="Enter confirm password">
                  </div>
                  <?php echo form_error('confirmPassword', '<div class="error">', '</div>'); ?>
                </div><!--end form-group-->

                <div class="form-group mb-0 row">
                  <div class="col-12 mt-2">
                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Reset <i class="fas fa-sign-in-alt ms-1"></i></button>
                  </div><!--end col-->
                </div> <!--end form-group-->
              </form><!--end form-->
              <p class="text-muted mb-0 mt-3">Remember It ? <a href="<?= base_url('admin-login'); ?>" class="text-primary ms-2">Sign in here</a></p>
            </div>
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
</div>