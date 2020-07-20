@extends('layouts.login')

@section('content')
<div class="container">
<!--    投稿機能開始-->
<div>
    <img src="images/dawn.png">
    <p>{{Auth()->user()->username}}</p>
    <form method="post" action="posts">
        <div class="form-group">
          <textarea class="form-control"rows="5" name="post" placeholder="何をつぶやこうかな..."></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="投稿"/>
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
                        <td></td>
                    </tr>
                    @endforeach
                </table>
            </td>
        </tr>
    </table>
<!--    投稿結果取得終了-->
</div>
@endsection