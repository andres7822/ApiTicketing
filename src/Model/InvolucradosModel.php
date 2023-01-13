<?php

    namespace App\Model;

    class InvolucradosModel{

        public function readDataTable($params = false): array{
            if($params && is_array($params)){
                extract($params, EXTR_OVERWRITE);
            }

            $serverQuery = [
                'table'     => [
                    'name'  => 'Involucrados',
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
                        'name'   => 'NivelDeParticipacion',
                        'alias'  => '',
                        'extra'  => '',
                        'render' => ''
                    ],
                    [
                        'type'   => 1,
                        'name'   => '(select Folio from Ticket where Ticket.id = Involucrados.Ticket)',
                        'alias'  => 'Ticket',
                        'extra'  => '',
                        'render' => ''
                    ],
                    [
                        'type'   => 1,
                        'name'   => '(select Clave from Empleado where Empleado.id = Involucrados.Participante)',
                        'alias'  => 'Participante',
                        'extra'  => '',
                        'render' => ''
                    ],
                    [
                        'type'   => 1,
                        'name'   => '(select Descripcion from ParticipacionTicket pt where pt.id = Participacion)',
                        'alias'  => 'Participacion',
                        'extra'  => '',
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
                return "Select * from Involucrados where Ticket = $inText";
            }else{
                $fields = 'id, NivelDeParticipacion';
            }

            return "select $fields from Involucrados order by NivelDeParticipacion";
        }
    }
