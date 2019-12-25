<?php
require ROOT . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Exel
{
    //Путь к папке с файлами
    public $dir;
    //Полученные файлы из папки
    private $files;

    public function __construct($dir)
    {
        $this->files = array();
        $this->dir = $dir;
    }

    public function searchExelFiles()
    {
        if (is_dir($this->dir)) {
            if ($open = opendir($this->dir)) {
                while (($file = readdir($open))  !== false) {
                    $this->files[] = $file;
                }
                closedir($open);
            };
        } else {
            echo 'Ошибка!! папка не найдена';
        };

        // print_r($files);
        return true;
    }


    public  function readExel()
    {
        $xlsLng = 0;
        $xlsxLng = 0;
        $xlsxReader = new Xlsx();
        $xlsReader = new Xls();
        $xlsxDocument = glob('*.xlsx');
        $i = 0;
        $files = [];
        if (opendir($this->dir)) {
            foreach (glob($this->dir .'/*.xls') as $xlsDocument[]) {
                $xlsLng++;
            }
        } else {
            echo 'error';
        }
        if (opendir($this->dir)) {
            foreach (glob($this->dir . '/*.xlsx') as $xlsxDocument[]) {
                $xlsxLng++;
            }
        } else {
            echo 'error';
        }

        $i = 0;

        echo $xlsxLng . '<br>';
        echo $xlsLng . '<br>';
        //Сортирует все полученные файлы
        for ($i = 0; $i < $xlsxLng; $i++) {
            $xlsxFile = $xlsxDocument[$i];
            //Загружает файл xlsx для работы с ним
            if ($xlsxLng != 0) {
                $xlsxSpreadsheet = $xlsxReader->load($xlsxFile);
                $xlsxCells = $xlsxSpreadsheet->getActiveSheet()->getCellCollection();
            }
            switch ($xlsxDocument) {
                case file_exists($xlsxDocument[$i]):
                    echo "Файл $xlsxDocument[$i] в последний раз был изменен: " . date("F d Y H:i:s.", filectime($xlsxDocument[$i])) . "</br>";
                    break;
            };
            if ($xlsxCells) {
                echo '<table border="1"> ';
                for ($iRow = 1; $iRow <= $xlsxCells->getHighestRow(); $iRow++) {

                    echo '<tr>';
                    for ($iCol = 'A'; $iCol <= $xlsxCells->getHighestColumn(); $iCol++) {
                        //Получаем координаты ячейки
                        $oCell = $xlsxCells->get($iCol . $iRow);
                        if ($oCell) {
                            //Выводим знаение ячейки exel
                            echo '<td>' . $oCell->getValue() . '</td>';
                        };
                    };
                    echo '</tr>';
                };
                echo '</table>';
            };
        }
        for ($i = 0; $i < $xlsLng; $i++) {

            $xlsFile = $xlsDocument[$i];
            //Загружает файл xlsx для работы с ним
            if ($xlsLng != 0) {
                $xlsSpreadsheet = $xlsReader->load($xlsFile);
                $xlsCells = $xlsSpreadsheet->getActiveSheet()->getCellCollection();
            }
            switch ($xlsDocument) {
                case file_exists($xlsDocument[$i]):
                    echo "Файл $xlsDocument[$i] в последний раз был изменен: " . date("F d Y H:i:s.", filectime($xlsDocument[$i])) . "</br>";
                    break;
            };
            if ($xlsCells) {
                echo '<table border="1"> ';
                for ($iRow = 1; $iRow <= $xlsCells->getHighestRow(); $iRow++) {

                    echo '<tr>';
                    for ($iCol = 'A'; $iCol <= $xlsCells->getHighestColumn(); $iCol++) {
                        //Получаем координаты ячейки
                        $oCell = $xlsCells->get($iCol . $iRow);
                        if ($oCell) {
                            //Выводим знаение ячейки exel
                            echo '<td>' . $oCell->getValue() . '</td>';
                        };
                    };
                    echo '</tr>';
                };
                echo '</table>';
            };
        }



        //Вывод полученых данных из таблицы



    }
};
