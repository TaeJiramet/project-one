@extends('admin.layouts.admin')

@section('title', 'แก้ไขห้องปฏิบัติการ')

@section('content')
<h2>แก้ไขข้อมูลห้องปฏิบัติการ</h2>

<form method="POST" action="{{ route('admin.laboratories.update', $laboratory->lab_id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="program_id" class="form-label">หลักสูตร</label>
                <select name="program_id" id="program_id" class="form-control" required>
                    @foreach($programs as $program)
                        <option value="{{ $program->program_id }}" {{ $program->program_id == $laboratory->program_id ? 'selected' : '' }}>{{ $program->program_name_th }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name_th" class="form-label">ชื่อห้อง (ไทย)</label>
                <input type="text" name="name_th" id="name_th" value="{{ old('name_th', $laboratory->name_th) }}" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name_en" class="form-label">ชื่อห้อง (อังกฤษ)</label>
                <input type="text" name="name_en" id="name_en" value="{{ old('name_en', $laboratory->name_en) }}" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="description_th" class="form-label">รายละเอียด (ไทย)</label>
                <textarea name="description_th" id="description_th" class="form-control">{{ old('description_th', $laboratory->description_th) }}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="description_en" class="form-label">รายละเอียด (อังกฤษ)</label>
                <textarea name="description_en" id="description_en" class="form-control">{{ old('description_en', $laboratory->description_en) }}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="image_path" class="form-label">ลิงก์รูปภาพ</label>
                <input type="url" name="image_path" id="image_path" value="{{ old('image_path', $laboratory->image_path) }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="file_path" class="form-label">อัปโหลดรูปภาพ</label>
                <input type="file" name="file_path" id="file_path" class="form-control" accept="image/*">
                <small class="form-text text-muted">อัปโหลดไฟล์รูปภาพ (jpg, jpeg, png, gif, webp) สูงสุด 10MB</small>
                @if($laboratory->file_path)
                    <div class="mt-2">
                        <label class="form-label">รูปภาพปัจจุบัน:</label>
                        <div>
                            <img src="{{ asset('storage/'.$laboratory->file_path) }}" alt="Current image" style="max-width: 100px; max-height: 100px; border-radius: 8px; object-fit: cover;">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">อัปเดต</button>
        <a href="{{ route('admin.laboratories.index') }}" class="btn btn-secondary">ยกเลิก</a>
    </div>
</form>
@endsection