<?php $__env->startSection('heading'); ?>
    <h1><?php echo e(__('Tous les Rendez-vous')); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <table class="table table-hover" id="leads-table">
        <thead>
        <tr>

            <th><?php echo e(__('Titre')); ?></th>
            <th><?php echo e(__('Créé par')); ?></th>
            <th><?php echo e(__('Date')); ?></th>
            <th><?php echo e(__('Attribuéqq')); ?></th>

        </tr>
        </thead>
    </table>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $(function () {
        $('#leads-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('leads.data'); ?>',
            columns: [

                {data: 'titlelink', name: 'title'},
                {data: 'user_created_id', name: 'user_created_id'},
                {data: 'contact_date', name: 'contact_date',},
                {data: 'user_assigned_id', name: 'user_assigned_id'},


            ]
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>