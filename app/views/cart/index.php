<?php
include_once 'app/views/share/header.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <!-- Sử dụng Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Giỏ hàng của bạn</h1>

        <?php if (empty($cartItems)) : ?>
        <div class="alert alert-info mt-3" role="alert">
            Giỏ hàng của bạn đang trống.
            <a href="/buoi4php/" class="btn btn-primary btn-sm">Tìm kiếm sản phẩm đi nào </a>
        </div>
        <?php else : ?>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Tổng</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $productId => $productInfo) : ?>
                <tr>
                    <td><?php echo $productInfo['name']; ?></td>
                    <td>
                        <form method="post" action="/buoi4php/shoppingcart/updateCartItem">
                            <input type="hidden" name="productId" value="<?php echo $productId; ?>">
                            <button type="submit" name="quantity" value="-" class="btn btn-sm btn-danger">-</button>
                            <?php echo $productInfo['quantity']; ?>
                            <button type="submit" name="quantity" value="+" class="btn btn-sm btn-success">+</button>
                        </form>
                    </td>
                    <td><?php echo number_format($productInfo['price'], 0, ',', '.'); ?> đ</td>
                    <td><?php echo  number_format($productInfo['quantity'] * $productInfo['price'], 0, ',', '.'); ?> đ
                    </td>
                    <td>
                        <!-- Link để xóa sản phẩm khỏi giỏ hàng  -->
                        <a href="/buoi4php/shoppingcart/removeCartItem/<?php echo $productId; ?>"
                            class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

        <p class="mt-3">Tổng số lượng sản phẩm: <?php echo count($cartItems); ?></p>
        <p>Tổng tiền: <?php echo number_format($totalPrice, 0, ',', '.'); ?> đ</p>

        <?php if (isset($_SESSION['username'])) : ?>
        <!-- Nếu đã đăng nhập, hiển thị nút thanh toán -->
        <a href="/buoi4php/shoppingcart/checkout" class="btn btn-success">Thanh toán</a>
        <?php else : ?>
        <!-- Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập -->
        <a href="/buoi4php/account/login" class="btn btn-primary">Đăng nhập để thanh toán</a>
        <?php endif; ?>

        <a href="/buoi4php/" class="btn btn-primary">Tiếp tục mua sắm</a>
        <?php endif; ?>
    </div>



</body>


</html>
<?php
include_once 'app/views/share/footer.php'
?>