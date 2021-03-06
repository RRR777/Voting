@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Category
            <small>
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                Edit
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                {{ $category->name }}
            </small>
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       @include('flash::message')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {{ Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) }}

                        @include('categories.fields')

                   {{ Form::close() }}
               </div>
           </div>
       </div>
   </div>
@endsection
