<?php
  require_once("./view/header.php");
?>
<div id="shopping-cart">
<div class="txt-heading p-4" ><h3>Quản lí giỏ sách</h3></div>
<div class="d-flex justify-content-end">
  <?php
    if (!empty($_SESSION['cart'])) {
      echo <<< _END
        <form action="/cart/buy" method="POST">
        <button type="submit" name="getorder" class="btn btn-success mx-4 mb-2">Xác nhận mua sách</button>
        </form>
      _END;
    } else {
      echo <<< _END
      <a href="/book"><button type="button" class="btn btn-success mx-4 mb-2">Xác nhận mua sách</button></a>
      _END;
    }
  ?>
</div>
<div class="d-flex justify-content-end mx-4 mb-2" style="color: green;"><?php if (isset($data['msg']) && $data['msg'] == "Đã đặt sách thành công!") echo $data['msg']; ?></div>
<div class="d-flex justify-content-end mx-4 mb-2" style="color: red;"><?php if (isset($data['msg']) && $data['msg'] == "Số lượng sách tồn kho không đủ") echo $data['msg']; ?></div>



<?php
if(isset($_SESSION['cart'])){
    $total_quantity = 0;
    $total_price = 0;
?>	

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Tựa đề</th>
      <th scope="col">ID</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Thành tiền</th>
      <th scope="col">Bỏ chọn</th>
    </tr>
  </thead>
  <tbody>

<?php		
    foreach ($_SESSION['cart'] as $item){
        $item_price = $item['amount']*$item['price'];
		?>
				<tr>
				<td><img src="<?php echo $item["img"]; ?>" class="cart-item-image" style="margin-right:10px;"  width="100px;" /> <b><?php echo $item["book_title"]; ?></b></td>
				<td><?php echo $item["id"]; ?></td>
				<td style="text-align:right;"><?php echo $item["amount"]; ?></td>
				<td  style="text-align:right;"><?php echo $item["price"]." VND"; ?></td>
				<td  style="text-align:right;"><?php echo number_format($item_price,0)." VND"; ?></td>
				<td style="text-align:center;">
          <form action="/cart/remove" method="POST"> 
            <input type="number" name="book_id" id="book_id" value=<?php echo $item["id"]; ?> style="display:none;"></input>
            <button class="btn btn-danger" type="submit" name="remove">Xóa</button>
          </form>
        </td>
				</tr>
				<?php
				$total_quantity += $item["amount"];
				$total_price += ($item["price"]*$item["amount"]);
		}
		?>

<tr>
<td colspan="2" style="text-align:right">Tổng cộng:</td>
<td style="text-align:right"><?php echo $total_quantity; ?></td>
<td style="text-align:right" colspan="2"><strong><?php echo number_format($total_price,0)." VND"; ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="d-flex justify-content-center mx-4 mb-2" style="color: red;">Giỏ hàng đang trống</div>
<?php 
}
?>
</div>
<?php
  require_once("./view/footer.php");
?>