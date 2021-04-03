<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\chat;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "yeu";
    }

    public function getchatAd(Request $request){
        // return chat::with('id_user')->get();
        return chat::all();
       
    }
    public function addchatadmin(Request $request){
        $text=$request->input('content');
        $chat=new chat();
        $chat->id_user=1;
        $chat->id_role=1;
        $chat->id_admin=session()->get('id_user');
        $chat->content=$text;
        $chat->time=date_create()->format('Y-m-d H:i:s');
        $chat->save();
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
