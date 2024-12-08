@extends('Layout.main')

@section('page_title', __('My Account'))

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="account-wrapper">
    <form action="/myAccount/{{$user->id}}/update" method="POST" id="accountForm">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" id="nameInput" name="name" value="{{ $user->name }}" class="form-control" readonly required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="emailInput" name="email" value="{{ $user->email }}" class="form-control" readonly required>
        </div>


        <div class="form-actions" id="saveButton" style="display: none;">
            <input type="submit" value="{{ __('Save') }}">
        </div>

    </form>
    </form>

    <button type="button" id="editButton" class="btn btn-secondary" onclick="enableEdit()" style="display:block">{{ __('Habilitate data editing') }}</button>

    <p>
        <a href="/myAccount/{{$user->id}}" class="btn btn-secondary" id="backButton" style="display:none"> {{__('Go back')}}<a>
                <a href="/myAccount/{{$user->id}}/delete" class="btn btn-secondary" onclick="return confirm('¿Are you sure?');">{{ __('Delete account') }}</a>
                <a href="/logout" class="btn btn-secondary">{{ __('Logout') }}</a>

    </p>
</div>

<script>
    function enableEdit() {
        const nameInput = document.getElementById('nameInput');
        const emailInput = document.getElementById('emailInput');

        nameInput.removeAttribute('readonly');
        emailInput.removeAttribute('readonly');

        document.getElementById('saveButton').style.display = 'block';
        document.getElementById('backButton').style.display = 'block';
        document.getElementById('editButton').style.display = 'none';
    }
</script>

@endsection