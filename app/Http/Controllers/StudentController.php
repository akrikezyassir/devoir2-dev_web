<?php

namespace App\Http\Controllers;

use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return view('index', compact('students'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|numeric',
        'section' => 'required|max:255',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
    ]);

    $image = $request->file('image');

    $imageName = uniqid() . '.' . $image->extension();

    $image->move(public_path('image'), $imageName);

    $validatedData['image'] = $imageName;

    Student::create($validatedData);

    return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);

        return view('show', compact('student'));
    }
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);

        return view('edit', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, string $id)
    {
            $student = Student::findOrFail($id);

    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|numeric',
        'section' => 'required|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg',
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');

        $imageName = uniqid() . '.' . $image->extension();

        $image->move(public_path('image'), $imageName);

        $validatedData['image'] = $imageName;
    } else {
        unset($validatedData['image']);
    }

    $student->update($validatedData);

    return redirect()->route('students.index');
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect()->route('students.index');
    }
}
