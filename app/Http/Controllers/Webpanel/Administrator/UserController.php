<?php

namespace App\Http\Controllers\Webpanel\Administrator;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Functions\FunctionControl;
use App\Http\Controllers\Webpanel\LogsController;
use App\Models\Backend\AdminModel;
use App\Models\Backend\RoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'user';
    protected $folder_controller = 'administrator.user';
    protected $folder = 'administrator/user';
    protected $menu_key = 'administrator.user';
    protected $name_page = 'Users';

    public function items($parameters)
    {
        $keyword = Arr::get($parameters, 'keyword');
        $role = Arr::get($parameters, 'role');
        $paginate = Arr::get($parameters, 'total', 25);

        $query = AdminModel::with(['roles', 'Role']);

        if ($keyword) {
            $keyword = trim($keyword);
            $query->where(function ($q) use ($keyword) {
                $q->where('firstname', 'LIKE', "%{$keyword}%")
                    ->orWhere('lastname', 'LIKE', "%{$keyword}%")
                    ->orWhere('nickname', 'LIKE', "%{$keyword}%")
                    ->orWhere('code', 'LIKE', "%{$keyword}%")
                    ->orWhere('unit_code', 'LIKE', "%{$keyword}%");
            });
        }

        if ($role) {
            $query->where(function ($q) use ($role) {
                $q->where('role', $role)
                    ->orWhereHas('roles', function ($roleQuery) use ($role) {
                        $roleQuery->where('tb_role.id', $role);
                    });
            });
        }

        return $query->where('id', '!=', 1)
            ->orderBy('id', 'asc')
            ->paginate($paginate);
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
            '0' => ['url' => 'javascript:void(0)', 'name' => 'Administrator', 'last' => 0],
            '1' => ['url' => "$this->segment/$this->folder", 'name' => $this->name_page, 'last' => 1],
        ];

        return view("$this->prefix.pages.$this->folder_controller.index", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'navs' => $navs,
            'items' => $items,
            'roles' => RoleModel::where(['isActive' => 'Y'])->get(),
        ]);
    }

    public function add(Request $request)
    {
        if (!Helper::canAdd($this->menu_key)) {
            return Helper::auth_menu();
        }

        $navs = [
            '0' => ['url' => 'javascript:void(0)', 'name' => 'Administrator', 'last' => 0],
            '1' => ['url' => "$this->segment/$this->folder", 'name' => $this->name_page, 'last' => 1],
            '2' => ['url' => "$this->segment/$this->folder/add", 'name' => 'Add', 'last' => 1],
        ];

        return view("$this->prefix.pages.$this->folder_controller.add", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'navs' => $navs,
            'roles' => RoleModel::where(['isActive' => 'Y'])->get(),
        ]);
    }

    public function edit(Request $request, $id)
    {
        if (!Helper::canEdit($this->menu_key)) {
            return Helper::auth_menu();
        }

        $row = AdminModel::with(['roles', 'Role'])->find($id);
        $selectedRoleId = null;

        if ($row) {
            $selectedRoleId = collect($row->getRoleIds())->first();
        }

        $navs = [
            '0' => ['url' => 'javascript:void(0)', 'name' => 'Administrator', 'last' => 0],
            '1' => ['url' => "$this->segment/$this->folder", 'name' => $this->name_page, 'last' => 1],
            '2' => ['url' => "$this->segment/$this->folder/edit/$id", 'name' => 'Edit', 'last' => 1],
        ];

        return view("$this->prefix.pages.$this->folder_controller.edit", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'navs' => $navs,
            'roles' => RoleModel::where(['isActive' => 'Y'])->get(),
            'row' => $row,
            'selectedRoleId' => $selectedRoleId,
        ]);
    }

    public function view(Request $request, $id)
    {
        if (!Helper::canView($this->menu_key)) {
            return Helper::auth_menu();
        }

        return view("$this->prefix.pages.$this->folder_controller.view", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'roles' => RoleModel::where(['isActive' => 'Y'])->get(),
            'row' => AdminModel::find($id),
        ]);
    }

    public function status($id = null)
    {
        if (!Helper::canEdit($this->menu_key)) {
            return Helper::forbiddenJson();
        }

        $data = AdminModel::find($id);
        if (!$data || (int) $data->id === 1) {
            return response()->json(false, 404);
        }

        $data->isActive = ($data->isActive === 'Y') ? 'N' : 'Y';

        return response()->json((bool) $data->save());
    }

    public function destroy(Request $request, $id = null)
    {
        if (!Helper::canDelete($this->menu_key)) {
            return Helper::forbiddenJson();
        }

        $ids = collect(explode(',', (string) ($id ?: $request->id)))
            ->map(fn ($value) => (int) $value)
            ->filter(fn ($value) => $value > 1)
            ->unique()
            ->values();

        if ($ids->isEmpty()) {
            return response()->json(false, 422);
        }

        AdminModel::whereIn('id', $ids->all())->delete();

        return response()->json(true);
    }

    public function insert(Request $request, $id = null)
    {
        return $this->store($request, null);
    }

    public function update(Request $request, $id)
    {
        return $this->store($request, $id);
    }

    public function store(Request $request, $id = null)
    {
        if ($id === null && !Helper::canAdd($this->menu_key)) {
            return Helper::forbiddenJson();
        }

        if ($id !== null && !Helper::canEdit($this->menu_key)) {
            return Helper::forbiddenJson();
        }

        try {
            DB::beginTransaction();

            if (!$this->emailAvailable($request->email, $id)) {
                return response()->json([
                    'message' => 'Error',
                    'title' => 'Duplicate email',
                    'text' => 'This email already exists.',
                ], 500);
            }

            $phone = trim((string) $request->phone);
            if ($phone !== '' && !preg_match('/^0[0-9]{9}$/', $phone)) {
                return response()->json([
                    'message' => 'Error',
                    'title' => 'รูปแบบเบอร์โทรศัพท์ไม่ถูกต้อง',
                    'text' => 'กรุณากรอกเบอร์โทรศัพท์ 10 หลัก เช่น 0812345678',
                ], 422);
            }

            $data = $id === null ? new AdminModel() : AdminModel::find($id);
            if (!$data) {
                return response()->json(false, 404);
            }

            if ($id === null) {
                $data->created_at = now();
                $data->password = bcrypt($request->password);
            } elseif ($request->filled('password')) {
                $data->password = bcrypt($request->password);
            }

            $roleIds = collect($request->input('role_ids', []))
                ->filter(fn ($roleId) => $roleId !== null && $roleId !== '')
                ->map(fn ($roleId) => (int) $roleId)
                ->unique()
                ->values();

            if ($roleIds->isEmpty() && $request->filled('role')) {
                $roleIds = collect([(int) $request->input('role')]);
            }

            $primaryRoleId = $roleIds->first();

            $data->updated_at = now();
            $data->isActive = $request->isActive;
            $data->firstname = $request->firstname;
            $data->lastname = $request->lastname;
            $data->email = $request->email;
            $data->phone = $phone !== '' ? $phone : null;
            $data->role = $primaryRoleId ?: null;

            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($data->image);
                $image = FunctionControl::upload_image($request->file('image'), 'profile', 300, 300);
                $data->image = $image['image'] ?? $data->image;
            }

            $data->save();
            $data->roles()->sync($roleIds->all());

            DB::commit();

            return response()->json(['title' => 'Success', 'text' => ''], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            LogsController::logInsert($e->getLine(), url()->current(), $e->getMessage(), 'backend');

            return response()->json([
                'message' => 'Error',
                'title' => 'Something went wrong',
                'text' => 'Please try again.',
            ], 500);
        }
    }

    protected function emailAvailable($email, $id = null): bool
    {
        $query = AdminModel::where('email', $email);

        if ($id !== null) {
            $query->where('id', '!=', $id);
        }

        return !$query->exists();
    }
}
