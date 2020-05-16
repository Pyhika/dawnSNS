@extends('layouts.login')

@section('content')

<p>トップ画面です</p>

<p>アイコン</p>
<form action="index" method="POST">
    <input type="textare" name="send" placeholder="何をつぶやこうかな...">     
    <input type="submit" value="投稿ボタン">
</form>
</br>
<table>
    @foreach ($list as $list)
    <tr>
        <td>{{ $list->images }}</td>
        <td>{{ $list->username }}</td>
        <td>{{ $list->bio }}</td>
        <td>{{ $list->modified_at }}</td>
        <td><a class="btn btn-primary" href="/post/{{$list->id}}/updateForm">更新</a></td>
        <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td> 
    </tr>
    @endforeach
</table>
@endsection