<?php

namespace App\Http\Controllers\Webpanel\Administrator;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Webpanel\LogsController;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

use App\Models\Backend\RoleModel;
use App\Models\Backend\Role_listModel;

class PermissionController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'permission';
    protected $folder_controller = 'administrator.permission';
    protected $folder = 'administrator/permission';
    protected $name_page = "สิทธิ์การใช้งาน";
    protected $menu_key = 'administrator.permission';

    public function imageSize($find = null)
    {
        $arr = [
            'cover' => [
                'sm' => ['x' => 34, 'y' => 34],
                'md' => ['x' => 2505, 'y' => 1305],
            ],
        ];
        if ($find == null) {
            return $arr;
        } else {
            switch ($find) {
                case 'cover':
                    return $arr['cover'];
                    break;
                case 'gallery':
                    return $arr['gallery'];
                    break;
                default:
                    return [];
                    break;
            }
        }
    }

    public function items($parameters)
    {
        $search = Arr::get($parameters, 'search');
        $paginate = Arr::get($parameters, 'total', 15);
        $query = new RoleModel;
        if ($search) {
            $query = $query->where('name_th', 'LIKE', '%' . trim($search) . '%');
            $query = $query->where('name_en', 'LIKE', '%' . trim($search) . '%');
        }
        $query = $query->orderBy('id', 'asc');
        $results = $query->paginate($paginate);
        return $results;
    }

    public function index(Request $request)
    {
        if (!Helper::canView($this->menu_key)) {
            return Helper::auth_menu();
        }

        $items = $this->items($request->all());
        $items->pages = new \stdClass();
        $items->pages->start = ($items->perPage() * $items->currentPage()) - $items->perPage();

        $navs = [
            '0' => ['url' => "javascript:void(0)", 'name' => "Administrator", "last" => 0],
            '1' => ['url' => "$this->segment/$this->folder", 'name' => "สิทธิ์การใช้งาน", "last" => 1],
        ];
        return view("$this->prefix.pages.$this->folder_controller.index", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'navs' => $navs,
            'items' => $items,
        ]);
    }

    public function add(Request $request)
    {
        if (!Helper::canAdd($this->menu_key)) {
            return Helper::auth_menu();
        }

        $navs = [
            '0' => ['url' => "javascript:void(0)", 'name' => "Administrator", "last" => 0],
            '1' => ['url' => "$this->segment/$this->folder", 'name' => "สิทธิ์การใช้งาน", "last" => 0],
            '2' => ['url' => "$this->segment/$this->folder/add", 'name' => "Add", "last" => 1],
        ];
        return view("$this->prefix.pages.$this->folder_controller.add", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'navs' => $navs,
        ]);
    }

    public function edit(Request $request, $id)
    {
        if (!Helper::canEdit($this->menu_key)) {
            return Helper::auth_menu();
        }

        $navs = [
            '0' => ['url' => "javascript:void(0)", 'name' => "Administrator", "last" => 0],
            '1' => ['url' => "$this->segment/$this->folder", 'name' => "สิทธิ์การใช้งาน", "last" => 0],
            '2' => ['url' => "$this->segment/$this->folder/edit/$id", 'name' => "แก้ไข", "last" => 1],
        ];
        return view("$this->prefix.pages.$this->folder_controller.edit", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'navs' => $navs,
            'row' => RoleModel::find($id),
            'roles' => RoleModel::where(['isActive' => 'Y'])->get(),
            'menus' => \App\Models\Backend\MenuModel::where('status', 'on')
                ->whereIn('position', ['topic', 'main'])
                ->orderBy('sort', 'asc')
                ->orderBy('id', 'asc')
                ->get(),
        ]);
    }

    public function status($id = null)
    {
        if (!Helper::canEdit($this->menu_key)) {
            return Helper::forbiddenJson();
        }

        $data = RoleModel::find($id);
        $data->status = ($data->status == 'inactive') ? 'active' : 'inactive';
        if ($data->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }

    public function destroy(Request $request)
    {
        if (!Helper::canDelete($this->menu_key)) {
            return Helper::forbiddenJson();
        }

        $datas = RoleModel::find(explode(',', $request->id));
        if (@$datas) {
            foreach ($datas as $data) {
                $lists = Role_listModel::where('role_id', $data->id)->delete();

                $query = RoleModel::destroy($data->id);
            }
        }

        if (@$query) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    //==== Function Insert Update Delete Status Sort & Others ====
    public function insert(Request $request, $id = null)
    {
        return $this->store($request, $id = null);
    }
    public function update(Request $request, $id)
    {
        return $this->store($request, $id);
    }
    public function store($request, $id = null)
    {
        if ($id === null && !Helper::canAdd($this->menu_key)) {
            return Helper::forbiddenJson();
        }

        if ($id !== null && !Helper::canEdit($this->menu_key)) {
            return Helper::forbiddenJson();
        }


        try {
            DB::beginTransaction();
            if ($id == null) {
                $data = new RoleModel();
                $data->created_at = date('Y-m-d H:i:s');
                $data->updated_at = date('Y-m-d H:i:s');
            } else {
                $data = RoleModel::find($id);
                $data->updated_at = date('Y-m-d H:i:s');
            }
            $isActive = 'N';
            if ($request->filled('isActive') && $request->isActive === 'Y') {
                $isActive = 'Y';
            }
            $data->isActive = $isActive;
            $data->name = $request->name;
            $data->detail = $request->detail;
            if ($data->save()) {
                $roleId = $data->id;

                DB::commit();
                if($request->filled('menus'))
                {
                    DB::beginTransaction();
                    foreach($request->input('menus', []) as $menu_id => $permissionInput)
                    {
                        $menu_id = (int) $menu_id;
                        $menu_key = trim((string) ($permissionInput['menu_key'] ?? ''));

                        $role = null;
                        if ($menu_key !== '') {
                            $role = Role_listModel::where([
                                'role_id' => $roleId,
                                'menu_key' => $menu_key,
                            ])->first();
                        }

                        if (!$role && $menu_id) {
                            $role = Role_listModel::where([
                                'role_id' => $roleId,
                                'menu_id' => $menu_id,
                            ])->first();
                        }

                        if($role)
                        {
                            $data = Role_listModel::find($role->id);
                        }
                        else
                        {
                            $data = new Role_listModel();
                        }

                        $data->role_id = $roleId;
                        $data->menu_id = $menu_id ?: null;
                        $data->menu_key = $menu_key !== '' ? $menu_key : null;
                        $data->read = (($permissionInput['read'] ?? null) === "on") ? "on" : "off";
                        $data->add = (($permissionInput['add'] ?? null) === "on") ? "on" : "off";
                        $data->edit = (($permissionInput['edit'] ?? null) === "on") ? "on" : "off";
                        $data->delete = (($permissionInput['delete'] ?? null) === "on") ? "on" : "off";
                        $data->save();
                    }
                    DB::commit();
                }
                return response()->json(["title"=> "ดำเนินรายการสำเร็จ","text"=> "",],200);
            } else {
                return response()->json(["title"=> "Something went wrongs.","text"=> "Please try again",],500);
            }
        } catch (\Exception $e) {
            DB::rollback();
            $error_log = $e->getMessage();
            $error_line = $e->getLine();
            $type_log = 'backend';
            $error_url = url()->current();
            LogsController::logInsert($error_line,$error_url,$error_log,$type_log);
            return response()->json(["title"=> "ไม่สามารถทำรายการได้","text"=> "กรุณาทำรายการใหม่อีกครั้ง !",],500);
        }
    }


    public function checkPermission(){
        
    }

}
