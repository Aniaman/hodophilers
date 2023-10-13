<!-- Left Sidenav -->
<div class="left-sidenav">
  <!-- LOGO -->
  <!--end logo-->
  <div class="menu-content h-100" data-simplebar>
    <ul class="metismenu left-sidenav-menu">
      <li>
        <a href="<?= base_url('admin-dashboard') ?>"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span></a>
      </li>
      <li>
        <a href="javascript: void(0);"><i data-feather="tool" class="align-self-center menu-icon"></i>Website Setup <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="nav-second-level" aria-expanded="false">
          <li><a href="<?= base_url('contact-setup') ?>"><i class="fas fa-address-book"></i>Contact Setup</a></li>
          <li><a href="<?= base_url('slider-setup') ?>"><i class="fas fa-sliders-h"></i>Slider Setup</a></li>
          <li><a href="<?= base_url('term-policy-setup') ?>"><i class="fas fa-file-contract"></i>Terms & Policy Setup</a></li>
        </ul>
      </li>
      <li>
        <a href="javascript: void(0);"><i data-feather="map-pin" class="align-self-center menu-icon"></i>Package <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="nav-second-level" aria-expanded="false">
          <li><a href="<?= base_url('destination-setup') ?>"><i class="fas fa-location-arrow"></i>Destination</a></li>
          <li><a href="<?= base_url('term-policy-setup') ?>"><i class="fas fa-file-contract"></i>Terms & Policy Setup</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
<!-- end left-sidenav-->
<div class="page-wrapper">
  <!-- Top Bar Start -->
  <div class="topbar">
    <!-- Navbar -->
    <nav class="navbar-custom">
      <ul class="list-unstyled topbar-nav float-end mb-0">


        <li class="dropdown notification-list">
          <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <i data-feather="bell" class="align-self-center topbar-icon"></i>
            <span class="badge bg-danger rounded-pill noti-icon-badge">2</span>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">

            <h6 class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
              Notifications <span class="badge bg-primary rounded-pill">2</span>
            </h6>
            <div class="notification-menu" data-simplebar>
              <!-- item-->
              <a href="#" class="dropdown-item py-3">
                <small class="float-end text-muted ps-2">2 min ago</small>
                <div class="media">
                  <div class="avatar-md bg-soft-primary">
                    <i data-feather="shopping-cart" class="align-self-center icon-xs"></i>
                  </div>
                  <div class="media-body align-self-center ms-2 text-truncate">
                    <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                    <small class="text-muted mb-0">Dummy text of the printing and industry.</small>
                  </div><!--end media-body-->
                </div><!--end media-->
              </a><!--end-item-->
              <!-- item-->
              <a href="#" class="dropdown-item py-3">
                <small class="float-end text-muted ps-2">10 min ago</small>
                <div class="media">
                  <div class="avatar-md bg-soft-primary">
                    <img src="assets/images/users/user-4.jpg" alt="" class="thumb-sm rounded-circle">
                  </div>
                  <div class="media-body align-self-center ms-2 text-truncate">
                    <h6 class="my-0 fw-normal text-dark">Meeting with designers</h6>
                    <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                  </div><!--end media-body-->
                </div><!--end media-->
              </a><!--end-item-->
              <!-- item-->
              <a href="#" class="dropdown-item py-3">
                <small class="float-end text-muted ps-2">40 min ago</small>
                <div class="media">
                  <div class="avatar-md bg-soft-primary">
                    <i data-feather="users" class="align-self-center icon-xs"></i>
                  </div>
                  <div class="media-body align-self-center ms-2 text-truncate">
                    <h6 class="my-0 fw-normal text-dark">UX 3 Task complete.</h6>
                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                  </div><!--end media-body-->
                </div><!--end media-->
              </a><!--end-item-->
              <!-- item-->
              <a href="#" class="dropdown-item py-3">
                <small class="float-end text-muted ps-2">1 hr ago</small>
                <div class="media">
                  <div class="avatar-md bg-soft-primary">
                    <img src="assets/images/users/user-5.jpg" alt="" class="thumb-sm rounded-circle">
                  </div>
                  <div class="media-body align-self-center ms-2 text-truncate">
                    <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                    <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                  </div><!--end media-body-->
                </div><!--end media-->
              </a><!--end-item-->
              <!-- item-->
              <a href="#" class="dropdown-item py-3">
                <small class="float-end text-muted ps-2">2 hrs ago</small>
                <div class="media">
                  <div class="avatar-md bg-soft-primary">
                    <i data-feather="check-circle" class="align-self-center icon-xs"></i>
                  </div>
                  <div class="media-body align-self-center ms-2 text-truncate">
                    <h6 class="my-0 fw-normal text-dark">Payment Successfull</h6>
                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                  </div><!--end media-body-->
                </div><!--end media-->
              </a><!--end-item-->
            </div>
            <!-- All-->
            <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
              View all <i class="fi-arrow-right"></i>
            </a>
          </div>
        </li>

        <li class="dropdown">
          <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <span class="ms-1 nav-user-name hidden-sm"><?= isset($this->session->userName) ? $this->session->userName : "User"; ?></span>
            <?php
            $image = isset($this->session->profileImg) != "" ? $this->session->profileImg : "user-5.jpg"

            ?>
            <img src="<?= base_url(); ?>admin_assets/assets/images/users/<?= $image; ?>" alt="profile-user" class="rounded-circle thumb-xs" />
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="#"><i data-feather="user" class="align-self-center icon-xs icon-dual me-1"></i> Profile</a>
            <div class="dropdown-divider mb-0"></div>
            <a class="dropdown-item" href="<?= base_url('admin-logout') ?>"><i data-feather="power" class="align-self-center icon-xs icon-dual me-1"></i> Logout</a>
          </div>
        </li>
      </ul><!--end topbar-nav-->

      <ul class="list-unstyled topbar-nav mb-0">
        <li>
          <button class="nav-link button-menu-mobile">
            <i data-feather="menu" class="align-self-center topbar-icon"></i>
          </button>
        </li>
      </ul>
    </nav>
    <!-- end navbar-->
  </div>
  <!-- Top Bar End -->

  <!-- Page Content-->
  <div class="page-content">
    <div class="container-fluid">