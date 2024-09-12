<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseSubscribed;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();

        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Als ingelogde gebruiker de rol admin heeft, mag hij op deze pagina komen, anders wordt hij geredirect naar de index pagina
        if (auth()->user()->role->name === 'admin' || auth()->user()->role->name === 'coach') {
            return view('course.create');
        }

        return redirect()->route('course.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Course::create($request->all());

        return redirect()->route('course.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::findOrFail($id);

        return view('course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Functie om een gebruiker in te schrijven voor een cursus
    public function enroll(string $id)
    {
        $course = Course::findOrFail($id);
        $user = auth()->user();
        CourseSubscribed::create([
            'course_id' => $course->id,
            'user_id' => $user->id
        ]);

        $course->update([
            'max_spot' => $course->max_spot - 1
        ]);

        return redirect()->route('course.index');
    }

    // Functie om een gebruiker uit te schrijven voor een cursus
    public function unenroll(string $id)
    {
        $course = Course::findOrFail($id);
        $user = auth()->user();
        $courseSubscribed = CourseSubscribed::where('course_id', $course->id)->where('user_id', $user->id)->first();
        $courseSubscribed->delete();

        $course->update([
            'max_spot' => $course->max_spot + 1
        ]);

        return redirect()->route('course.index');
    }
}
