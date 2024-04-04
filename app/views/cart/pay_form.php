<?php
include_once 'app/views/share/header.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin thanh toán</title>
    <!-- Sử dụng Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Sử dụng thư viện jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="">
            <h1 class="mt-5">Đơn hàng của bạn</h1>

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

                            <?php echo $productInfo['quantity']; ?>
                        </td>
                        <td><?php echo number_format($productInfo['price'], 0, ',', '.'); ?> đ</td>
                        <td><?php echo  number_format($productInfo['quantity'] * $productInfo['price'], 0, ',', '.'); ?>
                            đ
                        </td>

                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

            <p class="mt-3">Tổng số lượng sản phẩm: <?php echo count($cartItems); ?></p>
            <p>Tổng tiền: <?php echo number_format($totalPrice, 0, ',', '.'); ?> đ</p>

            <?php if (isset($_SESSION['username'])) : ?>
            <!-- Nếu đã đăng nhập, hiển thị nút thanh toán -->
            <a hidden href="/buoi4php/shoppingcart/checkout" class="btn btn-success"></a>
            <?php else : ?>
            <!-- Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập -->
            <a hidden href="/buoi4php/account/login" class="btn btn-primary"></a>
            <?php endif; ?>

            <a hidden href="/buoi4php/" class="btn btn-primary"></a>
            <?php endif; ?>
        </div>
        <h1 class="mt-5">Thông tin thanh toán</h1>
        <p>Xin chào, <?php echo isset($_SESSION['accountId']) ? $_SESSION['accountId'] : 'Khách'; ?>!</p>
        <form id="checkoutForm">
            <div class="mb-3">
                <label for="name" class="form-label">Họ tên</label>
                <input type="text" class="form-control" id="name" name="name" disabled
                    value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Ghi chú</label>
                <input type="text-area" class="form-control" id="note" name="note">
            </div>

            <button type="submit" class="btn btn-primary">Thanh toán</button>
        </form>
    </div>

    <script>
    // Xử lý sự kiện gửi biểu mẫu bằng AJAX
    $(document).ready(function() {
        $('#checkoutForm').submit(function(event) {
            // Ngăn chặn hành động mặc định của biểu mẫu
            event.preventDefault();

            // Thu thập dữ liệu từ biểu mẫu
            var formData = $(this).serialize();

            // Gửi yêu cầu POST bằng AJAX
            $.ajax({
                type: 'POST',
                url: '/buoi4php/shoppingcart/checkout', // Đường dẫn tới trang xử lý thanh toán
                data: formData,
                success: function(response) {
                    // Xử lý phản hồi từ máy chủ nếu cần
                    alert('Thanh toán thành công rồi nè hehehehe!');
                    // Chuyển hướng hoặc làm gì đó sau khi thanh toán thành công
                    window.location.href = '/buoi4php/';
                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi nếu có
                    alert('Đã xảy ra lỗi khi thanh toán: ' + error);
                }
            });
        });
    });
    </script>
</body>

</html>
<?php
include_once 'app/views/share/footer.php'
?>