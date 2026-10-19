<?php

namespace App\Http\Controllers\Webpanel;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Backend\AdminModel;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'dashboard';
    protected $folder = 'dashboard';
    protected $menu_key = 'dashboard';

    public function imageSize($find = null)
    {
        $arr = [
            'cover' => [
                'sm' => ['x' => 34, 'y' => 34],
                'md' => ['x' => 300, 'y' => 300],
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
    public function index(Request $request)
    {

    
        if (!Helper::canView($this->menu_key)) {
            return Helper::auth_menu();
        }


        $navs = [
            '0' => ['url' => "javascript:void(0)", 'name' => "หน้าแรก", "last" => 0],
        ];
        return view("$this->prefix.pages.$this->folder.index", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'navs' => $navs,
        ]);
    }
    public function profile(Request $request)
    {
        $navs = [
            '0' => ['url' => "javascript:void(0)", 'name' => "หน้าแรก", "last" => 0],
        ];
        return view("$this->prefix.pages.$this->folder.profile", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'navs' => $navs,
            'row' => AdminModel::find(Auth::guard('admin')->id()),
        ]);
    }

    public function profileSubmit(Request $request, $id = null)
    {
        try {
            DB::beginTransaction();
            $check = $this->check_user($request,Auth::guard('admin')->id(),$request->email);
            if($check != "yes")
            {
                return response()->json([
                    "message"=> "Error",
                    "title"=> "เกิดข้อผิดพลาด",
                    "text"=> "อีเมลหรือผู้ใช้งานนี้มีอยู่ภายในระบบ !",
                ],500);
            }
            $data = AdminModel::find(Auth::guard('admin')->id());
            $data->updated_at = date('Y-m-d H:i:s');
            if($request->password != null)
            {
                $data->password = bcrypt($request->password);
            }
            $data->firstname = $request->firstname;
            $data->lastname = $request->lastname;
            $data->email = $request->email;
            $data->phone = $request->phone;
            // Image upload
            $filename = 'admin_' . date('dmY-His');
            $file = $request->image;
            if ($file) 
            {
                $lg = Image::make($file->getRealPath());
                $ext = explode("/", $lg->mime())[1];
                $size = $this->imageSize();
                $lg->resize($size['cover']['md']['x'], $size['cover']['md']['y'])->stream();
                $newLG = 'upload/admin/' . $filename . '.' . $ext;
                $store = Storage::disk('public')->put($newLG, $lg);
                if($store)
                {
                    $data->image = $newLG;
                }
            }

            if ($data->save()) {
                DB::commit();
                return response()->json([
                    "title"=> "ดำเนินรายการสำเร็จ",
                    "text"=> "",
                ],200);
            } else {
                return response()->json([
                    "message"=> "Error",
                    "title"=> "เกิดข้อผิดพลาด",
                    "text"=> "กรุณาลองใหม่อีกครั้ง !",
                ],500);
            }
        } catch (\Exception $e) {
            DB::rollback();
            $error_log = $e->getMessage();
            $error_line = $e->getLine();
            $type_log = 'backend';
            $error_url = url()->current();
            LogsController::logInsert($error_line,$error_url,$error_log,$type_log);
            return response()->json([
                "message"=> "Error",
                "title"=> "เกิดข้อผิดพลาด",
                "text"=> "กรุณาลองใหม่อีกครั้ง !",
            ],500);
        }
    }
    public function check_user(Request $request, $id = null, $email)
    {
        if ($id == null) {
            $check = AdminModel::where('email', $email)->first();
            if ($check) 
            {
                $check_true = "no";
            } else {
                $check_true = "yes";
            }
        } else {
            $check = AdminModel::where('email', $email)->where('id', '!=', $id)->first();
            if ($check) {
                $check_true = "no";
            } else {
                $check_true = "yes";
            }
        }
        return $check_true;
    }
    

    
}
