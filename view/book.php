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
                        <a href="#">Truyện tranh</a> <br>
                        <a href="#">Kĩ năng sống</a> <br>
                        <a href="#">Học thuật</a> <br>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
        <!-- Middle -->
        <section class="mx-3 py-2 col-9">
            <?php
                foreach ($data['bookSortedByTheme'] as $books) {
            ?>
            <h1 class="text-primary fw-semibold my-5"><?php echo $books[0]['theme'];?></h1> 
            <div class="container px-3 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-3 row-cols-md-3 row-cols-xl-4 justify-content-start">
                    <?php
                    foreach ($books as $book) {
                    ?>
                    <div class="col p-2">
                        <div class="card h-100">
                            <img class="card-img-top p-2" src="<?php echo $book['img']; ?>" alt="Top Products image" width="200px" />
                            <div class="card-body p-4 text-center">  
                                <h5 class="fw-semibold"> <?php echo $book['title']; ?> </h5>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center text-primary">
                                    <?php echo $book['price']; ?> VND
                                </div>
                                <div class="text-center p-1">
                                    <form action="/book/getDetail" method="GET">
                                        <button type='submit' class="btn btn-outline-primary" name = 'id' value = <?php echo $book['id'] ?>>Chi tiết sách</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php
                }
            ?>

            <div class="row justify-content-end my-5">
                <div class="col-3">
                    <nav aria-label="Page navigation example" id="paginatuion">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Trước</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Trang kế</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </div>
    </div>
    </div>

<?php
  require_once("./view/footer.php");
?>