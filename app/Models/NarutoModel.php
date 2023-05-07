<?php

namespace App\Models;

use CodeIgniter\Model;

class NarutoModel extends Model
{
    protected $table = "NarutoAPI";
    protected $primaryKey = "id";
    protected $allowedFields = ['nombre', 'clan', 'aldea', 'rango', 'descripcion'];

    protected $useTimestamps = true;

    protected $useSoftDeletes = true;

}