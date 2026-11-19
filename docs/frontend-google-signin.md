# Google Sign In สำหรับหน้าบ้าน Alpha Auto

## สถานะและพฤติกรรม

โค้ดพร้อมทดสอบด้วย Google OAuth แต่ต้องสร้าง credentials, ใส่ `.env` และรัน migration ก่อนใช้งานจริง ปุ่ม Google จะเปิดใช้เมื่อมีค่า configuration ครบ การทดสอบอัตโนมัติจำลองการตอบกลับ Google ไม่ใช่การทดสอบด้วยบัญชี Google จริง

- เข้าได้เฉพาะบัญชี `frontend_users` ที่มีอยู่และเปิดใช้งาน โดยอีเมลต้องตรงกับ Google และ Google ยืนยันอีเมลแล้ว
- ครั้งแรก: เลือก Google → กรอกรหัสผ่าน **Alpha Auto** เพื่อเชื่อมบัญชี → dashboard
- ครั้งต่อไป: เลือก Google ที่เชื่อมไว้ → dashboard ไม่ต้องกรอกรหัสผ่าน Alpha Auto อีก
- ไม่สร้างลูกค้าหรือบัญชีใหม่ และไม่ผูกบัญชีโดยอาศัยอีเมลตรงกันเพียงอย่างเดียว
- ใช้ Google subject ที่ unique เก็บใน `frontend_users.google_subject`; ไม่เก็บ Google access/refresh token หรือรหัสผ่าน Google
- แยกจาก admin guard และคง session หลังบ้านที่มีอยู่
- เปลี่ยนอีเมลในโปรไฟล์แล้วจะยกเลิกการเชื่อมเดิม ต้องเชื่อม Google กับอีเมลใหม่อีกครั้ง
- ใช้ OAuth authorization-code flow ผ่าน server, state ใช้ครั้งเดียว 10 นาที, PKCE S256, HTTPS สำหรับ host, link challenge 5 นาที, จำกัดลองรหัสผ่าน 5 ครั้ง/นาที

## 1. สร้าง Google OAuth สำหรับทดสอบ localhost

อ้างอิง Google: https://developers.google.com/identity/gsi/web/guides/get-google-api-clientid

1. ไป https://console.cloud.google.com/ และสร้าง/เลือกโปรเจกต์ เช่น `Alpha Auto Development`
2. เปิด **Google Auth Platform** → **Branding** → **Get started** (ถ้ายังไม่ตั้งค่า) ใส่ชื่อแอป `Alpha Auto` และอีเมลติดต่อ/Support email
3. ตั้ง **Audience** เป็น **External** สำหรับผู้ใช้ Google ทั่วไป ใช้สถานะ **Testing** และเพิ่ม Gmail ที่จะใช้ทดสอบใน **Test users**
4. ใน **Data Access** ใช้เฉพาะ `openid`, `email`, `profile` ไม่ต้องขอ Gmail/Drive API
5. ไป **Clients** → **Create client** → **Web application** ชื่อเช่น `Alpha Auto Local`
6. ใน **Authorized redirect URIs** เพิ่มให้ตรงทุกตัว:

```text
http://localhost:8004/frontend/auth/google/callback
```

7. กด Create แล้วคัดลอก Client ID และ Client Secret ไว้ใน `.env` ของเครื่อง ไม่ต้องส่งในแชทหรือ commit ลง Git

Flow นี้ redirect จาก server จึงไม่ต้องใส่ Authorized JavaScript origins ถ้าเปลี่ยน port หรือสลับ localhost/127.0.0.1 ต้องตั้ง redirect URI ให้ตรงทั้ง Google Console และ `.env`

## 2. ตั้งค่าในเครื่อง

ไฟล์ `C:\xampp\htdocs\Autohub\.env`:

```dotenv
GOOGLE_CLIENT_ID=นำ_Client_ID_มาใส่
GOOGLE_CLIENT_SECRET=นำ_Client_Secret_มาใส่
GOOGLE_REDIRECT_URI=http://localhost:8004/frontend/auth/google/callback
```

หลังมีตารางบัญชีหน้าบ้านและ migration โปรไฟล์แล้ว ให้รันเฉพาะ migration ใหม่:

```sh
php artisan migrate --path=database/migrations/2026_11_19_000003_add_google_subject_to_frontend_users.php
php artisan config:clear
```

**หาก `.env` ชี้ DB บน host คำสั่ง migration นี้จะเพิ่มคอลัมน์บน host โดยตรง** ไม่มีการรัน migration จริงให้โดยอัตโนมัติจากงานแก้โค้ดนี้

ถ้ายังไม่มีบัญชีหน้าบ้านสำหรับ Gmail ที่ใช้ทดสอบ:

```sh
php artisan frontend:create-user your-email@gmail.com --name="ชื่อผู้ใช้"
```

คำสั่งถามรหัสผ่าน Alpha Auto แบบซ่อน ไม่ใช่รหัสผ่าน Google ใช้อีเมลจริงที่ตรงกับ Google และอย่าสร้างซ้ำถ้ามีบัญชีแล้ว

## 3. ทดสอบ

1. เปิด `http://localhost:8004/frontend/signin.php` แล้วกด Sign in with Google
2. เลือก Google ที่เพิ่มใน Test users และมีบัญชี frontend อยู่แล้ว
3. ครั้งแรก กรอกรหัสผ่าน Alpha Auto เพื่อเชื่อมบัญชี ต้องไป dashboard พร้อม SweetAlert
4. ออกจากระบบ แล้วลอง Google อีกครั้ง ต้องไป dashboard โดยไม่ถามรหัสผ่าน Alpha Auto ซ้ำ
5. บัญชีที่ไม่มีใน frontend หรือถูกปิดใช้งานต้องเข้าไม่ได้ ยกเลิกที่ Google แล้วต้องกลับหน้า Sign in โดยไม่มี session ใหม่

## 4. เปิดใช้งานบน host ภายหลัง

Google กำหนดให้แยก development กับ production: สร้างโปรเจกต์/OAuth client สำหรับ production โดยไม่ใส่ localhost ตั้ง Branding/โดเมนที่ได้รับสิทธิ์ (`orangeworkshop.info`) และ Audience/สถานะเผยแพร่ให้เหมาะกับลูกค้าจริง จัดเตรียมข้อมูลแอปและ Privacy Policy ตามที่ Console ขอ

Authorized redirect URI บน host:

```text
https://alpha.field.orangeworkshop.info/frontend/auth/google/callback
```

ใส่ production Client ID/Secret และ URI ข้างต้นใน `app/.env` บน host แล้วใช้ PHP 8.3 clear/cache config การ merge main ทำให้ workflow เดิมรัน migration ใหม่ได้ ตรวจ Action ให้สำเร็จก่อนทดสอบ Google จริง

เอกสาร Google:
- https://developers.google.com/identity/protocols/oauth2/web-server
- https://developers.google.com/identity/verification/authentication-policy-compliance

## Troubleshooting

- `redirect_uri_mismatch`: ตรวจ scheme, host, port และ path ว่าตรงกับ client ที่เลือกทุกตัว
- `access_denied` / แอปอยู่ระหว่างทดสอบ: ตรวจ Test users และเลือก Google ให้ตรง
- ปุ่มยัง disabled: ตรวจ `.env` ทั้งสามค่า แล้ว `php artisan config:clear`
- `Unknown column google_subject`: ยังไม่ได้รัน migration ใหม่บน DB ที่ `.env` เชื่อมอยู่
- Google อีเมลต่างจากบัญชี frontend: ใช้อีเมลเดียวกันหรือแก้บัญชีผ่านขั้นตอนที่ยืนยันตัวตนแล้ว ไม่เปิดสมัครอัตโนมัติ
- เมื่อกลับจาก Google ต้องเข้า host/port เดียวกับตอนกดเริ่ม เพื่อให้ session state ตรงกัน
