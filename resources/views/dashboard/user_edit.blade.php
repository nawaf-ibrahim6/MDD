<x-layouts.dashboard>
    <x-slot name="page">users.view</x-slot>
    <x-slot name="title">Edit User</x-slot>
    <x-slot name="card_title">Edit User</x-slot>
    <form method="post" action="{{ route('users.update',$user->id) }}" autocomplete="off" class="form-horizontal">
        @csrf
        @method('PUT')
        <div class="row">
            <label class="col-sm-3 col-form-label" for="input-name">{{ __('Name') }}</label>
            <div class="col-sm-8">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name')??$user->name }}" id="input-name" type="text" placeholder="{{ __(' Enter Name') }}"/>
                @if ($errors->has('name'))
                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                @endif
            </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-3 col-form-label" for="input-username">{{ __('Username') }}</label>
            <div class="col-sm-8">
            <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username')??$user->username }}" id="input-username" type="text" placeholder="{{ __('Username') }}" />
                @if ($errors->has('username'))
                <span id="username-error" class="error text-danger" for="input-username">{{ $errors->first('username') }}</span>
                @endif
            </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-3 col-form-label" for="input-password">{{ __(' Password') }}</label>
            <div class="col-sm-8">
                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                <input class="form-control" input type="password" name="password" id="input-password" placeholder="{{ __('Enter  Password') }}" autocomplete="new-password" />
                @if ($errors->has('password'))
                    <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                @endif
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-3 col-form-label" for="input-role">{{ __('Role') }}</label>
            <div class="col-sm-8">
            <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                <select class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role" id="input-role">
                    <option value="user" @if ((old('user')??$user->role)=="user") selected @endif>user</option>
                    <option value="admin" @if ((old('role')??$user->role)=="admin") selected @endif>admin</option>
                    <option value="super_admin" @if ((old('super_admin')??$user->role)=="super_admin") selected @endif>super admin</option>
                </select>
                @if ($errors->has('role'))
                <span id="role-error" class="error text-danger" for="input-role">{{ $errors->first('role') }}</span>
                @endif
            </div>
            </div>
        </div>
        <br>
        <button type="submit"  class="btn btn-success">{{ __('Save') }}</button>
    </form>
</x-layouts.dashboard>
