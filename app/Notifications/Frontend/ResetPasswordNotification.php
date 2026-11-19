<?php

namespace App\Notifications\Frontend;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends ResetPassword
{
    public function toMail($notifiable): MailMessage
    {
        // Use the configured application URL rather than a request-supplied Host header.
        $base = rtrim((string) config('app.url'), '/');
        $path = route('frontend.password.reset', ['token' => $this->token], false);
        $url = $base.$path.'?'.http_build_query(['email' => $notifiable->getEmailForPasswordReset()]);

        return (new MailMessage)
            ->subject('ตั้งรหัสผ่านใหม่ — Alpha Auto')
            ->greeting('สวัสดี '.$notifiable->name)
            ->line('เราได้รับคำขอตั้งรหัสผ่านใหม่สำหรับบัญชีคู่ค้า Alpha Auto ของคุณ')
            ->action('ตั้งรหัสผ่านใหม่', $url)
            ->line('ลิงก์นี้ใช้ได้ครั้งเดียวและหมดอายุภายใน '.config('auth.passwords.frontend.expire', 60).' นาที')
            ->line('หากคุณไม่ได้ส่งคำขอนี้ ไม่ต้องดำเนินการใด ๆ');
    }
}
