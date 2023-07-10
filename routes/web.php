<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Http\Request;  //$request
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return inertia('Home', [
//         'name' => "Rakesh",
//         'framworks' => [
//             "Laravel", "Vue", "Inertia"
//         ]
//     ]);
// });


Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy']);


Route::middleware('auth')->group(function() {

    Route::get('/', function () {
        return Inertia::render('Home');
    });
    
    Route::get('/users', function () {
        // sleep(1);
        // return User::paginate(10);
    
        return Inertia::render('Users/Index', [
            
            'users' => User::query()
            ->when(request('search'), function ( $query, $search ) {
                $query->where('name', 'like', "%{$search}%" );
            })
            ->paginate(10)
            ->withQueryString()
            ->through(fn($user)=>[
                'name' => $user->name,
                'id' => $user->id
            ]),
            'filters' => request(['search']),
        ]);
    });
    
    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    });
    
    
    Route::post('/users', function (Request $request) {
        // sleep(3);
        $validated = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'password' => 'required'
        ]);
    
        User::create($validated);
    
        return redirect('users');
    
    });
    
    Route::get('/settings', function () {
        return Inertia::render('Settings');
    }); 
    
    
    // Route::post('/logout', function () {
    //     dd( request('foo') );
    //     // dd( "Logout page showing");
    // }); 
    
    Route::get('/profile', function () {
        return Inertia::render('Profile');
    }); 
});





