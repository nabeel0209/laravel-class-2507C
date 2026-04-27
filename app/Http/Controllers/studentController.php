<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function getStudents()
    {
        $student = student::all();
        // dd($student); 
        return view('student', compact('student'));
    }

    public function addStudents(Request $request)
    {

        student::create([
            'name' => $request->name,
            'age' => $request->age,
            'nationality' => $request->nationality,
        ]);

        return redirect('/students');
    }

    public function edit($id)
    {
        $student = student::find($id);
        return view('edit', compact('student'));
    }

    public function updateStudents(Request $req, $id)
    {
        $student = student::find($id);
        $student->update([
            'name' => $req->name,
            'age' => $req->age,
            'nationality' => $req->nationality,
        ]);

        return redirect('/students');

    }

    public function deleteStudents($id)
    {
        $student = student::find($id);
        $student->delete();
        return redirect('/students');
    }

    public function showFiles()
    {
        $files = \Storage::disk('public')->files('uploads');
        return view('upload', compact('files'));
    }


    public function uploadFile(Request $req)
    {

        $req->validate([
            'fileInput' => 'required|image|max:5000'
        ]);

        $req->file('fileInput')->store('uploads', 'public');
        return redirect('/upload')->with('success', 'File Uploaded');
    }

    public function deleteFile(Request $req) {

    \Storage::disk('public')->delete($req->file_path);
    return redirect('/upload')->with('success', 'File Deleted');

    }



}
