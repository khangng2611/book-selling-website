
<?php
  require_once("./view/header.php");
?>

    <!-- Body -->
<div class="container-fluid">
    <div class="row">
        <!-- Left -->
        <div class="flex-shrink-0 m-3 p-3 bg-light text-dark bg-opacity-50" style="width: calc(120px + 2.5%); box-sizing: border-box;">
        <a href="#" class="d-flex pb-4 mb-4 fs-4 fw-bold text-reset text-decoration-none border-bottom "> Danh mục </a>
        <ul class="list-unstyled ps-0">
            <li class="mb-3">
                <button class="btn btn-toggle rounded collapsed align-items-center fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#" aria-controls="" aria-expanded="true">Bán chạy</button>
            </li>
            <li class="mb-5">
                <button class="btn btn-toggle rounded collapsed align-items-center fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#typebook" aria-controls="typebook" aria-expanded="true">Thể loại</button>
                <div class="collapse" id="typebook">
                    <ul class="btn-toggle-nav list-unstyled pb-1 small">
                        <a href="/bookstore/book/truyentranh">Truyện tranh</a> <br>
                        <a href="">Kĩ năng sống</a> <br>
                        <a href="">Học thuật</a> <br>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

    <!-- Middle -->
    <section class="py-5 col-9">
        <div id="message">
          <p style='color: red'>   <?php echo $data['err'] ?? "" ?> </p>
        </div>
        <h5 class="bd-title">
            <ul class="breadcrumb">
                <li><a href="/bookstore/home" class="fs-4 p-2 text-decoration-none">Home</a> <span class="divider"> > </span></li>
                <li><a href="/bookstore/book" class="fs-4 p-2 text-decoration-none">Books</a> <span class="divider"> > </span> </li>
                <li class="active fs-4 px-2"><?php echo $data['data']['title']; ?></li>
            </ul>
        </h5>
        <div class="row">
            <!-- Images -->
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="row">
                <img class="p-1" id="product_img_top" src="<?php echo $data['data']['img']; ?>" alt="Product Image" height="500px;" style="object-fit: contain;"/><br>
                </div>
            </div>
            <!-- Info -->
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-2">
                <h3 class="p-2"> <?php echo $data['data']['title']; ?> </h3>
                <div class="d-flex justify-content-start">
                    <h4 class="p-2">
                        Price:
                        <span class="text-warning"><?php echo $data['data']['price']; ?> VND</span>
                    </h4>
                </div>
                <div class="p-2 d-flex justify-content-start">
                    <?php
                        if ($_SESSION['loginmessage'] != 'success') {
                            echo <<< _END
                                <button id="notlogin_buy" type="button" name="buy" class="mt-4 btn btn-outline-success">Buy Now</button>
                            <script>
                                $('#notlogin_buy').click(function(){
                                    $("#exampleModalCenter").modal('show');
                                });
                            </script>
                            _END;
                        }
                        else {
                    ?>
                        <form action="/bookstore/cart/add" method="POST">
                        <div class="col-md-12">
                            <label class="labels">Số lượng mua:</label>
                            <input type="number" name="book_id" style="display:none;" value = <?php echo $data['data']['id']; ?>></input>
                            <input type="number" class="form-control" value="1" name="amount" pattern="^[1-9]\d*$" required>
                            <button type="submit" name="buy" class="mt-4 btn btn-outline-success">Buy Now</button>
                        </div>
                        </form>
                        
                        <div class="d-flex justify-content-start mx-4 mb-2">
                        <?php
                            if (isset($data['msg'])) {
                                if ($data['msg'] == "Thêm vào giỏ hàng thành công !") {
                                    echo <<< _END
                                        <div style="color: green;"> Thêm vào giỏ hàng thành công !</div>
                                    _END;
                                } 
                                else if ($data['msg'] == "Thêm vào giỏ hàng không thành công !") {
                                    echo <<< _END
                                        <div style="color: red;"> Thêm vào giỏ hàng không thành công !</div>
                                    _END;
                                }
                            }
                        ?>
                        </div>

                    <?php
                        }
                    ?>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="px-lg-5 py-4 mt-2 row">
                    <h5 class="p-2 text-success">Description:</h5>
                    <p> <?php echo $data['data']['book_description']; ?> </p>
                </div>
            </div>
        </div>
    </section>

</div>

<?php
  require_once("./view/footer.php");
?>






