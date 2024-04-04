<?php
include_once 'app/views/share/header.php'
?>

<div class="row">

    <h5 class="card-title"><?= $product->name ?></h5>
    <img src="/buoi4php/<?= $product->image ?>" />
    <p class="card-text"><?= $product->description ?></p>
    <p class="card-text">Giá: <?= $product->price ?></p>

    <form action="/buoi4php/shoppingcart/addToCart" method="POST">
        <!-- Input ẩn chứa ID sản phẩm -->
        <input type="hidden" name="product_id" value="<?= $product->id ?>">
        <!-- Input ẩn chứa số lượng sản phẩm, nếu có -->
        <input type="hidden" name="quantity" value="1">
        <!-- Button để gửi form -->
        <button type="submit" class="btn btn-warning">Thêm vào giỏ hàng</button>
    </form>



    <a href="/buoi4php/product/edit/<?=$product->id ?>" class="btn btn-warning">Sửa</a>


</div>

<?php
include_once 'app/views/share/footer.php'
?>