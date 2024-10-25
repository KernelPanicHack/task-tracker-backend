@extends('admin.template')

@section('title', 'User List')

@section('content')
    <x-users />
{{--    <h3 style="color: #5E68E6; text-align: center;">Welcome to Admin Dashboard</h3>--}}
{{--    <p>This is the admin panel where you can manage users and roles.</p>--}}
{{--    <h3>User List</h3>--}}

{{--    <table class="table" id="userTable">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>--}}
{{--                Name--}}
{{--                <input type="text" id="searchName" class="form-control" placeholder="Search by name...">--}}
{{--            </th>--}}
{{--            <th>--}}
{{--                Email--}}
{{--                <input type="text" id="searchEmail" class="form-control" placeholder="Search by email...">--}}
{{--            </th>--}}
{{--            <th>--}}
{{--                Roles--}}
{{--                <select id="roleFilter" class="form-select">--}}
{{--                    <option value="">All roles</option>--}}
{{--                    @foreach($roles as $role)--}}
{{--                        <option value="{{ $role }}">{{ $role }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </th>--}}
{{--            <th></th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($users as $user)--}}
{{--            <tr class="{{ $user->hasRole('banned') ? 'table-danger' : '' }}" data-roles="{{ implode(',', $user->getRoleNames()->toArray()) }}">--}}
{{--                <td>{{ $user->name }}</td>--}}
{{--                <td>{{ $user->email }}</td>--}}
{{--                <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>--}}
{{--                <td>--}}
{{--                    <a href="{{ route('admin.edit-user-roles', $user->id) }}" class="btn btn-sm btn-secondary">Edit Roles</a>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}

{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            // Функция для фильтрации пользователей--}}
{{--            function filterUsers() {--}}
{{--                var nameValue = $('#searchName').val().toLowerCase();--}}
{{--                var emailValue = $('#searchEmail').val().toLowerCase();--}}
{{--                var selectedRole = $('#roleFilter').val().toLowerCase();--}}

{{--                $('#userTable tbody tr').filter(function() {--}}
{{--                    var nameMatch = $(this).find('td:eq(0)').text().toLowerCase().indexOf(nameValue) > -1;--}}
{{--                    var emailMatch = $(this).find('td:eq(1)').text().toLowerCase().indexOf(emailValue) > -1;--}}
{{--                    var roles = $(this).data('roles').toLowerCase().split(',');--}}
{{--                    var roleMatch = selectedRole === "" || roles.includes(selectedRole);--}}

{{--                    // Показываем строку, если она соответствует всем условиям--}}
{{--                    return nameMatch && emailMatch && roleMatch;--}}
{{--                }).show();--}}

{{--                // Скрываем строки, которые не соответствуют условиям--}}
{{--                $('#userTable tbody tr').filter(function() {--}}
{{--                    var nameMatch = $(this).find('td:eq(0)').text().toLowerCase().indexOf(nameValue) > -1;--}}
{{--                    var emailMatch = $(this).find('td:eq(1)').text().toLowerCase().indexOf(emailValue) > -1;--}}
{{--                    var roles = $(this).data('roles').toLowerCase().split(',');--}}
{{--                    var roleMatch = selectedRole === "" || roles.includes(selectedRole);--}}

{{--                    // Скрываем строку, если она не соответствует всем условиям--}}
{{--                    return !nameMatch || !emailMatch || !roleMatch;--}}
{{--                }).hide();--}}
{{--            }--}}

{{--            // Привязка событий к полям поиска и фильтру--}}
{{--            $('#searchName').on('keyup', filterUsers);--}}
{{--            $('#searchEmail').on('keyup', filterUsers);--}}
{{--            $('#roleFilter').on('change', filterUsers);--}}
{{--        });--}}
{{--    </script>--}}
@endsection

