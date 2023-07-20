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
        // return User::paginate(10);sdf
    
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
    })->name('users');
    
    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    });
    
    //Create a new user
    Route::post('/users', function (Request $request) {
        // sleep(3);
        $validated = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'password' => 'required'
        ]);
    
        User::create($validated);
    
        // return redirect('users');
        // return redirect()->route('users')->with(['message' => 'New User Created Successfully', 'status' => true ]);
        return Redirect::back()->with( ['status' => true, 'message' => 'New User Created Successfully'] );
        
    
    });
    
    //Edit User
    Route::get('/users/edit/{id}', function(Request $request){
        
        $userData = User::select('id', 'name', 'email')->where('id','=',$request->id)->get();
        
        $data = [            
            'id' => $userData[0]->id,
            'name' => $userData[0]->name,
            'email' => $userData[0]->email,                   
        ];
       
        // $userData = User::find($request->id, ['name']);
        return Inertia::render('Users/Edit', ['data' => $data]);
    })->name('userUpdate');

    
    //Update user
    Route::post('/users/update', function(Request $request){
        
        $userId = $request->id;
        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
        ]);
        $user = User::find($userId);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        // return redirect()->route('users')->with('message', 'User Updated Successfully');
        return Redirect::back()->with( ['status' => true, 'message' => 'User Updated Successfully'] );
        
        
    });

    
    Route::delete('/users/delete/{id}', function(Request $request, $id){

        // User::find($id)->delete();
        $data = User::find($id)->delete();
        if ($data) {
            return Redirect::back()->with( ['status' => true, 'message' => 'User Deleted Successfully'] );
        }else{
            return Redirect::back()->with( ['status' => false, 'message' => 'Internal server error'] );
        }

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





