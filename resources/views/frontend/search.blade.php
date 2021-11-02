@extends('frontend.templates.app')
@section('title', 'Search | Global Professional Business')
@section('headerClass', 'header-search')
@section('contentClass', 'camel-background')

@section('content')
    <directory-search2
        :categories="{{ $categories }}"
        :enterprises="{{ $enterprises }}"
        :params="{{ json_encode($params) }}"
    ></directory-search2>
@endsection
