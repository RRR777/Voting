@foreach($nomintationSelecteds as $nomination)
    <div class="col-md-6">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
                <h3 class="widget-user-username">{{ $nomination->name }} ({!! $nomination->gender !!})</h3>
                <h5 class="widget-user-desc">{{ $nomination->business_name }}</h5>
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Number of Nominations</h5>
                            <span class="description-text">{{ $nomination->no_of_nominations }}</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Selected by Admin?</h5>
                            <span class="description-text">
                                @if ($nomination->is_admin_selected == 1)
                                    yes
                                @else
                                    no
                                @endif
                            </span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->

                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Is won?</h5><br>
                            <span class="description-text">
                                 @if ($nomination->is_won == 1)
                                    yes
                                @else
                                    no
                                @endif
                            </span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->

                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                            <h5 class="description-header">No of Votes</h5><br>
                            <span class="description-text">{{ $nomination->no_of_votes }}</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li><a href="#"><b>Category</b><span class="pull-right">{{ $nomination->category->name }}</span></a></li>
                    <li><a href="{{ $nomination->linkedin_url }}"><b>LinkedIn </b><span class="pull-right badge bg-blue">View</span></a></li>
                    <li><a href="#"><b>Bio </b><span class="pull-right">{{ $nomination->bio }}</span></a></li>
                    @if (Auth::user()->id < 3)
                        <li><a href="#"><b>Reason of nomination </b><span class="pull-right">{{ $nomination->reason_for_nomination }}</span></a></li>
                        <li><a href="../users/{!! $nomination->user_id !!}"><b>User name </b><span class="pull-right badge bg-blue">{!! $nomination->user->name !!}</span></a></li>
                        <li><a href="#"><b>Nominated on </b><span class="pull-right">{!! $nomination->created_at->format('Y M d') !!}</span></a></li>
                    @endif
                    @if (!isset($checkVote))
                        <li><a href="{{ route('nominations.vote', ['nomination_id'=>$nomination->id, 'category_id' =>$nomination->category_id]) }}" class="btn btn-primary bg-aqua-active"><b>Vote</b></a></li>
                    @else
                        <li><button class="btn btn-primary  btn-block bg-aqua-active"><b>You have already Voted!</b></button></li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- /.widget-user -->
    </div>
@endforeach
