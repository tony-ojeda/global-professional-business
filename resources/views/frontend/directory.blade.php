@extends('frontend.templates.app')
@section('title', 'Directory | Global Professional Business')
@section('headerClass', 'header-white')
@section('contentClass', 'camel-background')

@section('content')
    <directory
        :categories="{{ $categories }}"
        :enterprises="{{ $enterprises }}"
        :params="{{ json_encode($params) }}"
    ></directory>
@endsection
