<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\users;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // // $this->authorize('isAdmin');
        // if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
        //     return users::latest()->paginate(5);
        // }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'account' => 'required|string|max:191',
            'password' => 'required|string|min:3'
        ]);

        return users::create([
            'account' => $request['account'],
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'password' => Hash::make($request['password']),
            'birthday' => $request['birthday'],
            'remember_token' => $request['remember_token'],
            'images' => $request['images']
            
        ]);
    }

    public function updateProfile(Request $request){
        $user = auth('api')->user();


        $this->validate($request,[
            'account' => 'required|string|max:191',
            'password' => 'required|string|min:3'
        ]);


        $currentPhoto = $user->images;


        if($request->images != $currentPhoto){
            $name = time().'.' . explode('/', explode(':', substr($request->images, 0, strpos($request->images, ';')))[1])[1];

            \Image::make($request->images)->save(public_path('img/profile/').$name);
            $request->merge(['photo' => $name]);

            $userPhoto = public_path('img/profile/').$currentPhoto;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }

        }


        if(!empty($request->password)){
            $request->merge(['password' => Hash::make($request['password'])]);
        }


        $user->update($request->all());
        return ['message' => "Success"];
    }


    public function profileAdmin()
    {
        return auth('api')->user();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = users::findOrFail($id);

        $this->validate($request,[
            'account' => 'required|string|max:191',
            'password' => 'required|string|min:3'
        ]);

        $user->update($request->all());
        return ['message' => 'Updated the user info'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->authorize('isAdmin');

        $user = users::findOrFail($id);
        // delete the user

        $user->delete();

        return ['message' => 'User Deleted'];
    }

    public function search(){

        if ($search = \Request::get('q')) {
            $users = users::where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%")
                        ->orWhere('email','LIKE',"%$search%");
            })->paginate(20);
        }else{
            $users = users::latest()->paginate(5);
        }

        return $users;

    }
}