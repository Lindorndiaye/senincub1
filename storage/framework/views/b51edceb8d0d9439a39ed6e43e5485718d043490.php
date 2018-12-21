<div class="form-group">
    <?php echo e(Form::label('image_path', __('Image'), ['class' => 'control-label'])); ?>

    <?php echo Form::file('image_path',  null, ['class' => 'form-control']); ?>

</div>


<div class="form-group">
    <?php echo Form::label('name', __('Name'), ['class' => 'control-label']); ?>

    <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('email', __('Mail'), ['class' => 'control-label']); ?>

    <?php echo Form::email('email', null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('address', __('Address'), ['class' => 'control-label']); ?>

    <?php echo Form::text('address', null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('work_number', __('Work number'), ['class' => 'control-label']); ?>

    <?php echo Form::text('work_number',  null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('personal_number', __('Personal number'), ['class' => 'control-label']); ?>

    <?php echo Form::text('personal_number',  null, ['class' => 'form-control']); ?>

</div>

<div class="form-group">
    <?php echo Form::label('password', __('Password'), ['class' => 'control-label']); ?>

    <?php echo Form::password('password', ['class' => 'form-control']); ?>

</div>
<div class="form-group">
    <?php echo Form::label('password_confirmation', __('Confirm password'), ['class' => 'control-label']); ?>

    <?php echo Form::password('password_confirmation', ['class' => 'form-control']); ?>

</div>
<div class="form-group form-inline">
    <?php echo Form::label('roles', __('Assign role'), ['class' => 'control-label']); ?>

    <?php echo Form::select('roles',
        $roles,
        isset($user->role->role_id) ? $user->role->role_id : null,
        ['class' => 'form-control']); ?>


    <?php echo Form::label('departments', __('Assign department'), ['class' => 'control-label']); ?>


    <?php echo Form::select('departments',
        $departments,
        isset($user)
        ? $user->department->first()->id : null,
        ['class' => 'form-control']); ?>

</div>

<?php echo Form::submit($submitButtonText, ['class' => 'btn btn-primary']); ?>

