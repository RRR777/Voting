@extends('layouts.election_template')

@section('content')
<div class="container">
    <div class="container">
        <div class="wlcome-grids">
            <div class="col-md-7 wlcome-grid-left">
                <div class="election_grid">
                    <h3>Welcome To Election !</h3>
                    <h3>
                        <span class="glyphicon glyphicon-play" style="font-size: 28px" aria-hidden="true"></span> 
                        Choose a Category!
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <br>

<!-- banner-bottom1 -->
    <div class="banner-bottom1">
        <div class="banner-bottom1-grids">
            @foreach($categories as $category)
                <div class="col-md-4 banner-bottom1-left banner-bottom1-left1">
                    <a href="{{ route('categories.show', [$category->id]) }}">
                        <div class="banner-bottom1-lft">
                            @if (isset($category->icon))
                                <span class="glyphicon {{ $category->icon }}" aria-hidden="true"></span>
                            @else
                                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                            @endif
                            <h3>{{ $category->name }}</h3>
                        </div>
                    </a>
                </div>
            @endforeach
            <script src="{{ asset('election_template/js/jquery.wmuSlider.js') }}"></script> 
                    <script>
                        $('.example1').wmuSlider();
                    </script> 
            <div class="clearfix"> </div>
        </div>
    </div>
<!-- //banner-bottom1 -->
</div>
@endsection

