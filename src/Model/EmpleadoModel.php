<?php

    namespace App\Model;

    class EmpleadoModel{

        public function readDataTable($params = false): array{
            if($params && is_array($params)){
                extract($params, EXTR_OVERWRITE);
            }

            $serverQuery = [
                'table'     => [
                    'name'  => 'Empleado',
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
                        'name'   => 'Clave',
                        'alias'  => '',
                        'extra'  => '',
                        'render' => ''
                    ],
                    [
                        'type'   => 1,
                        'name'   => '(select NombreORazonSocial from Persona where Persona.id = Empleado.Persona)',
                        'alias'  => 'Persona',
                        'extra'  => '',
                        'render' => ''
                    ],
                    [
                        'type'   => 1,
                        'name'   => '(select a.Nombre from Area a where a.id = Area)',
                        'alias'  => 'Area',
                        'extra'  => '',
                        'render' => ''
                    ],
                    [
                        'type'   => 1,
                        'name'   => '(select s.Nombre from Sucursal s where s.id = Sucursal)',
                        'alias'  => 'Sucursal',
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
                $fields = 'Clave, Clave';
            }else{
                $fields = 'id, Clave';
            }

            return "select $fields from Empleado order by Clave";
        }
    }
