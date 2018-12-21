<?php $__env->startSection('heading'); ?>
    <h1><?php echo e(__('Edit user')); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <?php echo Form::model($user, [
            'method' => 'PATCH',
            'route' => ['users.update', $user->id],
            'files'=>true,
            'enctype' => 'multipart/form-data'
            ]); ?>


    <?php echo $__env->make('users.form', ['submitButtonText' =>  __('Update user')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>