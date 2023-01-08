<?php

namespace App\Model;

class TipoDeTicketModel{

    public function readDataTable($params = false): array{
        if($params && is_array($params)){
            extract($params, EXTR_OVERWRITE);
        }

        $serverQuery = [
            'table'     => [
                'name'  => 'TipoDeTicket',
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
                    'name'   => 'TipoTicket',
                    'alias'  => '',
                    'extra'  => '',
                    'render' => ''
                ],
                [
                    'type'   => 1,
                    'name'   => 'DiasLimiteResolucion',
                    'alias'  => '',
                    'extra'  => '',
                    'render' => ''
                ],
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
            $fields = 'TipoTicket, TipoTicket';
        }else{
            $fields = 'id, TipoTicket';
        }

        return "select $fields from TipoDeTicket order by TipoTicket";
    }
}
