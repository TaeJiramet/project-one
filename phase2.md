
Phase 2 — คู่มือการติดตั้งและใช้งานระบบ Login และการจัดการ Program (ละเอียด, ขั้นตอนทีละคำสั่ง)

ภาพรวม
- คู่มือนี้ช่วยให้คุณตั้งค่าและทดสอบระบบเข้าสู่ระบบ (login/logout) และระบบจัดการข้อมูลหลักสูตรแบบ "หนึ่งโปรแกรม" (single Program record).

ก่อนเริ่ม: ตรวจสอบสภาพแวดล้อม
- ตรวจสอบเวอร์ชัน PHP และ Composer:
   ```bash
   php -v
   composer -V
   ```
- ตรวจสอบว่า repo อยู่ในโฟลเดอร์โปรเจ็ค (ตัวอย่างในคู่มือนี้ใช้ `/Users/naruapon/Desktop/medium/pr-senpru`)

ไฟล์สำคัญ (สรุป)
- `routes/web.php` — กำหนด route ที่ระบบใช้ (login, logout, program.edit, program.update)
- `app/Http/Controllers/AuthController.php` — แสดงฟอร์ม login, ทำการ authenticate และ logout
- `app/Http/Controllers/ProgramController.php` — edit/update ของ single Program
- `resources/views/auth/login.blade.php` — ฟอร์มล็อกอิน
- `resources/views/programs/edit.blade.php` — ฟอร์มแก้ไขหลักสูตร
- `resources/views/index.blade.php` — หน้าแรก แสดงข้อมูลโปรแกรม
- `resources/views/layouts/app.blade.php` — header / ปุ่ม login-logout
- `database/seeders/AdminUserSeeder.php` และ `ProgramSeeder.php` — seed ข้อมูลตัวอย่าง

ขั้นตอนการตั้งค่าแบบละเอียด (คัดลอกคำสั่งทีละบรรทัด)

1) เข้าไปที่โฟลเดอร์โปรเจ็ค
```bash
cd /Users/naruapon/Desktop/medium/pr-senpru
pwd
# ควรแสดง path ของโปรเจ็ค
```

2) ติดตั้ง dependencies (ถ้ายังไม่ได้ติดตั้ง `vendor/`)
```bash
composer install --no-interaction --prefer-dist
```

3) สร้างไฟล์ฐานข้อมูล SQLite (ถ้ายังไม่มี)
```bash
touch database/database.sqlite
ls -l database/database.sqlite
```

4) ตรวจสอบค่า `.env` ให้ใช้ sqlite (เปิดไฟล์ `.env` และตั้งค่า)
```bash
# เปิด .env ด้วย editor ที่คุณชอบ; ตัวอย่าง (sed ใช้เพื่อโชว์ค่าที่เปลี่ยนได้)
sed -n '1,120p' .env

# ตรวจสอบให้มีบรรทัดประมาณนี้:
# DB_CONNECTION=sqlite
# DB_DATABASE=/absolute/path/to/database/database.sqlite  # optional
```

5) รัน migrations
```bash
php artisan migrate --force
php artisan migrate:status
```

6) สร้างบัญชีแอดมินและข้อมูลโปรแกรมตัวอย่าง (seed)
```bash
php artisan db:seed --class=AdminUserSeeder
php artisan db:seed --class=ProgramSeeder
```
ยืนยันข้อมูลใน SQLite:
```bash
sqlite3 database/database.sqlite "SELECT user_id, name, email FROM users LIMIT 5;"
sqlite3 database/database.sqlite "SELECT program_id, program_name_th, updated_at FROM programs;"
```

7) เรียกดูเส้นทางที่กำหนด (เช็คชื่อ route)
```bash
php artisan route:list --no-ansi --sort=uri | grep program
php artisan route:list --no-ansi | grep login
```
ตรวจสอบว่ามี `program.edit` (GET /program) และ `program.update` (POST /program)

8) รันเซิร์ฟเวอร์สำหรับทดสอบ
```bash
php artisan serve --host=127.0.0.1 --port=8000
# เปิด http://127.0.0.1:8000
```

การใช้งานและทดสอบ (คำสั่ง + ขั้นตอน)

- Login (ผ่านเบราว์เซอร์):
   1. เปิด http://127.0.0.1:8000/login
   2. ใส่อีเมล: `admin@example.com` และรหัสผ่าน: `secret`
   3. ถ้าสำเร็จ คุณจะถูกพาไปที่ /program (หน้าแก้ไข)

- ตรวจสอบ session / auth จากคอมมานด์ไลน์ (ไม่บ่อยจำเป็น):
   ```bash
   # ดู log การเข้าสู่ระบบล่าสุด (ถ้าเก็บใน laravel.log)
   tail -n 200 storage/logs/laravel.log
   ```

- แก้ไขโปรแกรม (ผ่าน UI):
   1. ที่หน้าที่ถูก redirect (/program) แก้ข้อมูลในฟอร์ม
   2. คลิก "Save changes"
   3. คุณจะถูก redirect กลับไปที่ /program พร้อมข้อความ success
   4. ย้อนกลับไปหน้าแรก (/) จะเห็นข้อมูลที่อัปเดตและเวลาอัปเดต

คำสั่งตรวจสอบเพิ่มเติม (เมื่อเจอปัญหา)

- ถ้าเห็น RouteNotFoundException หรือ route หายไป:
   ```bash
   grep -R "programs.update\|programs." -n || true
   php artisan route:list --no-ansi --sort=uri | grep program || true
   ```

- ถ้า artisan ล้มเหลวเพราะ vendor ขาด:
   ```bash
   composer install --no-interaction --prefer-dist
   ```

- ตรวจสอบสถานะ migration:
   ```bash
   php artisan migrate:status
   ```

- ตรวจสอบตารางใน sqlite (ตัวอย่าง):
   ```bash
   sqlite3 database/database.sqlite "SELECT * FROM programs LIMIT 5;"
   sqlite3 database/database.sqlite "SELECT * FROM users LIMIT 5;"
   ```

แก้ปัญหาทั่วไปและคำแนะนำ

- กรณีมีหลายแถวในตาราง `programs` แต่ระบบออกแบบให้มีเพียงหนึ่ง row:
   ```bash
   sqlite3 database/database.sqlite "DELETE FROM programs;"
   php artisan db:seed --class=ProgramSeeder
   sqlite3 database/database.sqlite "SELECT program_id, program_name_th FROM programs;"
   ```

- ถ้าต้องการบันทึกว่าใครเป็นผู้แก้ไข (audit):
   - สร้าง migration เพิ่มคอลัมน์ `updated_by` ที่ nullable
   - อัปเดต `ProgramController::update()` เพื่อ set `program->updated_by = Auth::id()` ก่อน save

รายการคำสั่งสรุป (คัดลอกใช้ทีเดียว)
```bash
cd /Users/naruapon/Desktop/medium/pr-senpru
composer install --no-interaction --prefer-dist
touch database/database.sqlite
php artisan migrate --force
php artisan db:seed --class=AdminUserSeeder
php artisan db:seed --class=ProgramSeeder
php artisan serve --host=127.0.0.1 --port=8000
```

ข้อเสนอปรับปรุงในอนาคต
- บันทึกผู้แก้ไข (`updated_by` column) และแสดงบนหน้าแก้ไข
- เพิ่มการยืนยันสิทธิ์แบบ role-based (เฉพาะผู้ดูแลเท่านั้น)
- เพิ่ม unit/integration tests สำหรับการเข้าสู่ระบบและการแก้ไขโปรแกรม

สรุป
- คู่มือนี้ให้คำสั่งทีละบรรทัดเพื่อทำให้ระบบ login และการจัดการโปรแกรมทำงาน และวิธีตรวจสอบ/แก้ปัญหาที่พบบ่อย

เพิ่มเติม (รายละเอียดเชิงลึก)

1) ตัวอย่างไฟล์ `.env` ที่ควรตรวจสอบ
```dotenv
APP_NAME=PR-SENPRU
APP_ENV=local
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

LOG_CHANNEL=stack

DB_CONNECTION=sqlite
# DB_DATABASE can be left empty for default database/database.sqlite
# DB_DATABASE=/absolute/path/to/database/database.sqlite

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

2) โครงสร้างตาราง `programs` (ตัวอย่างจาก migration)
```php
Schema::create('programs', function (Blueprint $table) {
   $table->bigIncrements('program_id');
   $table->string('program_name_th');
   $table->string('program_name_en')->nullable();
   $table->string('degree_th')->nullable();
   $table->string('degree_en')->nullable();
   $table->integer('credits_required')->nullable();
   $table->string('language_th')->nullable();
   $table->text('tuition_fee')->nullable();
   $table->string('curriculum_year')->nullable();
   $table->timestamps();
});
```

3) ตัวอย่าง seeder (สั้น) — `database/seeders/ProgramSeeder.php`
```php
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
   public function run()
   {
      Program::create([
         'program_name_th' => 'วิศวกรรมซอฟต์แวร์',
         'program_name_en' => 'Software Engineering',
         'degree_th' => 'หลักสูตรวิศวกรรมศาสตร์ (บ.Eng.)',
         'credits_required' => 130,
         'language_th' => 'ไทย',
         'tuition_fee' => 'ตามประกาศ',
         'curriculum_year' => '2565',
      ]);
   }
}
```

4) ตัวอย่างคำสั่ง debug ที่เป็นประโยชน์
- ดู log ล่าสุด (ไฟล์):
```bash
tail -n 200 storage/logs/laravel.log
```
- ล้าง cache / config / route (หลังแก้ .env หรือ config):
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
```
- รีเซ็ต migrations (เฉพาะ dev):
```bash
php artisan migrate:rollback --step=1
php artisan migrate --force
```

5) ตัวอย่างโค้ดสำคัญ (สรุปเร็ว)
- Route (routes/web.php)
```php
Route::get('/login', [AuthController::class,'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class,'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class,'logout'])->name('logout');
Route::middleware('auth')->group(function(){
   Route::get('program',[ProgramController::class,'edit'])->name('program.edit');
   Route::post('program',[ProgramController::class,'update'])->name('program.update');
});
```

6) วิธีเพิ่ม route เพื่อให้ `phase2.html` เปิดผ่านเว็บ (optional)
- เพิ่มบรรทัดนี้ใน `routes/web.php`:
```php
Route::get('/phase2', function(){
   return response()->file(base_path('phase2.html'));
});
```

7) การทดสอบอัตโนมัติ (ถ้ามี PHPUnit ในโปรเจ็ค)
```bash
./vendor/bin/phpunit --filter ExampleTest
```

8) คำแนะนำการ commit & push แบบสั้น
```bash
git add .
git commit -m "docs: expand phase2 guide"
git push origin main
```

Requirements coverage
- Setup commands: Done (documented)
- Seeders: Done (examples included)
- Route/Controller snippets: Done

ถ้าต้องการ ผมสามารถ:
- สร้าง route `/phase2` ให้เองเพื่อเรียก `phase2.html`
- แปลง `phase2.html` เป็น Blade view และใส่ใน layout ของแอพ
- เพิ่มตัวอย่าง `ProgramSeeder.php` และ `AdminUserSeeder.php` ลงใน repository ถ้าต้องการให้ผมเขียนให้ครบ



