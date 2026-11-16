@extends('layout')

@section('content')

<h3>Students List</h3>
<a href="{{ route('students.create') }}" class="btn btn-success mb-3">
    Add New Student
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Action</th>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Section</th>
            <th>Image</th>
        </tr>
    </thead>

    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->section }}</td>

            <td>
                <img src="{{ asset('image/' . $student->image) }}" width="80">
            </td>

        <!-- Add the Show button here -->
            <td>
                <a href="{{ route('students.show', $student->id) }}"
                    class="btn btn-info">
                    Show
                </a>
                <a href="{{ route('students.edit', $student->id) }}"
                    class="btn btn-warning">
                    Edit
                </a>
                <form action="{{ route('students.destroy', $student->id) }}"
                    method="POST"
                    style="display:inline;">

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this student?')">
                Delete
            </button>

        </form>
        </td>

        </tr>
    @endforeach
    </tbody>
</table>

@endsection