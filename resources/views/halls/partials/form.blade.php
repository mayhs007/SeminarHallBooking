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
    <div class="col s6">
        {!!Form::checkbox('ac', true, true, ['class' => 'indeterminate-checkbox','id'=>'ac-yes']) !!}
        {!! Form::label('ac-yes','ac') !!}
    </div>
    <div class="col s6">
        {!! Form::label('ac_count') !!}
        {!! Form::text('ac_count') !!}  
    </div>
</div>
<div class="row">
    <div class="col s6">
        {!!Form::checkbox('podium_mike', true, true, ['class' => 'indeterminate-checkbox','id'=>'podium_mike-yes','onChange'=>'enable()']) !!}
        {!! Form::label('podium_mike-yes','podium_mike') !!}
    </div>
    <div class="col s6">
        {!! Form::label('podium_mike_count') !!}
        {!! Form::text('podium_mike_count',"",['id'=>'podium_mike_count']) !!}  
    </div>
</div>
<div class="row">
    <div class="col s6">
        {!!Form::checkbox('video_projector', true, true, ['class' => 'indeterminate-checkbox','id'=>'video_projector-yes']) !!}
        {!! Form::label('video_projector-yes','video_projector') !!}
    </div>    
    <div class="col s6">
        {!! Form::label('video_projector_count') !!}
        {!! Form::text('video_projector_count') !!}  
    </div>
</div>
<div class="row">
    <div class="col s6">
        {!!Form::checkbox('mike_with_card', true, true, ['class' => 'indeterminate-checkbox','id'=>'mike_with_card-yes']) !!}
        {!! Form::label('mike_with_card-yes','mike_with_card') !!}
    </div>
    <div class="col s6">
        {!! Form::label('mike_with_card_count') !!}
        {!! Form::text('mike_with_card_count') !!}  
    </div>
</div>
<div class="row">
    <div class="col s6">
        {!!Form::checkbox('cordless_hand_mike', true, true, ['class' => 'indeterminate-checkbox','id'=>'cordless_hand_mike-yes']) !!}
        {!! Form::label('cordless_hand_mike-yes','cordless_hand_mike') !!}
    </div>
    <div class="col s6">
        {!! Form::label('cordless_hand_mike_count') !!}
        {!! Form::text('cordless_hand_mike_count') !!}  
    </div>
</div>
<div class="row">
    <div class="col s6">
        {!!Form::checkbox('cordless_collar_mike', true, true, ['class' => 'indeterminate-checkbox','id'=>'cordless_collar_mike-yes']) !!}
        {!! Form::label('cordless_collar_mike-yes','cordless_collar_mike') !!}
    </div>  
    <div class="col s6">
        {!! Form::label('cordless_collar_mike_count') !!}
        {!! Form::text('cordless_collar_mike_count') !!}  
    </div>
</div>
<div class="row">
    <div class="col s6">
        {!!Form::checkbox('laser_pointer', true, true, ['class' => 'indeterminate-checkbox','id'=>'laser_pointer-yes']) !!}
        {!! Form::label('laser_pointer-yes','laser_pointer') !!}
    </div>
    <div class="col s6">
        {!! Form::label('laser_pointer_count') !!}
        {!! Form::text('laser_pointer_count') !!}  
    </div>
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
<div class="row">
        <div class="col s12">
            {!! Form::label('organizers', 'Email ids of all organizers') !!}
            <div class="chips-autocomplete">
            </div>
        </div>
    </div>
    {!! Form::hidden('organizers', $organizers, ['id' => 'organizers']) !!}
<div class="input-field">
    {!! Form::submit('Submit', ['class' => 'btn green waves-effect waves-light']) !!}
</div>
<script>
    $(function(){
        var chips = $(".chips-autocomplete");
        $.ajax({
            url: "{{ route('admin::admins') }}",
            method: 'get',
            success: function(res){
                var suggestions = {};
                $.each(res, function(index, val){
                    suggestions[val.email] = null;
                });
                chips.material_chip({
                    placeholder: '+Organizers',
                    data: loadChips(),
                    autocompleteOptions:{
                        data: suggestions,
                        limit: Infinity,
                        minLength: 1
                    }
                });
            },
            error: function(){
                Materialize.toast('Sorry! something went wrong please try again')
            }
        });
        // Update team members in the hidden field
        function updateOrganizers(evt, chip){
            var data = chips.material_chip('data');
            var tags = [];
            $.each(data, function(index, val){
                tags.push(val.tag);
            });
            $("#organizers").val(tags.join(','));
        }
        function loadChips(){
            var teamMembers = $("#organizers").val().split(',');
            var initialChips  = [];
            $.each(teamMembers, function(index, val){
                if(val != ""){
                    var chip = { 'tag': val }
                    initialChips.push(chip);
                }
            });
            return initialChips;
        }
        // Update team members hidden field on changes to chips
        chips.on('chip.add', updateOrganizers);
        chips.on('chip.delete', updateOrganizers);        
    });
</script>
<script>
function enable()
{
    if(document.getElementById("podium_mike-yes").checked)
    {
        
        document.getElementById("podium_mike_count").disabled = false;
    }
    else
    { 
        document.getElementById("podium_mike_count").disabled =true;
    }
   
}
</script>`  