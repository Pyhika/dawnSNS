@extends('layouts.login')

@section('content')
<div class="container">
<!--    投稿機能開始-->
<div>
    <img src="images/dawn.png">
    <p>{{Auth()->user()->username}}</p>
    <form method="post" action="{{ route('posts.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <textarea class="form-control"rows="5" name="post" placeholder="何をつぶやこうか...?"></textarea>
        </div>
        <input type="image" class="btn btn-primary" src="images/post.png"/>
    </form>
</div>
<!--    投稿機能終了-->
    
<!--    投稿結果取得開始-->
    <table>
        <tr>
            <td>
                <table>
                    @foreach ($items as $item)
                    <tr>
                        <td><img src="images/dawn.png"></td>
                        <td>{{ $item->user->username }}</td>
                        <td>{{ $item->post }}</td>
                        <td>{{ $item->created_at }}</td>
<!--                        編集用ボタン-->
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                                <img src="images/edit.png" alt="edit">
                            </button>
                        </td>
<!--                        編集用モーダルウィンドウ-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-body">
                                <form method="post" action="{{ route('posts.update', ['id' => $item->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                  <div class="form-group">
                                    <label for="messageText" class="control-label"></label>
                                    <textarea class="form-control" id="messageText" name="newPost" placeholder=""></textarea>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">
                                        <img src="images/edit.png" alt="edit">
                                      </button>
                                  </div>
                                </form>
                            </div>
                          </div>
                        </div>
<!--                        削除用ボタン-->
                        <td>
                            <div class="btn btn-danger">
                                <form method="post" action="{{ route('posts.destroy', ['id' => $item->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return window.confirm('削除しますか？');">
                                        <img src="images/trash.png">
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </td>
        </tr>
    </table>
<!--    投稿結果取得終了-->
</div>
@endsection