@extends('admin.template')

@section('title', 'Manage Roles and Permissions')

@section('content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: lightblue;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
        <h3 style="text-align: center">Manage Roles and Permissions</h3>



    <!-- Создание новой роли -->
    <div class="mb-4">

        <h4>
            Create New Role</h4>
        <form action="{{ route('admin.create-role') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="role-name" class="form-label">Role Name</label>
                <input type="text" id="role-name" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-secondary">
                Create Role</button>
        </form>
    </div>

    <!-- Создание нового разрешения -->
    <div class="mb-4">
        <h4>Create New Permission</h4>
        <form action="{{ route('admin.create-permission') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="permission-name" class="form-label">Permission Name</label>
                <input type="text" id="permission-name" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-secondary">Create Permission</button>
        </form>
    </div>

    <!-- Присвоение разрешений ролям -->
    <div class="mb-4">
        <h4>Assign Permission to Role</h4>
        <form action="{{ route('admin.assign-permission') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="role" class="form-label">Select Role</label>
                <select id="role" name="role" class="form-control" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="permission" class="form-label">Select Permission</label>
                <select id="permission" name="permission" class="form-control" required>
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-secondary">Assign Permission</button>
        </form>
    </div>

@endsection
