@extends('admin.layouts.admin')

@section('title', $program->exists ? 'แก้ไขข้อมูลภาพรวมหลักสูตร' : 'เพิ่มข้อมูลภาพรวมหลักสูตร')

@section('content')
<h2>{{ $program->exists ? 'แก้ไขข้อมูลภาพรวมหลักสูตร' : 'เพิ่มข้อมูลภาพรวมหลักสูตร' }}</h2>

<form method="POST" action="{{ route('admin.programs.update') }}">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="program_name_th" class="form-label">ชื่อหลักสูตร (ไทย)</label>
                <input type="text" name="program_name_th" id="program_name_th" value="{{ old('program_name_th', $program->program_name_th) }}" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="program_name_en" class="form-label">ชื่อหลักสูตร (อังกฤษ)</label>
                <input type="text" name="program_name_en" id="program_name_en" value="{{ old('program_name_en', $program->program_name_en) }}" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="degree_th" class="form-label">ชื่อปริญญา (ไทย)</label>
                <input type="text" name="degree_th" id="degree_th" value="{{ old('degree_th', $program->degree_th) }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="degree_en" class="form-label">ชื่อปริญญา (อังกฤษ)</label>
                <input type="text" name="degree_en" id="degree_en" value="{{ old('degree_en', $program->degree_en) }}" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="credits_required" class="form-label">จำนวนหน่วยกิตที่ต้องเรียน</label>
                <input type="number" name="credits_required" id="credits_required" value="{{ old('credits_required', $program->credits_required) }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="language_th" class="form-label">ภาษาที่ใช้ในการสอน</label>
                <input type="text" name="language_th" id="language_th" value="{{ old('language_th', $program->language_th) }}" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="tuition_fee" class="form-label">ค่าลงทะเบียนต่อปี</label>
                <input type="number" step="0.01" name="tuition_fee" id="tuition_fee" value="{{ old('tuition_fee', $program->tuition_fee) }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="curriculum_year" class="form-label">ปีหลักสูตร</label>
                <input type="number" name="curriculum_year" id="curriculum_year" value="{{ old('curriculum_year', $program->curriculum_year) }}" class="form-control">
            </div>
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">บันทึก</button>
        <a href="{{ route('admin.programs.index') }}" class="btn btn-secondary">ยกเลิก</a>
    </div>
</form>
@endsection