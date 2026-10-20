# Sevenstar Project Readme

เอกสารนี้สรุปภาพรวมโปรเจกต์เพื่อใช้เป็น context เวลาถามงาน, debug, และพัฒนาต่อใน repo นี้

## 1. Project Overview

- โปรเจกต์นี้เป็น Laravel 8 บน PHP 8.1
- ลักษณะระบบปัจจุบันคือ backend/admin panel ภายใต้ path `webpanel/*`
- ฟีเจอร์ที่เห็นชัดใน repo ตอนนี้คือ
  - login ฝั่ง admin
  - บังคับเลือก company/office หลัง login
  - dashboard / profile
  - task tracking
  - user management
  - permission / role management
- มี asset/demo/template จำนวนมากใน `public/demo`, `public/assets`, `public/landing-page`, `public/ckeditor` ซึ่งไม่ใช่ business logic หลัก

## 2. Core Stack

### Backend

- Laravel `^8.0`
- Auth แบบหลาย guard
- Eloquent model
- Blade view
- Middleware แบบ custom
- DB schema ใช้ migration และมีไฟล์ dump `sevenstar_pipatdev.sql`

### Packages สำคัญ

- `barryvdh/laravel-dompdf`
- `maatwebsite/excel`
- `phpoffice/phpspreadsheet`
- `intervention/image`
- `yajra/laravel-datatables-oracle`
- `fabpot/goutte`
- `guzzlehttp/guzzle`

### Frontend build

- Laravel Mix 5
- Webpack
- jQuery-centric UI
- Select2 / SweetAlert2 / Bootstrap style admin theme

## 3. Top-Level Structure

โฟลเดอร์สำคัญ:

- `app/`
  - business logic หลัก, controllers, models, middleware, helpers
- `routes/`
  - route entry points ของระบบ
- `resources/views/back-end/`
  - Blade ของ backend panel
- `database/migrations/`
  - schema evolution
- `database/seeders/`
  - seed/sample permission data
- `public/`
  - static assets, uploaded/demo assets, CKEditor, theme files
- `docs/`
  - เอกสารโปรเจกต์

## 4. Request Flow ที่ใช้จริง

### Route entry

- `routes/web.php`
  - โหลด route หลัก
  - include `routes/backend-router/web.php`
  - มี route frontend/ajax บางตัวอ้าง controller ที่ไม่มีใน repo ชุดนี้

### Backend route file

- `routes/backend-router/web.php`
  - `webpanel/login`
  - `webpanel/login-office`
  - `webpanel/logout`
  - route กลุ่มที่ถูกครอบด้วย middleware `Webpanel`

### Middleware

- `app/Http/Middleware/Webpanel.php`
  - ต้อง login ด้วย guard `admin`
  - ต้องมี session `office_id`
  - ถ้ายังไม่เลือก office จะถูก redirect ไป `webpanel/login-office`

## 5. Authentication Design

ไฟล์อ้างอิง:

- `config/auth.php`
- `app/Http/Controllers/Webpanel/AuthController.php`
- `app/Models/Authuse/Admin.php`
- `app/Models/Backend/AdminModel.php`

### Guard / Provider

- `admin` guard ใช้ provider `admins`
- provider `admins` map ไป model `App\Models\Authuse\Admin`
- class `Authuse\Admin` ใช้สำหรับ login/authentication
- class `Backend\AdminModel` ใช้สำหรับ query business data, relation, role, office

สรุปคือระบบแยก model สำหรับ auth กับ model สำหรับงาน backend แต่ทั้งคู่ชี้ table เดียวกันคือ `tb_admin`

### Login flow

1. เข้า `webpanel/login`
2. login ด้วย `Auth::guard('admin')`
3. ถ้าสำเร็จ จะ clear `office_id`
4. redirect ไป `webpanel/login-office`
5. ผู้ใช้ต้องเลือก office/company ก่อนเข้า backend จริง

### Office selection

- `postLoginOffice()` รับ `office_id`
- จำกัด office ที่เลือกได้แค่ `1, 2, 3`
- ใช้ `Helper::adminHasOffice($officeId)` ตรวจว่า user มีสิทธิ์ office นั้นหรือไม่
- ถ้าผ่าน จะเก็บ `session(['office_id' => $office_id])`

## 6. Permission Model

ไฟล์อ้างอิง:

- `app/Helpers/Helper.php`
- `app/Models/Backend/RoleModel.php`
- `app/Models/Backend/Role_listModel.php`
- `app/Models/Backend/MenuModel.php`
- `resources/views/back-end/layout/sidebar.blade.php`
- `resources/views/back-end/pages/administrator/permission/edit.blade.php`
- `docs/permission-sample.md`

### Table ที่เกี่ยวข้อง

- `tb_role`
- `tb_role_list`
- `tb_menu`
- `tb_admin_role`
- `tb_admin_office`

### แนวคิดสิทธิ์

ระบบสิทธิ์ปัจจุบันใช้ `menu_key` เป็นแกนหลัก

- `Helper::canView('task')`
- `Helper::canAdd('administrator.user')`
- `Helper::canEdit('profile')`
- `Helper::canDelete('administrator.permission')`

permission ที่เก็บต่อ menu:

- `read`
- `add`
- `edit`
- `delete`

### Sidebar behavior

sidebar จะ render menu จาก `tb_menu` และซ่อน/แสดงตาม `tb_role_list.read`

menu support ทั้ง

- `topic`
- `main`
- `secondary`

### Multi-role support

`AdminModel` รองรับหลาย role ผ่าน relation:

- `roles()` -> pivot `tb_admin_role`
- `Role()` -> legacy single role จาก column `role`

ระบบปัจจุบันพยายามรองรับทั้งโครงสร้างใหม่และของเดิมพร้อมกัน

## 7. Main Modules

### 7.1 Dashboard / Profile

ไฟล์:

- `app/Http/Controllers/Webpanel/DashboardController.php`
- `resources/views/back-end/pages/dashboard/index.blade.php`
- `resources/views/back-end/pages/dashboard/profile.blade.php`

สิ่งที่ทำ:

- dashboard หน้าแรกยังแทบว่าง
- profile ใช้แก้ข้อมูล admin ที่ login อยู่
- profile upload รูปเข้า `storage/app/public/upload/admin/...`

หมายเหตุ:

- `DashboardController` import `TaskModel` แต่ไม่ได้ใช้งานจริงใน method ปัจจุบัน

### 7.2 Removed Task Module

ไฟล์:

- Task controller and task views were removed from the active template.
- Active route/menu/permission seeds no longer include `menu_key = task`.
- The old task dependencies were incomplete in this repo.

แนวคิด:

- ใช้ `menu_key = task`
- มี list / add / edit / view
- มี comment ต่อ task
- รองรับ upload ไฟล์/รูปแนบ
- มี task status หลัก:
  - `new`
  - `in_progress`
  - `waiting_info`
  - `pending`
  - `memo`
  - `ctf`
  - `done`
  - `cancel`

logic สำคัญ:

- ถ้า user ไม่ใช่ role `1` หรือ `5` จะเห็นเฉพาะ task ของตัวเอง
- admin role `1` และ `5` ถูก hardcode เป็น privileged roles ในหลายจุด
- หน้า list มี filter keyword, date, user, department, assignee

ข้อสังเกตสำคัญ:

- controller นี้อ้าง model หลายตัวที่ไม่พบใน repo ชุดนี้ เช่น
  - `TaskModel`
  - `Task_commentModel`
  - `Task_imageModel`
  - `Task_comment_imageModel`
  - `DepartModel`
  - `CustomerModel`
- สถานะปัจจุบัน: task module ถูกถอดออกจาก active template แล้ว

### 7.3 Administrator User Management

ไฟล์:

- `app/Http/Controllers/Webpanel/Administrator/UserController.php`
- `resources/views/back-end/pages/administrator/user/*.blade.php`

สิ่งที่ทำ:

- list user
- filter ตาม keyword / role
- create / edit user
- assign หลาย role
- assign หลาย office
- assign team
- upload เอกสารประกอบ เช่น
  - profile image
  - id card
  - house file
  - signature
  - emergency contact files
- import user จาก CSV

schema ที่เกี่ยวข้อง:

- `tb_admin`
- `tb_admin_role`
- `tb_admin_office`
- `tb_setting_team`
- `tb_office`

### 7.4 Permission Management

ไฟล์:

- `app/Http/Controllers/Webpanel/Administrator/PermissionController.php`
- `resources/views/back-end/pages/administrator/permission/*.blade.php`

สิ่งที่ทำ:

- list role
- edit role detail
- edit matrix สิทธิ์ราย menu
- filter menu ตาม `menu_type`

menu types ที่รองรับ:

- `all`
- `shared`
- `sale`
- `account`
- `administrative`
- `administrator`

หมายเหตุ:

- permission screen รองรับ menu tree + secondary menu
- ใช้ `menu_key` ควบคู่ `menu_id` เพื่อให้ refactor route/menu ได้ยืดหยุ่นขึ้น

### 7.5 Logs

ไฟล์:

- `app/Http/Controllers/Webpanel/Log/LogController.php`
- `app/Http/Controllers/Webpanel/LogsController.php`

สิ่งที่เห็น:

- `LogController` ใช้ดู log รายวันจาก `tb_logs` / `tb_logs_list`
- controller หลายตัวเรียก `LogsController::logInsert(...)` เวลา exception

## 8. Important Models

### `AdminModel`

หน้าที่:

- backend user model สำหรับ query
- relation role / office
- helper methods เช่น
  - `getRoleIds()`
  - `hasAnyRole()`
  - `getOfficeIds()`
  - `hasOffice()`
  - `roleNames()`

### `MenuModel`

- เก็บโครงสร้างเมนู backend
- fields สำคัญ:
  - `_id`
  - `topic_id`
  - `menu_key`
  - `menu_type`
  - `url`
  - `position`
  - `sort`
  - `status`

### `RoleModel`

- เก็บ role หลัก

### `Role_listModel`

- เก็บ permission per menu per role
- รองรับหา permission ด้วย `menu_key` หรือ `menu_id`

### `OfficeModel`

- เก็บบริษัท/office ที่ใช้เลือกหลัง login

## 9. Important Helpers / Utilities

### `app/Helpers/Helper.php`

เป็น utility สำคัญมากของระบบนี้

หน้าที่หลัก:

- ตรวจสิทธิ์ตาม `menu_key`
- จัดการ sidebar/menu visibility
- helper แสดงผล status badge
- helper formatting วันที่และข้อความ
- helper ตรวจ office access

ข้อควรรู้:

- ไฟล์นี้มีโค้ด legacy ปะปนอยู่มาก
- มี `use` ของ model ที่ไม่มีใน repo ปัจจุบันหลายตัว
- ถ้าจะ refactor ควรแยก helper ที่ยังใช้งานจริงออกจาก helper เก่า

### `app/Http/Controllers/Functions/FunctionControl.php`

ใช้จัดการ upload ไฟล์เป็นหลัก

function ที่ใช้บ่อย:

- `upload_image()`
- `upload_image2()`
- `upload_image3()`
- `upload_image4()`

รองรับ:

- image
- pdf
- word
- excel

## 10. Database Evolution ที่สำคัญ

### โครงสร้างเก่า

- `tb_admin`
- `tb_role`
- `tb_role_list`
- `tb_menu`

### โครงสร้างใหม่ที่เพิ่งเพิ่ม

จาก migration วันที่ `2026-06-19`:

- เพิ่ม `menu_key` ให้ `tb_menu`
- เพิ่ม `menu_key` ให้ `tb_role_list`
- เพิ่ม `menu_type` ให้ `tb_menu`
- เพิ่ม `topic_id` ให้ `tb_menu`
- เพิ่ม profile/document fields ให้ `tb_admin`
- เพิ่ม pivot `tb_admin_role`
- เพิ่ม pivot `tb_admin_office`

สรุป: ตอนนี้ระบบกำลังอยู่ในช่วง transition จาก permission แบบเก่า ไปสู่ menu-key + many-role + many-office

## 11. Files Worth Reading First Before Coding

ถ้าจะเริ่มแก้ระบบนี้ แนะนำอ่านตามลำดับ:

1. `routes/web.php`
2. `routes/backend-router/web.php`
3. `app/Helpers/Helper.php`
4. `app/Http/Middleware/Webpanel.php`
5. `app/Http/Controllers/Webpanel/AuthController.php`
6. `app/Models/Backend/AdminModel.php`
7. `resources/views/back-end/layout/sidebar.blade.php`
8. controller/module ที่จะเข้าไปแก้จริง

## 12. Known Gaps / Risks

ประเด็นสำคัญที่ควรรู้ก่อนทำงานต่อ:

- repo นี้มีโค้ด legacy ปะปนจากหลายระบบเก่า
- README เดิมไม่อธิบายโปรเจกต์
- มี route อ้าง `Frontend\AjaxController` และ `Frontend\AuthController` แต่ไม่พบ controller ใน repo ชุดนี้
- มีหลาย controller/helper อ้าง model ที่ไม่พบใน repo ชุดนี้
- string ภาษาไทยหลายไฟล์มีอาการ encoding เพี้ยน
- business rule บางส่วนยัง hardcode ด้วย role id เช่น `1`, `5`
- permission ถูกกระจายอยู่ทั้งใน helper, sidebar, และ controller
- dashboard page ยังว่าง
- `composer.lock` มีการเปลี่ยนแปลงอยู่ก่อนเริ่มงานครั้งนี้

## 13. Practical Understanding of Current State

ถ้ามองแบบใช้งานจริง โปรเจกต์นี้น่าจะอยู่ในสถานะประมาณนี้:

- backend admin ใช้งานได้ระดับหนึ่ง
- login + office selection + role/menu permission ถูกพัฒนาต่อไม่นานมานี้
- user/permission module มีทิศทางค่อนข้างชัด
- task module ถูกถอดออกแล้ว เพราะ model/schema/logic ไม่ได้อยู่ครบใน repo นี้
- ระบบกำลังย้ายจากโครงสร้าง role เดี่ยว ไปเป็นหลาย role และหลาย office

## 14. Suggested Next Steps Before Large Changes

ถ้าจะพัฒนาต่อแบบปลอดภัย แนะนำลำดับนี้:

1. ยืนยันก่อนว่า module ไหนคือ scope หลักที่ต้องใช้จริง
2. กัน module ที่ dependency ไม่ครบออกจาก route/menu baseline
3. รวบ business rule เรื่อง role scope ออกจาก controller ไปไว้ helper/service กลาง
4. แยก legacy helper/import ที่ไม่ใช้แล้วออก
5. ทำ seed/menu baseline ให้ตรงกับระบบจริง โดยอ้าง `docs/permission-sample.md`
6. เพิ่ม smoke tests อย่างน้อยกับ login, office selection, permission gating

## 15. Quick Summary

โปรเจกต์นี้คือ Laravel backend/admin system ที่มีแกนหลักเป็น auth + office selection + role/menu permission + user management + task management แต่ใน repo ปัจจุบันยังมีโค้ด legacy และ dependency ที่ไม่ครบปะปนอยู่พอสมควร ดังนั้นเวลาจะต่อยอด ควรถือว่า permission/user module คือส่วนที่ชัดที่สุด ส่วน task/frontend บางจุดยังต้อง verify ก่อนทุกครั้ง
