<?php

namespace App\Model;

class AreaModel{

    public function readDataTable($params = false): array{
        if($params && is_array($params)){
            extract($params, EXTR_OVERWRITE);
        }

        $serverQuery = [
            'table'     => [
                'name'  => 'Area',
                'alias' => ''
            ],
            'index'     => [
                'name'  => 'id',
                'alias' => ''
            ],
            'columns'   => [
                [
                    'type'   => 0,
                    'name'   => '',
                    'alias'  => '',
                    'extra'  => 'actions',
                    'render' => ''
                ],
                [
                    'type'   => 1,
                    'name'   => 'Nombre',
                    'alias'  => '',
                    'extra'  => '',
                    'render' => ''
                ]

            ],
            'condition' => '',
            'group'     => '',
            'order'     => ' id ASC ',
            'renderRow' => '',
            'debug'     => 0
        ];

        return $serverQuery;
    }

    public function combo($inText = false): string{
        if($inText){
            $fields = 'Nombre, Nombre';
        }else{
            $fields = 'id, Nombre';
        }

        return "select $fields from Area order by Nombre";
    }
}
