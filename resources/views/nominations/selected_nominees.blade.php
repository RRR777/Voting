<div class="row" style="padding-left: 5px">
    @include('flash::message')
    @foreach($nominationSelecteds as $nomination)
        @include('nominations.show_fields')
    @endforeach
</div>
