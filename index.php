<?php
    include('components/header.php');
?>
<section class="container">
<div class="slide-container my-3">
  <div class="image-container">
    <i class="fa-solid fa-circle-left prev"></i>
    <img src="images\IMG-20220315-WA0000.jpg" alt="">
    <i class="fa-solid fa-circle-right next"></i>
    <div class="dots">
      <span class="" data-index="1" data-toggle="images\IMG-20220315-WA0000.jpg"></span>
      <span class="" data-index="2" data-toggle="images\IMG-20220315-WA0001.jpg"></span>
      <span class="" data-index="3" data-toggle="images\IMG-20220315-WA0002.jpg"></span>
      <span class="" data-index="4" data-toggle="images\IMG-20220315-WA0003.jpg"></span>
      <span class="" data-index="5" data-toggle="images\IMG-20220315-WA0004.jpg"></span>
    </div>
  </div>
</div>
<div class="row my-3">
    <div class="col-md-6">
        <h1>BLOOD GROUPS</h1>
        <p>blood group of any human being will mainly fall in any one of the following groups.</p>
        <ul>
            <li>A positive or A negative</li>
            <li>B positive or B negative</li>
            <li>O positive or O negative</li>
            <li>AB positive or AB negative</li>
        </ul>
        <p>A healthy diet helps ensure a successful blood donation, and also makes you feel better! Check out the following recommended foods to eat prior to your donation.</p>
    </div>
    <div class="col-md-6">
        <img src="images/bloodDonor.jpg" alt="" class="img-fluid rounded">
    </div>
</div>
<div class="row">
  <div class="col-md-3">
    <a style="border: .1rem solid red;" href="/bloodBank/getDonorTwo.php?group=<?php echo urlencode("A+") ?>" class="btn btn-default w-100 my-3 blood-btn">A+</a>
  </div>
  <div class="col-md-3">
    <a style="border: .1rem solid red;" href="/bloodBank/getDonorTwo.php?group=A-" class="btn btn-default w-100 my-3 blood-btn">A-</a>
  </div>
  <div class="col-md-3">
    <a style="border: .1rem solid red;" href="/bloodBank/getDonorTwo.php?group=<?php echo urlencode("B+") ?>" class="btn btn-default w-100 my-3 blood-btn">B+</a>
  </div>
  <div class="col-md-3">
    <a style="border: .1rem solid red;" href="/bloodBank/getDonorTwo.php?group=B-" class="btn btn-default w-100 my-3 blood-btn">B-</a>
  </div>
  <div class="col-md-3">
    <a style="border: .1rem solid red;" href="/bloodBank/getDonorTwo.php?group=<?php echo urlencode("O+") ?>" class="btn btn-default w-100 my-3 blood-btn">O+</a>
  </div>
  <div class="col-md-3">
    <a style="border: .1rem solid red;" href="/bloodBank/getDonorTwo.php?group=O-" class="btn btn-default w-100 my-3 blood-btn">O-</a>
  </div>
  <div class="col-md-3">
    <a style="border: .1rem solid red;" href="/bloodBank/getDonorTwo.php?group=<?php echo urlencode("AB+") ?>" class="btn btn-default w-100 my-3 blood-btn">AB+</a>
  </div>
  <div class="col-md-3">
    <a style="border: .1rem solid red;" href="/bloodBank/getDonorTwo.php?group=AB-" class="btn btn-default w-100 my-3 blood-btn">AB-</a>
  </div>
</div>
</section>
<?php
    include('components/footer.php');
?>