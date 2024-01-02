<x-layouts.dashboard>
    <x-slot name="page">users.add</x-slot>
    <x-slot name="title">Add New User</x-slot>
    <x-slot name="card_title">Add New User</x-slot>
    <form method="post" action="{{ route('users.store') }}" autocomplete="off" class="form-horizontal">
        @csrf
        <div class="row">
            <label class="col-sm-3 col-form-label" for="input-name">{{ __('Name') }}</label>
            <div class="col-sm-8">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __(' Enter Name') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
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
                <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" id="input-username" type="text" placeholder="{{ __('Username') }}" value="{{ old('username') }}"  required />
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
                <input class="form-control" input type="password" name="password" id="input-password" placeholder="{{ __('Enter Password') }}" required autocomplete="new-password" />
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
                <select class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role" id="input-role" required>
                    <option value="user" @if (old('role')=="user") selected @endif>user</option>
                    <option value="admin" @if (old('role')=="admin") selected @endif>admin</option>
                    <option value="super_admin" @if (old('role')=="super_admin") selected @endif>super admin</option>
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
