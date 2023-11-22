<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makelist;

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
        // $user = \Auth::user();
        // $makelist = Makelist::where('user_id', $user['id'])->get();
        // dd($makelist);
        return view('home');
    }

    public function create()
    {
        $user = \Auth::user();
        return view('create', compact('user'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        // POSTされたデータをDB（memosテーブル）に挿入
        // MEMOモデルにDBへ保存する命令を出す
      
        $makelist_id = Makelist::insertGetId([
            'content' => $data['content'],
             'user_id' => $data['user_id'], 
            //  'task_id' => $task_id,
             'status' => 1
        ]);
        
        // リダイレクト処理
        return redirect()->route('home');
    }
    // public function edit($id)
    // {
    //     $user = \Auth::user();
    //     return view('create', compact('user'));
    // }
}
