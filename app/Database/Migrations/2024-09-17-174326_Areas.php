<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Areas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=> [
                "type"=> "INT",
                "constraint" => 5, //tamaño del entero
                "unsigned" => true,  //enteros positivos o cero
                "auto_increment" => true,//Autoincrementar 
            ],
            'nombreArea' => [
                'type'=> 'VARCHAR',
                'constraint' => 50,
            ],
            'codigoArea' => [
                'type'=> 'INT', 
                "constraint" => 3,
            ],
            'descripcion' => [
                'type'=> 'TINYTEXT', //Permite 255 caracteres
                'NULL' => true,
            ]           
        
        ]);

        $this->forge->addKey('id', true);//Indicar llave Primaria
        $this->forge->createTable('areas');
    }

    public function down()
    {
        //ELIMINAR TABLA DE LA BD
        //$this->forge->dropTable('areas');
    }
}
