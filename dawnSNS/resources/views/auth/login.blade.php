@extends('layouts.logout')

@section('content')

{!! Form::open(['route' => 'posts.index']) !!}
@csrf
<p>DAWNSNSへようこそ</p>

{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン') }}

<p><a href="{{route('register.add')}}">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
