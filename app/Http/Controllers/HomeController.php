<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makelist;
use App\Models\Task;

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
        // タスク一覧取得

        $user = \Auth::user();
        $makelists = Task::where('user_id', $user['id'])->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        // dd($makelists);
        return view('home', compact('user','makelists'));
    }

    public function create()
    {
        $user = \Auth::user();
        $makelists = Task::where('user_id', $user['id'])->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        return view('create', compact('user', 'makelists'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        // POSTされたデータをDB（memosテーブル）に挿入
        // MEMOモデルにDBへ保存する命令を出す
        $task_id = Task::insertGetId(['name' => $data['task'], 'user_id' => $data['user_id']]);
        // dd($task_id);

        
        // リダイレクト処理
        return redirect()->route('home');
    }
    public function edit($id)
    {
        $user = \Auth::user();
        $makelist = Task::where('status', 1)->where('id', $id)->where('user_id', $user['id'])->first();
        // dd($makelist);
        $makelists = Task::where('user_id', $user['id'])->where('status', 1)->orderBy('updated_at', 'DESC')->get();

        return view('edit', compact('makelist', 'user', 'makelists'));
    }
    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        // dd($inputs);
        Task::where('id', $id)->update(['content' => $inputs['content']]);
        return redirect()->route('home');

    }

}
