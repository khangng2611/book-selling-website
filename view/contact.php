<?php
  require_once("./view/header.php");
?>
<div class="site-section">
      <div class="container">
        
        <div class="row">
          <div class="col-lg-6 mb-5 " style="margin-top:10px" >
            <h1 class="heading-39291">Thông tin trao đổi</h1>
            <form action="#" method="GET">
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" class="form-control" name="hoCustom" placeholder="Họ">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="tenCustom" placeholder="Tên">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" name="emailCustom" placeholder="Địa chỉ email">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <input type="number" class="form-control" name="phoneCustom" placeholder="Số điện thoại">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <textarea  class="form-control" name="txtCustom" placeholder="Thông điệp của bạn là ?" cols="30" rows="10"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6 mr-auto">
                  <input type="submit" name="orderCustom" class="btn btn-block btn-primary text-white py-3 px-5 rounded-0" value="Gửi email">
                </div>
              </div>
            </form>

          </div>
          <div class="col-lg-6 ml-auto">
            <div class="bg-white p-3 p-md-5">
              <h3 class="heading-39291">Thông tin liên hệ</h3>
              <ul class="list-unstyled footer-link">
                <li class="d-block mb-3">
                  <span class="d-block text-black small text-uppercase font-weight-bold">Trụ sở văn phòng: </span>
                  <span>Trường Đại học Bách khoa - ĐHQG TP.HCM</span></li>
                <li class="d-block mb-3"><span class="d-block text-black small text-uppercase font-weight-bold">Điện thoại</span><span> (632)8-8888-627</span></li>
                <li class="d-block mb-3"><span class="d-block text-black small text-uppercase font-weight-bold">Email</span><span>nationalbookstore@gmail.com</span></li>
              </ul>
              <div id="map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16604.93946768123!2d106.79402436586555!3d10.872463120013757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d914866b51c9%3A0x913146948e01ee20!2zVHLGsOG7nW5nIMSR4bqhaSBo4buNYyBCw6FjaCBLaG9h!5e0!3m2!1sen!2s!4v1635314675431!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
  require_once("./view/footer.php");
?>