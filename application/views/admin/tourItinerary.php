<div class="modal fade bd-example-modal-xl" id="exampleModalLarge" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title m-0" id="myLargeModalLabel">Add Destination</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div><!--end modal-header-->
      <div class="modal-body">
        <?= form_open_multipart('slider-setup'); ?>
        <div class="row mb-3">
          <div class="col-md-6">
            <div class="mb-3 row">
              <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Slider Image</label>
              <div class="col-sm-8">
                <input type="file" class="form-control" name="slidersImages" id="companyLogo" placeholder="Select Destination Image">
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div id="img-preview"></div>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-2 form-label align-self-center mb-lg-0">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="heading" value="" id="horizontalInput1" placeholder="Enter Title">
          </div>
          <?php echo form_error('heading', '<div class="error">', '</div>'); ?>
        </div>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-2 form-label align-self-center mb-lg-0">Sub Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="subHeading" value="" id="horizontalInput1" placeholder="Enter Sub Title">
          </div>
          <?php echo form_error('subHeading', '<div class="error">', '</div>'); ?>
        </div>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-2 form-label align-self-center mb-lg-0">Sliders Status</label>
          <div class="col-sm-10">
            <select class="form-select" name="status" aria-label="Default select example">
              <option selected>Select Status</option>
              <option value="1">Active</option>
              <option value="0">Deactive</option>
            </select>
          </div>
        </div>


      </div><!--end modal-body-->
      <div class="modal-footer">
        <button type="submit" class="btn btn-soft-primary btn-md">Save</button>
        <button type="button" class="btn btn-soft-secondary btn-md" data-bs-dismiss="modal">Close</button>
      </div><!--end modal-footer-->
      <?= form_close(); ?>
    </div><!--end modal-content-->
  </div><!--end modal-dialog-->
</div><!--end modal-->


<div class="modal fade bd-example-modal-xl" id="document-modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title m-0" id="myExtraLargeModalLabel">Destination Edit</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="document-closes" aria-label="Close"></button>
      </div><!--end modal-header-->
      <div class="modal-body">
        <?= form_open_multipart('slider-edit'); ?>
        <div id="customerDocument">

        </div>
      </div><!--end modal-body-->
      <div class="modal-footer">
        <button type="submit" class="btn btn-soft-primary btn-md">Save</button>
        <button type="button" class="btn btn-soft-secondary btn-md" id="document-close" data-bs-dismiss="modal">Close</button>
      </div><!--end modal-footer-->
      <?= form_close(); ?>
    </div><!--end modal-content-->
  </div><!--end modal-dialog-->
</div>

<div class="row mt-5">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-11">
            <h4 class="card-title">Tour Itinerary</h4>
          </div>
          <div class="col-md-1 align-right">

            <a href="<?= base_url('tour-itinerary-setup') ?>" type="button" class="btn btn-outline-primary btn-md">
              <i class="fas fa-plus"></i> Tour Itinerary
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
              <th>itinerary Id</th>
              <th>itinerary Name</th>
              <th>Destination</th>
              <th>Days</th>
              <th>Nights</th>
              <th>Status</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($tour) && !empty($tour)) {
              $i = 1;
              foreach ($tour as $key => $tourValue) { ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= !empty($tourValue['itinerary_id']) ? $tourValue['itinerary_id'] : ""; ?></td>
                  <td><?= !empty($tourValue['itineraryTitle']) ? $tourValue['itineraryTitle'] : ""; ?></td>
                  <td><?= !empty($tourValue['destinationName']) ? $tourValue['destinationName'] : ""; ?></td>
                  <td><?= !empty($tourValue['days']) ? $tourValue['days'] : ""; ?></td>
                  <td><?= !empty($tourValue['nights']) ? $tourValue['nights'] : ""; ?></td>
                  <td><?= !empty($tourValue['status']) && $tourValue['status'] == 1  ? '<span class="badge badge-soft-success">Enable</span>' : '<span class="badge badge-soft-danger">Disable</span>' ?></td>
                  <td class="text-right">
                    <div class="dropdown d-inline-block">
                      <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="las la-ellipsis-v font-20 text-muted"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                        <a class="dropdown-item document_view" sliderId="<?= $tourValue['itinerary_id']; ?>"><i data-feather="eye"></i> View</a>
                        <a class="dropdown-item document_view" sliderId="<?= $tourValue['itinerary_id']; ?>"><i data-feather="edit"></i> Edit</a>
                      </div>
                    </div>
                  </td>
                </tr>
            <?php  }
            }
            ?>

          </tbody>
        </table>

      </div>
    </div>
  </div> <!-- end col -->
</div> <!-- end row -->