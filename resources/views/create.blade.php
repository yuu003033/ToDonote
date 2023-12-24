@extends('layouts.app')

@section('content')

<div class="row justify-content-center ml-0 mr-0 h-100">
    <div class="card w-100 p-0">
        <div class="card-header">新規リスト作成</div>
        <div class="card-body">
            <form method="POST" action="/store">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                <div class="form-group">
                    <textarea name="content" class="form-control" rows="10" placeholder="新規タスク"></textarea>
                </div>
                <div>
                    <input type="date" name="dedline">
                </div>
                <button type="submit" class="btn btn-primary btn-lg">保存</button>
            </form>
        </div>
    
    </div>
</div>
@endsection
