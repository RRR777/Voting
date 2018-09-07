@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User
            <small>
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                {{ $user->name }}
            </small>
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) }}

                        @include('users.fields')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
