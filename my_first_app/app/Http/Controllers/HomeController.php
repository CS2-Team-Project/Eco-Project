<?php
//controls direction of site when logging in as user or admin
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){ // remember to reference db tables, use this method
            return view('admin.layouts.home');
        }
            else
            {
                return view('UserUI.home');
            }
        
    }
    public function home(){
        return view('UserUI.home');
    }
}
