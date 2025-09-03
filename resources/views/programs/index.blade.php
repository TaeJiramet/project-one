@extends('layouts.app')

@section('content')
    <div style="display:flex;justify-content:space-between;align-items:center">
        <h2>Program</h2>
        <a class="btn" href="{{ route('program.edit') }}">Edit program</a>
    </div>

    <div class="responsive-table">
        <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name (TH)</th>
                <th>Name (EN)</th>
                <th>Degree</th>
                <th>Credits</th>
                <th>Language</th>
                <th>Tuition</th>
                <th>Curriculum</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $p = App\Models\Program::first();
            @endphp
            @if($p)
                <tr>
                    <td>{{ $p->program_id }}</td>
                    <td>{{ $p->program_name_th }}</td>
                    <td>{{ $p->program_name_en }}</td>
                    <td>{{ $p->degree_th }}</td>
                    <td>{{ $p->credits_required }}</td>
                    <td>{{ $p->language_th }}</td>
                    <td>{{ $p->tuition_fee }}</td>
                    <td>{{ $p->curriculum_year }}</td>
                    <td>
                        <a class="btn secondary" href="{{ route('program.edit') }}">Edit</a>
                    </td>
                </tr>
            @else
                <tr><td colspan="9">No program defined yet.</td></tr>
            @endif
        </tbody>
        </table>
    </div>
@endsection

