@extends('admin.layouts.admin')

@section('title', 'จัดการอาจารย์ประจำหลักสูตร')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>จัดการอาจารย์ประจำหลักสูตร</h2>
</div>

<div class="card mb-4">
    <div class="card-header">
        <h4>เพิ่มอาจารย์ใหม่</h4>
    </div>
    <div class="card-body">
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
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name_th" class="form-label">ชื่อ-นามสกุล (ไทย)</label>
                        <input type="text" name="name_th" id="name_th" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="position_th" class="form-label">ตำแหน่ง (ไทย)</label>
                        <input type="text" name="position_th" id="position_th" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">อีเมล</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="image_path" class="form-label">ลิงก์รูปภาพ</label>
                        <input type="url" name="image_path" id="image_path" class="form-control">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">บันทึก</button>
        </form>
    </div>
</div>

<h4>รายชื่ออาจารย์</h4>

@if($facultyMembers->count() > 0)
    @foreach($facultyMembers as $facultyMember)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $facultyMember->name_th }}</h5>
            <p class="card-text"><strong>ตำแหน่ง:</strong> {{ $facultyMember->position_th }}</p>
            <p class="card-text"><strong>อีเมล:</strong> {{ $facultyMember->email }}</p>
            <p class="card-text"><strong>เบอร์โทร:</strong> {{ $facultyMember->phone ?? 'ไม่มีข้อมูล' }}</p>
            
            <div class="d-flex gap-1 mt-2">
                <a href="{{ route('admin.faculty.edit', ['faculty' => $facultyMember->faculty_id]) }}" class="btn btn-sm btn-outline-primary">แก้ไข</a>
                
                <form method="POST" action="{{ route('admin.faculty.destroy', ['faculty' => $facultyMember->faculty_id]) }}" class="d-inline" onsubmit="return confirm('คุณแน่ใจว่าต้องการลบข้อมูลอาจารย์นี้ใช่หรือไม่?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">ลบ</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
@else
    <p class="text-center">ไม่พบข้อมูลอาจารย์</p>
@endif

<div class="d-flex justify-content-center">
    {{ $facultyMembers->links('vendor.pagination.small') }}
</div>
@endsection