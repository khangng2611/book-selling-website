<?php
  require_once("./view/header.php");
?>

<div class="container-fluid rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <?php require_once('profileSidebar.php'); ?>
        </div>
        <div class="col-md-9 border-right">
            <!-- Form Add -->
            <div class="modal fade" id="create_book" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tạo sản phẩm mới</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/book/add" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label> Tựa sách </label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Tác giả </label>
                                    <input type="text" name="author" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Chủ đề </label>
                                    <input type="text" name="theme" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Nhà xuất bản </label>
                                    <input type="text" name="publisher" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Ngày xuất bản </label>
                                    <input type="text" name="publish_date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Giá </label>
                                    <input type="text" name="price" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Số lượng kho </label>
                                    <input type="text" name="amount" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Mô tả sách </label>
                                    <input type="text" name="book_description" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="img">Chọn hình ảnh sách</label>
                                    <div><input type="file" id="img_add" name="img" accept="image/png, image/jpeg, image/pjpeg , image/gif" ></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" name="insertdata" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>   
          
            <!-- Table list of user -->
            <div class="user_container">
                <div class="row">
                <h1 class="py-4 fst-italic">Quản lí sách</h1>
                </div>

                <a type="button" class="btn btn-primary py-2" data-toggle="modal" data-target="#create_book">
                Thêm sách mới
                </a>
                <table class="table table-hover mt-3" id="table_data" style="table-layout: fixed; white-space: nowrap;">
                <thead class="table-dark">
                    <tr class="text-center">
                    <th scope="col" style="width:50%">Tựa sách</th>
                    <th scope="col" style="width:10%">Danh mục</th>
                    <th scope="col" style="width:10%">Giá</th>
                    <th scope="col" style="width:10%">Tồn kho</th>
                    <th scope="col" style="width:10%">Edit</th>
                    <th scope="col" style="width:10%">Delete</th>                
                    </tr>
                </thead>
                <tbody>
                <?php  
                    foreach ($data['allBook'] as $row) {
                        echo "<tr><td>".
                        $row["title"]."</td><td>".
                        $row["theme"]."</td><td class='text-center'>".
                        $row["price"]."</td><td class='text-center'>".
                        $row["amount"]."</td>";
                ?>                            
                <td class="text-center">
                    <form action="/book/show" method="POST">
                    <input name='id' style="display:none;" value=<?php echo $row["id"]; ?>></input>
                    <button type='submit' name='show' class="btn btn-warning editbtn"  >Edit</button>
                    </form>
                </td>  
                <td class="text-center"> 
                    <form action="/book/delete" method="POST">
                    <input name='id' style="display:none;" value=<?php echo $row["id"]; ?>></input>
                    <button type='submit' name="delete" class="btn btn-danger deletebtn">Delete</button>
                    </form>
                </td>
                <?php
                    }
                ?>
            </tbody>
            </table>
            </div>

        <?php
        if (isset($_SESSION['bookEdit'])) {
        ?>

        <div id='editBox' class="col-md-9 border-right">
        <form action="/book/edit" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Cập nhật thông tin sách</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">ID Sách</label>
                        <input type="text" class="form-control" value="<?php echo $_SESSION['bookEdit']['id'] ?>"name="id" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Tựa sách</label>
                        <input type="text" class="form-control" value="<?php echo $_SESSION['bookEdit']['title'] ?>" name="title">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Tên tác giả</label>
                        <input type="text" class="form-control" value="<?php echo $_SESSION['bookEdit']['author'] ?>"name="author">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Chủ đề</label>
                        <input type="text" class="form-control" value="<?php echo $_SESSION['bookEdit']['theme'] ?>"name="theme">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Nhà xuất bản</label>
                        <input type="text" class="form-control" value="<?php echo $_SESSION['bookEdit']['publisher'] ?>" name="publisher" >
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Ngày xuất bản</label>
                        <input type="text" class="form-control" value="<?php echo $_SESSION['bookEdit']['publish_date'] ?>" name="publish_date" >
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Giá thành</label>
                        <input type="number" class="form-control" value="<?php echo $_SESSION['bookEdit']['price'] ?>" name="price">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Số lượng tồn kho</label>
                        <input type="number" class="form-control" value="<?php echo $_SESSION['bookEdit']['amount'] ?>" name="amount">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Mô tả sách</label>
                        <input type="text" class="form-control" value="<?php echo $_SESSION['bookEdit']['book_description'] ?>" name="book_description">
                    </div>
                    <div class="col-md-12">
                        <label for="img">Chọn hình ảnh sách</label>
                        <div><input type="file" id="img" name="img" accept="image/png, image/jpeg, image/pjpeg , image/gif" ></div>
                   </div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="edit">Lưu thay đổi</button></div>
                </form>
        </div>
        <?php
            }
        ?>
        </div>
    </div>
</div>

<?php
  require_once("./view/footer.php");
?>




