# WizWiz XUI TimeBot — تاریخچه تغییرات

## نسخه 10.4.0 — آپدیت اصلی

### 🐛 باگ‌فیکس‌ها

1. **تابع `bot()`** — اضافه شدن `CURLOPT_CONNECTTIMEOUT` و `CURLOPT_TIMEOUT` (قبلاً timeout نداشت و هنگ می‌کرد)
2. **تابع `bot()`** — اضافه شدن `SSL_VERIFYPEER` و `SSL_VERIFYHOST` برای اتصال امن
3. **تابع `bot()`** — اضافه شدن `curl_close()` برای جلوگیری از memory leak
4. **تابع `bot()`** — تبدیل `var_dump(curl_error)` به `error_log` (خطا دیگر به کاربر نشان نمی‌دهد)
5. **تابع `sendMessage()`** — فیلد `parse_mode` با مقدار null دیگر به API ارسال نمی‌شود (باعث خطا می‌شد)
6. **تابع `curl_get_file_contents()`** — اضافه شدن timeout، SSL و user-agent
7. **آرایه عکس** — باگ `$update->message->photo->file_id` (بدون ایندکس) برطرف شد؛ حالا `end($photos)` برای بالاترین کیفیت استفاده می‌شود
8. **`$joniedState`** — وقتی `lockChannel` تنظیم نشده بود crash می‌کرد؛ حالا با `isset` و مقدار پیش‌فرض `member` مدیریت می‌شود
9. **IP Range تلگرام** — اضافه شدن رنج‌های جدید (`91.105.192.0/23`, `185.76.151.0/24`) که در نسخه قبل نبودند

### ✨ بهبودها

1. **دکمه‌های ربات** — همه دکمه‌ها ایموجی رنگی و توضیح فارسی بهتر دارند
2. **صفحه پرداخت** — UI کاملاً بازطراحی شد (حذف GTM tracker ناخواسته)
3. **صفحه نصب** — فرم نصب/آپدیت با طراحی مدرن و responsive
4. **CSS** — طراحی گرادیان، دکمه‌های رنگی، انیمیشن hover، سایه‌های زیبا
5. **امنیت** — حذف GTM tracker از صفحات pay/index.php و pay/back.php

### 📁 فایل‌های تغییر کرده

- `config.php` — باگ‌فیکس اصلی
- `settings/values.php` — دکمه‌های رنگی
- `assets/style.css` — طراحی کامل جدید
- `assets/webconf.css` — طراحی مدرن
- `install/install.php` — فرم نصب بازطراحی شده
- `pay/index.php` — showForm جدید
- `pay/back.php` — showForm جدید
