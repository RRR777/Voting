@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Settings
            <small>
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                Add new nomination and voting period
            </small>
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {{ Form::open(['route' => 'settings.store']) }}

                        @include('settings.fields')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
