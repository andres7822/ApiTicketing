<?php

namespace App\Model;

class TicketModel
{

    public function readDataTable($params = false): array
    {
        if ($params && is_array($params)) {
            extract($params, EXTR_OVERWRITE);
        }

        $serverQuery = [
            'table' => [
                'name' => 'Ticket',
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
                    'name' => 'Folio',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'FechaYHora',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'Tema',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'Descripcion',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => '(select su.user from systemUser su where su.id = Solicitante)',
                    'alias' => 'Solicitante',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => '(select s.nombre from Sucursal s where s.id = Sucursal)',
                    'alias' => 'Sucursal',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => '(select a.nombre from Area a where a.id = Area)',
                    'alias' => 'Area',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'FechaCompromiso',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => 'Observaciones',
                    'alias' => '',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => '(select Nombre from StatusTicket st where st.id = Status)',
                    'alias' => 'Status',
                    'extra' => '',
                    'render' => ''
                ],
                [
                    'type' => 1,
                    'name' => '(select TipoTicket from TipoDeTicket tdt where tdt.id = Tipo)',
                    'alias' => 'Tipo',
                    'extra' => '',
                    'render' => ''
                ],
                /*[
                    'type' => 2,
                    'name' => '',
                    'alias' => '',
                    'extra' => 'involucradosTicket',
                    'render' => ''
                ],*/
                [
                    'type' => 2,
                    'name' => '',
                    'alias' => '',
                    'extra' => 'seguimientoTicket',
                    'render' => ''
                ]
            ],
            'condition' => $condition,
            'group' => 'Folio',
            'order' => ' id ASC ',
            'renderRow' => '',
            'debug' => 0
        ];

        return $serverQuery;
    }

    public function combo($inText = false): string
    {
        if ($inText) {
            $fields = 'Folio, Folio';
        } else {
            $fields = 'id, Folio';
        }

        return "select $fields from Ticket order by id";
    }

    public function lastIncrement(): string
    {
        return "SELECT `AUTO_INCREMENT`
                FROM  INFORMATION_SCHEMA.TABLES
                WHERE TABLE_SCHEMA = 'apiticketing_db'
                AND   TABLE_NAME   = 'Ticket';";
    }
}
