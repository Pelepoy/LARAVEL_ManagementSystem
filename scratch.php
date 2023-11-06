<?php

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
/**
 * * NOTES * *

Route::get('/get-text', function(){
  return response ('Hello, Mars',200);
})

Route::get('/user/{id}/{group}', function($id, $group){
return response($id.'-'.$group, 200);
});

Route::get('/request-json', function(){
return response()->json(["name" => "Pekommamushi", "age" => "22", "address" => "God Valley"]);
});

Route::get('/request-download', function(){
$path = public_path().'/sicmundus.html';
$name = 'testing.html';
$header = [
'Content-type: application/text-plain',
];
return response()->download($path, $name, $header);
});
*/


/* *WITH MIDDLEWARE [Redirect to Login(Authentication)]
  ? Route::get('/users/{id}', [UserController::class, 'showData'])->middleware('auth'); // require log in [authentication]
  ? Route::get('/login', [UserController::class, 'login'])->name('login');


* class StudentsController extends Controller
{
    * public function index()
    {
        //   $data = Students::all(); // get all
        //   $data = Students::where('id', 3)->get(); // condition
        //  $data = Students::where('first_name', 'like' ,'%bel%')->get(); // like
        //  $data = Students::where('age', '>', 20)->orderBy('first_name', 'asc')->get(); // operation
        //  $data = Students::where('age', '>', 20)->orderBy('first_name', 'asc')->limit(5)->get(); // operation/sort/limit
        //  $data = DB::table('students')
        //  ->select(DB::raw('count(*) as gender_count, gender'))
        //  ->groupBy('gender')->get();


        $data = Students::where('id', 1)->firstOrFail()->get(); // to find or fail depends on the data
        return view('students.index', ['students' => $data]);
    }

//    * public function show($id)
//    {
//        $data = Students::findOrFail($id); // for route (find or fail)
//        return view('students.index', ['students' => $data]);
//    }

    * public function create()
    {
        return view('students.create')->with('title', 'Add New');
    }

    * public function store(Request $request)
    {
        $validated = $request->validate([
            "first_name" => ['required', 'min:2'],
            "last_name" => ['required', 'min:2'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email', Rule::unique('students', 'email')]
        ]);

        $student = Students::create($validated);
        // can supply email verification, payment and etc.
        $student->save();

        return redirect('/')->with('message', 'New Student Was Added Successfully!');
    }
}

*  ROUTE
//Route::get('/', function () {
////    return view('welcome');
//    return view ('welcome');
//});
//
//Route::get('/get-text', function(){
//  return response ('Hello, Mars',200);
//});
//
//Route::get('/user/{id}/{group}', function($id, $group){
//  return response($id.'-'.$group, 200);
//});
//
//Route::get('/request-json', function(){
//  return response()->json([
//    "name" => "Pekommamushi",
//    "age" => "22",
//    "address" => "God Valley"]);
//});
//
//Route::get('/request-download', function(){
//  $path = public_path().'/sicmundus.html';
//  $name = 'sicmundus.html';
//  $header = [
//    'Content-type: application/text-plain',
//  ];
//  return response()->download($path, $name, $header);
//});
//
///* *WITH MIDDLEWARE [Redirect to Login(Authentication)]
//  ? Route::get('/users/{id}', [UserController::class, 'showData'])->middleware('auth'); // require log in [authentication]
//  ? Route::get('/login', [UserController::class, 'login'])->name('login');
//
//
//Route::get('/users', [UserController::class, 'index']); // ? UserController@index [Lower Version]
//Route::get('/users-3', [UserController::class, 'ragnar']);
//Route::get('/users/{id}', [UserController::class, 'showData']);
//Route::get('/users2/{id}', [UserController::class, 'showData2']);
//Route::get('/students/{id}', [StudentsController::class, 'show']);

*/


