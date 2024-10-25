@extends('admin.template')

@section('title', 'Edit User Roles')

@section('content')
    <h3>Edit Roles for {{ $user->name }}</h3>

    <form action="{{ route('admin.update-user-roles', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            @foreach($roles as $role)
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input" id="role-{{ $role->id }}"  name="roles[]" value="{{ $role->name }}"
                        {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                    <label class="form-check-label" for="role-{{ $role->id }}" >{{ $role->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: rgba(var(--primary),1)">Update Roles</button>
    </form>
@endsection
