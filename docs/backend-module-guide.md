# Backend Module Guide

เอกสารนี้คือแนวทางมาตรฐานสำหรับเพิ่มเมนู/โมดูลใหม่ใน backend (`webpanel`) ของ template นี้
ให้ทั้งคนและ AI ใช้ pattern เดียวกันเวลาสร้าง Controller, Route, Model, Migration และ View

## Naming Convention

ตัวอย่างนี้ใช้ชื่อโมดูล `Example`

| ส่วน | รูปแบบ | ตัวอย่าง |
| --- | --- | --- |
| Controller | `app/Http/Controllers/Webpanel/{Module}Controller.php` | `ExampleController.php` |
| Model | `app/Models/Backend/{Module}Model.php` | `ExampleModel.php` |
| View folder | `resources/views/back-end/pages/{module}/` | `back-end/pages/example/` |
| Route prefix | `webpanel/{module}` | `webpanel/example` |
| DB table | `tb_{module}` | `tb_example` |
| Permission key | `{module}` หรือ `{group}.{module}` | `example` |

## Files To Copy

ใช้ไฟล์ต้นแบบใน `docs/module-template/`

```txt
docs/module-template/
  ExampleController.php.stub
  ExampleModel.php.stub
  create_tb_examples_table.php.stub
  routes.stub
  views/
    index.blade.php.stub
    add.blade.php.stub
    edit.blade.php.stub
```

## Copy Checklist

1. Copy `ExampleController.php.stub`
   ไปที่ `app/Http/Controllers/Webpanel/{Module}Controller.php`

2. Copy `ExampleModel.php.stub`
   ไปที่ `app/Models/Backend/{Module}Model.php`

3. Copy migration stub
   ไปที่ `database/migrations/YYYY_MM_DD_HHMMSS_create_tb_{module}_table.php`

4. Copy views
   ไปที่ `resources/views/back-end/pages/{module}/`

5. Copy routes จาก `routes.stub`
   ไปใส่ใน `routes/backend-router/web.php`
   ภายใน group:

```php
Route::group(['middleware' => ['Webpanel']], function () {
    Route::prefix('webpanel')->group(function () {
        // put module routes here
    });
});
```

6. เพิ่มเมนูและ permission ใน `tb_menu` / `tb_role_list`
   โดยใช้ `menu_key` ให้ตรงกับ `$menu_key` ใน Controller

7. รันตรวจ:

```bash
php artisan route:list
php artisan test
composer audit --locked
```

## Controller Pattern

Controller ใน template นี้ควรมี method พื้นฐาน:

- `items($parameters)` สำหรับ query list + search + paginate
- `index(Request $request)` สำหรับหน้า list
- `add(Request $request)` สำหรับหน้าเพิ่ม
- `edit(Request $request, $id)` สำหรับหน้าแก้ไข
- `insert(Request $request)` เรียก `store($request, null)`
- `update(Request $request, $id)` เรียก `store($request, $id)`
- `store(Request $request, $id = null)` สำหรับ validate + save
- `destroy(Request $request, $id = null)` สำหรับลบ
- `status($id = null)` สำหรับ toggle status

ทุก action ที่เปลี่ยนข้อมูลควรใช้ `POST` หรือ `PATCH` ไม่ใช้ `GET`

## Permission Pattern

ใช้ helper เดิมของ template:

```php
Helper::canView($this->menu_key);
Helper::canAdd($this->menu_key);
Helper::canEdit($this->menu_key);
Helper::canDelete($this->menu_key);
Helper::forbiddenJson();
Helper::auth_menu();
```

แนวทาง:

- หน้า list/detail ใช้ `canView`
- หน้า add + insert ใช้ `canAdd`
- หน้า edit + update + status ใช้ `canEdit`
- delete ใช้ `canDelete`

## Response Pattern

สำหรับ AJAX form ให้ response เป็น JSON:

```php
return response()->json([
    'title' => 'Success',
    'text' => '',
], 200);
```

ถ้า validation error:

```php
return response()->json([
    'title' => 'Invalid data',
    'text' => $validator->errors()->first(),
], 422);
```

## View Pattern

View ใน backend ใช้ layout include เดิม:

```blade
@include("$prefix.layout.header")
@include("$prefix.layout.header-menu")
@include("$prefix.layout.sidebar")
@include("$prefix.layout.breadcrumb")
@include("$prefix.layout.footer")
@include("$prefix.layout.script")
```

ค่าที่ Controller ควรส่งไปทุกหน้า:

```php
'prefix' => $this->prefix,
'folder' => $this->folder,
'segment' => $this->segment,
'name_page' => $this->name_page,
'navs' => $navs,
```

## AI Prompt Hint

ถ้าต้องให้ AI สร้าง module ใหม่จาก template นี้ ให้บอกประมาณนี้:

```txt
สร้าง backend module ชื่อ {Module} โดย copy pattern จาก docs/module-template
ใช้ permission key {menu_key}
ใช้ route prefix webpanel/{module}
ใช้ table tb_{module}
ใช้ POST สำหรับ create/update/delete/status
สร้าง Controller, Model, Migration, index/add/edit views และเพิ่ม routes
```

