@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Setting
            <small>
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                Edit
            </small>
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {{ Form::model($setting, ['route' => ['settings.update', $setting->id], 'method' => 'patch']) }}
 
                         @include('settings.fields')
 
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
