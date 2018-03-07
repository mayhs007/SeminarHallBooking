<div class="input-field">
    {!! Form::label('name') !!}
    {!! Form::text('name') !!}                                           
</div>
<div class="input-field">
    {!! Form::label('capacity') !!}
    {!! Form::text('capacity') !!}                                           
</div>
<div class="input-field">
    {!! Form::label('location') !!}
    {!! Form::text('location') !!}                                           
</div>
<div class="row">
{!! Form::label('ac') !!}
{!! Form::radio('ac',1,true,['class' => 'with-gap', 'id' => 'ac-yes'] ) !!}
{!! Form::label('ac-yes', 'Available') !!}
{!! Form::radio('ac',0,false,['class' => 'with-gap', 'id' => 'ac-no'] ) !!}
{!! Form::label('ac-no', 'Not Available') !!}
</div>
<div class="row">
{!! Form::label('podium_mike') !!}
{!! Form::radio('podium_mike',1,true,['class' => 'with-gap', 'id' => 'podium_mike-yes'] ) !!}
{!! Form::label('podium_mike-yes', 'Available') !!}
{!! Form::radio('podium_mike',0,false,['class' => 'with-gap', 'id' => 'podium_mike-no'] ) !!}
{!! Form::label('podium_mike-no', 'Not Available') !!}
</div>
<div class="row">
{!! Form::label('video_projector') !!}
{!! Form::radio('video_projector',1,true,['class' => 'with-gap', 'id' => 'video_projector-yes'] ) !!}
{!! Form::label('video_projector-yes', 'Available') !!}
{!! Form::radio('video_projector',0,false,['class' => 'with-gap', 'id' => 'video_projector-no'] ) !!}
{!! Form::label('video_projector-no', 'Not Available') !!}
</div>
<div class="row">
{!! Form::label('mike_with_card') !!}
{!! Form::radio('mike_with_card',1,true,['class' => 'with-gap', 'id' => 'mike_with_card-yes'] ) !!}
{!! Form::label('mike_with_card-yes', 'Available') !!}
{!! Form::radio('mike_with_card',0,false,['class' => 'with-gap', 'id' => 'mike_with_card-no'] ) !!}
{!! Form::label('mike_with_card-no', 'Not Available') !!}
</div>
<div class="row">
{!! Form::label('cordless_hand_mike') !!}
{!! Form::radio('cordless_hand_mike',1,true,['class' => 'with-gap', 'id' => 'cordless_hand_mike-yes'] ) !!}
{!! Form::label('cordless_hand_mike-yes', 'Available') !!}
{!! Form::radio('cordless_hand_mike',0,false,['class' => 'with-gap', 'id' => 'cordless_hand_mike-no'] ) !!}
{!! Form::label('cordless_hand_mike-no', 'Not Available') !!}
</div>
<div class="row">
{!! Form::label('cordless_collar_mike') !!}
{!! Form::radio('cordless_collar_mike',1,true,['class' => 'with-gap', 'id' => 'cordless_collar_mike-yes'] ) !!}
{!! Form::label('cordless_collar_mike-yes', 'Available') !!}
{!! Form::radio('cordless_collar_mike',0,false,['class' => 'with-gap', 'id' => 'cordless_collar_mike-no'] ) !!}
{!! Form::label('cordless_collar_mike-no', 'Not Available') !!}
</div>
<div class="row">
{!! Form::label('laser_pointer') !!}
{!! Form::radio('laser_pointer',1,true,['class' => 'with-gap', 'id' => 'laser_pointer-yes'] ) !!}
{!! Form::label('laser_pointer-yes', 'Available') !!}
{!! Form::radio('laser_pointer',0,false,['class' => 'with-gap', 'id' => 'laser_pointer-no'] ) !!}
{!! Form::label('laser_pointer-no', 'Not Available') !!}
</div>
<div class="row">
        {!! Form::label('event_image') !!}    
        <div class="col-s12 file-field input-field">
            <div class="btn">
                <span>Browse</span>
                {!! Form::file('event_image') !!}
                {!! Form::hidden('image') !!}
            </div>
            <div class="file-path-wrapper">
                <input type="text" class="file-path" placeholder="Browse a image file of type jpeg,png"> 
            </div>
        </div>
    </div>
<div class="input-field">
    {!! Form::submit('Submit', ['class' => 'btn green waves-effect waves-light']) !!}
</div>