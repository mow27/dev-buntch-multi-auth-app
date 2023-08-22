<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        // Validation

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        if (Gate::denies('update', $course)) {
            abort(403, 'You are not authorized to update this course.');
        }

        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        if (Gate::denies('update', $course)) {
            abort(403, 'You are not authorized to update this course.');
        }

        // Validation and update

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        if (Gate::denies('delete', $course)) {
            abort(403, 'You are not authorized to delete this course.');
        }

        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }

}
