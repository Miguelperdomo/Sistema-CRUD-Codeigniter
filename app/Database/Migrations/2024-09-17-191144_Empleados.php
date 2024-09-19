<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Empleados extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=> [
                "type"=> "INT",
                "constraint" => 11, 
                "unsigned" => true
            ],
            'password' => [
                'type'=> 'VARCHAR',
                'constraint' => 60,
                'unique' => true
            ],
            'nombreempleado' => [
                'type'=> 'VARCHAR',
                'constraint' => 50
            ],
            'apellidoempleado' => [
                'type'=> 'VARCHAR',
                'constraint' => 50
            ],
            'fecha_nacimiento' => [
                'type'=> 'DATE' 
            ],
            'correo' => [
                'type'=> 'VARCHAR',
                'constraint' => 50,
                'unique' => true
            ],
            'telefono' => [
                'type'=> 'VARCHAR', 
                'constraint' => 11,
            ],
            'id_area' => [
                "type"=> "INT",
                "constraint" => 5, //tamaño del entero
                "unsigned" => true,  //enteros positivos o cero                
            ]              
        
        ]);

        $this->forge->addKey('id', true);//Indicar llave Primaria
        $this->forge->addForeignKey('id_area', 'areas', 'id','CASCADE', 'NOT ACTION');
        $this->forge->createTable('empleados');
    }

    public function down()
    {
        //
    }
}
