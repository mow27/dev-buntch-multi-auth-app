@extends('layouts.app')

@section('content')
    <h1>Courses</h1>

    <a href="{{ route('courses.create') }}" class="btn btn-success">Create Course</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->description }}</td>
                    <td>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">Edit</a>
                        @can('delete', $course)
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
