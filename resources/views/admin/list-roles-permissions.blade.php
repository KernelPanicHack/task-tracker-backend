@extends('admin.template')

@section('title', 'List Roles and Permissions')

@section('content')
    <h3 style="text-align: center;">List of Roles and Permissions</h3>

    <table class="table table-secondary">
        <thead>
        <tr>
            <th>Role Name</th>
            <th>Permissions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>
                    @if($role->permissions->isEmpty())
                        No permissions assigned
                    @else
                        <ul>
                            @foreach($role->permissions as $permission)
                                <li>{{ $permission->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
