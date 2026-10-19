<?php

namespace App\Http\Controllers\Functions;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Backend\MenuModel;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class FunctionControl extends Controller
{
    private const MAX_UPLOAD_SIZE = 10485760; // 10 MB

    private const IMAGE_MIME_EXTENSIONS = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/gif' => 'gif',
        'image/webp' => 'webp',
    ];

    private const DOCUMENT_MIME_EXTENSIONS = [
        'application/pdf' => 'pdf',
        'application/msword' => 'doc',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx',
        'application/vnd.ms-excel' => 'xls',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx',
    ];

    public static function authorizeAction($menuKey, $action = 'view')
    {
        $menuExists = MenuModel::where('menu_key', $menuKey)->exists();

        if (!$menuExists) {
            return true;
        }

        switch ($action) {
            case 'view':
                return Helper::canView($menuKey);
            case 'add':
                return Helper::canAdd($menuKey);
            case 'edit':
                return Helper::canEdit($menuKey);
            case 'delete':
                return Helper::canDelete($menuKey);
            default:
                return false;
        }
    }

    public static function logException(\Exception $e, $type = 'backend')
    {
        $error_log = $e->getMessage();
        $error_line = $e->getLine();
        $error_url = url()->current();

        \App\Http\Controllers\Webpanel\LogsController::logInsert(
            $error_line,
            $error_url,
            $error_log,
            $type
        );
    }

    protected static function validateUploadFile($file, array $allowedMimeExtensions, string $allowedText)
    {
        if (!$file) {
            return [
                'status' => 400,
                'message' => 'No file uploaded.',
            ];
        }

        if ($file->getSize() > self::MAX_UPLOAD_SIZE) {
            return [
                'status' => 400,
                'message' => 'File size must not exceed 10 MB.',
            ];
        }

        $fileMimeType = $file->getMimeType();
        if (!isset($allowedMimeExtensions[$fileMimeType])) {
            return [
                'status' => 400,
                'message' => 'Invalid file type. Only ' . $allowedText . ' files are allowed.',
            ];
        }

        return [
            'status' => 200,
            'mime' => $fileMimeType,
            'ext' => $allowedMimeExtensions[$fileMimeType],
        ];
    }

    protected static function validateImageUpload($file)
    {
        return self::validateUploadFile($file, self::IMAGE_MIME_EXTENSIONS, 'JPEG, PNG, GIF, and WEBP');
    }

    protected static function validateCustomerUpload($file)
    {
        return self::validateUploadFile(
            $file,
            array_merge(self::IMAGE_MIME_EXTENSIONS, self::DOCUMENT_MIME_EXTENSIONS),
            'image, PDF, Word, and Excel'
        );
    }

    // Image Function
   public static function upload_image($image_file,$folder,$x,$y)
    {
        $arr['status'] = 200;
        $filename = "$folder" . date('dmY-His');
        $file = $image_file;
        if ($file) 
        {
            $validation = self::validateImageUpload($file);
            if ($validation['status'] !== 200) {
                $arr['status'] = $validation['status'];
                $arr['message'] = $validation['message'];
                return $arr;
            }else{
                // $lg = Image::make($file->getRealPath());
                $lg = Image::make($file->getRealPath())->orientate();
                $ext = $validation['ext'];
                $size = $lg->filesize();
    
                $height = Image::make($file)->height();
                $width = Image::make($file)->width();
                $lg->resize($x,$y)->stream();
                $newLG = 'upload/'.$folder.'/' . $filename . '.' . $ext;
                $store = Storage::disk('public')->put($newLG, $lg);
                if($store)
                {
                    $arr['image'] = $newLG;
                    $arr['ext'] = $ext;
                    $arr['size'] = $size;
                }
                return $arr;
            }
           
        }
    }


    public static function upload_image2($image_file,$folder)
    {
        $arr['status'] = 200;
        $filename = "$folder" . date('dmY-His');
        $file = $image_file;
        if ($file) 
        {
            $validation = self::validateImageUpload($file);
            if ($validation['status'] !== 200) {
                $arr['status'] = $validation['status'];
                $arr['message'] = $validation['message'];
                return $arr;
            }
            // $lg = Image::make($file->getRealPath());
            $lg = Image::make($file->getRealPath())->orientate();
            $ext = $validation['ext'];
            $size = $lg->filesize();

            $height = Image::make($file)->height();
            $width = Image::make($file)->width();
            $lg->resize($width, $height)->stream();
            $newLG = 'upload/'.$folder.'/' . $filename . '.' . $ext;
            $store = Storage::disk('public')->put($newLG, $lg);
            if($store)
            {
                $arr['image'] = $newLG;
                $arr['ext'] = $ext;
                $arr['size'] = $size;
            }
        }
        return $arr;
    }

    public static function upload_image3($image_file,$folder,$key)
    {
        $arr['status'] = 200;
        $filename = "$folder" . date('dmY-His'.$key);
        $file = $image_file;
        if ($file) 
        {
            $validation = self::validateImageUpload($file);
            if ($validation['status'] !== 200) {
                $arr['status'] = $validation['status'];
                $arr['message'] = $validation['message'];
                return $arr;
            }
            $lg = Image::make($file->getRealPath());
            $ext = $validation['ext'];
            $size = $lg->filesize();

            $height = Image::make($file)->height();
            $width = Image::make($file)->width();
            $lg->resize($width, $height)->stream();
            $newLG = 'upload/'.$folder.'/' . $filename . '.' . $ext;
            $store = Storage::disk('public')->put($newLG, $lg);
            if($store)
            {
                $arr['image'] = $newLG;
                $arr['ext'] = $ext;
                $arr['size'] = $size;
            }
        }
        return $arr;
    }

    public static function upload_image4($image_file, $folder, $key)
    {
        $arr = [
            'status' => 200,
            'message' => '',
            'image' => '',
            'ext' => '',
            'size' => '',
            'type' => '',
        ];

        $filename = $folder . date('dmY-His') . $key;
        $file = $image_file;

        $validation = self::validateCustomerUpload($file);
        if ($validation['status'] !== 200) {
            $arr['status'] = $validation['status'];
            $arr['message'] = $validation['message'];
            return $arr;
        }

        if (!$file) {
            $arr['status'] = 400;
            $arr['message'] = 'No file uploaded.';
            return $arr;
        }

        // mime type ที่อนุญาต
        $allowedMimeTypes = [
            // Images
            'image/jpeg',
            'image/png',
            'image/gif',
            'image/webp',

            // PDF
            'application/pdf',

            // Word
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',

            // Excel
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ];

        $fileMimeType = $validation['mime'];

        if (!in_array($fileMimeType, $allowedMimeTypes)) {
            $arr['status'] = 400;
            $arr['message'] = 'Invalid file type. Only image, PDF, Word, and Excel files are allowed.';
            return $arr;
        }

        // นามสกุลไฟล์
        $ext = $validation['ext'];
        $newPath = 'upload/' . $folder . '/' . $filename . '.' . $ext;

        // -----------------------------
        // กรณีเป็นรูปภาพ
        // -----------------------------
        if (str_starts_with($fileMimeType, 'image/')) {

            // Normalize uploaded raster images before storing them.
            $img = Image::make($file->getRealPath());

            $size = $file->getSize();
            $width = $img->width();
            $height = $img->height();

            // Keep original dimensions while normalizing the encoded image.
            $img->resize($width, $height)->stream($ext, 90);

            $store = Storage::disk('public')->put($newPath, (string) $img);

            if ($store) {
                $arr['image'] = $newPath;
                $arr['ext'] = $ext;
                $arr['size'] = $size;
                $arr['type'] = 'image';
            }

            return $arr;
        }

        // -----------------------------
        // กรณีเป็นเอกสาร PDF / Word / Excel
        // -----------------------------
        $store = Storage::disk('public')->putFileAs(
            'upload/' . $folder,
            $file,
            $filename . '.' . $ext
        );

        if ($store) {
            $arr['image'] = $newPath;
            $arr['ext'] = $ext;
            $arr['size'] = $file->getSize();

            if ($fileMimeType == 'application/pdf') {
                $arr['type'] = 'pdf';
            } elseif (
                in_array($fileMimeType, [
                    'application/msword',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                ])
            ) {
                $arr['type'] = 'word';
            } elseif (
                in_array($fileMimeType, [
                    'application/vnd.ms-excel',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                ])
            ) {
                $arr['type'] = 'excel';
            } else {
                $arr['type'] = 'file';
            }
        }

        return $arr;
    }

    public static function upload_gallery($image_file,$key,$folder)
    {

        $arr['status'] = 200;
        $filename = date('dmY-His').$key;
        $file = $image_file;
        if ($file) 
        {
            $validation = self::validateImageUpload($file);
            if ($validation['status'] !== 200) {
                $arr['status'] = $validation['status'];
                $arr['message'] = $validation['message'];
                return $arr;
            }

            $lg = Image::make($file->getRealPath());
            $ext = $validation['ext'];
            $size = $lg->filesize();

            $height = Image::make($file)->height();
            $width = Image::make($file)->width();
            $lg->resize($width, $height)->stream();
            $newLG = 'upload/'.$folder.'/' . $filename . '.' . $ext;
            $store = Storage::disk('public')->put($newLG, $lg);
            if($store)
            {
                $arr['image'] = $newLG;
                $arr['ext'] = $ext;
                $arr['size'] = $size;
            }
        }
        return $arr;
    }

}
