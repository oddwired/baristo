@extends('admin.layouts.app')
@section('title', "Admin")
@section('navcontent')
    <li class="active">
        <a href="#">HOME</a>
    </li>
    <li>
        <a href="#">LOCATIONS</a>
    </li>
    <li>
        <a href="#">MENU</a>
    </li>
    <li>
        <a href="{{url('admin/about')}}">ABOUT</a>
    </li>
@endsection
@section('content')

@endsection