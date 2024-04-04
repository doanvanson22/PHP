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
        <h1 class="mt-5">Đơn hàng của bạn</h1>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Ghi chú</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $orderId => $orderInfo) : ?>
                <tr>
                    <td><?php echo $orderInfo['Id']; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $orderInfo['Phone']; ?></td>
                    <td><?php echo $orderInfo['Email']; ?></td>
                    <td><?php echo $orderInfo['Date']; ?></td>
                    <td><?php echo $orderInfo['Address']; ?></td>
                    <td><?php echo $orderInfo['note']; ?></td>
                    <td><?php echo number_format($orderInfo['ToTal'], 0, ',', '.'); ?> đ</td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>



</body>


</html>
<?php
include_once 'app/views/share/footer.php'
?>