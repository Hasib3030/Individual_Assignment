<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BlogCounter;
use DB;
use App\Blog;
use App\Post;

class ManagerController extends Controller
{
    public function index(){
        return view('Manager.index');
    }

    //Blog Manager List

    public function busManagerList(){

        $managerList = User::where( 'type' , 'Manager')->get();
        error_log($managerList);
        return view('Manager.ManagerList',['managerList' => $managerList]);
    }

    //Blog Counter
    public function buscounter(){

        return view('Manager.BlogCounter');
    }


    //Edit BlogCounter Info

    public function editBusCounter($id, Request $req){

        $busCounter = BlogCounter::find($id);
        return view('Manager.EditBusCounter',['busCounter' => $busCounter]);
    }

    //Update Blog Counter Information

    public function updateBusCounter($id, Request $req){
        $this->validate($req,[
            'name'  => 'required',
            'manager' => 'required',
            'oparetor' =>  'required',
            'location' => 'required|min:4'
        ]);

        $newBusCounter = BlogCounter::find($id);

        $newBusCounter->oparetor = $req->oparetor;
        $newBusCounter->manager  = $req->manager;
        $newBusCounter->name    = $req->name;
        $newBusCounter->location = $req->location;

        $newBusCounter->save();
        return redirect()->route('manager.buscounter')->with('msg', 'Blog Counter Successfully Updated');
    }

    //Delete Blog Counter

    public function deleteBusCounter($id){

        $busCounter = BlogCounter::find($id);

        return view('Manager.DeleteBusCounter',['busCounter'=>$busCounter]);
    }

    public function removeBusCounter($id){
        $busCounter = BlogCounter::find($id);
        $busCounter->delete();
        return redirect()->route('home.buscounter')->with('msg', 'Blog Counter Deleted');
    }

    //Blog Counter Search
    function action(request $request){
        if($request->ajax()){
            $output = '';
            $query = $request->get('query');
            // error_log($query);
            if($query != ''){
                $data = DB::table('bus_counters')
                        -> where('name','like','%'. $query .'%')
                        ->orWhere('id','like','%'.$query.'%')
                        ->orWhere('location','like','%'.$query.'%')
                        ->get();
            }
            else{
                $data = DB::table('bus_counters')->get();
            }
            $total_row = $data->count();
            if($total_row > 0){
                foreach($data as $row){
                    $output .= '
                        <tr>
                            <td>'.$row->id.'</td>
                            <td>'.$row->oparetor.'</td>
                            <td>'.$row->manager.'</td>
                            <td>'.$row->name.'</td>
                            <td>'.$row->location.'</td>
                            <td>
                                <a href="/manager/editBusCounter/'.$row->id.'">
                                    <input type="submit" class="btn btn-info" value="Edit">
                                </a>

                                <a href="/manager/deleteBusCounter/'.$row->id.'">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </a>
                            </td>
                        </tr>
                    ';
                }
            }
            else{
                $output = '
                    <tr>
                        <td align="center" colspan="5"> No Data Found  </td>
                    </tr>
                ';
            }

            $data = array(
                'table_data'    => $output
            );

            echo json_encode($data);
        }
    }

    //Add New Blog

    public function addBus(){
        return view('Manager.AddBus');
    }

    public function insertBus(Request $req){
        $this->validate($req,[
            'name' => 'required',
            'oparetor' => 'required',
            'location' => 'required',
            'seats' => 'required'
        ]);

        $newbus = new Blog();
        $newbus->name = $req->name;
        $newbus->oparetor = $req->oparetor;
        $newbus->location = $req->location;
        $newbus->seats = $req->seats;

        $newbus->save();

        return redirect()->route('manager.busList')->with('msg','Blog Added Done');

    }

    //Blog List

    public function busList(){

        $busList = Blog::all();
        return view('Manager.BusList',['busList' => $busList]);
    }

    public function busListSearch(Request $req){
        $src = $req->Search;

    }

    //Create A New Post

    public function newPost(){
        return view('Manager.CreatePost');
    }

    public function insertPost(Request $req)
    {
        $this->validate($req, [
            'title' => 'required',
            'name' => 'required',
            'discription' => 'required',
        ]);

        $post = new Post();
        $post->title = $req->title;
        $post->name = $req->name;
        $post->discription = $req->discription;
        $post->username = $req->username;
        $post->save();

        return redirect()->route('user.myPost');

    }


    public function myPost(){
        $username = session('username');
        error_log($username);
        $myPost = Post::where('username' , '=', $username)->get();

       return view('Manager.MyPost',['myPost' => $myPost]);
    }


}
