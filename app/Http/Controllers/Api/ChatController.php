<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\chat;
use App\Models\users;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listUser()
    {
        return chat::query()
        ->where('id_user','<>',1)
        ->with('User')
        ->get();
    }
    public function getUserMess($id){
        $chat1 = DB::select('select u.*,c.* from chat as c , users as u where  c.id_user = u.id and c.id_user='.$id);
        return $chat1;
    }
    public function getAdmin($id)
    {
        $chat = DB::select('select u.*,c.* from chat as c , users as u where c.id_user=u.id and c.id_admin='.$id);
        return $chat;
        echo "get message user to admin";
    }
    public function getInsertMessageUserToShop(Request $request){
        $chat=new chat();
        $chat->id_user=$request->get('id_user');
        $chat->id_role=1; 
        $chat->id_admin=$request->get('id_admin');
        $chat->content=$request->get('content');
        $chat->time=date_create()->format('Y-m-d H:i:s');
       
        $chat->save();
        echo "add 1 message for admin";
      
    }
    public function search(Request $request)
        {
            $query = $request->query('query');
            $user = users::where('firstName', 'like', '%' . $query . '%')
                ->orWhere('lastName', 'like', '%' . $query . '%')
                ->get();
            return $user;
            return response()->json("ok");
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