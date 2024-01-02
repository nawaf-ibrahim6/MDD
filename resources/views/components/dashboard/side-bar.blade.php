@php
    $page ??= "dashboard";
@endphp

{{--   Control Panel   --}}
<x-side-bar-element :page="$page" prefix="dashboard" title="Control Panel" icon="dashboard" route="dashboard"/>
{{--   Profile   --}}
<x-side-bar-element :page="$page" prefix="profile" title="User Profile" icon="person" route="profile.edit"/>
@if(Auth::user()->role == 'admin')
{{--   Users Management   --}}
<x-side-bar-group :page="$page" prefix="users" title="Users Management" icon="group">
    <x-side-bar-element :page="$page" prefix="users.add" title="Add User" icon="add" route="users.create"/>
    <x-side-bar-element :page="$page" prefix="users.view" title="View Users" icon="view_list" route="users.index"/>
</x-side-bar-group>
@endif
<x-side-bar-element :page="$page" prefix="notification.view" title="View Notification" icon="view_list" route="notification.index"/>

{{--   Logout   --}}
<x-side-bar-element :page="$page" prefix="logout" title="Logout" icon="logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();"/>
<form id="logout-form" action="{{ route('logout') }}" method="POST">

    @csrf
</form>
