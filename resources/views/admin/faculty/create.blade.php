@extends('admin.layouts.admin')

@section('title', 'เพิ่มอาจารย์ประจำหลักสูตร')

@section('content')
<h2>เพิ่มอาจารย์ประจำหลักสูตร</h2>

<form method="POST" action="{{ route('admin.faculty.store') }}">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="program_id" class="form-label">หลักสูตร</label>
                <select name="program_id" id="program_id" class="form-control" required>
                    @foreach($programs as $program)
                        <option value="{{ $program->program_id }}">{{ $program->program_name_th }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name_th" class="form-label">ชื่อ-นามสกุล (ไทย)</label>
                <input type="text" name="name_th" id="name_th" value="{{ old('name_th') }}" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name_en" class="form-label">ชื่อ-นามสกุล (อังกฤษ)</label>
                <input type="text" name="name_en" id="name_en" value="{{ old('name_en') }}" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="position_th" class="form-label">ตำแหน่ง (ไทย)</label>
                <input type="text" name="position_th" id="position_th" value="{{ old('position_th') }}" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="position_en" class="form-label">ตำแหน่ง (อังกฤษ)</label>
                <input type="text" name="position_en" id="position_en" value="{{ old('position_en') }}" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="email" class="form-label">อีเมล</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="image_path" class="form-label">ลิงก์รูปภาพ</label>
                <input type="url" name="image_path" id="image_path" value="{{ old('image_path') }}" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="biography_th" class="form-label">ประวัติ (ไทย)</label>
                <textarea name="biography_th" id="biography_th" class="form-control">{{ old('biography_th') }}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="biography_en" class="form-label">ประวัติ (อังกฤษ)</label>
                <textarea name="biography_en" id="biography_en" class="form-control">{{ old('biography_en') }}</textarea>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">บันทึก</button>
        <a href="{{ route('admin.faculty.index') }}" class="btn btn-secondary">ยกเลิก</a>
    </div>
</form>
@endsection