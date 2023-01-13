<?php

namespace App\Model;

class Notificaci_onModel
{

    public function readDataTable($params = false): array
    {
        if ($params && is_array($params)) {
            extract($params, EXTR_OVERWRITE);
        }

        $serverQuery = [
            'table' => [
                'name' => 'Notificaci_on',
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
                    'name' => '(select e.Clave from Empleado e where e.id = Usuario)',
                    'alias' => 'Usuario',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => '(select if (Notificado = 0, "No", "Si"))',
                    'alias' => 'Notificado',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => '(select Mensaje from Mensaje where Mensaje.id = Notificaci_on.Mensaje)',
                    'alias' => 'Mensaje',
                    'extra' => '',
                    'render' => ''
                ],

            ],
            'condition' => $condition,
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
            /*$fields = 'Usuario, Usuario';*/
            return "select * from Notificaci_on where Usuario = $inText and Notificado = 0";
        } else {
            $fields = 'id, Usuario';
        }

        return "select $fields from Notificaci_on order by Usuario";
    }
}
