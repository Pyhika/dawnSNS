@extends('layouts.app')

@section('content')
<h2>機能を実装していきましょう。</h2>
    @section('content')
    <div>
      <form method="post" action="posts/index">
        <div class="form-group">
        <label for="exampleFormControlTextarea1">本文</label>
          <textarea class="form-control"rows="5" name="content"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="投稿"/>
      </form>
    </div>
    @endsection

@endsection