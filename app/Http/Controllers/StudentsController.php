<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class StudentsController extends Controller
{
    public function index()
    {
//        $data = Students::where('id', 1)->firstOrFail()->get(); // to find or fail depends on the data
//        return view('students.index', ['students' => $data]);
        $data = array("students" => DB::table('students')->orderBy('created_at', 'desc')->paginate(10));
        return view('students.index', $data);

    }

    public function create()
    {
        return view('students.create')->with('title', 'Add New');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "first_name" => ['required', 'min:2'],
            "last_name" => ['required', 'min:2'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email', Rule::unique('students', 'email')]
        ]);

        if($request->hasFile('student_image')){

            $request->validate([
                "student_image" => 'mimes:jpeg,png,bmp,tiff,jfif | max:4096'
            ]);

            $filenameWithExtension = $request->file("student_image");
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file("student_image")->getClientOriginalExtension();

            $filenameToStore = $filename .'_'.time().'.'.$extension;

            $smallThumbnail = $filename .'_'.time().'.'.$extension;

            $request->file("student_image")->storeAs('public/student/', $filenameToStore);

            $request->file("student_image")->storeAs('public/student/thumbnail', $smallThumbnail);

            $thumbNail = 'storage/student/thumbnail/' . $smallThumbnail;

            $this->createThumbnail($thumbNail, 150, 90);

            $validated['student_image'] = $filenameToStore;

        }

        $student = Students::create($validated);
        // can supply email verification, payment and etc.
        $student->save();

        return redirect('/')->with('message', 'New Student Was Added Successfully!');
    }

    public function show($id)
    {
        $data = Students::findOrFail($id);
        return view('students.edit', ['student' => $data]);
    }

    public function update(Request $request, Students $student)
    {
        $validated = $request->validate([
            "first_name" => ['required', 'min:2'],
            "last_name" => ['required', 'min:2'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email']
        ]);


        if($request->hasFile('student_image')){

            $request->validate([
               "student_image" => 'mimes:jpeg,png,bmp,tiff,jfif | max:4096'
            ]);

            $filenameWithExtension = $request->file("student_image");
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file("student_image")->getClientOriginalExtension();

            $filenameToStore = $filename .'_'.time().'.'.$extension;

            $smallThumbnail = $filename .'_'.time().'.'.$extension;

            $request->file("student_image")->storeAs('public/student/', $filenameToStore);

            $request->file("student_image")->storeAs('public/student/thumbnail', $smallThumbnail);

            $thumbNail = 'storage/student/thumbnail/' . $smallThumbnail;

            $this->createThumbnail($thumbNail, 150, 90);

            $validated['student_image'] = $filenameToStore;

        }
       $student->update($validated);

        return redirect('/')->with('message', 'Data was successfully updated');
    }

    public function destroy(Students $student)
    {
        $student->delete();
        return redirect('/')->with('message', 'Data was successfully deleted');
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }
}
