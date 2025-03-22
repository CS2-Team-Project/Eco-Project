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
        if($usertype=='1'){
            return view('admin.home');
        }
            else
            {
                return view('UserUI.home');
            }
        
    }
    public function home()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }

        else
        {
            return view('UserUI.home');
        }
    }

    public function basket(Request $Request, $id)
    {
        if(Auth::id())
        {
            return redirect()->back();
        }

        else
        {

            return redirect('login');
        }
    }
    
}
