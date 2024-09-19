<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AreasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nombreArea' => 'Sistemas',
                'codigoArea' => '111',
                'descripcion' => 'Es la Area de Sistemas, encargados de todo el funcionamiento del equipo, y las redes de Internet'
            ],
            [
                'nombreArea' => 'Administracion',
                'codigoArea' => '222',
                'descripcion' => 'Es la Area de Administracion, Tiene como objetivo principal lograr el máximo beneficio posible para una entidad. Logra esto mediante la organización, planificación.'
            ],
            [
                'nombreArea' => 'Cartera',
                'codigoArea' => '333',
                'descripcion' => 'Es la Area de Cartera, la colección de negocios y productos que conforman tu empresa. Además, evalua el rendimiento de sus productos o servicios.'
            ],
            [
                'nombreArea' => 'Auditoria',
                'codigoArea' => '444',
                'descripcion' => 'Es la Area de Auditoria, revisar los protocolos que se utilizan en la empresa para encontrar posibles errores e implantar las mejoras que correspondan. '
            ],
            [
                'nombreArea' => 'Comercializacion',
                'codigoArea' => '555',
                'descripcion' => 'Es la Area de Comercializacion, genera estrategias de promoción y venta de productos de manera que puedan alcanzar al consumidor de manera eficaz. '
            ],
            [
                'nombreArea' => 'Recursos Humanos',
                'codigoArea' => '666',
                'descripcion' => 'Es la Area de Recursos Humanos, se gestiona todo lo relacionado con las personas que trabajan en ella. '
            ],
            [
                'nombreArea' => 'Nomina',
                'codigoArea' => '777',
                'descripcion' => 'Es la Area de Nomina, la empresa entrega al trabajador en el que se recogen el sueldo que recibe a cambio del trabajo realizado. '
            ],

            
            
        ];

        $this->db->table('areas')->insertBatch($data);
    }
}
