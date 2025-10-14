@extends('admin.layouts.admin')

@section('title', 'จัดการห้องปฏิบัติการ')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>จัดการห้องปฏิบัติการ</h2>
    <a href="{{ route('admin.laboratories.create') }}" class="btn btn-primary">เพิ่มห้องปฏิบัติการใหม่</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ลำดับที่</th>
                <th>หลักสูตร</th>
                <th>ชื่อห้อง (ไทย)</th>
                <th>ชื่อห้อง (อังกฤษ)</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            @forelse($laboratories as $laboratory)
            <tr>
                <td>{{ $laboratory->lab_id }}</td>
                <td>{{ $laboratory->program->program_name_th ?? 'ไม่มีข้อมูล' }}</td>
                <td>{{ $laboratory->name_th }}</td>
                <td>{{ $laboratory->name_en }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.laboratories.edit', $laboratory) }}" class="btn btn-sm btn-outline-primary">แก้ไข</a>
                        
                        <form method="POST" action="{{ route('admin.laboratories.destroy', $laboratory) }}" class="d-inline" onsubmit="return confirm('คุณแน่ใจว่าต้องการลบห้องปฏิบัติการนี้ใช่หรือไม่?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">ลบ</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">ไม่พบข้อมูลห้องปฏิบัติการ</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center">
    {{ $laboratories->links('vendor.pagination.small') }}
</div>
@endsection