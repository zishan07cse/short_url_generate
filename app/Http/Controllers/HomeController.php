<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLink;
use Illuminate\Support\Str;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentuserid = Auth::user()->id;
        $count = ShortLink::where('user_id','=',$currentuserid)->count();
        $shortlinkslist = ShortLink::where('user_id','=',$currentuserid)->get();
        return view('home', compact('shortlinkslist'));
       
    }

    public function store(Request $request)
    {
        $request->validate([
           'link' => 'required|url'
        ]);
   
        $input['link'] = $request->link;
        $input['code'] = Str::random(6);
        $input['total_count'] = 0;
        $currentuserid = Auth::user()->id;
        $input['user_id'] = $currentuserid;
        ShortLink::create($input);
  
        return redirect('home')
             ->with('success', 'Shorten Link Generated Successfully!');
    }

    function total_count(Request $request){
        $shortlink =ShortLink::find($request['id']);
        $total_click = $shortlink['total_count'];
        if($total_click==0){
            $shortlink['total_count'] = 1;
            $shortlink->save();
        }else{
            $shortlink['total_count'] = $shortlink['total_count']+1;
            $shortlink->save();
        }
    }
}
