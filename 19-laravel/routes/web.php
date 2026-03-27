<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;
use App\Http\Controllers\UserController;
use App\Models\Adoption;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('Helloworld', function(){
    return "<h1>Hello World😁</h1>";
});

Route::get('sayhello/{name}', function(){
    return "<h1> 😊 hello" . request()->name . "</h1>";
});

Route::get('getall/pets', function(){
    $pets = App\Models\Pet::take(10)->get();
    dd($pets->toArray());
});

Route::get('show/pet/{id}', function(){
    $pet = App\Models\Pet::find(request()->id);
    dd($pet->toArray());
});

Route::get('challengue/user/time', function(){
    $users = App\Models\User::take(20)->get();

    $html = '<h1>Table</h1>
             <table border="1">
                <tr>
                    <th>Full Name</th>
                    <th>Age</th>
                    <th>Created</th>
                </tr>';

    foreach($users as $user){
        $age     = Carbon::parse($user->birthdate)->age;
        $created = Carbon::parse($user->created_at)->diffForHumans();

        $html .= "<tr>
                    <td>{$user->fullname}</td>
                    <td>{$age} years old</td>
                    <td>{$created}</td>
                  </tr>";
    }

    $html .= '</table>';

    return $html;
});
Route::get('view/allpets', function(){
    $pets = App\Models\Pet::all();
    return view('allpets')->with('pets', $pets);
});
Route::get('view/pet/{id}', function(){
    $pet = App\Models\Pet::find(request()->id);
    return view('showpet')->with('pet', $pet);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//MIDLEWARE AUTH
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function() {
    Route::resources([
        'users' => UserController::class,
        // 'pets' => PetController::class,
        // 'adoptions' => AdoptionController::class,
    ]);
    Route::get('export/users/pdf', [UserController::class, 'pdf'] );

    Route::get('export/users/excel', [UserController::class, 'excel'] );

    Route::post('import/users', [UserController::class, 'import'] );

    Route::post('search/users', [UserController::class, 'search'] );
    
});

require __DIR__.'/auth.php';
