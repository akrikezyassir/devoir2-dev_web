
@extends('layout')

@section('content')

<h3>Student Details</h3>

<div class="card">
    <div class="card-body">

        <p><b class="lbl">ID:</b> {{ $student->id }}</p>

        <p><b class="lbl">Name:</b> {{ $student->name }}</p>

        <p><b class="lbl">Email:</b> {{ $student->email }}</p>

        <p><b class="lbl">Phone:</b> {{ $student->phone }}</p>

        <p><b class="lbl">Section:</b> {{ $student->section }}</p>

        <p><b class="lbl">Image:</b></p>

        <img src="{{ asset('image/' . $student->image) }}" width="150">

        <br><br>

        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            Back to Students
        </a>

    </div>
</div>

@endsection
