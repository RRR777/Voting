@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nomination
            <small>
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                Edit
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                {{ $nomination->name }}
            </small>
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       @include('flash::message')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {{ Form::model($nomination, ['route' => ['nominations.update', $nomination->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) }}

                        @include('nominations.fields')

                   {{ Form::close() }}
               </div>
           </div>
       </div>
   </div>
@endsection
