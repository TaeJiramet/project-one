@extends('admin.layouts.admin')

@section('title', 'แก้ไขผลงานนักศึกษา')

@section('content')
<h2>แก้ไขข้อมูลผลงานนักศึกษา</h2>

<form method="POST" action="{{ route('admin.student-works.update', $studentWork->work_id) }}">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="program_id" class="form-label">หลักสูตร</label>
                <select name="program_id" id="program_id" class="form-control" required>
                    @foreach($programs as $program)
                        <option value="{{ $program->program_id }}" {{ $program->program_id == $studentWork->program_id ? 'selected' : '' }}>{{ $program->program_name_th }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="title_th" class="form-label">ชื่อผลงาน (ไทย)</label>
                <input type="text" name="title_th" id="title_th" value="{{ old('title_th', $studentWork->title_th) }}" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="title_en" class="form-label">ชื่อผลงาน (อังกฤษ)</label>
                <input type="text" name="title_en" id="title_en" value="{{ old('title_en', $studentWork->title_en) }}" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="description_th" class="form-label">รายละเอียด (ไทย)</label>
                <textarea name="description_th" id="description_th" class="form-control">{{ old('description_th', $studentWork->description_th) }}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="description_en" class="form-label">รายละเอียด (อังกฤษ)</label>
                <textarea name="description_en" id="description_en" class="form-control">{{ old('description_en', $studentWork->description_en) }}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="image_path" class="form-label">ลิงก์รูปภาพ</label>
                <input type="url" name="image_path" id="image_path" value="{{ old('image_path', $studentWork->image_path) }}" class="form-control">
            </div>
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">อัปเดต</button>
        <a href="{{ route('admin.student-works.index') }}" class="btn btn-secondary">ยกเลิก</a>
    </div>
</form>
@endsection