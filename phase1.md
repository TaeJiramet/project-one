## Phase 1 — คู่มือการทำงาน (สรุปโปรเจ็ค)

ไฟล์นี้สรุปการทำงานของโปรเจ็ค Laravel นี้ และขั้นตอนการตั้งค่า / การรัน เพื่อให้ทีมงานหรือผู้ทดสอบเริ่มใช้งานได้อย่างรวดเร็ว

### สรุปสั้น ๆ ของโปรเจ็ค
- โปรเจ็คเป็น Laravel (PHP >= 8.2) ใช้ต้นแบบจาก `laravel/laravel` (Laravel 12)
- แอพมีหน้า public หลัก (`/`) ที่เรียก `App\Http\Controllers\PublicController@index` และโหลดข้อมูลโปรแกรมจากโมเดล `App\Models\Program` (ใช้ `Program::first()`)
- view หน้าแรกอยู่ที่ `resources/views/index.blade.php` ซึ่งแสดงข้อมูลฟิลด์ของตาราง `programs` เช่น ชื่อโปรแกรม (ไทย/อังกฤษ), วุฒิ/degree, หน่วยกิต, ภาษา, ค่าเล่าเรียน, ปีหลักสูตร

### โครงสร้างไฟล์ที่สำคัญ
- `routes/web.php` — เส้นทางหลัก (`/` และ `/test`) ชี้ไปที่ `PublicController@index`
- `app/Http/Controllers/PublicController.php` — โหลด `Program::first()` และคืนค่า view `index`
- `app/Models/Program.php` — โมเดล Eloquent; primary key คือ `program_id` และมี `fillable` fields
- `database/migrations/2025_09_01_072917_create_programs_table.php` — โครงสร้างตาราง `programs`
- `database/database.sqlite` — ไฟล์ฐานข้อมูล SQLite (โปรเจ็คตั้งค่าให้เก็บ DB ที่นี่)
- `resources/views/index.blade.php` — หน้า landing ที่แสดงข้อมูลโปรแกรม

### ข้อกำหนด (requirements)
- PHP >= 8.2
- Composer
- Node.js (สำหรับ Vite / assets) และ npm
- (ไม่บังคับ) sqlite3 client ถ้าต้องการ inspect `database/database.sqlite`

### ตั้งค่าโปรเจ็ค (fast start)
1. ติดตั้ง dependency ของ PHP

```bash
composer install
```

2. สร้างไฟล์ `.env` (ถ้ายังไม่มี) และตั้งค่าแอป

```bash
cp .env.example .env
php artisan key:generate
```

3. ตรวจสอบว่าไฟล์ฐานข้อมูล SQLite อยู่ที่ `database/database.sqlite` (project มีสคริปต์สร้างให้ แต่ถ้าไม่มีให้สร้างด้วย)

```bash
touch database/database.sqlite
```

4. รัน migration และ seeder (ถ้ามี)

```bash
php artisan migrate --force
php artisan db:seed --class=ProgramSeeder
```

5. ติดตั้ง assets (ถ้าต้องการ) และรัน dev server ของ Vite

```bash
npm install
npm run dev
```

6. เรียกใช้งานแอป (หรือใช้ `npm run dev` ร่วมกัน)

```bash
php artisan serve
# แล้วเปิด http://127.0.0.1:8000
```

### การตรวจสอบผล
- เปิดหน้า `/` จะเห็นข้อมูล `Program` ตัวแรก (ที่ `Program::first()`) ถ้าไม่มีข้อมูล จะเกิด error เพราะ view เข้าใช้งาน property ของ `$program` โดยตรง

### ปัญหาที่อาจเจอ (edge cases) และวิธีแก้
- หากหน้าแสดง error เพราะไม่มี `Program` ให้เพิ่มข้อมูลด้วย `tinker` หรือ seeder:

```bash
php artisan tinker
>>> App\Models\Program::create([ 'program_name_th' => 'ตัวอย่าง', 'program_name_en' => 'Example', 'degree_th' => 'ปริญญาตรี', 'degree_en' => 'B.Sc.', 'credits_required' => 120 ])
```

- ทางเลือกแก้โค้ด (low-risk): ป้องกัน view ไม่ให้บั๊กเมื่อ `$program` เป็น null โดยปรับ controller หรือ view (ตัวอย่าง controller guard):

```php
public function index()
{
    $program = Program::first();
    if (! $program) {
        // ส่งข้อมูลว่างหรือ default
        return view('index')->with('program', new Program());
    }
    return view('index', compact('program'));
}
```

### คำสั่งทดสอบ และเครื่องมือตรวจสอบ
- รัน unit / feature tests (project มี PHPUnit 11 configured):

```bash
composer test
# หรือ
php artisan test
```

### เคล็ดลับสำหรับการพัฒนาเร็ว
- ถ้าจะพัฒนา front-end ใช้ `npm run dev` หรือ `npm run build` สำหรับ production
- ใช้ `php artisan migrate:fresh --seed` เพื่อล้าง DB แล้ว seed ใหม่สำหรับการทดสอบ

### Next steps (ข้อเสนอแนะ)
1. เพิ่มการตรวจสอบ null ก่อนเข้าถึง `$program` ใน view
2. เพิ่มหน้า CRUD สำหรับจัดการ `Program` (Controller, routes, blade) เพื่อไม่ต้องใช้ tinker/seed ทุกครั้ง
3. เพิ่ม README สั้น ๆ สำหรับ deploy (environment variables ที่ต้องตั้งค่า)

---
ไฟล์นี้สร้างขึ้นโดยอัตโนมัติเพื่อ Phase 1 — ถ้าต้องการให้ขยายเป็นคู่มือ Developer/Operator แบบเต็ม แจ้ง scope ที่ต้องการ (เช่น: deployment, CI, security checklist)
