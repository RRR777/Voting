@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Role
            <small>
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                {{ $role->name }}
            </small>
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                @include('flash::message')
                <div class="row" style="padding-left: 20px">
                    @include('roles.show_fields')
                    <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
