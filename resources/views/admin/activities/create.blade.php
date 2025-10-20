@extends('admin.layouts.admin')

@section('title', 'เพิ่มกิจกรรมเด่น')

@section('content')
<h2>เพิ่มกิจกรรมเด่น</h2>

<form method="POST" action="{{ route('admin.activities.store') }}" enctype="multipart/form-data">
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
                <label for="title_th" class="form-label">ชื่อกิจกรรม</label>
                <input type="text" name="title_th" id="title_th" value="{{ old('title_th') }}" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="activity_date" class="form-label">วันที่จัดกิจกรรม</label>
                <input type="date" name="activity_date" id="activity_date" value="{{ old('activity_date') }}" class="form-control" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="description_th" class="form-label">รายละเอียดกิจกรรม</label>
                <textarea name="description_th" id="description_th" class="form-control">{{ old('description_th') }}</textarea>
            </div>
        </div>
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
                <label for="file_path" class="form-label">ไฟล์แนบ</label>
                <input type="file" name="file_path" id="file_path" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip,.rar,.jpg,.jpeg,.png">
                <small class="form-text text-muted">อนุญาตเฉพาะไฟล์ .pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .zip, .rar, .jpg, .jpeg, .png (สูงสุด 10MB)</small>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">บันทึก</button>
        <a href="{{ route('admin.activities.index') }}" class="btn btn-secondary">ยกเลิก</a>
    </div>
</form>
@endsection