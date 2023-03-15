<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
    // fetch all users
//    $users = DB::select("select * from users");
        $user = User::find(8);
    // create new user
//     $user = DB::insert('insert into users (name, email, password) values (?,?,?)', [
//         'Legrand',
//         'legrand@legrand.com',
//         'legrand1',
//     ]);

//    $user = DB::table('users')->insert([
//        'name'=>'Legrand2',
//        'email'=>'legrand@lg.com',
//        'password'=>'legrand1',
//    ]);
//    $user = User::create([
//        'name' => 'Legrand6',
//        'email' => 'legrand@lmn.com',
//        'password' => 'legrand1'
//    ]);

    // update a user
//     $user = DB::update("update users set email=? where id=?", [
//         'legrand@lg.com',
//         2,
//     ]);
//    $user = User::find(4);
//    $user->update([
//        'email' => 'legrand@lg.com',
//    ]);

    //  delete a user
//     $user = DB::delete("delete from users where id=2");
//    $user = User::find(4);
//    $user->delete();
    dd($user->name);
    return view('welcome');

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
