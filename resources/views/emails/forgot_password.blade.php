<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ลืมรหัสผ่าน</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f6f9;font-family:Arial, Helvetica, sans-serif;color:#333333;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f4f6f9;padding:30px 0;">
        <tr>
            <td align="center">
                <table width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;background:#ffffff;border-radius:12px;overflow:hidden;box-shadow:0 3px 12px rgba(0,0,0,0.08);">
                    
                    <!-- Header -->
                    <tr>
                        <td style="background:linear-gradient(135deg,#0d6efd,#0b5ed7);padding:30px 20px;text-align:center;">
                            <h1 style="margin:0;font-size:24px;color:#ffffff;">รีเซ็ตรหัสผ่าน</h1>
                            <p style="margin:8px 0 0 0;font-size:14px;color:#dbe9ff;">
                                Password Reset Request
                            </p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:35px 30px;">
                            <p style="margin:0 0 15px 0;font-size:16px;">
                                สวัสดีคุณ <strong>{{ $name ?? 'ผู้ใช้งาน' }}</strong>,
                            </p>

                            <p style="margin:0 0 15px 0;font-size:15px;line-height:1.8;">
                                เราได้รับคำขอสำหรับการรีเซ็ตรหัสผ่านของบัญชีคุณ
                                หากคุณเป็นผู้ดำเนินการ กรุณากดปุ่มด้านล่างเพื่อกำหนดรหัสผ่านใหม่
                            </p>

                            <div style="text-align:center;margin:30px 0;">
                                <a href="{{ $resetUrl }}"
                                   style="display:inline-block;background:#0d6efd;color:#ffffff;text-decoration:none;padding:14px 28px;border-radius:8px;font-size:16px;font-weight:bold;">
                                    รีเซ็ตรหัสผ่าน
                                </a>
                            </div>

                            <p style="margin:0 0 10px 0;font-size:14px;line-height:1.8;color:#666;">
                                ลิงก์นี้จะหมดอายุภายใน <strong>{{ $expireMinutes ?? 60 }} นาที</strong>
                            </p>

                            <p style="margin:0 0 10px 0;font-size:14px;line-height:1.8;color:#666;">
                                หากปุ่มด้านบนไม่สามารถกดได้ กรุณาคัดลอกลิงก์ด้านล่างไปวางในเบราว์เซอร์:
                            </p>

                            <p style="margin:0 0 20px 0;font-size:13px;line-height:1.8;word-break:break-all;color:#0d6efd;">
                                {{ $resetUrl }}
                            </p>

                            <hr style="border:none;border-top:1px solid #eeeeee;margin:25px 0;">

                            <p style="margin:0;font-size:13px;line-height:1.8;color:#888;">
                                หากคุณไม่ได้เป็นผู้ร้องขอการรีเซ็ตรหัสผ่าน กรุณาละเว้นอีเมลฉบับนี้
                                บัญชีของคุณจะยังปลอดภัยและไม่มีการเปลี่ยนแปลงใด ๆ
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f8f9fa;padding:20px 30px;text-align:center;">
                            <p style="margin:0;font-size:12px;color:#999999;">
                                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>