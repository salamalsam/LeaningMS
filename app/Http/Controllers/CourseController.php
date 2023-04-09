<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = DB::table('courses')
                ->join('users', 'courses.teacher_id', '=', 'users.id')
                ->select('courses.*', 'users.name as name')
                ->get();

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $teachers = User::where('role_id', 2)->get();

        return view('courses.create', compact('teachers'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'duration' => 'required',
            'teacher_id' => 'required|exists:users,id,role_id,2'
        ]);
        Course::create($request->all());

        return redirect()->route('courses.index');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $teachers = User::where('role_id', 2)->get();

        return view('courses.edit', compact('course', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        
        $request->validate([
            'title' => 'required|max:255',
            'duration' => 'required|integer|min:1|max:12', // set the min and max values as per your needs
            'teacher_id' => 'required'
        ]);
        
        $course->title = $request->title;
        $course->duration = $request->duration;
        $course->teacher_id = $request->teacher_id;
        $course->save();

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully');
    }
}
