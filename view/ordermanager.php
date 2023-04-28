<?php
  require_once("./view/header.php");
?>

<div class="container-fluid rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <?php require_once('profileSidebar.php'); ?>
        </div>
        <div class="col-md-9 border-right">
            <!-- Form Delete -->
            <div class="modal fade" id="deleteorder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xóa đơn hàng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/cart/deleteOrderAdmin" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="delete_id" id="delete_id">
                                <h4>Are you sure?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                <button type="submit" name="deletedata" class="btn btn-danger">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 

            <!-- Table list of user -->
            <div class="user_container">
                <div class="row">
                <h1 class="py-4 fst-italic">Quản lí đơn hàng</h1>
                </div>
                <table class="table table-hover mt-3" id="table_data" style="table-layout: fixed; white-space: nowrap;">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ID User</th>
                    <th scope="col">Username</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">ID Book</th>
                    <th scope="col">Title</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Bill</th>
                    <th scope="col">Order Time</th>
                    <th scope="col">Status</th>
                    <th scope="col">Delete</th>                
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data['allOrders'] as $row) {
                    ?>
                    <tr>
                    <td>
                        <?php echo $row['id'] ?>
                    </td>
                    <td>
                        <?php echo $row['id_user'] ?>
                    </td>
                    <td style="word-wrap: break-word; overflow: hidden; text-overflow: ellipsis">
                        <?php echo $row['username'] ?>
                    </td>
                    <td style="word-wrap: break-word; overflow: hidden; text-overflow: ellipsis">
                        <?php echo $row['phone'] ?>
                    </td>
                    <td style="word-wrap: break-word; overflow: hidden; text-overflow: ellipsis">
                        <?php echo $row['user_address'] ?>
                    </td>
                    <td style="word-wrap: break-word; overflow: hidden; text-overflow: ellipsis">
                        <?php echo $row['id_book'] ?>
                    </td>
                    <td style="word-wrap: break-word; overflow: hidden; text-overflow: ellipsis">
                        <?php echo $row['title'] ?>
                    </td>
                    <td style="word-wrap: break-word; overflow: hidden; text-overflow: ellipsis">
                        <?php echo $row['amount'] ?>
                    </td>
                    <td style="word-wrap: break-word; overflow: hidden; text-overflow: ellipsis">
                        <?php echo $row['bill'] ?>
                    </td>
                    <td style="word-wrap: break-word; overflow: hidden; text-overflow: ellipsis">
                        <?php echo $row['order_time'] ?>
                    </td>
                    <td style="word-wrap: break-word; overflow: hidden; text-overflow: ellipsis">
                        <?php echo $row['order_state'] ?>
                    </td>
                    <td> 
                        <a class="btn btn-danger deletebtn">Delete</a>
                    </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
  require_once("./view/header.php");
?>

        <script>
            // Table
            $(document).ready(function () {
                $('#table_data').DataTable();
            });
        </script>

        <script>
            // Delete
            $(document).ready(function () {
                $('.deletebtn').on('click', function () {
                $('#deleteorder').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#delete_id').val(data[0]);
                });
            });
        </script>
