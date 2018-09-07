<div class="col-md-6">
    <div class="box box-widget widget-user">
        <div class="widget-user-header bg-aqua-active">
            <h3 class="widget-user-username">{{ $nomination->name }}</h3>
            <h5 class="widget-user-desc">{{ $nomination->business_name }}</h5>
            <div class="widget-user-image">
                <img class="img-circle" src="{{ asset('storage/upload/images/nominations/' . $nomination->id . '/' . $nomination->image) }}" alt="">
            </div>
        </div>
        <div class="box-footer">
            <div class="row">
                @if (Auth::user()->role_id == 1)
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Number of Nominations</h5>
                            <span class="description-text">{{ $nomination->no_of_nominations }}</span>
                        </div>
                    </div>
                @endif
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">Selected for Voting?</h5>
                        <span class="description-text">
                            {{ ($nomination->is_admin_selected == 1) ? "Yes" : "Not yet" }}
                        </span>
                    </div>
                </div>
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">Is won?</h5><br>
                        <span class="description-text">
                            {{ ($nomination->is_won == 1) ? "Yes" : "No" }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
                <li><a href="#"><b>Category</b><span class="pull-right">{{ $nomination->category->name }}</span></a></li>
                <li><a href="#"><b>Nominated on</b><span class="pull-right">{{ $nomination->created_at->format('Y M d') }}</span></a></li>
                <li><a href="{{ $nomination->linkedin_url }}"><b>LinkedIn </b><span class="pull-right badge bg-blue">View LinkedIn Profile</span></a></li>
                <li><a href="#"><b>Bio </b><span class="pull-right">{{ $nomination->bio }}</span></a></li>
                <li><a href=""><b>Gender</b><span class="pull-right">{{ $nomination->gender }}</span></a></li>
                <li><a href="#"><b>Reason of nomination </b><span class="pull-right">{{ $nomination->reason_for_nomination }}</span></a></li>
            </ul>
            @if (Auth::user()->role_id == 1)
                <a href="{{ route('nominations.edit', [$nomination->id]) }}" class='btn btn-primary bg-aqua-active btn-block'><i class="glyphicon glyphicon-edit"></i>Edit Nominee</a>
            @endif
            @if ($whatPeriodIs == "voting")
                @if (!isset($checkVote))
                    <a href="{{ route('nominations.vote', ['nomination_id'=>$nomination->id, 'category_id' =>$nomination->category_id]) }}" class="btn btn-primary btn-block bg-red"><b>Vote</b></a>
                @else
                    <button class="btn btn-primary btn-block bg-aqua-active"><b>You have already Voted!</b></button>
                @endif
            @endif
        </div>
    </div>
</div>
