<?php session_start();
$_SESSION['ord_name'] = $_POST['ord_name'];
$_SESSION['org_name'] = $_POST['org_name'];
$_SESSION['ord_date'] = $_POST['ord_date'];
?>
<html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../views/order/style.css">
    <title>Добавить печь</title>
</head>
<body>
<?
echo $priceForWorks['prepar_painting']; ?>
<a href="/">Список заказов</a>
<h1>Добавить печь +</h1>
<form id="test" method="POST">
    <label for="ord_name">Наименование</label>
    <input id="ord_name" type="text" name="ord_name" value="<?php
    echo $_SESSION['ord_name'];
    ?>">
    <label for="org_name">Организация</label>
    <input id="org_name" type="text" name="org_name" value="<?php echo $_SESSION['org_name'] ?>">
    <label for="ord_date">Дата</label>
    <input id="ord_date" type="date" name="ord_date" value="<?php //echo date("d-m-Y")  ?>">
    <label for="prod_color">Цвет</label>
    <input type="text" name="prod_color">
    <label for="diff_work_id">Сложность работ</label>
    <input type="radio" name="diff_work_id" value="1.5" onclick="diffEasy()">
    <input type="radio" name="diff_work_id" value="1.6" onclick="diffMedium()">
    <input type="radio" name="diff_work_id" value="1.8" onclick="diffHard()">

    <input id="diff_work_id1" type="hidden" name="diff_work_id1" value="1.5" onclick="diffEasy()">
    <input id="diff_work_id2" type="hidden" name="diff_work_id2" value="1.6" onclick="diffMedium()">
    <input id="diff_work_id3" type="hidden" name="diff_work_id3" value="1.8" onclick="diffHard()">

    <label for="end_price">Цена</label>
    <input type="text" name="end_price">

    <div class="infoProd">
        <div class="services">
            <h2>Доп.услуги</h2>
            <?php
            foreach ($ordInformation as $dopService) {
                echo '<div class="service"><label for="add_services_id">' . $dopService['cervices_name'] . '</label><input multiple  type="checkbox" name="add_services_id[]" value="' . $dopService['cervices_name'] . '"></div>';
            }
            ?>
        </div>
        <div class="figureType">
            <h2>Тип фигуры</h2>
            <?php
            foreach ($ordInformationFigure as $figure_type) {
                echo '<input  name="figure_type_id"  onclick="check' . $figure_type['figure_id'] . '()" id="figureType' . $figure_type['figure_id'] . '" type="radio" value="' . $figure_type['figure_id'] . '">' . $figure_type['fig_name'];
            }
            ?>
        </div>

        <label for="prod_name">Назвиние продукта</label>
        <input type="text" name="prod_name">

        <label for="prod_count">кол-во</label>
        <input type="text" name="prod_count">

        <label class="diametor" for="diametor">диаметр</label>
        <input id="diametor" type="text" name="prod_diametor" value="0">

        <label for="prod_length">длина</label>
        <input id="length" type="text" name="prod_length">

        <label class="prod_width" for="prod_width">Ширина</label>
        <input id="width" type="text" name="prod_width" value="0">

        <label class="count_value" for="">Кол-во сторон окраса</label>
        <input id="count_value" type="text" name="count_value" value="">

        <div class="layers">
            <label for="">Толщина слоя</label>

            <label for="diff_100">100</label>
            <input type="radio" name="diff_100" onclick="calcDiff_100()">

            <label for="diff_100">70</label>
            <input type="radio" name="diff_70" onclick="calcDiff_70()">

            <label for="side_count">Слой 1</label>
            <input id="eoruLayer1" type="text" name="euro_paint_price">
            <input id="euroCourslayer1" type="text" name="euro_course">
            <input id="layer1Price" type="hidden" name="layer1Price" value="">

            <label for="side_count">Слой 2</label>
            <input id="eoruLayer2" type="text" name="euro_paint_price">
            <input id="euroCoursLayer2" type="text" name="euro_course">
            <input id="layer2Price" type="hidden" name="layer2Price" value="">

            <label for="side_count">Слой 3</label>
            <input id="eoruLayer3" type="text" name="euro_paint_price">
            <input id="euroCoursLayer3" type="text" name="euro_course">
            <input id="layer3Price" type="hidden" name="layer3Price" value="">

            <label for="side_count">Слой 4</label>
            <input id="eoruLayer4" type="text" name="euro_paint_price">
            <input id="euroCoursLayer4" type="text" name="euro_course">
            <input id="layer4Price" type="hidden" name="layer4Price" value="">

            <label for="side_count">Слой 5</label>
            <input id="eoruLayer5" type="text" name="euro_paint_price">
            <input id="euroCoursLayer5" type="text" name="euro_course">
            <input id="layer5Price" type="hidden" name="layer5Price" value="">
        </div>


    </div>


    <input id="powder_dens" type="hidden" name="powder_dens"
           value="<?php foreach ($ordInformationsDifferent as $diff) {
               echo $diff['powder_dens'];
           } ?>">
    <input id="powder_cons" type="hidden" name="powder_cons_100"
           value="<?php foreach ($ordInformationsDifferent as $diff) {
               echo $diff['powder_cons_100'];
           } ?>">
    <input id="prod_one_price" type="hidden" name="prod_one_price" value="" onclick="calcAllPowder()">
    <input id="paint_one_prod" type="hidden" name="paint_one_prod" value="">
    <input id="diff" type="hidden" name="diff_work">
    <input id="S" type="hidden" name="prod_space" value="">
    <input id="prepar_painting" type="hidden" name="prepar_painting"
           value="<?php foreach ($priceForWorks as $works) {
               echo $works['prepar_painting'];
           } ?>">
    <input id="paint_prod" type="hidden" name="paint_prod"
           value="<?php foreach ($priceForWorks as $works) {
               echo $works['paint_prod'];
           } ?>">
    <input id="in_out_prod" type="hidden" name="in_out_prod"
           value="<?php foreach ($priceForWorks as $works) {
               echo $works['in_out_prod'];
           } ?>">
    <input id="pac_prod" type="hidden" name="pac_prod"
           value="<?php foreach ($priceForWorks as $works) {
               echo $works['pac_prod'];
           } ?>">
    <input id="rail_count" type="hidden" name="rail_count"
           value="<?php foreach ($priceForWorks as $works) {
               echo $works['rail_count'];
           } ?>">
    <input id="count_prod_in_one_rail" type="hidden" name="count_prod_in_one_rail"
           value="<?php foreach ($priceForWorks as $works) {
               echo $works['count_prod_in_one_rail'];
           } ?>">
    <input id="min_work_price" type="hidden" name="min_work_price"
           value="<?php foreach ($priceForWorks as $works) {
               echo $works['min_work_price'];
           } ?>">
    <input id="cost_for_15_metr_pack" type="hidden" name="cost_for_15_metr_pack"
           value="<?php foreach ($priceForWorks as $works) {
               echo $works['cost_for_15_metr_pack'];
           } ?>">
    <input id="max_pod" type="hidden" name="max_pod"
           value="<?php foreach ($priceForWorks as $works) {
               echo $works['max_pod'];
           } ?>">
    <input id="energy_need" type="hidden" name="energy_need"
           value="<?php foreach ($priceForWorks as $works) {
               echo $works['energy_need'];
           } ?>">
    <input id="time_furnauce_work" type="hidden" name="time_furnauce_work"
           value="<?php foreach ($priceForWorks as $works) {
               echo $works['time_furnauce_work'];
           } ?>">
    <input id="end_price" type="hidden" name="end_price" value="">
    <div class="formButtons">
        <button name="orderReset" onclick="resetForm()">Очистить</button>
        <button type="submit" name="order">Добавить</button>
    </div>

</form>


<script src="../../script/calculate.js"></script>
<script src="../../script/resetForm.js"></script>
</body>
</html>