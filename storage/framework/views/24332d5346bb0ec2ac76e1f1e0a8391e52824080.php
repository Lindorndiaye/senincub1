<div class="form-group">
    <?php echo e(Form::label('image_path', __('Image'), ['class' => 'control-label'])); ?>

    <?php echo Form::file('image_path',  null, ['class' => 'form-control']); ?>

</div>


<div class="form-group">
    <?php echo Form::label('name', __('Nom'), ['class' => 'control-label']); ?>

    <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('email', __('Mail'), ['class' => 'control-label']); ?>

    <?php echo Form::email('email', null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('address', __('Addresse'), ['class' => 'control-label']); ?>

    <?php echo Form::text('address', null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('work_number', __('Telephone'), ['class' => 'control-label']); ?>

    <?php echo Form::text('work_number',  null, ['class' => 'form-control']); ?>

</div>



<div class="form-group">
    <?php echo Form::label('password', __('Mot de passe'), ['class' => 'control-label']); ?>

    <?php echo Form::password('password', ['class' => 'form-control']); ?>

</div>
<div class="form-group">
    <?php echo Form::label('password_confirmation', __('Confirmer mot de passe'), ['class' => 'control-label']); ?>

    <?php echo Form::password('password_confirmation', ['class' => 'form-control']); ?>

</div>
<div class="form-group form-inline">
    <?php echo Form::label('roles', __('Attribuer un rôle'), ['class' => 'control-label']); ?>

    <?php echo Form::select('roles',
        $roles,
        isset($user->role->role_id) ? $user->role->role_id : null,
        ['class' => 'form-control']); ?>


    <?php echo Form::label('departments', __('Attribuer un département'), ['class' => 'control-label']); ?>


    <?php echo Form::select('departments',
        $departments,
        isset($user)
        ? $user->department->first()->id : null,
        ['class' => 'form-control']); ?>

</div>

<?php echo Form::submit($submitButtonText, ['class' => 'btn btn-primary']); ?>

