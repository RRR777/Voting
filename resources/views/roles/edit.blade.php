@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Role
            <small>
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                Edit 
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                {{ $role->name }}
            </small>

        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       @include('flash::message')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {{ Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'patch']) }}

                        @include('roles.fields')

                   {{ Form::close() }}
               </div>
           </div>
       </div>
   </div>
@endsection
