<?php
// echo "<pre>";
// print_r($contactDetails);
// die;
?>
<style>
  #img-preview {
    display: none;
    width: 155px;
    border: 2px dashed #333;
    margin-bottom: 20px;
  }

  #img-preview img {
    width: 100%;
    height: auto;
    display: block;
  }
</style>
<div class="card mt-5">
  <div class="card-header">
    <h4 class="card-title">Website Details</h4>
  </div><!--end card-header-->
  <div class="card-body">
    <div class="general-label">
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
      <?= form_open_multipart('contact-setup'); ?>
      <div class="row mb-3">
        <div class="col-md-6">
          <div class="mb-3 row">
            <label for="horizontalInput1" class="col-sm-3 form-label align-self-center mb-lg-0">Company Logo</label>
            <div class="col-sm-8  ">
              <input type="file" class="form-control" name="companyLogo" id="companyLogo" placeholder="Select Company Logo">
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="img-preview">
            <img src="<?= base_url(); ?>/admin_assets/assets/images/<?= isset($contactDetails) && $contactDetails['companyLogo'] ? $contactDetails['companyLogo'] : "/admin_assets/assets/images/01.png"  ?>" alt="companyLogo" height="150" srcset="">
          </div>
        </div>
        <div class="col-md-3">
          <div id="img-preview"></div>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="horizontalInput1" class="col-sm-2 form-label align-self-center mb-lg-0">Helpline Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="helpLineEmail" value="<?= isset($contactDetails) && $contactDetails['helpLineEmail'] ? $contactDetails['helpLineEmail'] : ""  ?>" id="horizontalInput1" placeholder="Enter HelpLine Email">
        </div>
        <?php echo form_error('helpLineEmail', '<div class="error">', '</div>'); ?>
      </div>
      <div class="mb-3 row">
        <label for="horizontalInput1" class="col-sm-2 form-label align-self-center mb-lg-0">Company Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="companyEmail" value="<?= isset($contactDetails) && $contactDetails['companyEmail'] ? $contactDetails['companyEmail'] : ""  ?>" id="horizontalInput1" placeholder="Enter Company Email">
        </div>
        <?php echo form_error('companyEmail', '<div class="error">', '</div>'); ?>
      </div>

      <div class="mb-3 row">
        <label for="horizontalInput2" class="col-sm-2 form-label align-self-center mb-lg-0">Company Contact No.</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="companyContact" value="<?= isset($contactDetails) && $contactDetails['companyContact'] ? $contactDetails['companyContact'] : ""  ?>" id="horizontalInput2" placeholder="Enter Company Contact Number">
        </div>
        <?php echo form_error('companyContact', '<div class="error">', '</div>'); ?>
      </div>
      <div class="mb-3 row">
        <label for="horizontalInput2" class="col-sm-2 form-label align-self-center mb-lg-0">Helpline Contact No.</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="helplineContact" value="<?= isset($contactDetails) && $contactDetails['helplineContact'] ? $contactDetails['helplineContact'] : ""  ?>" id="horizontalInput2" placeholder="Enter Helpline Contact Number">
        </div>
        <?php echo form_error('helplineContact', '<div class="error">', '</div>'); ?>
      </div>
      <div class="mb-3 row">
        <label for="horizontalInput2" class="col-sm-2 form-label align-self-center mb-lg-0">Company Address.</label>
        <div class="col-sm-10">
          <textarea name="companyAddress" placeholder="Enter Company Address" class="form-control" id="" cols="5" rows="5"> <?= isset($contactDetails) && $contactDetails['companyAddress'] ? $contactDetails['companyAddress'] : ""  ?></textarea>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="horizontalInput2" class="col-sm-2 form-label align-self-center mb-lg-0">Embeded Map Link.</label>
        <div class="col-sm-10">
          <textarea name="mapLink" placeholder="Enter Company Embeded Map link" class="form-control" id="" cols="4" rows="4">
          <?= isset($contactDetails) && $contactDetails['mapLink'] ? $contactDetails['mapLink'] : ""  ?>
          </textarea>
        </div>
        <div>
          <?= isset($contactDetails) && $contactDetails['mapLink'] ? $contactDetails['mapLink'] : ""  ?>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="horizontalInput2" class="col-sm-2 form-label align-self-center mb-lg-0">Facebook Link.</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="facebookLink" value="<?= isset($contactDetails) && $contactDetails['facebookLink'] ? $contactDetails['facebookLink'] : ""  ?>" id="horizontalInput2" placeholder="Enter Facebook Link">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="horizontalInput2" class="col-sm-2 form-label align-self-center mb-lg-0">Instagram Link.</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="instagramLink" value="<?= isset($contactDetails) && $contactDetails['instagramLink'] ? $contactDetails['instagramLink'] : ""  ?>" id="horizontalInput2" placeholder="Enter instagram Link">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="horizontalInput2" class="col-sm-2 form-label align-self-center mb-lg-0">Twitter Link.</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="<?= isset($contactDetails) && $contactDetails['twitterLink'] ? $contactDetails['twitterLink'] : ""  ?>" name="twitterLink" id="horizontalInput2" placeholder="Enter Twitter Link">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="horizontalInput2" class="col-sm-2 form-label align-self-center mb-lg-0">Youtube Link.</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="youtubeLink" id="horizontalInput2" placeholder="Enter Youtube Link">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="horizontalInput2" class="col-sm-2 form-label align-self-center mb-lg-0">LinkedIn Link.</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="linkedinLink" id="horizontalInput2" placeholder="Enter LinkedIn Link">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-10 ms-auto">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-danger">Reset</button>
        </div>
      </div>
      </form>
    </div>
  </div><!--end card-body-->
</div><!--end card-->
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
        imgPreview.innerHTML = '<img src="' + this.result + '" />';
      });
    }
  }
</script>