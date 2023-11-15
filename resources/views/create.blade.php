@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ml-0 mr-0 h-100">
        
        <div class="card w-100">
            <div class="card-header">新規タスク作成</div>
            <div class="card-body">
                <form action="/store" method="post">
                    @csrf
                 
                    <div class="form-group">
                        <textarea name="content" class="form-control" rows="10" placeholder="新規メモ"></textarea>
                    </div>

                    <a href="#" class="btn btn-primary">保存</a>
                </form>
            </div>
            <div class="card-footer text-body-secondary">
                <label for="task">タスク</label>
                <input name="task" type="text" class="form-control" id="task" placeholder="タスク一覧">
            </div>
        </div>
    </div>
</div>
@endsection
