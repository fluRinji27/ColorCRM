<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../views/orderCatalog/style.css">
    <title>Document</title>
</head>
<body>
<div class="wrapper">
    <a href="/order">Добавить печь</a>
    <?php
    for ($i = 0; $i < count($orderList); $i++): ?>
        <div class="order">
            <?php if ($i > count($orderList)) {
                $i--;
            } ?>
            <?php if ($orderList[$i]['ord_name'] == $orderList[$i + 1]['ord_name']) : ?>
                <div class="orderHeader">

                    <h2>Номер заказа: <?php echo $orderList[$i]['ord_name'] ?></h2>
                    <h2>Организация: <?php echo $orderList[$i]['org_name'] ?></h2>
                    <h2>Дата: <?php echo $orderList[$i]['ord_date'] ?></h2>
                </div>
            <?php endif; ?>
            <div class="orderMain">
                <div class="info">
                    <p>Наименование продукта: </p>
                    <span><?php echo $orderList[$i]['prod_name'] ?></span>
                </div>
                <div class="info"></div>
                <p>Цвет: <span><?php echo $orderList[$i]['prod_color'] ?></span></p>
                <div class="info"></div>
                <p>Тип фигуры: <span><?php if ($orderList[$i]['figure_type_id'] == 1) {
                            echo 'Пластина';;
                        } elseif ($orderList[$i]['figure_type_id'] == 2) {
                            echo 'Цилиндр';
                        } ?></span></p>
                <div class="info"></div>
                <p>Длинна: <span><?php echo $orderList[$i]['prod_length'] ?>м</span></p>
                <div class="info"></div>
                <p><?php if (!$orderList[$i]['prod_width'] == 0) {
                        echo 'Ширина: <span>' . $orderList[$i]['prod_width'] . 'м</span>';
                    } elseif (!$orderList[$i]['prod_diametor'] == 0) {
                        echo 'Диаметор: <span>' . $orderList[$i]['prod_diametor'] . 'м</span>';
                    } ?></p>
                <div class="info"></div>
                <p>площадь изделия: <?php echo $orderList[$i]['prod_space'] ?> м<sub>2</sub></p>
                <div class="info">
                    <p>Кол-во: </p><span><?php echo $orderList[$i]['prod_count'] . 'шт' ?></span>
                </div>


                <div class="info"><p>Дополнительные услуги: </p>
                    <span><?php echo $orderList[$i]['add_services_id'] ?></span>
                </div>

                <div class="info">
                    <p>Стоимость за единицу:</p><span><?php echo $orderList[$i]['end_price'] ?> руб</sub></span>
                </div>


            </div>
        </div>

    <?php
    endfor; ?>
</div>

<style>

</style>
</body>
</html>