<?php
require(ROOT . '/models/Order.php');

class OrderController
{
    public function actionAddOrder()
    {
        $ordInformation = array();
        $ordInformationFigure = array();

        $priceForWorks = Order::getPriceForWork();
        $ordInformation = Order::getOrderInformationService();
        $ordInformationFigure = Order::getInformationFirgue();
        $ordInformationsDifferent = Order::getDifferentWork();


        if (isset($_POST['order'])) {
            $options['ord_name'] = $_POST['ord_name'];
            $options['ord_date'] = $_POST['ord_date'];
            $options['org_name'] = $_POST['org_name'];
            $options['prod_name'] = $_POST['prod_name'];
            $options['prod_color'] = $_POST['prod_color'];
            $options['prod_length'] = $_POST['prod_length'];
            $options['prod_width'] = $_POST['prod_width'];
            $options['prod_diametor'] = $_POST['prod_diametor'];
            $options['prod_space'] = Round($_POST['prod_space'], 4);
            $options['figure_type_id'] = $_POST['figure_type_id'];
            $options['paint_one_prod'] = Round($_POST['paint_one_prod'], 8);
            $options['prod_count'] = $_POST['prod_count'];
            $options['end_price'] = $_POST['end_price'];


            $errors = false;

            if (
                !isset($options['ord_name']) || empty($options['ord_name']) ||
                !isset($options['ord_date']) || empty($options['ord_date'])

            ) {
                $errors[] = "заполните поля";
                echo 'заполните поля';
            }
            if ($errors == false) {
//                $calc = Order::calculateOrder($options);
                $id = Order::addOrder($options);
            }


        }

        require_once(ROOT . '/views/order/index.php');

        return true;
    }

    public function actionAddDopServices()
    {
        if (isset($_POST['services_submit'])) {

            $options['services_name'] = $_POST['services_name'];
            $options['services_cost'] = $_POST['services_cost'];


            $errors = false;

            if (
                !isset($options['services_name']) || empty($options['services_name']) ||
                !isset($options['services_cost']) || empty($options['services_cost'])

            ) {
                $errors[] = "заполните поля";
            }
            if ($errors == false) {
                $id = Order::addDopServices($options);
            }


        }

        require_once(ROOT . '/views/dopServices/index.php');
        return true;
    }

    public function actionShowOrderCatalog()
    {
        $orderList = Order::getOrderlist();
        require_once(ROOT . '/views/orderCatalog/index.php');
        return true;
    }


}