<?php

namespace App\Http\Controllers;

use PhpParser\Node\Expr\FuncCall;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(){
        return view('Login.index');
    }

    public function  verifyUser(Request $req){

        //Null Validation
        $this->validate($req,[
            // 'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('username',$req->username)
                    ->where('password',$req->password)
                    ->first();
        error_log($user);
        if($user != null){

            if($user['type'] == "Admin"){
                $req->session()->put('username', $req->username);
                return redirect()->route('home.index');
            }
            if($user['type'] == "User"){
                $req->session()->put('username', $req->username);
                return redirect()->route('manager.index');
            }
            
        }
        else{
            $req->session()->flash('msg', 'Invalid Username or Password');
            return redirect('/login');
        }
    }

    public function createAccount(){
        return view('Login.CreateAccount');
    }

    public function newAccount(Request $req){
        echo $req->name;
        echo $req->email;
        echo $req->username;
        echo $req->password;

        $this->validate($req, [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $newUser = new User();

        $newUser->name = $req->name;
        $newUser->email = $req->email;
        $newUser->username = $req->username;
        $newUser->password = $req->password;
        $newUser->type = 'User';
        
        $newUser->save();

        return redirect()->route('login.index');
    }
}