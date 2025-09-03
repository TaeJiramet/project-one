@extends('layouts.app')

@section('content')
    <h2>Create Program</h2>
    <form method="POST" action="{{ route('program.update') }}">
        @csrf
        <div class="form-row">
            <label for="program_name_th">Name (TH)</label>
            <input id="program_name_th" name="program_name_th" required placeholder="ชื่อหลักสูตร (ไทย)">
        </div>
        <div class="form-row">
            <label for="program_name_en">Name (EN)</label>
            <input id="program_name_en" name="program_name_en">
        </div>
        <div class="form-row">
            <label for="degree_th">Degree (TH)</label>
            <input id="degree_th" name="degree_th">
        </div>
        <div class="form-row">
            <label for="degree_en">Degree (EN)</label>
            <input id="degree_en" name="degree_en">
        </div>
        <div class="form-row">
            <label for="credits_required">Credits Required</label>
            <input id="credits_required" name="credits_required" type="number" min="0">
        </div>
        <div class="form-row">
            <label for="language_th">Language (TH)</label>
            <input id="language_th" name="language_th">
        </div>
        <div class="form-row">
            <label for="tuition_fee">Tuition Fee</label>
            <textarea id="tuition_fee" name="tuition_fee" placeholder="รายละเอียดค่าเล่าเรียน"></textarea>
        </div>
        <div class="form-row">
            <label for="curriculum_year">Curriculum Year</label>
            <input id="curriculum_year" name="curriculum_year" placeholder="ปีหลักสูตร เช่น 2565">
        </div>
        <div>
            <button class="btn" type="submit">Save</button>
            <a href="{{ url('/') }}" class="btn secondary">Cancel</a>
        </div>
    </form>
@endsection

