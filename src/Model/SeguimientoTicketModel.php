<?php

    namespace App\Model;

    class SeguimientoTicketModel{

        public function readDataTable($params = false): array{

            if($params && is_array($params)){
                extract($params, EXTR_OVERWRITE);
            }

            $serverQuery = [
                'table'     => [
                    'name'  => 'SeguimientoTicket',
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
                        'name'   => '(select Folio from Ticket where Ticket.id = SeguimientoTicket.Ticket)',
                        'alias'  => 'Ticket',
                        'extra'  => '',
                        'render' => ''
                    ],
                    [
                        'type'   => 1,
                        'name'   => 'FechaYHora',
                        'alias'  => '',
                        'extra'  => '',
                        'render' => ''
                    ],
                    [
                        'type'   => 1,
                        'name'   => '(select su.user from systemUser su where su.id = Usuario )',
                        'alias'  => 'Usuario',
                        'extra'  => '',
                        'render' => ''
                    ],
                    [
                        'type'   => 1,
                        'name'   => 'Descripcion',
                        'alias'  => '',
                        'extra'  => '',
                        'render' => ''
                    ],
                    [
                        'type' => 1,
                        'name' => '(select Nombre from StatusTicket st where st.id = Status)',
                        'alias' => 'Status',
                        'extra' => '',
                        'render' => ''
                    ],
                    
                ],
                'condition' => $condition,
                'group'     => '',
                'order'     => ' id ASC ',
                'renderRow' => '',
                'debug'     => 0
            ];

            return $serverQuery;
        }

        public function combo($inText = false): string{
            if($inText){
                $fields = 'id, id';
            }else{
                $fields = 'id, id';
            }

            return "select $fields from SeguimientoTicket order by id";
        }
    }
