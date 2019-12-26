<?php
require_once ROOT . '/components/Db.php';

class Order
{

    public static function getOrderInformationService()
    {
        $db = Db::getConnection();
        $ordInformationsService = array();

        $sqlGetInformation = 'SELECT * FROM dop_service';

        $result = $db->query($sqlGetInformation);

        if ($result) {

            $i = 0;

            while ($row = $result->fetch()) {
                $ordInformationsService[$i]['cervices_name'] = $row['name'];
                $ordInformationsService[$i]['cervices_id'] = $row['services_id'];
                $i++;
            }
        } else {

            echo 'Error DataBase getOrderInformationService - Bad query! При возникновении данной ошибки просьба сообщить о ней. flurinji@yandex.ru';
        }


        return $ordInformationsService;
    }

    public static function getInformationFirgue()
    {
        $db = Db::getConnection();
        $ordInformationsFigure = array();

        $sqlGetInformation = 'SELECT * FROM figure';

        $result = $db->query($sqlGetInformation);

        if ($result) {
            $i = 0;

            while ($row = $result->fetch()) {
                $ordInformationsFigure[$i]['fig_name'] = $row['fig_name'];
                $ordInformationsFigure[$i]['figure_id'] = $row['figure_id'];
                $i++;
            }
        } else {

            echo 'Error DataBase getInformationFirgue - Bad query! При возникновении данной ошибки просьба сообщить о ней. flurinji@yandex.ru';
        }

        return $ordInformationsFigure;
    }

    public static function getDifferentWork()
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM paint_cons';

        $ordInformationsDifferent = array();

        $result = $db->query($sql);

        if ($result) {

            $i = 0;
            while ($row = $result->fetch()) {
                $ordInformationsDifferent[$i]['powder_dens'] = $row['powder_dens'];
                $ordInformationsDifferent[$i]['powder_cons_100'] = $row['powder_cons_100'];
                $i++;
            }
        } else {

            echo 'Error DataBase getDifferentWork - Bad query! При возникновении данной ошибки просьба сообщить о ней. flurinji@yandex.ru';
        }

        return $ordInformationsDifferent;
    }

    public static function getPriceForWork()
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM production_cost';
        $priceForWork = array();
        $result = $db->query('SELECT * FROM production_cost');

        if ($result) {
            $i = 0;
            while ($row = $result->fetch()) {
                $priceForWork[$i]['prepar_painting'] = $row['prepar_painting'];
                $priceForWork[$i]['paint_prod'] = $row['paint_prod'];
                $priceForWork[$i]['in_out_prod'] = $row['in_out_prod'];
                $priceForWork[$i]['pac_prod'] = $row['pac_prod'];
                $priceForWork[$i]['rail_count'] = $row['rail_count'];
                $priceForWork[$i]['min_work_price'] = $row['min_work_price'];
                $priceForWork[$i]['max_pod'] = $row['max_pod'];
                $priceForWork[$i]['energy_need'] = $row['energy_need'];
                $priceForWork[$i]['time_furnauce_work'] = $row['time_furnauce_work'];
                $priceForWork[$i]['count_prod_in_one_rail'] = $row['count_prod_in_one_rail'];
                $priceForWork[$i]['cost_for_15_metr_pack'] = $row['cost_for_15_metr_pack'];
                $i++;
            }
        } else {
            echo 'Error DataBase getPriceForWork - Bad query! При возникновении данной ошибки просьба сообщить о ней. flurinji@yandex.ru';
        }

        return $priceForWork;
    }

    public static function addDopServices($options)
    {

        $db = Db::getConnection();

        $sql = 'INSERT INTO dop_service '
            . '(name,cost) '
            . 'VALUES '
            . '(:name,:cost)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['services_name'], PDO::PARAM_STR);
        $result->bindParam(':cost', $options['services_cost'], PDO::PARAM_INT);

        if ($result->execute()) {
            return $db->lastInsertId();
        } else {
            'Error DataBase addDopServices - Bad query! При возникновении данной ошибки просьба сообщить о ней. flurinji@yandex.ru';
        }
        return 0;
    }

    public static function addOrder($options)
    {

        echo '1';
        $db = Db::getConnection();

        $sql = 'INSERT INTO orderss'
            . '(ord_name,ord_date,org_name,prod_name,prod_color,prod_length,prod_width,prod_diametor,prod_space,figure_type_id,paint_one_prod,add_services_id,prod_count,end_price ) '
            . 'VALUES '
            . '(:ord_name,
            :ord_date,
            :org_name,
            :prod_name,
            :prod_color,
            :prod_length,
            :prod_width,
            :prod_diametor,
            :prod_space,
            :figure_type_id,
            :paint_one_prod,
            :add_services_id,
            :prod_count,
            :end_price )';

        //кодируем строку в JSON
        $jsonCode = json_encode($_POST['add_services_id'], JSON_UNESCAPED_UNICODE);


        $result = $db->prepare($sql);
        $result->bindParam(':ord_name', $options['ord_name'], PDO::PARAM_STR);
        $result->bindParam(':ord_date', $options['ord_date'], PDO::PARAM_STR);
        $result->bindParam(':org_name', $options['org_name'], PDO::PARAM_STR);
        $result->bindParam(':prod_name', $options['prod_name'], PDO::PARAM_STR);
        $result->bindParam(':prod_color', $options['prod_color'], PDO::PARAM_STR);
        $result->bindParam(':prod_length', $options['prod_length'], PDO::PARAM_STR);
        $result->bindParam(':prod_width', $options['prod_width'], PDO::PARAM_STR);
        $result->bindParam(':prod_diametor', $options['prod_diametor'], PDO::PARAM_STR);
        $result->bindParam(':prod_space', $options['prod_space'], PDO::PARAM_STR);
        $result->bindParam(':figure_type_id', $options['figure_type_id'], PDO::PARAM_INT);
        $result->bindParam(':paint_one_prod', $options['paint_one_prod'], PDO::PARAM_STR);
        $result->bindParam(':add_services_id', $jsonCode, PDO::PARAM_STR);
        $result->bindParam(':prod_count', $options['prod_count'], PDO::PARAM_STR);
        $result->bindParam(':end_price', $options['end_price'], PDO::PARAM_INT);


        if (!$result) {
            echo 'Error DataBase addOrder - Bad query! При возникновении данной ошибки просьба сообщить о ней. flurinji@yandex.ru';
        }


        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function getOrderlist()
    {

        $db = Db::getConnection();

        $sql = 'SELECT  * FROM orderss ';

        $result = $db->query($sql);
        $search = array('"', '[', ']');
        $orderList = array();

        if ($result) {
            $i = 0;
            while ($row = $result->fetch()) {

                $orderList[$i]['ord_name'] = $row['ord_name'];
                $orderList[$i]['ord_date'] = $row['ord_date'];
                $orderList[$i]['org_name'] = $row['org_name'];
                $orderList[$i]['prod_name'] = $row['prod_name'];
                $orderList[$i]['prod_color'] = $row['prod_color'];
                $orderList[$i]['prod_length'] = $row['prod_length'];
                $orderList[$i]['prod_width'] = $row['prod_width'];
                $orderList[$i]['prod_diametor'] = $row['prod_diametor'];
                $orderList[$i]['prod_space'] = $row['prod_space'];
                $orderList[$i]['figure_type_id'] = $row['figure_type_id'];
                $orderList[$i]['paint_one_prod'] = $row['paint_one_prod'];
                $orderList[$i]['prod_count'] = $row['prod_count'];
                $orderList[$i]['end_price'] = $row['end_price'];
                $orderList[$i]['add_services_id'] = str_replace($search, ' ', $row['add_services_id']);
                $i++;
            }
        }


        return $orderList;
    }

    public static function getOrderContent()
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM orderss';

        $result = $db->query($sql);
        $search = array('"', '[', ']');
        $orderProdList = array();

        if ($result) {
            $i = 0;
            while ($row = $result->fetch()) {
                $orderProdList[$i]['prod_name'] = $row['prod_name'];
                $orderProdList[$i]['prod_color'] = $row['prod_color'];
                $orderProdList[$i]['prod_length'] = $row['prod_length'];
                $orderProdList[$i]['prod_width'] = $row['prod_width'];
                $orderProdList[$i]['prod_diametor'] = $row['prod_diametor'];
                $orderProdList[$i]['prod_space'] = $row['prod_space'];
                $orderProdList[$i]['figure_type_id'] = $row['figure_type_id'];
                $orderProdList[$i]['paint_one_prod'] = $row['paint_one_prod'];
                $orderProdList[$i]['prod_count'] = $row['prod_count'];
                $orderProdList[$i]['end_price'] = $row['end_price'];
                $orderProdList[$i]['add_services_id'] = str_replace($search, ' ', $row['add_services_id']);
                $i++;
            }
        }
        return $orderProdList;
    }
}
