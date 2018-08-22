<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Full Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
  <label for="gender">Gender:</label>
  <select class="form-control" id="gender" name="gender">
    <option value="" selected hidden>Please select</option>
    <option value="male">Male</option>
    <option value="female">Female</option>
  </select>
</div>

<!-- Linkedin Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('linkedin_url', 'Linkedin Url:') !!}
    {!! Form::text('linkedin_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Blo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bio', 'Bio:') !!}
    {!! Form::text('bio', null, ['class' => 'form-control']) !!}
</div>

<!-- Business Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('business_name', 'Business Name:') !!}
    {!! Form::text('business_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Reason For Nomination Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reason_for_nomination', 'Reason For Nomination:') !!}
    {!! Form::text('reason_for_nomination', null, ['class' => 'form-control']) !!}
</div>

<!-- No Of Numinations Field -->
<div class="form-group col-sm-6">
{{--     {!! Form::label('no_of_nominations', 'No Of Nominations:') !!} --}}
    {!! Form::hidden('no_of_nominations', null, ['class' => 'form-control']) !!}
</div>

@if (Auth::user()->role_id < 3)

    <!-- Is Admin Selected Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('is_admin_selected', 'Is Admin Selected:') !!}
        <label class="checkbox-inline">
            {!! Form::hidden('is_admin_selected', false) !!}
            {!! Form::checkbox('is_admin_selected', '1', null) !!} 1
        </label>
    </div>

    <!-- Is Won Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('is_won', 'Is Won:') !!}
        <label class="checkbox-inline">
            {!! Form::hidden('is_won', false) !!}
            {!! Form::checkbox('is_won', '1', null) !!} 1
        </label>
    </div>

    <!-- User Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('user_id', 'User Id:') !!}
        {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
    </div>
@endif

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {{-- {!! Form::label('category_id', 'Category Id:') !!} --}}
    {!! Form::hidden('category_id', isset($category->id) ? $category->id : null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
