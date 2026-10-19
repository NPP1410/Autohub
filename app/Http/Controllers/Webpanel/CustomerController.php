<?php

namespace App\Http\Controllers\Webpanel;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Backend\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'customer';
    protected $folder_controller = 'customer';
    protected $folder = 'customer';
    protected $menu_key = 'customer';
    protected $name_page = 'Customer';

    public function items(array $parameters)
    {
        $keyword = trim((string) Arr::get($parameters, 'keyword'));
        $customerType = Arr::get($parameters, 'customer_type');
        $status = Arr::get($parameters, 'status');
        $paginate = (int) Arr::get($parameters, 'total', 25);

        $query = CustomerModel::query();

        if ($keyword !== '') {
            $query->where(function ($builder) use ($keyword) {
                $builder->where('code', 'like', "%{$keyword}%")
                    ->orWhere('name', 'like', "%{$keyword}%")
                    ->orWhere('tax_id', 'like', "%{$keyword}%")
                    ->orWhere('contact_name', 'like', "%{$keyword}%")
                    ->orWhere('phone', 'like', "%{$keyword}%");
            });
        }

        if (in_array($customerType, ['company', 'individual', 'government', 'other'], true)) {
            $query->where('customer_type', $customerType);
        }

        if (in_array($status, ['Y', 'N'], true)) {
            $query->where('isActive', $status);
        }

        return $query->latest('id')->paginate(in_array($paginate, [10, 25, 50, 100], true) ? $paginate : 25);
    }

    public function index(Request $request)
    {
        if (!Helper::canView($this->menu_key)) {
            return Helper::auth_menu();
        }

        $items = $this->items($request->all());
        $items->pages = (object) [
            'start' => ($items->perPage() * $items->currentPage()) - $items->perPage(),
        ];

        return view("$this->prefix.pages.$this->folder_controller.index", $this->viewData([
            'items' => $items,
            'stats' => [
                'total' => CustomerModel::count(),
                'ready' => CustomerModel::whereNotNull('address')->where('address', '!=', '')->count(),
                'organizations' => CustomerModel::whereIn('customer_type', ['company', 'government'])->count(),
                'credit' => CustomerModel::where('credit_days', '>', 0)->count(),
            ],
            'navs' => $this->navs(),
        ]));
    }

    public function add()
    {
        if (!Helper::canAdd($this->menu_key)) {
            return Helper::auth_menu();
        }

        return view("$this->prefix.pages.$this->folder_controller.add", $this->viewData([
            'row' => new CustomerModel(['customer_type' => 'company', 'credit_days' => 0, 'isActive' => 'Y']),
            'navs' => $this->navs('เพิ่มลูกค้า'),
        ]));
    }

    public function edit($id)
    {
        if (!Helper::canEdit($this->menu_key)) {
            return Helper::auth_menu();
        }

        return view("$this->prefix.pages.$this->folder_controller.edit", $this->viewData([
            'row' => CustomerModel::findOrFail($id),
            'navs' => $this->navs('แก้ไขลูกค้า'),
        ]));
    }

    public function insert(Request $request)
    {
        return $this->store($request);
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

        $validator = Validator::make($request->all(), [
            'customer_type' => ['required', 'in:company,individual,government,other'],
            'name' => ['required', 'string', 'max:255'],
            'tax_id' => ['nullable', 'string', 'max:20'],
            'branch_code' => ['nullable', 'string', 'max:10'],
            'branch_name' => ['nullable', 'string', 'max:100'],
            'contact_name' => ['nullable', 'string', 'max:150'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:150'],
            'address' => ['nullable', 'string'],
            'subdistrict' => ['nullable', 'string', 'max:100'],
            'district' => ['nullable', 'string', 'max:100'],
            'province' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:10'],
            'credit_days' => ['nullable', 'integer', 'min:0', 'max:3650'],
            'note' => ['nullable', 'string'],
            'isActive' => ['required', 'in:Y,N'],
        ], [
            'name.required' => 'กรุณาระบุชื่อลูกค้า',
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            'credit_days.integer' => 'เครดิตการค้าต้องเป็นตัวเลข',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'title' => 'ข้อมูลไม่ครบถ้วน',
                'text' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();

        try {
            $validated = $validator->validated();

            if ($id === null) {
                $data = new CustomerModel();
                $data->created_at = now();
                $data->created_by = Auth::guard('admin')->id();
            } else {
                $data = CustomerModel::find($id);

                if (!$data) {
                    DB::rollBack();

                    return response()->json([
                        'title' => 'ไม่พบข้อมูลลูกค้า',
                        'text' => 'ข้อมูลลูกค้าที่ต้องการแก้ไขอาจถูกลบไปแล้ว',
                    ], 404);
                }
            }

            $data->updated_at = now();
            $data->updated_by = Auth::guard('admin')->id();
            $data->customer_type = $validated['customer_type'];
            $data->name = $validated['name'];
            $data->tax_id = $validated['tax_id'] ?? null;
            $data->branch_code = $validated['branch_code'] ?? null;
            $data->branch_name = $validated['branch_name'] ?? null;
            $data->contact_name = $validated['contact_name'] ?? null;
            $data->phone = $validated['phone'] ?? null;
            $data->email = $validated['email'] ?? null;
            $data->address = $validated['address'] ?? null;
            $data->subdistrict = $validated['subdistrict'] ?? null;
            $data->district = $validated['district'] ?? null;
            $data->province = $validated['province'] ?? null;
            $data->postal_code = $validated['postal_code'] ?? null;
            $data->credit_days = (int) ($validated['credit_days'] ?? 0);
            $data->note = $validated['note'] ?? null;
            $data->isActive = $validated['isActive'];

            if (!$data->save()) {
                DB::rollBack();

                return response()->json([
                    'message' => 'Error',
                    'title' => 'เกิดข้อผิดพลาด',
                    'text' => 'กรุณาลองใหม่อีกครั้ง',
                ], 500);
            }

            if (!$data->code) {
                $data->code = 'CUS' . str_pad((string) $data->id, 5, '0', STR_PAD_LEFT);

                if (!$data->save()) {
                    DB::rollBack();

                    return response()->json([
                        'message' => 'Error',
                        'title' => 'เกิดข้อผิดพลาด',
                        'text' => 'ไม่สามารถสร้างรหัสลูกค้าได้ กรุณาลองใหม่อีกครั้ง',
                    ], 500);
                }
            }

            DB::commit();

            return response()->json([
                'title' => 'ดำเนินรายการสำเร็จ',
                'text' => 'บันทึกข้อมูลลูกค้า ' . $data->code . ' เรียบร้อยแล้ว',
                'redirect' => url("$this->segment/$this->folder"),
            ], 200);
        } catch (\Throwable $exception) {
            DB::rollBack();
            report($exception);

            return response()->json([
                'message' => 'Error',
                'title' => 'เกิดข้อผิดพลาด',
                'text' => 'ไม่สามารถบันทึกข้อมูลลูกค้าได้ กรุณาลองใหม่อีกครั้ง',
            ], 500);
        }
    }

    public function status($id)
    {
        if (!Helper::canEdit($this->menu_key)) {
            return Helper::forbiddenJson();
        }

        $customer = CustomerModel::findOrFail($id);
        $customer->isActive = $customer->isActive === 'Y' ? 'N' : 'Y';
        $customer->updated_by = Auth::guard('admin')->id();
        $customer->save();

        return response()->json(['success' => true, 'status' => $customer->isActive]);
    }

    public function destroy($id)
    {
        if (!Helper::canDelete($this->menu_key)) {
            return Helper::forbiddenJson();
        }

        CustomerModel::findOrFail($id)->delete();

        return response()->json(['success' => true]);
    }

    protected function viewData(array $data = []): array
    {
        return array_merge([
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
        ], $data);
    }

    protected function navs(?string $current = null): array
    {
        $navs = [
            ['url' => 'javascript:void(0)', 'name' => 'CRM', 'last' => 0],
            ['url' => "$this->segment/$this->folder", 'name' => 'ลูกค้า', 'last' => $current ? 0 : 1],
        ];

        if ($current) {
            $navs[] = ['url' => 'javascript:void(0)', 'name' => $current, 'last' => 1];
        }

        return $navs;
    }
}
