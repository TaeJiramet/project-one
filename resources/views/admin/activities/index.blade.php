@extends('admin.layouts.admin')

@section('title', 'จัดการกิจกรรมเด่น')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>จัดการกิจกรรมเด่น</h2>
    <a href="{{ route('admin.activities.create') }}" class="btn btn-primary">เพิ่มกิจกรรมใหม่</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ลำดับที่</th>
                <th>หลักสูตร</th>
                <th>ชื่อกิจกรรม</th>
                <th>วันที่จัดกิจกรรม</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            @forelse($activities as $activity)
            <tr>
                <td>{{ $activity->activity_id }}</td>
                <td>{{ $activity->program->program_name_th ?? 'ไม่มีข้อมูล' }}</td>
                <td>{{ $activity->title_th }}</td>
                <td>{{ $activity->activity_date }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.activities.edit', $activity) }}" class="btn btn-sm btn-outline-primary">แก้ไข</a>
                        
                        <form method="POST" action="{{ route('admin.activities.destroy', $activity) }}" class="d-inline" onsubmit="return confirm('คุณแน่ใจว่าต้องการลบกิจกรรมนี้ใช่หรือไม่?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">ลบ</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">ไม่พบข้อมูลกิจกรรม</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center">
    {{ $activities->links('vendor.pagination.small') }}
</div>
@endsection