<?php

namespace Phppot;

use Phppot\DataSource;

class Product
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/DataSource.php';
        $this->ds = new DataSource();
    }

    public function getAllProduct()
    {
        $query = "select * from placed_stu;";
        $result = $this->ds->select($query);
        return $result;
    }

    public function exportProductDatabase($productResult)
    {
        $timestamp = time();
        $filename = 'Export_excel_' . $timestamp . '.xls';

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");

        $isPrintHeader = false;
        foreach ($productResult as $row) {
            if (!$isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
        exit();
    }
}
