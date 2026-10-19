<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_logloginModel extends Model
{
    use HasFactory;
    
    protected $table = 'tb_admin_log_login';
    public function admin(){ return $this->hasOne(AdminModel::class, 'id', 'admin_id'); }
}
