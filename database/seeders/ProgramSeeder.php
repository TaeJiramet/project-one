<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::create([
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
}
