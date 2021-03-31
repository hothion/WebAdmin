<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users;
// use File;
use Carbon;
use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProfile($id)
    {
        return users::find($id);
    }


    public function updateEditAdmin( Request $request,$id)
     {
        
            $userfind=users::findOrFail($id); 
            // $userfind = new users;
            $userfind->account =$request->account;
            $userfind->firstName =$request->firstName;
            $userfind->lastName =$request->lastName;
            $userfind->email =$request->email;
            $userfind->phone =$request->phone;
            $userfind->address =$request->address;
            $userfind->password=Hash::make($request->password);
            $userfind->gender =$request->gender;
            $userfind->birthday =$request->birthday;
            $userfind->remember_token =$request->remember_token;
            $userfind->images =$request->images;
            //     if($request->hasFile('images')){
            //         $image=$request->file('images');
            //         $filename=time() . '.' . $image->getClientOriginalExtension();
            //         $location=public_path('' .$filename);
            //         Image::make($image)->resize(300, 300)->save($location);
            //         $userfind->images=$filename;
            // }

            $userfind->save();
            echo($userfind);
}

    public function updateProfile(Request $request){
        $user = auth('api')->user();


        $this->validate($request,[
            'account' => 'required|string|max:191'
        ]);

        $currentPhoto = $user->images;
        if($request->images != $currentPhoto){
            $name = time().'.' . explode('/', explode(':', substr($request->images, 0, strpos($request->images, ';')))[1])[1];

            \Image::make($request->images)->save(public_path('').$name);
            $request->merge(['images' => $name]);

            $userPhoto = public_path('').$currentPhoto;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
