@extends('layouts.app')

@section('title', 'รายละเอียดหลักสูตร')

@section('content')
    <h2>รายละเอียดหลักสูตรวิศวกรรมซอฟต์แวร์</h2>

    <div class="responsive-table">
        <table>
            <tr>
                <th>ชื่อหลักสูตร (ไทย)</th>
                <td>{{ $program->program_name_th }}</td>
            </tr>
            <tr>
                <th>ชื่อหลักสูตร (อังกฤษ)</th>
                <td>{{ $program->program_name_en }}</td>
            </tr>
            <tr>
                <th>ชื่อปริญญา (ไทย)</th>
                <td>{{ $program->degree_th }}</td>
            </tr>
            <tr>
                <th>ชื่อปริญญา (อังกฤษ)</th>
                <td>{{ $program->degree_en }}</td>
            </tr>
            <tr>
                <th>จำนวนหน่วยกิต</th>
                <td>{{ $program->credits_required }}</td>
            </tr>
            <tr>
                <th>ภาษาที่ใช้ในการสอน</th>
                <td>{{ $program->language_th }}</td>
            </tr>
            <tr>
                <th>ค่าเล่าเรียน</th>
                <td>{{ $program->tuition_fee ? number_format($program->tuition_fee, 2) : '-' }} บาท</td>
            </tr>
            <tr>
                <th>ปีหลักสูตร</th>
                <td>{{ $program->curriculum_year }}</td>
            </tr>
        </table>
    </div>

    <div style="margin-top:14px">
        <a href="{{ url('/') }}" class="btn secondary">กลับหน้าหลัก</a>
    </div>
@endsection