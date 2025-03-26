<?php
namespace App\Models;

use CodeIgniter\Model;

class RocketModel extends Model
{
    protected $table      = 'rockets';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'image', 'active'];
}
