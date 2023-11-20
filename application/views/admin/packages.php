<div class="row mt-5">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-11">
            <h4 class="card-title">Tour Packages</h4>
          </div>
          <div class="col-md-1 align-right">

            <a href="<?= base_url('package-setup') ?>" type="button" class="btn btn-outline-primary btn-sm">
              <i class="fas fa-plus"></i> Add Packages
            </a>
          </div>
        </div>

        <?php if ($error = $this->session->flashdata('success')) { ?>
          <div class="alert alert-success alert-dismissible fade show border-0 b-round" role="alert">
            <?= $error;  ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>
        <?php if ($error = $this->session->flashdata('failed')) { ?>
          <div class="alert alert-danger alert-dismissible fade show border-0 b-round" role="alert">
            <?= $error;  ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>
      </div><!--end card-header-->
      <div class="card-body">

        <table id="datatable" class="table table-bordered dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <thead>
            <tr>
              <th>#</th>
              <th>Package Id</th>
              <th>Package Title</th>
              <th>Destination</th>
              <th>Price</th>
              <th>Discount</th>
              <th>Itinerary Title</th>
              <th>Popular Destination Status</th>
              <th>Status</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($package) && !empty($package)) {
              $i = 1;
              foreach ($package as $key => $value) { ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= !empty($value['packageId']) ? $value['packageId'] : "" ?></td>
                  <td><?= !empty($value['packageTitle']) ? $value['packageTitle'] : "" ?></td>
                  <td><?= !empty($value['destinationName']) ? $value['destinationName'] : "" ?></td>
                  <td><?= !empty($value['price']) ? $value['price'] : "" ?></td>
                  <td><?= !empty($value['discount']) ? $value['discount'] : "" ?></td>
                  <td><?= !empty($value['itineraryTitle']) ? $value['itineraryTitle'] : "" ?></td>
                  <td><?= !empty($value['popularDestination']) && $value['popularDestination'] == 1 ? '<span class="badge badge-soft-success">Enable</span>' : '<span class="badge badge-soft-danger">Disable</span>' ?></td>
                  <td><?= !empty($value['status']) && $value['status'] == 1 ? '<span class="badge badge-soft-success">Active</span>' : '<span class="badge badge-soft-danger">Deactive</span>' ?></td>
                  <td class="text-right">
                    <div class="dropdown d-inline-block">
                      <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="las la-ellipsis-v font-20 text-muted"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                        <a class="dropdown-item document_view" href="<?= base_url('package-view/') . $value['packageId'] ?>"><i data-feather="eye"></i> View</a>
                        <a class="dropdown-item document_view" href="<?= base_url('package-edit/') . $value['packageId'] ?>"><i data-feather="edit"></i> Edit</a>

                        <a class="dropdown-item" href="<?= base_url('delete-slider/') . $value['packageId'] ?>"><i data-feather="trash"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
            <?php }
            }
            ?>

          </tbody>
        </table>

      </div>
    </div>
  </div> <!-- end col -->
</div> <!-- end row -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  const chooseFile = document.getElementById("companyLogo");
  const imgPreview = document.getElementById("img-preview");
  chooseFile.addEventListener("change", function() {
    getImgData();
  });

  function getImgData() {
    const files = chooseFile.files[0];
    if (files) {
      const fileReader = new FileReader();
      fileReader.readAsDataURL(files);
      fileReader.addEventListener("load", function() {
        imgPreview.style.display = "block";
        imgPreview.innerHTML = '<img src="' + this.result + '" height= "250" width="200" />';
      });
    }
  }

  $(document).ready(function() {

    $('.document_view').click(function() {
      var sliderId = $(this).attr('sliderId');
      let i = 1;
      $.ajax({
        url: "<?php echo base_url(); ?>admin/sliderEdit",
        data: {
          'id': sliderId
        },
        method: 'GET',
        dataType: 'json',
        success: function(response) {
          console.log(response.data);
          if (response.data != "") {
            console.log(response);
            let paymentTermData = '';
            response.data.map((e) => {
              paymentTermData = paymentTermData + ` <div class="row mb-3">
          <div class="col-md-6">
            <div class="mb-4 row">
              <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Sliders Image</label>
              <div class="col-sm-8">
                <input type="file" class="form-control" name="sliderImage" id="companyLogo" placeholder="Select Destination Image">
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div id="img-preview"></div>
            <img src='<?= base_url() ?>admin_assets/assets/images/sliders/${e.images}' width="200" height ="200"/>
            <input type="hidden" value="${e.images}" name="images" >
            <input type="hidden" value="${e.sliderId}" name="sliderId" >

          </div>
        </div>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-2 form-label align-self-center mb-lg-0">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="heading" value="${e.heading}" id="horizontalInput1" placeholder="Enter Destination Name">
          </div>
          <?php echo form_error('heading', '<div class="error">', '</div>'); ?>
        </div>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-2 form-label align-self-center mb-lg-0">Sub title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="subHeading" value="${e.subHeading}" id="horizontalInput1" placeholder="Enter package Name">
          </div>
          <?php echo form_error('subHeading', '<div class="error">', '</div>'); ?>
        </div>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-2 form-label align-self-center mb-lg-0">Destination Status</label>
          <div class="col-sm-10">
            <select class="form-select" name="status" aria-label="Default select example">
              <option selected>${e.status == 1?'Active':'Deactive'}</option>
              <option value="1">Active</option>
              <option value="0">Deactive</option>
            </select>
          </div>
        </div>`;
              console.log(paymentTermData);
            });
            $('#customerDocument').html(paymentTermData);
          }
        }

      });
      document.getElementById('document-modal').setAttribute(`style`, `display:block`);
      document.getElementById('document-modal').classList.add('show')

    });
  });




  $(document).ready(function() {
    $('#document-close').click(function() {
      document.getElementById('document-modal').setAttribute(`style`, `display:none`);
      $('#customerDocument').html("");
    })
  });




  $(document).ready(function() {
    $('#document-closes').click(function() {
      document.getElementById('document-modal').setAttribute(`style`, `display:none`);
      $('#customerDocument').html("");
    })
  })
</script>