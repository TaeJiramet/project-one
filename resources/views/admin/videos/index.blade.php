@extends('admin.layouts.admin')

@section('title', 'จัดการวิดีโอแนะนำ')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>จัดการวิดีโอแนะนำ</h2>
    <a href="{{ route('admin.videos.create') }}" class="btn btn-primary">เพิ่มวิดีโอใหม่</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ลำดับที่</th>
                <th>หลักสูตร</th>
                <th>ชื่อวิดีโอ (ไทย)</th>
                <th>ชื่อวิดีโอ (อังกฤษ)</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            @forelse($videos as $video)
            <tr>
                <td>{{ $video->video_id }}</td>
                <td>{{ $video->program->program_name_th ?? 'ไม่มีข้อมูล' }}</td>
                <td>{{ $video->title_th }}</td>
                <td>{{ $video->title_en }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.videos.edit', $video) }}" class="btn btn-sm btn-outline-primary">แก้ไข</a>
                        
                        <form method="POST" action="{{ route('admin.videos.destroy', $video) }}" class="d-inline" onsubmit="return confirm('คุณแน่ใจว่าต้องการลบวิดีโอนี้ใช่หรือไม่?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">ลบ</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">ไม่พบข้อมูลวิดีโอ</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center">
    {{ $videos->links('vendor.pagination.small') }}
</div>
@endsection