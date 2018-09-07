@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Category 
            <small> 
            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
            <i class="glyphicon {{ $category->icon }}"></i>
            {{ $category->name }}
            </small>
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
{{--                     @include('flash::message') --}}
                    @include('categories.show_fields')
                    <a href="{{ route('categories.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
