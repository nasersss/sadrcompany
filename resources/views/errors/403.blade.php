@extends('errors::layout')

@section('title', __('error-page-handel.403-t'))
@section('code', '403')
@section('message-title',__('error-page-handel.403-t'))
@section('message', __($exception->getMessage() ?:  __('error-page-handel.403')))
