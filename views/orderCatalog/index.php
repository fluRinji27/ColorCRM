<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="wrapper">
    <?php foreach ($orderList as $order): ?>
        <div class="order">
            <div class="orderHeader">
                <h2>Номер заказа: <?php echo $order['ord_name'] ?></h2>
                <h2>Организация: <?php echo $order['org_name'] ?></h2>
                <h2>Дата: <?php echo $order['ord_date'] ?></h2>
            </div>
            <div class="orderMain">
                <p>Наименование продукта: <span><?php echo $order['prod_name'] ?></span></p>
                <p>Цвет: <span><?php echo $order['prod_color'] ?></span></p>
                <p>Тип фигуры: <span><?php if ($order['figure_type_id'] == 1) {
                            echo 'Пластина';;
                        } elseif ($order['figure_type_id'] == 2) {
                            echo 'Цилиндр';
                        } ?></span></p>
                <p>Длинна: <span><?php echo $order['prod_length'] ?>м</span></p>
                <p><?php if (!$order['prod_width'] == 0) {
                        echo 'Ширина: <span>' . $order['prod_width'] . 'м</span>';
                    } elseif (!$order['prod_diametor'] == 0) {
                        echo 'Диаметор: <span>' . $order['prod_diametor'] . 'м</span>';
                    } ?></p>

                <p>Дополнительные услуги: <?php echo $order['add_services_id'] ?></p>

            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>