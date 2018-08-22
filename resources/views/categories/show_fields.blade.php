
    <div class="col-md-3">
        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <h3 class="profile-username text-center">{{ $category->name }}</h3>
                <p class="text-muted text-center">Last Updated: {{ $category->created_at->format('Y M d') }}</p>
                {{-- <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                    <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                    <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
                </ul>
                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class=""><a href="#nomination" data-toggle="tab" aria-expanded="true">Nomination</a></li>
                <li class=""><a href="#vote" data-toggle="tab" aria-expanded="false">Vote</a></li>
                @if (Auth::user()->role_id < 3)
                    <li class=""><a href="#nominees" data-toggle="tab" aria-expanded="false">Nominees</a></li>
                @endif
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="nomination">
                    <div class="box-body">
                        {{-- Dispalay form if user hasn't nominated before --}}
                        @if (!isset($hasNominatedBefore) || $hasNominatedBefore == 0 )
                            <h2>Nominate a candidate</h2>
                            <div class="row">
                                {!! Form::open(['route' => 'nominations.store']) !!}

                                    @include('nominations.fields')

                                {!! Form::close() !!}
                            </div>
                        @else
                            <div class="col-md-6">
                                <h4>You have already nominated</h4>
                                <!-- Widget: user widget style 1 -->
                                <div class="box box-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-aqua-active">
                                        <h3 class="widget-user-username">{{ $nomination->name }}</h3>
                                        <h5 class="widget-user-desc">{{ $nomination->linkedin_url }}</h5>
                                    </div>
                                    <div class="box-footer">
                                        <div class="row">
                                            <div class="col-sm-6 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">Gender</h5>
                                                    <span class="description-text">{{ $nomination->gender }}</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">No of Nominations</h5>
                                                    <span class="description-text">{{ $nomination->no_of_nominations }}</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <div class="box-footer no-padding">
                                        <ul class="nav nav-stacked">
                                            <li><a href="#"><b>Nominated on</b><span class="pull-right">{{ $nomination->created_at->format('Y M d') }}</span></a></li>
                                            <li><a href="#"><b>LinkedIn</b><span class="pull-right">{{ isset($nomination->linkedin_url) ? $nomination->linkedin_url : null }}</span></a></li>
                                            <li><a href="#"><b>Bio</b><span class="pull-right">{{ isset($nomination->bio) ? $nomination->bio : null }}</span></a></li>
                                            <li><a href="#"><b>Business name</b><span class="pull-right">{{ isset($nomination->business_name) ? $nomination->business_name : null }}</span></a></li>
                                            <li><a href="#"><b>Category</b><span class="pull-right">{{ $category->name }}</span></a></li>
                                            <li><a href=""><b>Reason of nomination</b><span class="pull-right">{{ isset($nomination->reason_for_nomination) ? $nomination->reason_for_nomination : null }}</span></a></li>
                                            <li><a href=""><b>Selected by Admin?</b><span class="pull-right">{{ $nomination->is_admin_selected == 0 ? "not yet" : "yes" }}</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.widget-user -->
                            </div>
                        @endif
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="vote">
                    
                    //Our Vote code here
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="nominees">
                    //Our Nominees code here
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->

