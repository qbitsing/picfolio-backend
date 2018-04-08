<?php

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Resources\Comment as CommentResource;
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', function (Request $request) {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        return User::where('email', $request->email)->get()[0];
    } else return json_encode(false);
});
Route::post('/upload', function (Request $request) {
    if ($request->base64) {
        list($extencion, $data) = explode(';base64,', $request->base64);
        list(,$extencion) = explode('/', $extencion);
        $data = base64_decode($data);
        $date = date('Y_m_d_h_i_s');
        $ran = rand(0,100);
        $name = $date . '_' . $ran;
        Storage::put("$name.$extencion", $data, 'public');
        return json_encode([
            'url' => Storage::url("$name.$extencion")
        ]);
    } else return json_encode([
        'status' => 400,
        'message' => 'Debes enviar el base64'
    ]);
});
Route::post('/register', 'Auth\RegisterController@create');
Route::get('/user/{id}', 'UserController@show');
Route::get('/posts', 'PostController@index');
Route::get('/user/{id}/posts', 'PostController@UserPosts');
Route::post('/posts', 'PostController@store');

Route::post('/comments', 'CommentController@store');
