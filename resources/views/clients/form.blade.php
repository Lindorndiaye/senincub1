<div class="form-group">
    {!! Form::label('name', 'Nom:', ['class' => 'control-label']) !!}
    {!! 
        Form::text('name',  
        isset($data['owners']) ? $data['owners'][0]['name'] : null, 
        ['class' => 'form-control']) 
    !!}
</div>



    <div class="form-group">
        {!! Form::label('company_name', 'Nom de la compagnie:', ['class' => 'control-label']) !!}
        {!! 
            Form::text('company_name',
            isset($data['name']) ? $data['name'] : null, 
            ['class' => 'form-control']) 
        !!}
    </div>
{{-- </div> --}}

<div class="form-group">
    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
    {!! 
        Form::email('email',
        isset($data['email']) ? $data['email'] : null, 
        ['class' => 'form-control']) 
    !!}
</div>

<div class="form-group">
    {!! Form::label('address', 'Addresse:', ['class' => 'control-label']) !!}
    {!! 
        Form::text('address',
        isset($data['address']) ? $data['address'] : null, 
        ['class' => 'form-control'])
    !!}
</div>


    <div class="form-group">
        {!! Form::label('primary_number', 'Telephone:', ['class' => 'control-label']) !!}
        {!! 
            Form::text('primary_number',  
            isset($data['phone']) ? $data['phone'] : null, 
            ['class' => 'form-control']) 
        !!}
    </div>

   
<div class="form-group">
    {!! Form::label('industry', 'Industrie:', ['class' => 'control-label']) !!}
    {!!
        Form::select('industry_id',
        $industries,
        null,
        ['class' => 'form-control ui search selection top right pointing search-select',
        'id' => 'search-select'])
    !!}
</div>


<div class="form-group">
    {!! Form::label('user_id', 'Attribuer un utilisateur:', ['class' => 'control-label']) !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control ui search selection top right pointing search-select', 'id' => 'search-select']) !!}

</div>


{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}