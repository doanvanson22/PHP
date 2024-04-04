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
        <h1 class="mt-5">Thông tin thanh toán</h1>
        <p>Xin chào, <?php echo isset($_SESSION['accountId']) ? $_SESSION['accountId'] : 'Khách'; ?>!</p>
        <form id="checkoutForm">
            <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
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
                    window.location.href = '/buoi4php/app/views/cart/success.php';
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