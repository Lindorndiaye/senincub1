<?php $__env->startSection('heading'); ?>
    <h1>Toutes les tâches</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <table class="table table-hover" id="tasks-table">
        <thead>
        <tr>

            <th><?php echo e(__('Titre')); ?></th>
            <th><?php echo e(__('Créé à')); ?></th>
            <th><?php echo e(__('Date limite')); ?></th>
            <th><?php echo e(__('Attribué')); ?></th>

        </tr>
        </thead>
    </table>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $(function () {
        $('#tasks-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('tasks.data'); ?>',
            columns: [

                {data: 'titlelink', name: 'title'},
                {data: 'created_at', name: 'created_at'},
                {data: 'deadline', name: 'deadline'},
                {data: 'user_assigned_id', name: 'user_assigned_id',},

            ]
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>