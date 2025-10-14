@extends('admin.layouts.admin')

@section('title', 'จัดการข้อมูลภาพรวมหลักสูตร')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>จัดการข้อมูลภาพรวมหลักสูตร</h2>
    <a href="{{ route('admin.programs.edit') }}" class="btn btn-primary">แก้ไขข้อมูลหลักสูตร</a>
</div>

@if($program && $program->exists)
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">ชื่อหลักสูตร (ไทย): {{ $program->program_name_th }}</h5>
                    <p class="card-text">ชื่อหลักสูตร (อังกฤษ): {{ $program->program_name_en }}</p>
                    <p class="card-text">ชื่อปริญญา (ไทย): {{ $program->degree_th }}</p>
                    <p class="card-text">ชื่อปริญญา (อังกฤษ): {{ $program->degree_en }}</p>
                    <p class="card-text">จำนวนหน่วยกิตที่ต้องเรียน: {{ $program->credits_required }}</p>
                    <p class="card-text">ภาษาที่ใช้ในการสอน: {{ $program->language_th }}</p>
                    <p class="card-text">ค่าลงทะเบียนต่อปี: {{ $program->tuition_fee ? number_format($program->tuition_fee, 2) : 'ไม่ระบุ' }} บาท</p>
                    <p class="card-text">หลักสูตรปี: {{ $program->curriculum_year }}</p>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-info">
        <p>ไม่พบข้อมูลหลักสูตร <a href="{{ route('admin.programs.edit') }}" class="btn btn-primary">เพิ่มข้อมูลหลักสูตร</a></p>
    </div>
@endif
@endsection