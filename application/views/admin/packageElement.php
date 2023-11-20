<div class="modal fade bd-example-modal-xl" id="hotel-modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title m-0" id="myExtraLargeModalLabel">Hotel Details</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="document-closes" aria-label="Close"></button>
      </div><!--end modal-header-->
      <div class="modal-body">
        <?= form_open('hotel-setup'); ?>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-2 form-label align-self-center mb-lg-0">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="hotelTitle" id="companyLogo" placeholder="Enter Hotel Title" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-2 form-label align-self-center mb-lg-0">Hotel Category</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="hotelType" id="horizontalInput1" placeholder="Enter Hotel Category" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-2 form-label align-self-center mb-lg-0">Room Category</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="roomCategory" id="horizontalInput1" placeholder="Enter Room Categories Separated By Commas" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-2 form-label align-self-center mb-lg-0">Status</label>
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
            <h4 class="card-title">Hotel Details</h4>
          </div>
          <div class="col-md-1 align-right">

            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#hotel-modal">
              <i class="fas fa-plus"></i>Hotel Details
            </button>
          </div>
        </div>

        <?php if ($error = $this->session->flashdata('hotelSuccess')) { ?>
          <div class="alert alert-success alert-dismissible fade show border-0 b-round" role="alert">
            <?= $error;  ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>
        <?php if ($error = $this->session->flashdata('hotelFailed')) { ?>
          <div class="alert alert-danger alert-dismissible fade show border-0 b-round" role="alert">
            <?= $error;  ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>
      </div><!--end card-header-->
      <div class="card-body">

        <table id="datatable" class="table dt-responsive nowrap" style="
                        border-collapse: collapse;
                        border-spacing: 0;
                        width: 100%;
                      ">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Hotel Type</th>
              <th>Room Category</th>
              <th>Status</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($hotelData) && !empty($hotelData)) {
              $i = 1;
              foreach ($hotelData as $key => $hotelValue) { ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $hotelValue['hotelTitle'] != "" ? $hotelValue['hotelTitle'] : ""; ?></td>
                  <td><?= $hotelValue['hotelType'] != "" ? $hotelValue['hotelType'] : ""; ?></td>
                  <td><?= $hotelValue['roomCategory'] != "" ? $hotelValue['roomCategory'] : ""; ?></td>
                  <td><?= $hotelValue['status'] != "" && $hotelValue['status'] == 1 ? '<span class="badge badge-soft-success">Enable</span>' : '<span class="badge badge-soft-danger">Disable</span>'; ?></td>
                  <td class="text-right">
                    <div class="dropdown d-inline-block">
                      <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="las la-ellipsis-v font-20 text-muted"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                        <a class="dropdown-item document_view" sliderId="<?= $hotelValue['hotel_id']; ?>"><i data-feather="edit"></i> Edit</a>
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