@extends("Layout.main")

@section("page_title", __('Login'))

@section("content")

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif



<div class="login-container">
    <form action="{{ route('validateAccount') }}" method="POST">
        @csrf
        <h2>{{ __('Enter:') }}</h2>

        <div class="form-group">
            <label for="post-name">{{ __('Name:') }}</label>
            <input type="text" id="post-name" name="name" placeholder="{{ __('Enter your name') }}" required>
        </div>

        <div class="form-group">
            <label for="post-pass">{{ __('Password:') }}</label>
            <input type="password" id="post-pass" name="password" placeholder="{{ __('Enter your password') }}" required>
        </div>

        <div class="form-group">
            <input type="submit" value="{{ __('Login') }}">
        </div>
    </form>
    <a href="/registrationForm">{{ __('Register') }}</a>
</div>
@endsection