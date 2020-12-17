<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table      = 'user';
  protected $primaryKey = 'id_user';
  protected $allowedFields = ['nama', 'username', 'password', 'level'];
  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';
}