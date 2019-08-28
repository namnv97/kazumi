@extends('layouts.client')
@section('title')
Trang chủ
@endsection
@section('css')

@endsection
@section('content')

<div class="page-home">
	<a href="{{route('admin.dashboard')}}">Trang quản trị</a>
	<a href="{{route('login')}}">Đăng nhập</a>
	<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		@csrf
	</form>
</div>

@endsection
@section('script')

@endsection