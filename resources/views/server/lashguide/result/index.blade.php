@extends('layouts.server')
@section('title')
Kết quả gợi ý
@endsection
@section('css')

@endsection
@section('content')
<div class="page-result">
	<h1>Kết quả gợi ý</h1>
	<a href="{{route('admin.lashguide.result.create')}}" class="btn btn-md btn-primary">Thêm gợi ý</a>
</div>
@endsection
@section('script')

@endsection