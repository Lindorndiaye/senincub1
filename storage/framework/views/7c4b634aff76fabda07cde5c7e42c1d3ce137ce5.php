<?php $__env->startSection('heading'); ?>
    Modifier Client (<?php echo e($client->name); ?>)
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::model($client, [
            'method' => 'PATCH',
            'route' => ['clients.update', $client->id],
            ]); ?>

    <?php echo $__env->make('clients.form', ['submitButtonText' => __('Update client')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>