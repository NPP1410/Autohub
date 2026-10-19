<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
// Model
use App\Models\Backend\RoleModel;

class AdminModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tb_admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'name', 'email', 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Role(){
        return $this->hasOne(RoleModel::class, 'id', 'role');
    }

    public function roles()
    {
        return $this->belongsToMany(RoleModel::class, 'tb_admin_role', 'admin_id', 'role_id');
    }

    public function fullname(){
        return $this->firstname.' '.$this->lastname;
    }

    public function getRoleIds()
    {
        $roleIds = [];

        if ($this->relationLoaded('roles')) {
            $roleIds = $this->roles->pluck('id')->all();
        } else {
            $roleIds = $this->roles()->pluck('tb_role.id')->all();
        }

        if (!empty($this->role)) {
            $roleIds[] = (int) $this->role;
        }

        return array_values(array_unique(array_filter($roleIds)));
    }

    public function hasAnyRole(array $roleIds)
    {
        return count(array_intersect($this->getRoleIds(), $roleIds)) > 0;
    }

    public function roleNames($separator = ', ')
    {
        $names = [];

        if ($this->relationLoaded('roles')) {
            $names = $this->roles->pluck('name')->all();
        } else {
            $names = $this->roles()->pluck('tb_role.name')->all();
        }

        if (empty($names) && $this->Role) {
            $names[] = $this->Role->name;
        }

        return implode($separator, array_unique(array_filter($names)));
    }

    public function isOnline()
    {
        return Cache::has('admin-is-online-' . $this->id);
    }


    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         do {
    //             $uniqueCode = Str::random(10);
    //         } while (self::where('code', $uniqueCode)->exists());

    //         $model->code = $uniqueCode;
    //     });
    // }
}
