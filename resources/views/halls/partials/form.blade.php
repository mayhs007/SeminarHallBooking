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
{!! Form::label('A/C') !!}
{!! Form::radio('A/C',1,true,['class' => 'with-gap', 'id' => 'A/C-yes'] ) !!}
{!! Form::label('A/C-yes', 'Available') !!}
{!! Form::radio('A/C',0,false,['class' => 'with-gap', 'id' => 'A/C-no'] ) !!}
{!! Form::label('A/C-no', 'Not Available') !!}
</div>
<div class="row">
{!! Form::label('Podium_mike') !!}
{!! Form::radio('Podium_mike',1,true,['class' => 'with-gap', 'id' => 'Podium_mike-yes'] ) !!}
{!! Form::label('Podium_mike-yes', 'Available') !!}
{!! Form::radio('Podium_mike',0,false,['class' => 'with-gap', 'id' => 'Podium_mike-no'] ) !!}
{!! Form::label('Podium_mike-no', 'Not Available') !!}
</div>
<div class="row">
{!! Form::label('Video_Projector') !!}
{!! Form::radio('Video_Projector',1,true,['class' => 'with-gap', 'id' => 'Video_Projector-yes'] ) !!}
{!! Form::label('Video_Projector-yes', 'Available') !!}
{!! Form::radio('Video_Projector',0,false,['class' => 'with-gap', 'id' => 'Video_Projector-no'] ) !!}
{!! Form::label('Video_Projector-no', 'Not Available') !!}
</div>
<div class="row">
{!! Form::label('Mike_With_Card') !!}
{!! Form::radio('Mike_With_Card',1,true,['class' => 'with-gap', 'id' => 'Mike_With_Card-yes'] ) !!}
{!! Form::label('Mike_With_Card-yes', 'Available') !!}
{!! Form::radio('Mike_With_Card',0,false,['class' => 'with-gap', 'id' => 'Mike_With_Card-no'] ) !!}
{!! Form::label('Mike_With_Card-no', 'Not Available') !!}
</div>
<div class="row">
{!! Form::label('Cordless_Hand_Mike') !!}
{!! Form::radio('Cordless_Hand_Mike',1,true,['class' => 'with-gap', 'id' => 'Cordless_Hand_Mike-yes'] ) !!}
{!! Form::label('Cordless_Hand_Mike-yes', 'Available') !!}
{!! Form::radio('Cordless_Hand_Mike',0,false,['class' => 'with-gap', 'id' => 'Cordless_Hand_Mike-no'] ) !!}
{!! Form::label('Cordless_Hand_Mike-no', 'Not Available') !!}
</div>
<div class="row">
{!! Form::label('Cordless_Collar_Mike') !!}
{!! Form::radio('Cordless_Collar_Mike',1,true,['class' => 'with-gap', 'id' => 'Cordless_Collar_Mike-yes'] ) !!}
{!! Form::label('Cordless_Collar_Mike-yes', 'Available') !!}
{!! Form::radio('Cordless_Collar_Mike',0,false,['class' => 'with-gap', 'id' => 'Cordless_Collar_Mike-no'] ) !!}
{!! Form::label('Cordless_Collar_Mike-no', 'Not Available') !!}
</div>
<div class="row">
{!! Form::label('Laser_Pointer') !!}
{!! Form::radio('Laser_Pointer',1,true,['class' => 'with-gap', 'id' => 'Laser_Pointer-yes'] ) !!}
{!! Form::label('Laser_Pointer-yes', 'Available') !!}
{!! Form::radio('Laser_Pointer',0,false,['class' => 'with-gap', 'id' => 'Laser_Pointer-no'] ) !!}
{!! Form::label('Laser_Pointer-no', 'Not Available') !!}
</div>
<div class="row">
        {!! Form::label('event_image') !!}    
        <div class="col-s12 file-field input-field">
            <div class="btn">
                <span>Browse</span>
                {!! Form::file('event_image') !!}
                {!! Form::hidden('image_name') !!}
            </div>
            <div class="file-path-wrapper">
                <input type="text" class="file-path" placeholder="Browse a image file of type jpeg,png"> 
            </div>
        </div>
    </div>
<div class="input-field">
    {!! Form::submit('Submit', ['class' => 'btn green waves-effect waves-light']) !!}
</div>