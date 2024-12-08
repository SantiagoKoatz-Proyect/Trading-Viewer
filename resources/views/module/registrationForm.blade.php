@extends("Layout.main")

@section("page_title", __('Registration Form'))

@section("content")

@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif
<div class="registration-container">
    <form action="{{ route('newAccount') }}" method="POST">
        @csrf
        @method('PUT')
        <h2>{{ __('Registration Form:') }}</h2>

        <div class="form-group">
            <label for="post-name">{{ __('Name:') }}</label>
            <input type="text" id="post-name" name="name" required placeholder="{{ __('Enter your name') }}">
        </div>

        <div class="form-group">
            <label for="post-email">{{ __('Email:') }}</label>
            <input type="email" id="post-email" name="email" required placeholder="{{ __('Enter your email') }}">
        </div>

        <div class="form-group">
            <label for="post-pass">{{ __('Password:') }}</label>
            <input type="password" id="post-pass" name="password" required placeholder="{{ __('Enter your password') }}">
        </div>

        <div class="form-group">
            <input type="submit" value="{{ __('Register Account') }}">
        </div>
    </form>
    <p>
        <a href="/login">{{__('Go back')}}</a>
    <p>
</div>
@endsection