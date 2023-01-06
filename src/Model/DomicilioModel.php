<?php

namespace App\Model;

class DomicilioModel
{

    public function readDataTable($params = false): array
    {
        if ($params && is_array($params)) {
            extract($params, EXTR_OVERWRITE);
        }

        $serverQuery = [
            'table' => [
                'name' => 'Domicilio',
                'alias' => ''
            ],
            'index' => [
                'name' => 'id',
                'alias' => ''
            ],
            'columns' => [
                [
                    'type' => 0,
                    'name' => '',
                    'alias' => '',
                    'extra' => 'actions',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'TipoDeVialidad',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'Vialidad',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'TipoDeAsentamiento',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'Asentamiento',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'NumeroExterior',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'NumeroInterior',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'Pais',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'EntidadFederativa',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'Municipio',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'Localidad',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'CodigoPostal',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'Latitud',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'Longitud',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'GooglePin',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'Visible',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'Actual',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'FechaTupla',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'Origen',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'Tupla',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],

            ],
            'condition' => '',
            'group' => '',
            'order' => ' id ASC ',
            'renderRow' => '',
            'debug' => 0
        ];

        return $serverQuery;
    }

    public function combo($inText = false): string
    {
        if ($inText) {
            $fields = 'TipoDeVialidad, TipoDeVialidad';
        } else {
            $fields = 'id, TipoDeVialidad';
        }

        return "select $fields from Domicilio order by TipoDeVialidad";
    }
}
