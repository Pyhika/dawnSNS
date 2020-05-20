@extends('layouts.login')

@section('content')

<p>トップ画面です</p>

<p>アイコン</p>
<form action="index" method="POST">
    <input type="textarea" name="post" placeholder="何をつぶやこうかな...">     
    <input type="submit" value="投稿ボタン">
</form>
</br>
<table>
    @foreach ($lists as $list)
    <tr>
        <td>{{ $list->images }}</td>
        <td>{{ $list->username }}</td>
        <td>{{ $list->modified_at }}</td>
        <td><a class="btn btn-primary" href="">更新</a></td>
        <td><a class="btn btn-danger" href="" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td> 
    </tr>
    @endforeach
</table>
@endsection