<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class teacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$teachers = DB::table('students')->get();
        //======QUESTION 1
        $teachers = DB::table('teachers')->select("*")->get();
        //======QUESTION 2
        $with_id = DB::table('teachers')->where('id','10');
        //========QUESTION 3
        $name_and_email = DB::table('teachers')->select("name","email")->get();
        //========QUESTION 7
        $more_twenty = DB::table('students')->select("*")->where('age','>','20');
        //=======QUESTION 8
        $order_by_name = DB::table('teacher')->select("DISTINCT name");
        //========QUESTION 10
        $total = DB::table('teachers')->count();
        //========QUESTION 11
        $moyenne_age = DB::table('students')->avg('age');





        return view('teachers.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('teachers')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'image' => $request->image,
        ]);
        return redirect()->route('teachers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = DB::table('teachers')->where('id', $id)->first();
        return view('teachers.edit')->with('teacher',$teacher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('teachers')
        ->where('id', $id)
        ->update([
            'name' => $request->name, 
            'email' => $request->email,
            'password' => $request->password,
            'image' => $request->image
        ]);
        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // DB::table('teachers')->where('id', $id)->delete();
        $teacher = DB::delete("delete from teachers where id=$id");
        return redirect('/teachers')->with('flash message',' deleted');
    }
}
