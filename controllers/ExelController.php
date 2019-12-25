<?php
require_once(ROOT . '/models/Exel.php');

class ExelController
{
    public function actionIndex()
    {
        $Exel = New Exel('upload');
        require_once(ROOT . '/views/Exel/index.php');
        return true;
    }

}
