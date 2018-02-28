<div class="input-field">
    {!! Form::label('name') !!}
    {!! Form::text('name') !!}                                           
</div>
<div class="input-field">
    {!! Form::label('roll_no') !!}
    {!! Form::text('roll_no') !!}                                           
</div>
<div class="input-field">
    {!! Form::label('email') !!}
    {!! Form::text('email') !!}                                           
</div>


<div class="row">
{!! Form::label('type') !!}
{!! Form::radio('type','user',true,['class' => 'with-gap', 'id' => 'rad-yes'] ) !!}
{!! Form::label('rad-yes', 'User') !!}
{!! Form::radio('type','admin',false,['class' => 'with-gap', 'id' => 'rad-no'] ) !!}
{!! Form::label('rad-no', 'Admin') !!}
</div>
<div class="input-field">
    {!! Form::label('password') !!}
    {!! Form::password('password') !!}                                           
</div>
<div class="input-field">
    {!! Form::label('confirm_password') !!}
    {!! Form::password('confirm_password') !!}                                           
</div>
<p>
    @foreach($roles as $role)
    
        {!! Form::checkbox('roles[]', $role->id, $user->hasRole($role->role_name),  ['id' => 'role' . $role->id]) !!}
        {!! Form::label('role'.$role->id, $role->role_name) !!}
      
    @endforeach
</p>
<div class="row">
        <div class="col-s12 input-fields">
            {!! Form::submit('Submit', ['class' => 'btn waves-effect waves-light green', 'id' => 'btn-create-event']) !!}
        </div>
    </div>
