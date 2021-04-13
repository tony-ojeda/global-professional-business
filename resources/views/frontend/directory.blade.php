@extends('frontend.templates.app')
@section('title', 'Directorio | Global Professional Business')
@section('headerClass', 'header-white')
@section('contentClass', 'camel-background')

@section('content')
    <directory
        :categories="{{ $categories }}"
        :enterprises="{{ $enterprises }}"
    ></directory>
@endsection
