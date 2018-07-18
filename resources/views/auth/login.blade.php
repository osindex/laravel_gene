@extends('layouts.app')

@section('content')
<div class="login-page">
            <h1 class="center">{{ __('Login') }}</h1>
            <div class="form">
                <form class="login-form" action="{{route('login')}}" method="post">
                    {{ csrf_field() }}
                    @if(session('status'))
                        <div class="text-red">{{ session('status') }}</div>
                    @endif
                    <input type="text"  placeholder="email" id="email" name="email"/>
                    <span class="text-red">{{ $errors->first('email') }}</span>
                    <input type="password" placeholder="password" id="password" name="password"/>
                    <span class="text-red">{{ $errors->first('password') }}</span>

                    <button>{{ __('Login') }}</button>
                </form>
            </div>
        </div>
@endsection
