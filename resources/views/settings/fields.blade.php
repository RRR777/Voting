<!-- Nomination Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomination_start_date', 'Nomination Start Date:') !!}
    {!! Form::date('nomination_start_date', null, ['class' => 'form-control']) !!}
</div>


              <!-- Date -->
    <div class="form-group col-sm-6">
        <label>Nomination Start Date:</lab
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" id="datepicker">
        </div>
        <!-- /.input group -->
    </div>

<!-- Nomination End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomination_end_date', 'Nomination End Date:') !!}
    {!! Form::date('nomination_end_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Voting Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('voting_start_date', 'Voting Start Date:') !!}
    {!! Form::date('voting_start_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Voting End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('voting_end_date', 'Voting End Date:') !!}
    {!! Form::date('voting_end_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('settings.index') !!}" class="btn btn-default">Cancel</a>
</div>

<div class="box-body">
              <!-- Date -->
              <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date range -->
              <div class="form-group">
                <label>Date range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date and time range -->
              <div class="form-group">
                <label>Date and time range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservationtime">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date and time range -->
              <div class="form-group">
                <label>Date range button:</label>

                <div class="input-group">
                  <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                    <span>
                      <i class="fa fa-calendar"></i> Date range picker
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
              </div>
              <!-- /.form group -->

            </div>
{{-- new one --}}
            <div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>
</div>
