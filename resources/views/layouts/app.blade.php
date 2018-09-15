@extends('layouts.layoutLTE')

@section('menu')
    @include("layouts.menu")
@endsection

@section('content')
    @parent

    @section('stylesheets')
        @parent

    @endsection	

@endsection

