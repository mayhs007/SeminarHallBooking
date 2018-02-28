<div class="row">
    <?php
        $hall_list = [];
        foreach(App\Hall::all() as $hall){
            $hall_list[$hall->id] = $hall->hall_name;
        }
        ?>
    <div class="col s12 input-field">
                           
        {!! Form::select('hall_id', $hall_list) !!}
    </div>
</div>
<div class="input-field">
    {!! Form::label('date_of_event') !!}
    {!! Form::text('date_of_event','',array('class'=>'datepicker')) !!}                                              
</div>
<div class="row">
    <?php
        $event_list = [];
        foreach(App\Event::all() as $event){
            $event_list[$event->id] = $event->event_name;
        }
        ?>
    <div class="col s12 input-field">
                       
        {!! Form::select('event_id', $event_list) !!}
    </div>
</div>
<div class="input-field">
    {!! Form::label('start_time') !!}
    {!! Form::text('start_time','',array('class'=>'timepicker')) !!}                                          
</div>
<div class="input-field">
    {!! Form::label('end_time') !!}
    {!! Form::text('end_time','',array('class'=>'timepicker')) !!}
                                             
</div>
<div class="input-field">
    {!! Form::submit('Submit', ['class' => 'btn green waves-effect waves-light']) !!}
</div>