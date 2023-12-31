<!-- Page-Title -->
<script src="//cdn.ckeditor.com/4.10.0/full-all/ckeditor.js"></script>
<div class="row">
  <div class="col-sm-12">
    <div class="page-title-box">
      <div class="row">
        <div class="col">
          <h4 class="page-title">Packages Creation</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('packages') ?>">Package</a></li>
            <li class="breadcrumb-item">Add Packages</li>

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
        <h4 class="card-title">Package Configuration</h4>
      </div>
      <div class="card-body">
        <?= form_open_multipart('package-generate')
        ?>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Package Id</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="packageId" value="<?= "HP" . strtotime(date("Y-m-d H:i:s")); ?>" id="horizontalInput1" readonly>
          </div>
          <?php echo form_error('packageTitle', '<div class="error">', '</div>'); ?>
        </div>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Package Title</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="packageTitle" placeholder="Enter Package Title" require>
          </div>
          <?php echo form_error('packageTitle', '<div class="error">', '</div>'); ?>
        </div>
        <!--end form-group-->
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Destination</label>
          <div class="col-sm-9">
            <select class="form-select" name="destination" id="destination" aria-label="Default select example">
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
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Main Image</label>
          <div class="col-sm-4">
            <input type="file" class="form-control" name="packageMainImage" id="mainImage">
          </div>
          <div class="col-sm-5" id="mainPreview"></div>
        </div>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Gallery</label>
          <div class="col-sm-4">
            <input type="file" class="form-control" name="packageGallery[]" multiple>
          </div>
          <div class="col-sm-5" id="galleryPreview"></div>
        </div>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Package Short Description</label>
          <div class="col-sm-9">
            <?php echo form_textarea(['type' => 'text', 'class' => 'form-control', 'name' => 'packageShortDescription']); ?>
          </div>
          <?php echo form_error('packageShortDescription', '<div class="error">', '</div>'); ?>
        </div>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Package Long Description</label>
          <div class="col-sm-9">
            <?php echo form_textarea(['type' => 'text', 'class' => 'form-control', 'name' => 'packageDescription']); ?>
          </div>
          <?php echo form_error('packageDescription', '<div class="error">', '</div>'); ?>
        </div>




        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Price</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="price" id="packageCost" placeholder="Enter Tour Total cost" require>
          </div>
          <?php echo form_error('price', '<div class="error">', '</div>'); ?>
        </div>

        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Discount (in %)</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="discount" id="packageDiscount" placeholder="Enter Discount %" require>

          </div>
          <?php echo form_error('discount', '<div class="error">', '</div>'); ?>
        </div>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Price After Discount</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="afterDiscountPrice" id="afterDiscountPrice" disabled>

          </div>
          <?php echo form_error('discount', '<div class="error">', '</div>'); ?>
        </div>


        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Popular Destination</label>
          <div class="col-sm-9">
            <select class="form-select" name="popularDestination" aria-label="Default select example">
              <option selected>Select Status</option>
              <option value="1">Enable</option>
              <option value="0">Disable</option>
            </select>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Package Status</label>
          <div class="col-sm-9">
            <select class="form-select" name="status" aria-label="Default select example">
              <option selected>Select Status</option>
              <option value="1">Active</option>
              <option value="0">Deactive</option>
            </select>
          </div>
        </div>
        <div class="mb-3 row">

          <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Itinerary</label>
          <div class="col-sm-6">
            <select class="select2 mb-3 select2-multiple form-control" name="itineraryTitle[]" multiple data-placeholder="Select Multiple Itinerary" id="tour-itinerary">
            </select>
          </div>
        </div>
        <div id="product_attr_box">
          <div id="attr_1">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3 row">
                  <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Vehicle</label>
                  <div class="col-sm-7">
                    <select class="form-select" name="vehicle[]" aria-label="Default select example">
                      <option selected>Select Vehicle Category</option>
                      <option value="SUV">SUV</option>
                      <option value="XUV">XUV</option>
                      <option value="Sedan">Sedan</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3 row">
                  <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Cost</label>
                  <div class="col-sm-7">
                    <input type="text" name="vehicleCost[]" class="form-control" placeholder="Enter vehicle Cost">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>




        <div class="col-md-2 mb-4">
          <button type="button" onclick="add_more_attr()" class="btn btn-outline-primary">Add More</button>
        </div>
        <div class="row mt-4 mb-4 d-flex justify-content-center">
          <div class="col-md-1">
            <button type="submit" class="btn btn-primary btn-md">Save</button>
          </div>
          <div class="col-md-1">
            <button type="reset" class="btn btn-danger btn-md">Reset</button>
          </div>
        </div>


        </form>
      </div>
    </div>
  </div>

  <script>
    const chooseFile = document.getElementById("mainImage");
    const imgPreview = document.getElementById("mainPreview");
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
          imgPreview.innerHTML = '<img src="' + this.result + '" height= "200" width="150" />';
        });
      }
    }


    var attr_count = 1;

    function add_more_attr() {
      attr_count++;
      // alert("Success");
      var html = `<div id="attr_${attr_count}">
      <div class="row">
              <div class="col-md-6">
                <div class="mb-3 row">
                  <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Vehicle</label>
                  <div class="col-sm-7">
                    <select class="form-select" name="vehicle[]" aria-label="Default select example">
                      <option selected>Select Vehicle Category</option>
                      <option value="SUV">SUV</option>
                      <option value="XUV">XUV</option>
                      <option value="Sedan">Sedan</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3 row">
                  <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Cost</label>
                  <div class="col-sm-7">
                    <input type="text" name="vehicleCost[]" class="form-control" placeholder="Enter vehicle Cost">
                  </div>
                </div>
              </div>
            </div>
        </div>`;
      jQuery('#product_attr_box').append(html);
    }

    function remove_attr(attr_count) {
      jQuery('#attr_' + attr_count).remove();
    }


    CKEDITOR.replace('packageDescription', {
      allowedContent: true,
      extraPlugins: 'wysiwygarea'
    });
    CKEDITOR.replace('packageShortDescription', {
      allowedContent: true,
      extraPlugins: 'wysiwygarea'
    });


    var package = document.querySelector('#packageDiscount');
    package.addEventListener("change", (event) => {
      var packageCost = document.getElementById('packageCost').value;
      var discountPercent = event.target.value;
      var discountValue = packageCost - (packageCost * (discountPercent / 100));
      console.log(`packagcost  = ${packageCost} , discount% = ${discountPercent}`);
      document.querySelector('#afterDiscountPrice').setAttribute('value', discountValue);
    })

    document.querySelector('#destination').addEventListener('change', (e) => {
      let destinationId = e.target.value;
      $.ajax({
        url: "<?php echo base_url(); ?>admin/getItineraryByDestination",
        data: {
          'id': destinationId
        },
        method: 'GET',
        dataType: 'json',
        success: function(response) {
          console.log(response.data);
          if (response.data != "") {
            console.log(response);
            let paymentTermData = ``;
            response.data.map((e) => {
              paymentTermData = paymentTermData + `<option value="${e.itinerary_id}">${e.itineraryTitle}</option>
                `;
            });
            $('#tour-itinerary').html(paymentTermData);
          }
        }

      });
    });
  </script>