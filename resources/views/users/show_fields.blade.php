<div class="col-md-4">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-aqua-active">
            <h3 class="widget-user-username">{{ $user->name }}</h3>
            <h5 class="widget-user-desc">{{ $user->email }}</h5>
        </div>
        <div class="widget-user-image">
            <img class="img-circle" src="{{ $user->avatar }}" alt="User Avatar">
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-6 border-right">
                    <div class="description-block">
                        <h5 class="description-header">Nickname</h5>
                        <span class="description-text">{{ $user->nickname }}</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-6 border-right">
                    <div class="description-block">
                        <h5 class="description-header">Role</h5>
                        <span class="description-text">{{ $user->role->name }}</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
{{--                 <li><a href="#">Role <span class="pull-right badge bg-blue">{{ $user->role->name }}</span></a></li>
                <li><a href="#">Nickname <span class="pull-right badge bg-blue">{{ $user->nickname }}</span></a></li>
                <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li>
                <li><a href="#">Tasks <span class="pull-right badge bg-aqua">5</span></a></li>
                <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                <li><a href="#">Followers <span class="pull-right badge bg-red">8.42</span></a></li> --}}
                <li><a href="{{ $user->facebook_url}}">Facebook<span class="pull-right badge bg-blue">Profile</span></a></li>
                <li><a href="#">Joined<span class="pull-right badge bg-blue">{{ $user->created_at->format('Y M d') }}</span></a></li>
            </ul>
        </div>
    </div>
    <!-- /.widget-user -->
</div>
