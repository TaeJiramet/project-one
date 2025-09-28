<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\Activity;
use App\Models\FacultyMember;
use App\Models\CareerOpportunity;
use App\Models\Laboratory;
use App\Models\StudentWork;
use App\Models\Video;

class PublicDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::first();
        
        if (!$program) {
            $program = Program::create([
                'program_name_th' => 'วิศวกรรมซอฟต์แวร์',
                'program_name_en' => 'Software Engineering',
                'degree_th' => 'วิศวกรรมศาสตรบัณฑิต',
                'degree_en' => 'Bachelor of Engineering',
                'credits_required' => 132,
                'language_th' => 'ไทย และ อังกฤษ',
                'tuition_fee' => 50000.00,
                'curriculum_year' => 2025
            ]);
        }
        
        // Seed activities
        Activity::create([
            'program_id' => $program->program_id,
            'title_th' => 'พักผ่อนหย่อนใจ',
            'description_th' => 'กิจกรรมสันทนาการเพื่อผ่อนคลายและเสริมสร้างความสัมพันธ์ระหว่างนักศึกษา',
            'activity_date' => '2025-05-20',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/activity/1717372516_c7f4c286dd3fea87e017.jpg'
        ]);
        
        Activity::create([
            'program_id' => $program->program_id,
            'title_th' => 'ทานไอติมคลายร้อน',
            'description_th' => '',
            'activity_date' => '2024-06-10',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/activity/1717372783_1bebfdb263427d406bf4.jpg'
        ]);
        
        Activity::create([
            'program_id' => $program->program_id,
            'title_th' => 'ตรวจประกันคุณภาพการศึกษาภายใน ระดับหลักสูตร 2566',
            'description_th' => '',
            'activity_date' => '2024-06-11',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/activity/1718085446_fe7aac7f8c0b2b2a7dcb.jpg'
        ]);
        
        Activity::create([
            'program_id' => $program->program_id,
            'title_th' => 'เตรียมความพร้อม 2567',
            'description_th' => '',
            'activity_date' => '2024-06-12',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/activity/1718085289_aad2e4743b4d5a1323d8.jpg'
        ]);
        
        Activity::create([
            'program_id' => $program->program_id,
            'title_th' => 'เฮฮาปาร์ตี้ระหว่างเรียน',
            'description_th' => '',
            'activity_date' => '2024-06-01',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/activity/1717372489_ea53a9539c25073182bc.jpg'
        ]);
        
        Activity::create([
            'program_id' => $program->program_id,
            'title_th' => 'ถ่ายรูปที่มหาวิทยาลัย',
            'description_th' => '',
            'activity_date' => '2024-06-01',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/activity/1717372761_89611bad9483bf0f20b1.jpg'
        ]);
        
        Activity::create([
            'program_id' => $program->program_id,
            'title_th' => 'SE สู้ๆ',
            'description_th' => '',
            'activity_date' => '2024-06-01',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/activity/1717372810_2020d0b7370ab3767332.jpg'
        ]);
        
        Activity::create([
            'program_id' => $program->program_id,
            'title_th' => 'พรีเซนท์โปรเจ็คจบ',
            'description_th' => '',
            'activity_date' => '2024-06-01',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/activity/1717372464_ed29e64cbfe0070ce11d.jpg'
        ]);
        
        Activity::create([
            'program_id' => $program->program_id,
            'title_th' => 'ปาร์ตี้หมูกะทะที่มอ',
            'description_th' => '',
            'activity_date' => '2024-06-01',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/activity/1717372446_83376c23c579f6f3784b.jpg'
        ]);
        
        Activity::create([
            'program_id' => $program->program_id,
            'title_th' => 'ศึกษาดูงานบริษัท CDG',
            'description_th' => '',
            'activity_date' => '2024-06-01',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/activity/1717371506_bf75994d3f90675f7169.jpg'
        ]);
        
        Activity::create([
            'program_id' => $program->program_id,
            'title_th' => 'ศึกษาดูงานบริษัท CDG',
            'description_th' => '',
            'activity_date' => '2024-06-01',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/activity/1717371544_1bbd5da229e99e0d9517.jpg'
        ]);
        
        Activity::create([
            'program_id' => $program->program_id,
            'title_th' => 'ศึกษาดูงานบริษัท CDG',
            'description_th' => '',
            'activity_date' => '2024-06-01',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/activity/1717371558_73957229753d34d1c707.jpg'
        ]);
        
        Activity::create([
            'program_id' => $program->program_id,
            'title_th' => 'นักศึกษาได้ทุนเรียนภาษาที่เวียดนาม',
            'description_th' => '',
            'activity_date' => '2024-06-01',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/activity/1717371375_3eee2c5f88bd5605eb45.jpg'
        ]);
        
        // Seed faculty members
        FacultyMember::create([
            'program_id' => $program->program_id,
            'name_th' => 'ผศ.ดร.อุษณีย์ ภักดีตระกูลวงศ์',
            'name_en' => 'Assoc. Prof. Dr. Usanee Pakdeetrakulwong',
            'position_th' => 'ประธานฯ สาขาวิชา',
            'position_en' => 'Head of Department',
            'email' => 'usanee@npru.ac.th',
            'phone' => '037-214-XXX',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/lecturer/1706694016_43d4f45dca2d4f9011a4.jpg',
            'biography_th' => 'คณบดีคณะวิศวกรรมศาสตร์และอุตสาหกรรม',
            'biography_en' => 'Dean of Faculty of Engineering and Industry'
        ]);
        
        FacultyMember::create([
            'program_id' => $program->program_id,
            'name_th' => 'ผศ.ดร. วรเชษฐ์ อุทธา',
            'name_en' => 'Assoc. Prof. Dr. Worachet Uttho',
            'position_th' => 'รองประธานสาขา (ประธานสาขา)',
            'position_en' => 'Vice President of Department (President of Department)',
            'email' => 'wuttho@npru.ac.th',
            'phone' => '037-214-XXX',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/lecturer/1706693986_c5a3e8541b6f087048fa.jpg',
            'biography_th' => 'อาจารย์ประจำสาขาวิศวกรรมซอฟต์แวร์',
            'biography_en' => 'Faculty of Software Engineering'
        ]);
        
        FacultyMember::create([
            'program_id' => $program->program_id,
            'name_th' => 'ผศ.สมเกียรติ ช่อเหมือน',
            'name_en' => 'Assoc. Prof. Somkiat Cho-muean',
            'position_th' => 'รองประธานฯ ฝ่ายนโยบายและแผน',
            'position_en' => 'Vice President of Policy and Planning',
            'email' => 'scho-muean@npru.ac.th',
            'phone' => '037-214-XXX',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/lecturer/1706694064_e094c4d933ac0ed7cd03.jpg',
            'biography_th' => 'รองคณบดีฝ่ายนโยบายและแผน',
            'biography_en' => 'Associate Dean of Policy and Planning'
        ]);
        
        FacultyMember::create([
            'program_id' => $program->program_id,
            'name_th' => 'ผศ.นฤพล สุวรรณวิจิตร',
            'name_en' => 'Assoc. Prof. Narupon Suwanwijit',
            'position_th' => 'รองประธานฯ ฝ่ายประกันคุณภาพฯ',
            'position_en' => 'Vice President of Quality Assurance',
            'email' => 'narupon@npru.ac.th',
            'phone' => '037-214-XXX',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/lecturer/1716485261_38d6e57b8d63fe377d25.jpg',
            'biography_th' => 'รองคณบดีฝ่ายประกันคุณภาพ',
            'biography_en' => 'Associate Dean of Quality Assurance'
        ]);
        
        FacultyMember::create([
            'program_id' => $program->program_id,
            'name_th' => 'อ.ดร.สุพิฌาย์ จันทร์เรือง',
            'name_en' => 'Asst. Prof. Dr. Suphajee Janruang',
            'position_th' => 'รองประธานฯ ฝ่ายกิจการนักศึกษา',
            'position_en' => 'Vice President of Student Affairs',
            'email' => 'su.janruang@npru.ac.th',
            'phone' => '037-214-XXX',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/lecturer/1706694139_d6a2ba899f7470f5fd45.png',
            'biography_th' => 'อาจารย์ประจำสาขาวิศวกรรมซอฟต์แวร์',
            'biography_en' => 'Faculty of Software Engineering'
        ]);
        
        
        // Seed career opportunities
        CareerOpportunity::create([
            'program_id' => $program->program_id,
            'title_th' => 'เจ้าหน้าที่ตรวจสอบคุณภาพซอฟต์แวร์',
            'title_en' => 'Software Quality Assurance',
            'description_th' => 'ตรวจสอบและทดสอบซอฟต์แวร์เพื่อให้แน่ใจว่ามีคุณภาพตามมาตรฐาน',
            'description_en' => 'Check and test software to ensure quality meets standards'
        ]);
        
        CareerOpportunity::create([
            'program_id' => $program->program_id,
            'title_th' => 'โปรแกรมเมอร์',
            'title_en' => 'Programmer',
            'description_th' => 'เขียนและพัฒนาโค้ดสำหรับซอฟต์แวร์และแอปพลิเคชันต่างๆ',
            'description_en' => 'Write and develop code for various software and applications'
        ]);
        
        CareerOpportunity::create([
            'program_id' => $program->program_id,
            'title_th' => 'วิศวกรซอฟต์แวร์',
            'title_en' => 'Software Engineer',
            'description_th' => 'ออกแบบและพัฒนาระบบซอฟต์แวร์ขนาดใหญ่',
            'description_en' => 'Design and develop large-scale software systems'
        ]);
        
        CareerOpportunity::create([
            'program_id' => $program->program_id,
            'title_th' => 'นักทดสอบระบบ',
            'title_en' => 'System Tester',
            'description_th' => 'ทดสอบระบบซอฟต์แวร์เพื่อหาข้อบกพร่องและปัญหาต่างๆ',
            'description_en' => 'Test software systems to find bugs and issues'
        ]);
        
        // Seed laboratories
        Laboratory::create([
            'program_id' => $program->program_id,
            'name_th' => 'อาคารปฏิบัติการคอมพิวเตอร์ มหาวิทยาลัยราชภัฏนครปฐม',
            'name_en' => 'Computer Laboratory Building, Nakhon Pathom Rajabhat University',
            'description_th' => 'อาคารปฏิบัติการสำหรับการเรียนการสอนด้านคอมพิวเตอร์',
            'description_en' => 'Laboratory building for computer education',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/laboratory/1706695830_4cfc50904539177efe52.jpg'
        ]);
        
        Laboratory::create([
            'program_id' => $program->program_id,
            'name_th' => 'อาคารปฏิบัติการคอมพิวเตอร์',
            'name_en' => 'Computer Laboratory Building',
            'description_th' => 'อาคารปฏิบัติการสำหรับการเรียนการสอนด้านคอมพิวเตอร์',
            'description_en' => 'Laboratory building for computer education',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/laboratory/1706696068_17458c1c1b0af86cf5b1.jpg'
        ]);
        
        Laboratory::create([
            'program_id' => $program->program_id,
            'name_th' => 'ห้องปฏิบัติการคอมพิวเตอร์ C408',
            'name_en' => 'Computer Laboratory C408',
            'description_th' => 'ห้องปฏิบัติการสำหรับการเรียนการสอนด้านคอมพิวเตอร์',
            'description_en' => 'Computer laboratory for education',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/laboratory/1706696144_9c9da38b4de6b2f98859.jpg'
        ]);
        
        Laboratory::create([
            'program_id' => $program->program_id,
            'name_th' => 'ห้องปฏิบัติการคอมพิวเตอร์ C409',
            'name_en' => 'Computer Laboratory C409',
            'description_th' => 'ห้องปฏิบัติการสำหรับการเรียนการสอนด้านคอมพิวเตอร์',
            'description_en' => 'Computer laboratory for education',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/laboratory/1706696156_5feb9ba120f4489dd75b.jpg'
        ]);
        
        // Seed student works
        StudentWork::create([
            'program_id' => $program->program_id,
            'title_th' => 'เอกชัย และศักดิ์กริน 2565',
            'title_en' => 'Ekkachai and Sakgrin 2023',
            'description_th' => '',
            'description_en' => '',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/working/1706703910_f7b7ef037305b57dec1a.png'
        ]);
        
        StudentWork::create([
            'program_id' => $program->program_id,
            'title_th' => 'งานประชุมวิชาการระดับชาติ ครั้งที่15 มหาวิทยาลัยราชภัฏนครปฐม',
            'title_en' => '15th National Academic Conference, Nakhon Pathom Rajabhat University',
            'description_th' => '',
            'description_en' => '',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/working/1706695980_b1a0de835162fffb433f.jpg'
        ]);
        
        StudentWork::create([
            'program_id' => $program->program_id,
            'title_th' => 'นับเนยและกฤษณะ 2566',
            'title_en' => 'Napaporn and Krishana 2024',
            'description_th' => '',
            'description_en' => '',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/working/1706703942_7bb521a333709de8a562.png'
        ]);
        
        StudentWork::create([
            'program_id' => $program->program_id,
            'title_th' => 'ดาวปี 2563',
            'title_en' => 'Daopee 2021',
            'description_th' => '',
            'description_en' => '',
            'image_path' => 'https://sc.npru.ac.th/sc_major/assets/images/working/1706703920_10cfa7f0e24d4277853b.png'
        ]);
        
        // Seed videos
        Video::create([
            'program_id' => $program->program_id,
            'title_th' => 'แนะนำหลักสูตรวิศวกรรมซอฟต์แวร์',
            'title_en' => 'Software Engineering Program Introduction',
            'url' => 'https://youtu.be/jXyZb58_eMo?si=WUJv7sFe1hrOtLqN',
            'description_th' => 'วีดีโอแนะนำหลักสูตรและกิจกรรมต่างๆ ภายในหลักสูตรวิศวกรรมซอฟต์แวร์',
            'description_en' => 'Introduction video to the Software Engineering program and its activities'
        ]);
    }
}
