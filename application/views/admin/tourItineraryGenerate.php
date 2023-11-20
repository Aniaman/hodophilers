<!-- Page-Title -->
<script src="//cdn.ckeditor.com/4.10.0/full-all/ckeditor.js"></script>
<div class="row">
  <div class="col-sm-12">
    <div class="page-title-box">
      <div class="row">
        <div class="col">
          <h4 class="page-title">Tour Itinerary setup</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('tour-itinerary') ?>">Tour Itinerary</a></li>
            <li class="breadcrumb-item">Tour Itinerary Generate</li>

          </ol>
        </div><!--end col-->
      </div><!--end row-->
    </div><!--end page-title-box-->
  </div><!--end col-->
</div><!--end row-->
<!-- end page title end breadcrumb -->
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Tour Itinerary Generate</h4>
      </div>
      <div class="card-body">
        <?= form_open('package-save')
        ?>
        <div class="row">
          <div class="col-md-4">
            <div class="mb-3 row">
              <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Itinerary Id</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="itineraryId" value="<?= "HP" . strtotime(date("Y-m-d H:i:s")); ?>" id="horizontalInput1" readonly>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3 row">
              <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Itinerary Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="itineraryName" placeholder="Enter Itinerary Name like Days-Night Destination" id="horizontalInput1">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3 row">
              <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Destination</label>
              <div class="col-sm-9">
                <select class="form-select" name="destination" aria-label="Default select example">
                  <option selected>Select Destination</option>
                  <?php
                  if (isset($destination) && !empty($destination)) {
                    foreach ($destination as $key => $value) { ?>
                      <option value="<?= $value['destinationId'] ?>"><?= !empty($value['destinationName']) ? $value['destinationName'] : ""  ?></option>
                  <?php }
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3 row">
              <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">No Of Days</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="days" id="days" placeholder="Enter No of Days For Tours" required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3 row">
              <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">No of Night</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nights" id="night" placeholder="Enter No of Night For Tours" required>
              </div>
            </div>
          </div>
        </div>
        <hr>

        <div id="product_attr_box">
          <div id="attr_1">
            <div class="row">
              <h5>Day 1</h5>
              <div class="mb-3 row">
                <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Title</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="dayTitle[]" placeholder="Enter Title for Day Event">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Description</label>
                <div class="col-sm-7">
                  <textarea name="dayDescription[]" cols="5" rows="5" placeholder="Enter Description for Day Event" class="form-control"></textarea>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col-md-2 mb-4">
          <button type="button" onclick="add_more_days_attr()" class="btn btn-outline-primary">Add More</button>
        </div>
        <hr>
        <div id="hotel-container">
          <div id="hotel_attr_1">
            <div class="row">
              <div class="col-md-4">
                <div class="mb-3 row">
                  <label for="horizontalInput1" class="col-sm-4 form-label align-self-center mb-lg-0">Hotel Category</label>
                  <div class="col-sm-8">
                    <select class="form-select" onchange="getRoomType(this)" name="hotelCategory[]" aria-label="Default select example" id="hotel-type">
                      <option selected>Select Hotel category</option>
                      <?php
                      if (isset($hotel) && !empty($hotel)) {
                        foreach ($hotel as $key => $value) { ?>
                          <option value="<?= $value['hotelType'] ?>"><?= !empty($value['hotelType']) ? $value['hotelType'] : ""  ?></option>
                      <?php }
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class=" mb-3 row">
                  <label for="horizontalInput1" class="col-sm-4 form-label align-self-center mb-lg-0">Room Type</label>
                  <div class="col-sm-8">
                    <select class="form-select" name="roomType[]" aria-label="Default select example" id="room-type_1">
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3 row">
                  <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Price</label>
                  <div class="col-sm-8">
                    <input type="text" name="hotelCost[]" class="form-control" placeholder="Enter Hotel Cost" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2 mb-4">
          <button type="button" onclick="add_more_hotel_attr()" class="btn btn-outline-primary">Add More</button>
        </div>
        <div class="card-footer">
          <div class="col-md-10 mb-4 d-flex justify-content-center ">
            <button type="submit" class="btn btn-outline-success">Save Hotel Details</button>&nbsp;
            <button type="reset" class="btn btn-outline-danger">Clear Hotel Details</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var attr_count = 1;
  var attr_hotel_count = 1;

  function add_more_days_attr() {
    var days = document.getElementById('days').value;
    if (days == "") {
      Swal.fire(
        'Opppsss....',
        'First enter The days value',
        'error'
      );
    } else if (attr_count >= days) {
      Swal.fire(
        'oooppssss.....',
        'You cross the limit of number of days',
        'error'
      );
    } else {
      attr_count++;
      // alert("Success");
      var html = `<div id="attr_${attr_count}">
      <div class="row">
      <h5>Day ${attr_count}</h5>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Title</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="dayTitle[]"  placeholder="Enter Title for Day Event">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Description</label>
          <div class="col-sm-7">
          <textarea name="dayDescription[]" cols="5" rows="5" placeholder="Enter Description for Day Event" class="form-control"></textarea>
          </div>
        </div>
      </div>
    </div>`;
      jQuery('#product_attr_box').append(html);
    }
  }

  function remove_attr(attr_count) {
    jQuery('#attr_' + attr_count).remove();
  }

  function getRoomType(obj) {
    var hotelId = obj.value;
    $.ajax({
      url: "<?php echo base_url(); ?>admin/getRoomTypeData",
      data: {
        'hotelId': hotelId
      },
      method: 'GET',
      dataType: 'json',
      success: function(response) {
        if (response.data != "") {
          let paymentTermData = '<option selected>Select Room Type</option>';
          response.room.map((e) => {
            paymentTermData = paymentTermData + `<option value ="${e}">${e}</option> `;
          });
          $(`#room-type_${attr_hotel_count}`).html(paymentTermData);
        }
      }

    });
  }

  function add_more_hotel_attr() {
    attr_hotel_count++;
    var hotelHtml = `
<div id="hotel_attr_${attr_hotel_count}">
            <div class="row">
              <div class="col-md-4">
                <div class="mb-3 row">
                  <label for="horizontalInput1" class="col-sm-4 form-label align-self-center mb-lg-0">Hotel Category</label>
                  <div class="col-sm-8">
                    <select class="form-select hotel" onchange="getRoomType(this)" name="hotelCategory[]" aria-label="Default select example" id="hotel-type">
                      <option selected>Select Hotel category</option>
                      <?php
                      if (isset($hotel) && !empty($hotel)) {
                        foreach ($hotel as $key => $value) { ?>
                          <option value="<?= $value['hotelType'] ?>"><?= !empty($value['hotelType']) ? $value['hotelType'] : ""  ?></option>
                      <?php }
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class=" mb-3 row">
                  <label for="horizontalInput1" class="col-sm-4 form-label align-self-center mb-lg-0">Room Type</label>
                  <div class="col-sm-8">
                    <select class="form-select" name="roomType[]" aria-label="Default select example" id="room-type_${attr_hotel_count}">
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3 row">
                  <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Price</label>
                  <div class="col-sm-8">
                    <input type="text" name="hotelCost[]" class="form-control" placeholder="Enter Hotel Cost" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
`
    jQuery('#hotel-container').append(hotelHtml);
  }
</script>