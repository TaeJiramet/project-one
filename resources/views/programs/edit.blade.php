@extends('layouts.app')

@section('content')
    <h2>Edit Program</h2>

    @if($errors->any())
        <div style="padding:10px;background:#fff1f2;border:1px solid #fecaca;color:#7f1d1d;border-radius:6px;margin-bottom:12px">
            <strong>มีข้อผิดพลาด:</strong>
            <ul style="margin:6px 0 0 18px">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('program.update') }}">
        @csrf

        <div class="stack-2col" style="display:grid;grid-template-columns:1fr 1fr;gap:14px">
            <div>
                <div class="form-row">
                    <label for="program_name_th">Name (TH)</label>
                    <input id="program_name_th" name="program_name_th" value="{{ old('program_name_th', $program->program_name_th) }}" required placeholder="ชื่อหลักสูตร (ไทย)">
                </div>
                <div class="form-row">
                    <label for="degree_th">Degree (TH)</label>
                    <input id="degree_th" name="degree_th" value="{{ old('degree_th', $program->degree_th) }}" placeholder="ปริญญา (ไทย)">
                </div>
                <div class="form-row">
                    <label for="credits_required">Credits Required</label>
                    <input id="credits_required" name="credits_required" type="number" min="0" value="{{ old('credits_required', $program->credits_required) }}" placeholder="เช่น 120">
                </div>
                <div class="form-row">
                    <label for="language_th">Language (TH)</label>
                    <input id="language_th" name="language_th" value="{{ old('language_th', $program->language_th) }}" placeholder="เช่น ไทย / อังกฤษ">
                </div>
            </div>

            <div>
                <div class="form-row">
                    <label for="program_name_en">Name (EN)</label>
                    <input id="program_name_en" name="program_name_en" value="{{ old('program_name_en', $program->program_name_en) }}">
                </div>
                <div class="form-row">
                    <label for="degree_en">Degree (EN)</label>
                    <input id="degree_en" name="degree_en" value="{{ old('degree_en', $program->degree_en) }}">
                </div>
                <div class="form-row">
                    <label for="tuition_fee">Tuition Fee</label>
                    <textarea id="tuition_fee" name="tuition_fee" placeholder="รายละเอียดค่าเล่าเรียน">{{ old('tuition_fee', $program->tuition_fee) }}</textarea>
                </div>
                <div class="form-row">
                    <label for="curriculum_year">Curriculum Year</label>
                    <input id="curriculum_year" name="curriculum_year" value="{{ old('curriculum_year', $program->curriculum_year) }}" placeholder="ปีหลักสูตร เช่น 2565">
                </div>
            </div>
        </div>

        <div style="margin-top:14px;display:flex;gap:10px;align-items:center">
            <button class="btn" type="submit">Save changes</button>
            <a href="{{ url('/') }}" class="btn secondary">Cancel</a>
        </div>
    </form>
@endsection

