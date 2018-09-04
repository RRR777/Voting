@extends('layouts.election_template')

@section('content')

@if ($whatPeriodIs == "nomination")
    @if (!isset($hasNominatedBefore) || $hasNominatedBefore == 0 )
        <!-- contact -->
            <div class="contact">
                <div class="container col-md-offset-3">
                    <h3 style="color: red"><span class="glyphicon glyphicon-play" style="font-size: 28px" aria-hidden="true"></span> Nominate a candidate in</h3>
                    <h3>
                        <small>
                            &nbsp; &nbsp; &nbsp;
                            <span class="glyphicon glyphicon-menu-right" style="font-size: 20px" aria-hidden="true"></span> 
                                 Category <b>"{{ $category->name }}"</b> !
                            </small>
                    </h3>
                    @include('adminlte-templates::common.errors')
        {{-- 			<p class="nihil">Vote For Real Government.</p> --}}
                    <div class="contact-grid">
        {{-- 				<div class="col-md-5 contact-left">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3056.9443837127305!2d-75.7983021!3d39.9873482!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x69c9c879a1263188!2sLutheran+Church+of+the+Good+Shepherd!5e0!3m2!1sen!2sin!4v1426659332982" frameborder="0" style="border:0"></iframe>
                        </div> --}}
                        <div class="col-md-7 contact-right">
                            <form method="post" action="{{ route('nominations.store') }}" enctype="multipart/form-data">

                                <input type="text" name="name" placeholder="Full name of the candidate" required=" ">
                                <input type="text" name="linkedin_url" placeholder="Enter LinkedIn url">
                                <input type="text" name="bio" placeholder="Describe Bio" required=" ">
                                <input type="text" name="business_name" placeholder="Enter Business Name" required=" ">
                                <input type="text" name="reason_for_nomination" placeholder="Reason for nomination" required=" ">
                                <input type="hidden" name="category_id" value="{{ $category->id }}">
                                <div>
                                <select name="gender">
                                    <option value="" selected hidden>Please select the gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                </div>
                                <input type="file" name="image" required=" ">
                                {{ csrf_field() }}
                                <div class="clearfix"> </div>
        {{-- 						<textarea placeholder="Type Your Text Here...." required=" "></textarea> --}}
                                <input type="submit" value="Submit">
                                <input type="reset" value="Clear">
                            </form>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
            <div class="container">
            @if (isset($previousCategory))
                <a href="/categories/{{ $previousCategory->id }}" class="col-xm-5 pull-left">
                    <span class="btn btn-primary pull-right">
                        {{ $previousCategory->name }} << Previous
                    </span>
                </a>
            @endif
            @if (isset($nextCategory))
                <a href="/categories/{{ $nextCategory->id }}" class="col-xm-5 ">
                <span class="btn btn-primary pull-right">
                    Next >> {{ $nextCategory->name }}</a>
                </span>
            @endif
    </div>
    @endif
    @if (isset($hasNominatedBefore) && $hasNominatedBefore != 0 )
        <div class="wlcome">
            <div class="container">
                <div class="wlcome-grids">
                    <div class="col-md-7 wlcome-grid-left">
                        <div class="election_grid">
                            <h3 style="color: red"> <span class="glyphicon glyphicon-play" style="font-size: 28px" aria-hidden="true"></span>You already nominated in</h3>
                            <h3>
                                <small>
                                    &nbsp; &nbsp; &nbsp;
                                    <span class="glyphicon glyphicon-menu-right" style="font-size: 20px" aria-hidden="true"></span> 
                                        <b>"{{ $category->name }}"</b> category!
                                    </small>
                            </h3>
{{--                             <p class="nihil">Vote For Real Government.</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="banner-bottom">
            <div class="container">
                <div class="wmuSlider example1">
                    <div class="wmuSliderWrapper">
                        <article style="position: absolute; width: 100%; opacity: 0;"> 
                            <div class="banner-wrap">
                                <div class="about-grids">
                                    <div class="col-md-4 about-grid">
                                        <div class="about-grid1">
                                            <figure class="thumb">
                                                <img style="max-height: 250px; min-height: 250px;" src="{{ asset('storage/upload/images/nominations/' . $nomination->id . '/' . $nomination->image) }}" alt=" " class="img-responsive" />
                                                <figcaption class="caption">
                                                    <h3><a href="#">{{ $nomination->name }}</a></h3>
                                                    <span>{{ $nomination->business_name }}</span>
                                                    <p> {{ $nomination->reason_for_nomination }}</p>
                                                </figcaption>
                                            </figure>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <script src="{{ asset('election_template/js/jquery.wmuSlider.js') }}"></script>
				<script>
					$('.example1').wmuSlider();
				</script>
            </div>
        </div>
        <div class="container">
        @if (isset($previousCategory))
            <a href="/categories/{{ $previousCategory->id }}" class="col-xm-5 pull-left">
                <span class="btn btn-primary pull-right">
                    {{ $previousCategory->name }} << Previous
                </span>
            </a>
        @endif
        @if (isset($nextCategory))
            <a href="/categories/{{ $nextCategory->id }}" class="col-xm-5 ">
            <span class="btn btn-primary pull-right">
                Next >> {{ $nextCategory->name }}</a>
            </span>
        @endif
    </div>
    @endif
@elseif ($whatPeriodIs == "voting")
    @if (isset($nominationSelecteds))
        <div class="wlcome">
            <div class="container">
                <div class="wlcome-grids">
                    <div class="col-md-7 wlcome-grid-left">
                        <div class="election_grid">
                            @if (!isset($checkVote))
                                <br>
                                <h3 style="color: red"><span class="glyphicon glyphicon-hand-right" style="font-size: 28px" aria-hidden="true"></span> Vote !</h3>
                            @else
                                <br>
                                <h3 style="color: red"><span class="glyphicon glyphicon-thumbs-up" style="font-size: 28px" aria-hidden="true"></span> You already voted !</h3>
                            @endif
                            <h3>
                                <small>
                                    &nbsp; &nbsp; &nbsp;
                                    <span class="glyphicon glyphicon-menu-right" style="font-size: 20px" aria-hidden="true"></span> 
                                         Category <b>"{{ $category->name }}"</b> !
                                    </small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- banner-bottom -->
        <div class="banner-bottom">
            <div class="container">
                <div class="wmuSlider example1">
                    <div class="wmuSliderWrapper">
                        
                            <article style="position: absolute; width: 100%; opacity: 0;"> 
                                <div class="banner-wrap">
                                    @foreach ($nominationSelecteds as $nomination)

                                    <div class="about-grids">

                                        <div class="col-md-4 about-grid">
                                            <div class="about-grid1">
                                                <figure class="thumb">
                                                    <img style="max-height: 250px; min-height: 250px;" src="{{ asset('storage/upload/images/nominations' . $nomination->id . '/' . $nomination->image) }}" alt=" " class="img-responsive" />
                                                    <figcaption class="caption">
                                                        <h3><a href="#">{{ $nomination->name }}</a></h3>
                                                        <span>{{ $nomination->business_name }}</span>
                                                        <p> {{ $nomination->reason_for_nomination }}</p>
                                                        <ul>
                                                            @if (!isset($checkVote))
                                                                <li><a href="{{ route('nominations.vote', ['nomination_id'=>$nomination->id, 'category_id' =>$nomination->category_id]) }}" class="btn btn-primary bg-aqua-active"><b>Vote</b></a></li>
                                                            @else
                                                                <li><button class="btn btn-primary  btn-block bg-aqua-active"><b>You have already Voted!</b></button></li>
                                                            @endif
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                                <br>
                                            </div>
                                        </div>
                                    @endforeach
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                            </article>

                        
{{--                         <article style="position: absolute; width: 100%; opacity: 0;"> 
                            <div class="banner-wrap">
                                <div class="about-grids">
                                    <div class="col-md-4 about-grid">
                                        <div class="about-grid1">
                                            <figure class="thumb">
                                                <img src="{{ asset('election_template/images/1.jpg') }}" alt=" " class="img-responsive" />
                                                <figcaption class="caption">
                                                    <h3><a href="#">James Cameron</a></h3>
                                                    <span>Manager.</span>
                                                    <p> It was popularised in the 1960s with the release of Letraset sheets.</p>
                                                    <ul>
                                                        <li><a href="#" class="f1"></a></li>
                                                        <li><a href="#" class="f2"></a></li>
                                                        <li><a href="#" class="f3"></a></li>
                                                    </ul>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="col-md-4 about-grid">
                                        <div class="about-grid1">
                                            <figure class="thumb">
                                                <img src="{{ asset('election_template/images/3.jpg') }}" alt=" " class="img-responsive" />
                                                <figcaption class="caption">
                                                    <h3><a href="#">Adom Smith</a></h3>
                                                    <span>Joint Secretary.</span>
                                                    <p> It was popularised in the 1960s with the release of Letraset sheets.</p>
                                                    <ul>
                                                        <li><a href="#" class="f1"></a></li>
                                                        <li><a href="#" class="f2"></a></li>
                                                        <li><a href="#" class="f3"></a></li>
                                                    </ul>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="col-md-4 about-grid">
                                        <div class="about-grid1">
                                            <figure class="thumb">
                                                <img src="{{ asset('election_template/images/4.jpg') }}" alt=" " class="img-responsive" />
                                                <figcaption class="caption">
                                                    <h3><a href="#">Michael Andrew</a></h3>
                                                    <span>Secretary.</span>
                                                    <p> It was popularised in the 1960s with the release of Letraset sheets.</p>
                                                    <ul>
                                                        <li><a href="#" class="f1"></a></li>
                                                        <li><a href="#" class="f2"></a></li>
                                                        <li><a href="#" class="f3"></a></li>
                                                    </ul>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </article>
                        <article style="position: absolute; width: 100%; opacity: 0;"> 
                            <div class="banner-wrap">
                                <div class="about-grids">
                                    <div class="col-md-4 about-grid">
                                        <div class="about-grid1">
                                            <figure class="thumb">
                                                <img src="{{ asset('election_template/images/5.jpg') }}" alt=" " class="img-responsive" />
                                                <figcaption class="caption">
                                                    <h3><a href="#">James Cameron</a></h3>
                                                    <span>Manager.</span>
                                                    <p> It was popularised in the 1960s with the release of Letraset sheets.</p>
                                                    <ul>
                                                        <li><a href="#" class="f1"></a></li>
                                                        <li><a href="#" class="f2"></a></li>
                                                        <li><a href="#" class="f3"></a></li>
                                                    </ul>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="col-md-4 about-grid">
                                        <div class="about-grid1">
                                            <figure class="thumb">
                                                <img src="{{ asset('election_template/images/p3.jpg') }}" alt=" " class="img-responsive" />
                                                <figcaption class="caption">
                                                    <h3><a href="#">Laura Williums</a></h3>
                                                    <span>Joint Secretary.</span>
                                                    <p> It was popularised in the 1960s with the release of Letraset sheets.</p>
                                                    <ul>
                                                        <li><a href="#" class="f1"></a></li>
                                                        <li><a href="#" class="f2"></a></li>
                                                        <li><a href="#" class="f3"></a></li>
                                                    </ul>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="col-md-4 about-grid">
                                        <div class="about-grid1">
                                            <figure class="thumb">
                                                <img src="{{ asset('election_template/images/2.jpg') }}" alt=" " class="img-responsive" />
                                                <figcaption class="caption">
                                                    <h3><a href="#">Michael Andrew</a></h3>
                                                    <span>Secretary.</span>
                                                    <p> It was popularised in the 1960s with the release of Letraset sheets.</p>
                                                    <ul>
                                                        <li><a href="#" class="f1"></a></li>
                                                        <li><a href="#" class="f2"></a></li>
                                                        <li><a href="#" class="f3"></a></li>
                                                    </ul>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div> --}}
                    <script src="{{ asset('election_template/js/jquery.wmuSlider.js') }}"></script>
                        <script>
                            $('.example1').wmuSlider();
                        </script> 
            </div>
        </div>
    <!-- //banner-bottom -->
    <div class="container">
        @if (isset($previousCategory))
            <a href="/categories/{{ $previousCategory->id }}" class="col-xm-5 pull-left">
                <span class="btn btn-primary pull-right">
                    {{ $previousCategory->name }} << Previous
                </span>
            </a>
        @endif
        @if (isset($nextCategory))
            <a href="/categories/{{ $nextCategory->id }}" class="col-xm-5 ">
            <span class="btn btn-primary pull-right">
                Next >> {{ $nextCategory->name }}</a>
            </span>
        @endif
    </div>
    @endif
@endif
@endsection
