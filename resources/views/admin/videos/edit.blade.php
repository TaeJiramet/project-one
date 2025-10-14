@extends('admin.layouts.admin')

@section('title', 'แก้ไขวิดีโอแนะนำ')

@section('content')
<h2>แก้ไขข้อมูลวิดีโอแนะนำ</h2>

<form method="POST" action="{{ route('admin.videos.update', $video->video_id) }}">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="program_id" class="form-label">หลักสูตร</label>
                <select name="program_id" id="program_id" class="form-control" required>
                    @foreach($programs as $program)
                        <option value="{{ $program->program_id }}" {{ $program->program_id == $video->program_id ? 'selected' : '' }}>{{ $program->program_name_th }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="title_th" class="form-label">ชื่อวิดีโอ (ไทย)</label>
                <input type="text" name="title_th" id="title_th" value="{{ old('title_th', $video->title_th) }}" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="title_en" class="form-label">ชื่อวิดีโอ (อังกฤษ)</label>
                <input type="text" name="title_en" id="title_en" value="{{ old('title_en', $video->title_en) }}" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="url" class="form-label">URL วิดีโอ</label>
                <input type="url" name="url" id="url" value="{{ old('url', $video->url) }}" class="form-control" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="description_th" class="form-label">รายละเอียด (ไทย)</label>
                <textarea name="description_th" id="description_th" class="form-control">{{ old('description_th', $video->description_th) }}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="description_en" class="form-label">รายละเอียด (อังกฤษ)</label>
                <textarea name="description_en" id="description_en" class="form-control">{{ old('description_en', $video->description_en) }}</textarea>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">อัปเดต</button>
        <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">ยกเลิก</a>
    </div>
</form>
@endsection