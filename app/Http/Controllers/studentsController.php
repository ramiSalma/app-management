<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class studentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $students = student::paginate(5);
        //$students = DB::select('select * from students ');
        return view('students.index')->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():view
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $input = $request->all();
        student::create($input);
        return redirect('/students')->with('success','student added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):View
    {
        $student = student::find($id);
        return view('students.show')->with('student',$student);
    }

    /** 
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = student::find($id);
        return view('students.edit')->with('student',$student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        $student = student::find($id);
        $input = $request->all();
        $student->update($input);
        return redirect('/students')->with('flash message','student updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        $student = student::destroy($id);
        return redirect('/students')->with('flash message','student deleted');
    }
}
