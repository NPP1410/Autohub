<?php

namespace App\Helpers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\AdminModel;
use App\Models\Backend\MenuModel;
use App\Models\Backend\Role_listModel;
use Illuminate\Support\Collection;
use DB;

class Helper 
{
    protected $prefix = 'back-end';
    //==== Menu Active ====
    public static function auth_menu()
    {
        abort(403, 'คุณไม่มีสิทธิ์เข้าถึงหน้านี้');
    }

    public static function showImage($image = null){
        $html = "";
        if($image == null){
            $html = "<style>.image-input-placeholder { background-image: url('backend/assets/media/svg/files/blank-image.svg'); } [data-theme='dark'] .image-input-placeholder { background-image: url('assets/media/svg/files/blank-image-dark.svg'); }</style>";
        }else{
            $html = "<style>.image-input-placeholder { background-image: url('$image'); } [data-theme='dark'] .image-input-placeholder { background-image: url('$image'); }</style>";

        }
        return $html;
    }

    public static function showImageIndex($image = null)
    {
        if (!$image) {
            return 'no_image.jpg';
        }

        return ltrim($image, '/');
    }
    
    public static function menu_active($menu_id)
    {
        if (!is_numeric($menu_id)) {
            return self::getPermissionByMenuKey($menu_id);
        }

        return self::getPermissionByMenuId((int) $menu_id);
    }

    public static function getPermissionByMenuId($menu_id)
    {
        $member = self::authAdmin();
        if (!$member) {
            return null;
        }

        $roleIds = $member->getRoleIds();
        if (empty($roleIds)) {
            return null;
        }

        $menu = \App\Models\Backend\MenuModel::find($menu_id);
        $menuKey = $menu ? $menu->menu_key : null;

        $permissions = self::getPermissionRows($roleIds, $menu_id, $menuKey);

        if ($permissions->isEmpty()) {
            return null;
        }

        return (object) [
            'read' => $permissions->contains('read', 'on') ? 'on' : 'off',
            'add' => $permissions->contains('add', 'on') ? 'on' : 'off',
            'edit' => $permissions->contains('edit', 'on') ? 'on' : 'off',
            'delete' => $permissions->contains('delete', 'on') ? 'on' : 'off',
        ];
    }

    public static function getPermissionByMenuKey($menu_key)
    {
        $menu = self::findMenuByKey($menu_key);
        if (!$menu) {
            return null;
        }

        $member = self::authAdmin();
        if (!$member) {
            return null;
        }

        $roleIds = $member->getRoleIds();
        if (empty($roleIds)) {
            return null;
        }

        $permissions = self::getPermissionRows($roleIds, $menu->id, $menu->menu_key);

        if ($permissions->isEmpty()) {
            return null;
        }

        return (object) [
            'read' => $permissions->contains('read', 'on') ? 'on' : 'off',
            'add' => $permissions->contains('add', 'on') ? 'on' : 'off',
            'edit' => $permissions->contains('edit', 'on') ? 'on' : 'off',
            'delete' => $permissions->contains('delete', 'on') ? 'on' : 'off',
        ];
    }

    public static function can($menu_key, $permission_key = 'view')
    {
        $permission = self::getPermissionByMenuKey($menu_key);
        $column = self::normalizePermissionKey($permission_key);

        return $permission && data_get($permission, $column) === 'on';
    }

    public static function canView($menu_key)
    {
        return self::can($menu_key, 'view');
    }

    public static function canAdd($menu_key)
    {
        return self::can($menu_key, 'create');
    }

    public static function canEdit($menu_key)
    {
        return self::can($menu_key, 'update');
    }

    public static function canDelete($menu_key)
    {
        return self::can($menu_key, 'delete');
    }

    public static function forbiddenJson($text = null)
    {
        return response()->json([
            'title' => 'ไม่มีสิทธิ์',
            'text' => $text ?: 'คุณไม่มีสิทธิ์ทำรายการนี้',
        ], 403);
    }

    protected static function authAdmin()
    {
        $member_id = Auth::guard('admin')->id();
        if (!$member_id) {
            return null;
        }

        return \App\Models\Backend\AdminModel::find($member_id);
    }

    public static function admin()
    {
        return self::authAdmin();
    }

    public static function currentRoleIds(): array
    {
        $admin = self::authAdmin();

        if (!$admin) {
            return [];
        }

        return $admin->getRoleIds();
    }

    public static function hasRole($roleId): bool
    {
        return self::canUse([$roleId]);
    }

    public static function canUse($roleIds = []): bool
    {
        $admin = self::authAdmin();

        if (!$admin) {
            return false;
        }

        $normalizedRoleIds = collect(is_array($roleIds) ? $roleIds : [$roleIds])
            ->filter(function ($roleId) {
                return $roleId !== null && $roleId !== '';
            })
            ->map(function ($roleId) {
                return (int) $roleId;
            })
            ->unique()
            ->values()
            ->all();

        if (empty($normalizedRoleIds)) {
            return false;
        }

        return $admin->hasAnyRole($normalizedRoleIds);
    }

    public static function canUseAll(array $roleIds): bool
    {
        $currentRoleIds = self::currentRoleIds();

        if (empty($currentRoleIds) || empty($roleIds)) {
            return false;
        }

        $requiredRoleIds = collect($roleIds)->map(function ($roleId) {
            return (int) $roleId;
        })->unique()->values()->all();

        return count(array_intersect($requiredRoleIds, $currentRoleIds)) === count($requiredRoleIds);
    }

    public static function isSuperAdmin(): bool
    {
        return self::canUse([1]);
    }

    public static function canManageCustomerAssignments(): bool
    {
        return self::canUse([1, 2, 3, 30]);
    }

    public static function canViewAllCustomers(): bool
    {
        return self::canManageCustomerAssignments();
    }

    protected static function findMenuByKey($menu_key)
    {
        $normalizedKey = trim((string) $menu_key, " ./");
        if ($normalizedKey === '') {
            return null;
        }

        $fallbackUrl = str_replace('.', '/', $normalizedKey);

        return \App\Models\Backend\MenuModel::where('menu_key', $normalizedKey)
            ->orWhere('url', $fallbackUrl)
            ->first();
    }

    protected static function normalizePermissionKey($permission_key)
    {
        $map = [
            'view' => 'read',
            'read' => 'read',
            'create' => 'add',
            'add' => 'add',
            'update' => 'edit',
            'edit' => 'edit',
            'delete' => 'delete',
            'remove' => 'delete',
        ];

        return $map[$permission_key] ?? 'read';
    }

    protected static function getPermissionRows(array $roleIds, $menuId = null, $menuKey = null)
    {
        return \App\Models\Backend\Role_listModel::whereIn('role_id', $roleIds)
            ->where(function ($query) use ($menuId, $menuKey) {
                if ($menuKey) {
                    $query->where('menu_key', $menuKey);

                    if ($menuId) {
                        $query->orWhere(function ($subQuery) use ($menuId) {
                            $subQuery->whereNull('menu_key')
                                ->where('menu_id', $menuId);
                        });
                    }

                    return;
                }

                if ($menuId) {
                    $query->where('menu_id', $menuId);
                }
            })
            ->get();
    }

    public static function getRandomID($size, $table, $column_name)
    {
        $check_status = 0;
        while ($check_status == 0) 
        {
            $random_id = Helper::randomCode($size);

            $data = DB::table($table)->where("$column_name","$random_id")->get();
            if($data->count() == 0)
            {
                $check_status = 1;
            }
        }
        return $random_id;
    }

    public static function randomCode($length)
    {
        $possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghigklmnopqrstuvwxyz"; //ตัวอักษรที่ต้องการสุ่ม
        $str = "";
        while (strlen($str) < $length) {
            $str .= substr($possible, (rand() % strlen($possible)), 1);
        }
        return $str;
    }

    public static function convertThaiDate($date, $type = 'date')
    {
        $thai_months = [
            1 => 'ม.ค.',
            2 => 'ก.พ.',
            3 => 'มี.ค.',
            4 => 'เม.ย.',
            5 => 'พ.ค.',
            6 => 'มิ.ย.',
            7 => 'ก.ค.',
            8 => 'ส.ค.',
            9 => 'ก.ย.',
            10 => 'ต.ค.',
            11 => 'พ.ย.',
            12 => 'ธ.ค.',
        ];
        $date = Carbon::parse($date);
        $month = $thai_months[$date->month];
        $year = $date->year + 543;

        if ($type == 'datetime') {
            return $date->format("j $month $year H:i:s");
        }

        return $date->format("j $month $year");
    }


    public static function typeLogs($type){
        $html = "";
        if($type == "Error"){
            $html.='
            
            <span class="fw-semibold text-danger"><b><i class="fas fa-exclamation-circle"></i> Error</b></span>';
        }
        return $html;
    }

    public static function typeLogsSystem($type){
        $html = "";
        if($type == "backend"){
            $html.='
            <span class="fw-semibold text-info"><b>Backend</b></span>';
        }else if($type == "frontend"){
            $html.='
            <span class="fw-semibold text-primary"><b>Frontend</b></span>';
        }
        return $html;
    }
    public static function isActiveMenu($url)
    {
        return request()->is('webpanel/'.$url) || request()->is('webpanel/'.$url.'/*');
    }
    public static function isActive($status)
    {
        $data = "";
        if ($status == 'Y') {
            $data = '<i style="font-size:20px;" class="fa fa-check-circle text-success font-size-12"></i> ใช้งาน';
        } elseif ($status == 'N') {
            $data = '<i style="font-size:20px;" class="fa fa-times-circle text-danger font-size-12"></i> ไม่ใช้งาน';
        }
        return $data;
    }

    public static function isStatus($status)
    {
        $data = "";
        if ($status == '1') {
            $data = '<i style="font-size:20px;" class="fa fa-check-circle text-success font-size-12"></i> ใช้งาน';
        } elseif ($status == '0') {
            $data = '<i style="font-size:20px;" class="fa fa-times-circle text-danger font-size-12"></i> ไม่ใช้งาน';
        }
        return $data;
    }

    public static function serviceType($type)
    {
        $lists = [
            0 => [
                'text'  => 'ไม่ระบุ',
                'class' => 'badge-soft-secondary',
                'icon'  => 'bx-help-circle',
            ],
            1 => [
                'text'  => 'มาตรวจ',
                'class' => 'badge-soft-primary',
                'icon'  => 'bx-stethoscope',
            ],
            2 => [
                'text'  => 'Follow up อาการ',
                'class' => 'badge-soft-info',
                'icon'  => 'bx-refresh',
            ],
            3 => [
                'text'  => 'รับวัคซีน',
                'class' => 'badge-soft-success',
                'icon'  => 'bx-injection',
            ],
            4 => [
                'text'  => 'มาซื้อ - กลับบ้าน',
                'class' => 'badge-soft-warning',
                'icon'  => 'bx-cart',
            ],
        ];

        $item = $lists[$type] ?? $lists[0];

        return '<span class="badge '.$item['class'].' font-size-12">
                    <i class="bx '.$item['icon'].' me-1"></i>'.$item['text'].'
                </span>';
    }


    public static function appointmentStatus($type)
    {
        $lists = [
            0 => [
                'text'  => 'ยังไม่มา',
                'class' => 'badge-soft-warning',
                'icon'  => 'bx-time-five',
            ],
            1 => [
                'text'  => 'Check-in แล้ว',
                'class' => 'badge-soft-info',
                'icon'  => 'bx-log-in',
            ],
            2 => [
                'text'  => 'เลื่อนนัด',
                'class' => 'badge-soft-danger',
                'icon'  => 'bx-calendar-x',
            ],
            3 => [
                'text'  => 'เสร็จสิ้น',
                'class' => 'badge-soft-success',
                'icon'  => 'bx-check-circle',
            ],
        ];

        $item = $lists[$type] ?? [
            'text'  => 'ไม่ระบุ',
            'class' => 'badge-soft-secondary',
            'icon'  => 'bx-help-circle',
        ];

        return '<span class="badge '.$item['class'].' font-size-12">
                    <i class="bx '.$item['icon'].' me-1"></i>'.$item['text'].'
                </span>';
    }

    public static function serviceStatus($type)
    {
        $lists = [
            0 => [
                'text'  => 'รอตรวจ',
                'class' => 'badge-soft-warning',
                'icon'  => 'bx-time-five',
            ],
            1 => [
                'text'  => 'รอจ่าย',
                'class' => 'badge-soft-info',
                'icon'  => 'bx-wallet',
            ],
            2 => [
                'text'  => 'แจ้ง-แก้ไขรายการ',
                'class' => 'badge-soft-danger',
                'icon'  => 'bx-error-circle',
            ],
            3 => [
                'text'  => 'ส่งไปห้องแลป',
                'class' => 'badge-soft-primary',
                'icon'  => 'bx-test-tube',
            ],
            4 => [
                'text'  => 'เสร็จสิ้น',
                'class' => 'badge-soft-success',
                'icon'  => 'bx-check-circle',
            ],
        ];

        $item = $lists[$type] ?? [
            'text'  => 'ไม่ระบุ',
            'class' => 'badge-soft-secondary',
            'icon'  => 'bx-help-circle',
        ];

        return '<span class="badge '.$item['class'].' font-size-12">
                    <i class="bx '.$item['icon'].' me-1"></i>'.$item['text'].'
                </span>';
    }

    public static function age($birthday)
    {
        $birthday = Carbon::parse($birthday);
        $now = Carbon::now();
        $years = $birthday->diffInYears($now);
        $months = $birthday->copy()->addYears($years)->diffInMonths($now);
        $html = "$years ปี $months เดือน";
        return $html;
    }
   public static function gender($gender)
    {
        $genderMap = [
            0 => ['text' => 'ไม่ระบุเพศ', 'class' => 'secondary', 'icon' => 'bx bx-help-circle'],
            1 => ['text' => 'ชาย',       'class' => 'info',      'icon' => 'bx bx-male'],
            2 => ['text' => 'หญิง',      'class' => 'danger',    'icon' => 'bx bx-female'],
            3 => ['text' => 'อื่นๆ',      'class' => 'warning',   'icon' => 'bx bx-user'],
        ];
        $sex = $genderMap[$gender] ?? $genderMap[0];
        return '<span class="badge badge-soft-'.$sex['class'].'"><i class="'.$sex['icon'].' me-1"></i>'.$sex['text'].'</span>';
    }
    public static function authMe($id){
        $data = "";
        $item = AdminModel::find($id);
        if($item){
            $data = $item;
        }
        return $data;
    }

    public static function mainMenu(){
        $menus = \App\Models\Backend\MenuModel::where('status','on')
            ->where(function ($query) {
                $query->where('position', 'topic')
                    ->orWhere(function ($subQuery) {
                        $subQuery->where('position', 'main')
                            ->whereNull('topic_id');
                    });
            })
            ->orderby('sort', 'asc')
            ->get();
        return $menus;
    }

    public static function sidebarMenuTree(): Collection
    {
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return collect();
        }

        $roleIds = DB::table('tb_admin_role')
            ->where('admin_id', $admin->id)
            ->pluck('role_id')
            ->map(function ($roleId) {
                return (int) $roleId;
            });

        if (!empty($admin->role)) {
            $roleIds->push((int) $admin->role);
        }

        $roleIds = $roleIds->filter()->unique()->values();

        if ($roleIds->isEmpty()) {
            return collect();
        }

        $menus = MenuModel::where('status', 'on')
            ->whereIn('position', ['topic', 'main', 'secondary'])
            ->orderBy('sort', 'asc')
            ->get();

        $permissions = Role_listModel::whereIn('role_id', $roleIds)
            ->where('read', 'on')
            ->get(['menu_id', 'menu_key']);

        return self::buildSidebarMenuTree($menus, $permissions);
    }

    protected static function buildSidebarMenuTree(Collection $menus, Collection $permissions): Collection
    {
        $readableMenuKeys = $permissions
            ->filter(function ($permission) {
                return trim((string) $permission->menu_key) !== '';
            })
            ->mapWithKeys(function ($permission) {
                return [trim((string) $permission->menu_key) => true];
            });

        $readableLegacyMenuIds = $permissions
            ->filter(function ($permission) {
                return $permission->menu_key === null && $permission->menu_id;
            })
            ->mapWithKeys(function ($permission) {
                return [(string) $permission->menu_id => true];
            });

        $readableMenuIds = $permissions
            ->filter(function ($permission) {
                return $permission->menu_id;
            })
            ->mapWithKeys(function ($permission) {
                return [(string) $permission->menu_id => true];
            });

        $isReadable = function ($menu) use ($readableMenuKeys, $readableLegacyMenuIds, $readableMenuIds) {
            $menuId = (string) $menu->id;
            $menuKey = trim((string) $menu->menu_key);

            if ($menuKey !== '') {
                return $readableMenuKeys->has($menuKey) || $readableLegacyMenuIds->has($menuId);
            }

            return $readableMenuIds->has($menuId);
        };

        $secondaryMenus = $menus
            ->where('position', 'secondary')
            ->groupBy(function ($menu) {
                return (string) $menu->_id;
            });

        $mainMenusByTopic = $menus
            ->where('position', 'main')
            ->filter(function ($menu) {
                return $menu->topic_id !== null;
            })
            ->groupBy(function ($menu) {
                return (string) $menu->topic_id;
            });

        $prepareMainMenu = function ($menu) use ($secondaryMenus, $isReadable) {
            $children = $secondaryMenus->get((string) $menu->id, collect());

            if ($children->isNotEmpty()) {
                $visibleChildren = $children->filter($isReadable)->values();

                if ($visibleChildren->isEmpty()) {
                    return null;
                }

                $menu->setRelation('sidebarChildren', $visibleChildren);

                return $menu;
            }

            if (!$isReadable($menu)) {
                return null;
            }

            $menu->setRelation('sidebarChildren', collect());

            return $menu;
        };

        $tree = collect();

        foreach ($menus as $menu) {
            if ($menu->position === 'topic') {
                $children = $mainMenusByTopic
                    ->get((string) $menu->id, collect())
                    ->map($prepareMainMenu)
                    ->filter()
                    ->values();

                if ($children->isNotEmpty()) {
                    $menu->setRelation('sidebarChildren', $children);
                    $tree->push($menu);
                }

                continue;
            }

            if ($menu->position === 'main' && $menu->topic_id === null) {
                $preparedMenu = $prepareMainMenu($menu);

                if ($preparedMenu) {
                    $tree->push($preparedMenu);
                }
            }
        }

        return $tree;
    }

    public static function subMenu($menu_id){
        $menus = \App\Models\Backend\MenuModel::where(['position'=>'secondary', '_id'=>$menu_id])
        ->where('status','on')
        ->orderby('sort', 'asc')
        ->get();;
        return $menus;
    }

    public static function topicMenu($topic_id)
    {
        return \App\Models\Backend\MenuModel::where('position', 'main')
            ->where('status', 'on')
            ->where('topic_id', $topic_id)
            ->orderBy('sort', 'asc')
            ->get();
    }

    public static function menuCanRead($menu)
    {
        if (!$menu) {
            return false;
        }

        $subs = self::subMenu($menu->id);
        if ($subs->count() > 0) {
            foreach ($subs as $sub) {
                $permission = self::menu_active($sub->id);
                if (data_get($permission, 'read') === 'on') {
                    return true;
                }
            }

            return false;
        }

        $permission = self::menu_active($menu->id);

        return data_get($permission, 'read') === 'on';
    }

    public static function topicHasReadableMenu($topic_id)
    {
        $menus = self::topicMenu($topic_id);

        foreach ($menus as $menu) {
            if (self::menuCanRead($menu)) {
                return true;
            }
        }

        return false;
    }


    public static function getImg($image,$width){
        if($image){
            $html = '<a href="'.$image.'" target="_blank"><img src="'.$image.'" alt="" style="width:'.$width.'%"></a>';
        }else{
            $html = '<a href="no_image.jpg" target="_blank"><img src="no_image.jpg" alt="" style="width:'.$width.'%"></a>';
        }
        return $html;
    }

    public static function date($date){
        return date('d/m/Y',strtotime("+543 Year",strtotime($date)));
    }


    public static function priorityStatus($status){
        if($status == 'low'){ 
            $status = '<span class="badge badge-pill badge-soft-secondary font-size-13">ต่ำ</span>';
        }
        elseif($status == 'medium'){
            $status = '<span class="badge badge-pill badge-soft-primary font-size-13">ปกติ</span>';
        }
        elseif($status == 'high'){
            $status = '<span class="badge badge-pill badge-soft-warning font-size-13">สำคัญ</span>';
        }
        elseif($status == 'urgent'){
            $status = '<span class="badge badge-pill badge-soft-danger font-size-13">เร่งด่วน</span>';
        }
        return $status;
    }
    public static function taskStatus($status){
        if($status == 'new'){ 
            $status = '<span class="badge badge-pill badge-soft-secondary font-size-12">
                            <i class="bx bx-plus-circle me-1"></i> New Case
                        </span>';
        }
        elseif($status == 'in_progress'){
            $status = '<span class="badge badge-pill badge-soft-primary font-size-12">
                            <i class="bx bx-loader-alt bx-spin me-1"></i> กำลังดำเนินงาน
                        </span>';
        }
        elseif($status == 'waiting_info'){
            $status = '<span class="badge badge-pill badge-soft-warning font-size-12">
                            <i class="bx bx-time-five me-1"></i> ขอเอกสารเพิ่มเติม
                        </span>';
        }
        elseif($status == 'pending'){
            $status = '<span class="badge badge-pill badge-soft-dark font-size-12">
                            <i class="bx bx-pause me-1"></i> รอดำเนินการ
                        </span>';
        }
        elseif($status == 'memo'){
            $status = '<span class="badge badge-pill badge-soft-info font-size-12">
                            <i class="bx bx-note me-1"></i> MEMO ใหม่
                        </span>';
        }
        elseif($status == 'ctf'){
            $status = '<span class="badge badge-pill badge-soft-info font-size-12">
                            <i class="bx bx-file me-1"></i> CTF
                        </span>';
        }
        elseif($status == 'done'){
            $status = '<span class="badge badge-pill badge-soft-success font-size-12">
                            <i class="bx bx-check-circle me-1"></i> เสร็จสิ้น
                        </span>';
        }
        elseif($status == 'cancel'){
            $status = '<span class="badge badge-pill badge-soft-danger font-size-12">
                            <i class="bx bx-x-circle me-1"></i> ยกเลิก
                        </span>';
        }
        return $status;
    }
    //=====================
}
