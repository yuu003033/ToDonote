@extends('layouts.app')

@section('content')

<div class="row justify-content-center ml-0 mr-0 h-100">
    <div class="card w-100 p-0">
        <div class="card-header">メモ編集</div>
        <div class="card-body">
            <form action="{{ route('update', ['id' => $memo['id'] ]) }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                <div class="form-group">
                    <textarea name="content" class="form-control" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">登録</button>
            </form>
        </div>
    
    </div>
</div>
@endsection
