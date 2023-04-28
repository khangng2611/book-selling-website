<?php
  require_once("./view/header.php");
?>
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" stl style="margin-bottom: 50px;">
  <div class="carousel-inner" height = 90%>
    <div class="carousel-item active" data-bs-interval="2000">
      <img src="../asset/img/banner3.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="../asset/img/banner2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../asset/img/banner1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../asset/img/banner4.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container">
  <h1>Best Seller</h1>
  <div class="container text-center my-5" data-aos="fade-up">
    <div class="row align-items-start">
    <?php 
        foreach ($data['top3Book'] as $book) {
          $id = $book['id'];
          $img = $book['img'];
          $title = $book['title'];
          echo <<< _END
            <div class="col-md-4">
              <div class="thumbnail">
                <a href="/book/getDetail?id=$id" style="text-decoration:none;">
                  <img src="$img" alt="Lights" style="width:250px; margin-bottom:10px;"> 
                  <div class="caption"> <strong style="font-size: 18px; color:black;">$title</strong> </div>
                </a>
              </div>
            </div>
          _END;
        }
    ?>
    </div>
  </div>
</div>


<?php
  require_once("./view/footer.php");
?>