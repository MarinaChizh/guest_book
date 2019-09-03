<?php

namespace App\Model\DataStorage;

class CsvStorage extends CrudEntity{
    function get(){
        $this->checkFileExists();
        return explode(file($this->file_name));
    }

    function write_file(array $data_array)
    {
        $csv = '';
        foreach ($data_array as $row){
            foreach ($row as $value){
                $csv .= "$value";
            }
            $csv .= '\n';
        }
        file_put_contents($this->file_name, $csv);
    }
}