<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BlogCounter;
use DB;
use Symfony\Component\Console\Helper\Table;
use App\Post;

class HomeController extends Controller
{
    public function index(){
        return view('Home.index');
    }

    public function viewUserList(){
        // $studentList = Student::all(); //All Data
        $userList = User::paginate(5); //Pagination Data
        return view('Home.View_User',['std'=>$userList]);
    }

    public function createUser(){
        return view('Home.createUser');
    }

    public function editUser($userId, Request $req){
        $user = User::find($userId);
        return view('home.editUser',$user);
    }

    public function update($userId, Request $req){

        $this->validate($req,[
            'uname' => 'required',
            'password' => 'required'
        ]);

        $user = User::find($userId);

        $user->username = $req->uname;
        $user->password = $req->password;

        $user->save();

        return redirect()->route('home.viewUserList')->with('msg','User Successfully Updated');
    }

    public function insertUser(Request $req){

        //Validation
        $this->validate($req,[
            'name'      => 'required',
            'email'     => 'required',
            'username'  => 'required',
            'password'  => 'required',
            'type'      => 'required'
        ]);
        $user = new User;

        $user->name = $req->name;
        $user->email = $req->email;
        $user->username = $req->username;
        $user->password = $req->password;
        $user->type = $req->type;

        $user->save();

        return redirect()->route('home.createUser')->with('msg','User Successfully Added');
    }

    public function delete($userId, Request $req){
        User::find($userId)->delete();
        return redirect()->route('home.viewUserList')->with('msgDlt','User Successfully Deleted');
    }


    //get Blog Counter List

    public function buscounter(){

        return view('Home.BlogCounter');
    }


    //Search on BlogCounter Table

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
                                <a href="/home/editBusCounter/'.$row->id.'">
                                    <input type="submit" class="btn btn-info" value="Edit">
                                </a>

                                <a href="/home/deleteBusCounter/'.$row->id.'">
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


    //Add New BlogCounter

    public function addbuscounter(){
        return view('Home.AddBusCounter');
    }

    //Insert New Blog Counter

    public function newbuscounter(Request $req){
        $this->validate($req, [
            'name'      => 'required',
            'oparetor'  => 'required',
            'manager'   => 'required',
            'location'  => 'required|min:4'
        ]);

        $newBusCounter = new BlogCounter();

        $newBusCounter->oparetor = $req->oparetor;
        $newBusCounter->manager  = $req->manager;
        $newBusCounter->name    = $req->name;
        $newBusCounter->location = $req->location;

        $newBusCounter->save();
        return redirect()->route('home.buscounter')->with('msg', 'New Blog Counter Successfully Added');
    }

    //Edit BlogCounter Info

    public function editBusCounter($id, Request $req){

        $busCounter = BlogCounter::find($id);
        return view('Home.EditBusCounter',['busCounter' => $busCounter]);
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
        return redirect()->route('home.buscounter')->with('msg', 'Blog Counter Successfully Updated');
    }

    //Delete Blog Counter

    public function deleteBusCounter($id){

        $busCounter = BlogCounter::find($id);

        return view('Home.DeleteBusCounter',['busCounter'=>$busCounter]);
    }

    public function removeBusCounter($id){
        $busCounter = BlogCounter::find($id);
        $busCounter->delete();
        return redirect()->route('home.buscounter')->with('msg', 'Blog Counter Deleted');
    }

    public function allPost(){
        $allPost = Post::all();

        return view('Home.AllPost',['allPost' => $allPost]);
    }

    public function deletePost($id){
        Post::find($id)->delete();
        return redirect()->route('allPost')->with('msgDlt','Post Successfully Deleted');
    }
}
