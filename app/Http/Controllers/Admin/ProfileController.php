<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use Session;

class ProfileController extends Controller
{
    private $me;
    
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin_user');
    }

    public function index()
    {
        return view('admin.profile');
    }

    public function changePassword(Request $request){
        $me = Auth::user();
        
        $validator = Validator::make($request->all(), [
            'oldPassword' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile')->withErrors($validator,'changePassword')->withInput();
        }

        if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->oldPassword]))
        {
            $me->password = bcrypt($request->password);
            $me->save();

            Session::flash('success','Password changed');
            return redirect()->route('profile');
        }
        else{
            return redirect()->route('profile')->withErrors(['oldPassword'=>'Incorrect password'],'changePassword');
        }
      
    }

    public function updateName(Request $request){
        $me = Auth::user();
        $me->name = $request->value;
        $me->save();
        return $request->value;
    }
}
