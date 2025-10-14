@extends('admin.layouts.admin')

@section('title', 'จัดการอาชีพหลังสำเร็จการศึกษา')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>จัดการอาชีพหลังสำเร็จการศึกษา</h2>
    <a href="{{ route('admin.careers.create') }}" class="btn btn-primary">เพิ่มอาชีพใหม่</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ลำดับที่</th>
                <th>หลักสูตร</th>
                <th>ชื่ออาชีพ (ไทย)</th>
                <th>ชื่ออาชีพ (อังกฤษ)</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            @forelse($careerOpportunities as $opportunity)
            <tr>
                <td>{{ $opportunity->opportunity_id }}</td>
                <td>{{ $opportunity->program->program_name_th ?? 'ไม่มีข้อมูล' }}</td>
                <td>{{ $opportunity->title_th }}</td>
                <td>{{ $opportunity->title_en }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.careers.edit', $opportunity) }}" class="btn btn-sm btn-outline-primary">แก้ไข</a>
                        
                        <form method="POST" action="{{ route('admin.careers.destroy', $opportunity) }}" class="d-inline" onsubmit="return confirm('คุณแน่ใจว่าต้องการลบข้อมูลอาชีพนี้ใช่หรือไม่?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">ลบ</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">ไม่พบข้อมูลอาชีพ</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center">
    {{ $careerOpportunities->links('vendor.pagination.small') }}
</div>
@endsection