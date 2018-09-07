<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="glyphicon {{ $category->icon }}"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Category</span>
                <span class="info-box-number">{{ $category->name }}</span>
                <span class="info-box-text">{{ $category->created_at->format('Y-m-d') }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total</span>
                <span class="info-box-text">Nominees</span>
                <span class="info-box-number">{{ $totalNominees }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-person"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Selected</span>
                <span class="info-box-text">Nominees</span>
                <span class="info-box-number">{{ $totalSelectedNominees }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
            <span class="info-box-icon bg-green"><i class="{{ ($whatPeriodIs == "nomination") ? "fa fa-award" : "fas fa-trophy" }}"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">{{ ($whatPeriodIs == "nomination") ? "Nomination" : "Voting" }}</span>
                <span class="info-box-text">Days Left</span>
                <span class="info-box-number">
                    @if ($whatPeriodIs == "nomination")
                        {{ $leftNominationDays }}
                    @elseif ($whatPeriodIs == "voting")
                        {{ $leftVotingDays }}
                    @endif
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

</div>
<div class="col-md-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            @if ($whatPeriodIs == "nomination")
                <li class="active"><a href="#nomination" data-toggle="tab" aria-expanded="false">Nomination</a></li>
            @endif
            <li class="{{ $whatPeriodIs == "voting" ? "active" : "" }}">
                <a href="#nominees" data-toggle="tab" aria-expanded="false">Nominees</a>
            </li>
            @if (Auth::user()->role_id == 1)
                <li><a href="#all_nominees" data-toggle="tab" aria-expanded="false">All Nominees</a></li>
            @endif
        </ul>
        <div class="tab-content">
            <div class="tab-pane {{ $whatPeriodIs == "nomination" ? "active" : "" }}" id="nomination">
                <div class="box-body">
                    @if (!isset($hasNominatedBefore) || $hasNominatedBefore == 0 )
                        <h2>Nominate a candidate</h2>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <small style="color: red">* You could nominate only one candidate per category</small>
                        <br>
                        <br>
                        <div class="row">
                            {{ Form::open(['route' => 'nominations.store', 'enctype' => 'multipart/form-data']) }}
                                @include('nominations.fields')
                            {{ Form::close() }}
                        </div>
                    @else
                        @include('flash::message')
                        @include('nominations.show_fields')
                    @endif
                </div>
            </div>
            <div class="tab-pane {{ $whatPeriodIs == "voting" ? "active" : "" }}" id="nominees">
                    <h3>Selected Nominees</h3>
                    <div class="box box-primary">
                        <div class="box-body">
                            @if (!$nominationSelecteds->isEmpty())
                                @include('flash::message')
                                @include('nominations.selected_nominees')
                            @else
                                @include('flash::message')
                                <p>There are no selected nominess for voting</p>
                            @endif
                        </div>
                    </div>
            </div>
            @if (Auth::user()->role_id == 1)
                <div class="tab-pane" id="all_nominees">
                    <h3>All nominees</h3>
                    <div class="box box-primary">
                        <div class="box-body">
                            @include('nominations.table')
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
