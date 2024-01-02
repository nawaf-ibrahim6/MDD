<x-layouts.dashboard>
    <x-slot name="page">profile</x-slot>
    <x-slot name="title">User Profile</x-slot>
    <x-slot name="card_title">User Profile</x-slot>
    <br>
    <h4 style="font-weight:bolder;">Edit Profile:</h4>
    <form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
        @csrf
        @method('put')

        <div class="row">
            <label class="col-sm-3 col-form-label">{{ __('Name') }}</label>
            <div class="col-sm-8">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                @if ($errors->has('name'))
                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                @endif
            </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-3 col-form-label">{{ __('Username') }}</label>
            <div class="col-sm-8">
            <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" id="input-username" type="text" placeholder="{{ __('Username') }}" value="{{ old('username', auth()->user()->username) }}" required />
                @if ($errors->has('username'))
                <span id="username-error" class="error text-danger" for="input-username">{{ $errors->first('username') }}</span>
                @endif
            </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
    </form>
    <br><br>
    <h4 style="font-weight:bolder;">Change password:</h4>
    <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
        @csrf
        @method('put')

        <div class="row">
            <label class="col-sm-3 col-form-label" for="input-current-password">{{ __('Current Password') }}</label>
            <div class="col-sm-8">
            <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Current Password') }}" value="" required />
                @if ($errors->has('old_password'))
                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                @endif
            </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-3 col-form-label" for="input-password">{{ __('New Password') }}</label>
            <div class="col-sm-8">
            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('New Password') }}" value="" required />
                @if ($errors->has('password'))
                <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                @endif
            </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-3 col-form-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
            <div class="col-sm-8">
            <div class="form-group">
                <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm New Password') }}" value="" required />
            </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">{{ __('Change password') }}</button>
    </form>
</x-layouts.dashboard>
