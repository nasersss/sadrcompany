@extends('master')

@section('title')
{{__('home.work')}}
@endsection

{{-- page css files or code  --}}
@section('css')

@endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')
@include('works')
@endsection