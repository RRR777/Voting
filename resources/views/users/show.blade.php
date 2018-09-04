@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{-- User --}}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('flash::message')
                    @include('users.show_fields')
                    @if ( Auth::user()->role_id == 1)
                        <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
                    @endif 
                </div>
            </div>
        </div>
    </div>
@endsection
