@extends('admin.template')

@section('title', 'Admin Dashboard')

@section('content')

    <h3 style="color: rgba(var(--primary),1); text-align: center;">Welcome to Admin Dashboard</h3>
    <p style="text-align: center;">This is the admin panel where you can manage users and roles.</p>

    <x-users />

@endsection
