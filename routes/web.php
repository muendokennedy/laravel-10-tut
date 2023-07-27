<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    // Runnig sql queries in laravel -> make use of the DB facade
    // Selecting users from the database
     // $users = DB::select("select * from users");
    //  $users = DB::table('users')->find(3);
    $users = User::all();
    // creating users
    // $user = DB::insert('insert into users(name, email, password) values (?, ?, ?)', ['Erick Kimani', 'kimanierick@gmail.com', 'password']);

    // $user = DB::table('users')->insert([
    //     'name' => 'Joseph Kimotho',
    //     'email' => 'kimotho@gmail.com',
    //     'password' => 'Kimothoquerybuilder'
    // ]);
    // $user = User::create([
    //     'name' => 'Anne Mbeke',
    //     'email' => 'anne@gmail.com',
    //     'password' => 'passwordforannemodel'
    // ]);


    // $user = DB::update('update users set name = ? where id = ?', ['Joseph Kimotho', 2]);
    // $user = DB::table('users')->where('id', 4)->update(['password' => 'passwordupdatedwithquerybuilder']);
    // $user = User::find(5);
    // $user = $user->update([
    //     'email' => 'annembekeupdatefind@gmail.com'
    // ]);

    // Delete a user
    // $user = DB::delete('delete from users where id = 2');
    // $user = DB::table('users')->where('id', 4)->delete();
    // $user = User::find(5)->delete();

        dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
