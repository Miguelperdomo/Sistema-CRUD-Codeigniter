<?php

namespace App\Models;

use CodeIgniter\Model;

class Areas extends Model
{
    protected $table            = 'areas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombreArea', 'codigoArea', 'descripcion'];

    // Dates
    protected $useTimestamps = false;


}
