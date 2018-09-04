<div class="row">
    <div class="col-md-4">
        <div class="box box-widget widget-user">
            <div class="widget-user-header bg-aqua-active">
                <h3 class="widget-user-username">{{ $user->name }}</h3>
                <h5 class="widget-user-desc">{{ $user->email }}</h5>
            </div>
            <div class="widget-user-image">
                <img class="img-circle" 
                    @if (isset($user->avatar))
                        src="{{ $user->avatar }}" alt="user image">
                    @else
                        src="{{ asset('/storage/upload/images/users/avatar5.png') }}" alt="user image">
                    @endif
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Role</h5>
                            <span class="description-text">{{ $user->role->name }}</span>
                        </div>
                    </div>
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Joined</h5>
                            <span class="description-text">{{ $user->created_at->format('Y M d') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li><a href="#">Nickname <span class="pull-right badge bg-blue">{{ $user->nickname }}</span></a></li>
                    <li><a href="#">Email <span class="pull-right badge bg-blue">{{ $user->email }}</span></a></li>
                    <li><a href="{{ $user->facebook_url}}">Facebook<span class="pull-right badge bg-blue">Profile</span></a></li>
                    @if ( Auth::user()->role_id == 1)
                        <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-primary btn-block'><i class="glyphicon glyphicon-edit"> Edit Profile</i></a>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
