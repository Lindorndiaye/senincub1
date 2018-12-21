<div class="form-group">
    <?php echo Form::label('name', 'Nom:', ['class' => 'control-label']); ?>

    <?php echo Form::text('name',  
        isset($data['owners']) ? $data['owners'][0]['name'] : null, 
        ['class' => 'form-control']); ?>

</div>



    <div class="form-group">
        <?php echo Form::label('company_name', 'Nom de la compagnie:', ['class' => 'control-label']); ?>

        <?php echo Form::text('company_name',
            isset($data['name']) ? $data['name'] : null, 
            ['class' => 'form-control']); ?>

    </div>


<div class="form-group">
    <?php echo Form::label('email', 'Email:', ['class' => 'control-label']); ?>

    <?php echo Form::email('email',
        isset($data['email']) ? $data['email'] : null, 
        ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('address', 'Addresse:', ['class' => 'control-label']); ?>

    <?php echo Form::text('address',
        isset($data['address']) ? $data['address'] : null, 
        ['class' => 'form-control']); ?>

</div>




    <div class="form-group">
        <?php echo Form::label('primary_number', 'Telephone:', ['class' => 'control-label']); ?>

        <?php echo Form::text('primary_number',  
            isset($data['phone']) ? $data['phone'] : null, 
            ['class' => 'form-control']); ?>

    </div>

    

<div class="form-group">
    <?php echo Form::label('industry', 'Industrie:', ['class' => 'control-label']); ?>

    <?php echo Form::select('industry_id',
        $industries,
        null,
        ['class' => 'form-control ui search selection top right pointing search-select',
        'id' => 'search-select']); ?>

</div>


<div class="form-group">
    <?php echo Form::label('user_id', 'Attribuer un utilisateur:', ['class' => 'control-label']); ?>

    <?php echo Form::select('user_id', $users, null, ['class' => 'form-control ui search selection top right pointing search-select', 'id' => 'search-select']); ?>


</div>


<?php echo Form::submit($submitButtonText, ['class' => 'btn btn-primary']); ?>