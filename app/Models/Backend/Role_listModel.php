<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\MenuModel;

class Role_listModel extends Model
{
    use HasFactory;
    protected $table = 'tb_role_list';
    protected $primaryKey = 'id';
    protected $fillable = [
        'role_id',
        'menu_id',
        'menu_key',
        'read',
        'add',
        'edit',
        'delete',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    public $timestamps = true;

    public static function findByRoleAndMenu($roleId, $menu)
    {
        [$menuId, $menuKey] = self::normalizeMenuIdentity($menu);

        if ($menuKey) {
            $permission = static::where('role_id', $roleId)
                ->where('menu_key', $menuKey)
                ->first();

            if ($permission) {
                return $permission;
            }
        }

        if ($menuId) {
            return static::where('role_id', $roleId)
                ->where('menu_id', $menuId)
                ->first();
        }

        return null;
    }

    protected static function normalizeMenuIdentity($menu)
    {
        if ($menu instanceof MenuModel) {
            return [(int) $menu->id, $menu->menu_key];
        }

        if (is_array($menu)) {
            return [(int) ($menu['id'] ?? 0), $menu['menu_key'] ?? null];
        }

        if (is_object($menu)) {
            return [(int) ($menu->id ?? 0), $menu->menu_key ?? null];
        }

        if (is_numeric($menu)) {
            return [(int) $menu, null];
        }

        return [0, null];
    }
}
