<div class="row">
    <?php
        $hall_list = [];
        foreach(App\Hall::all() as $hall){
            $hall_list[$hall->id] = $hall->name;
        }
        ?>
    <div class="col s12 input-field">
                           
        {!! Form::select('hall_id', $hall_list) !!}
    </div>
</div>

<div class="row">
    <?php
        $event_list = [];
        foreach(App\Event::all() as $event){
            $event_list[$event->id] = $event->name;
        }
        ?>
    <div class="col s12 input-field">
                       
        {!! Form::select('event_id', $event_list) !!}
    </div>
</div>
<div class="row">
    <?php
        $club_list = [];
        foreach(App\Club::all() as $club){
            $club_list[$club->id] = $club->name;
        }
        ?>
    <div class="col s12 input-field">       
        {!! Form::select('club_id', $club_list) !!}
    </div>
</div>
<div class="row">
    <div class="col s3">
        {!!Form::checkbox('ac', true, true, ['class' => 'indeterminate-checkbox','id'=>'ac-yes']) !!}
        {!! Form::label('ac-yes','ac') !!}
    </div>
    <div class="col s3">
        {!!Form::checkbox('podium_mike', true, true, ['class' => 'indeterminate-checkbox','id'=>'podium_mike-yes']) !!}
        {!! Form::label('podium_mike-yes','podium_mike') !!}
    </div>
    <div class="col s3">
        {!!Form::checkbox('video_projector', true, true, ['class' => 'indeterminate-checkbox','id'=>'video_projector-yes']) !!}
        {!! Form::label('video_projector-yes','video_projector') !!}
    </div>
    <div class="col s3">
        {!!Form::checkbox('mike_with_card', true, true, ['class' => 'indeterminate-checkbox','id'=>'mike_with_card-yes']) !!}
        {!! Form::label('mike_with_card-yes','mike_with_card') !!}
    </div>
</div>
<div class="row">
    <div class="col s3">
        {!!Form::checkbox('cordless_hand_mike', true, true, ['class' => 'indeterminate-checkbox','id'=>'cordless_hand_mike-yes']) !!}
        {!! Form::label('cordless_hand_mike-yes','cordless_hand_mike') !!}
    </div>
    <div class="col s3">
        {!!Form::checkbox('cordless_collar_mike', true, true, ['class' => 'indeterminate-checkbox','id'=>'cordless_collar_mike-yes']) !!}
        {!! Form::label('cordless_collar_mike-yes','cordless_collar_mike') !!}
    </div>
    <div class="col s3">
        {!!Form::checkbox('laser_pointer', true, true, ['class' => 'indeterminate-checkbox','id'=>'laser_pointer-yes']) !!}
        {!! Form::label('laser_pointer-yes','laser_pointer') !!}
    </div>
</div>

<div class="input-field">
    {!! Form::label('date_of_event') !!}
    {!! Form::text('date_of_event','',array('class'=>'datepicker')) !!}                                              
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