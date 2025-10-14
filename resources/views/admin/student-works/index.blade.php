@extends('admin.layouts.admin')

@section('title', 'จัดการผลงานนักศึกษา')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>จัดการผลงานนักศึกษา</h2>
    <a href="{{ route('admin.student-works.create') }}" class="btn btn-primary">เพิ่มผลงานใหม่</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ลำดับที่</th>
                <th>หลักสูตร</th>
                <th>ชื่อผลงาน (ไทย)</th>
                <th>ชื่อผลงาน (อังกฤษ)</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            @forelse($studentWorks as $work)
            <tr>
                <td>{{ $work->work_id }}</td>
                <td>{{ $work->program->program_name_th ?? 'ไม่มีข้อมูล' }}</td>
                <td>{{ $work->title_th }}</td>
                <td>{{ $work->title_en }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.student-works.edit', $work) }}" class="btn btn-sm btn-outline-primary">แก้ไข</a>
                        
                        <form method="POST" action="{{ route('admin.student-works.destroy', $work) }}" class="d-inline" onsubmit="return confirm('คุณแน่ใจว่าต้องการลบผลงานนี้ใช่หรือไม่?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">ลบ</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">ไม่พบข้อมูลผลงานนักศึกษา</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center">
    {{ $studentWorks->links('vendor.pagination.small') }}
</div>
@endsection