<?php $__env->startSection('content'); ?>
    <?php echo Form::open([
            'route' => 'roles.store',
            ]); ?>

    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    <div class="form-group">
        <?php echo Form::label('name', __('Name'), ['class' => 'control-label']); ?>

        <?php echo Form::text('name', null,['class' => 'form-control']); ?>

    </div>

    <div class="form-group">
        <?php echo Form::label('description', __('Description'), ['class' => 'control-label']); ?>

        <?php echo Form::textarea('description', null, ['class' => 'form-control']); ?>

    </div>
    <?php echo Form::submit( __('Add new Role'), ['class' => 'btn btn-primary']); ?>


    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>