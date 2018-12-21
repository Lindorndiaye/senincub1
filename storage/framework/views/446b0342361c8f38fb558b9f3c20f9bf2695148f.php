<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 currenttask">
        <table class="table table-hover">
            <h3>Tous les départements</h3>
            <thead>
            <thead>
            <tr>
                <th><?php echo e(__('Nom')); ?></th>
                <th><?php echo e(__('Description')); ?></th>
                <?php if(Entrust::hasRole('administrator')): ?>
                    <th><?php echo e(__('Action')); ?></th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($dep->name); ?></td>
                    <td><?php echo e(Str_limit($dep->description, 50)); ?></td>
                    <?php if(Entrust::hasRole('administrator')): ?>
                        <td>   <?php echo Form::open([
            'method' => 'DELETE',
            'route' => ['departments.destroy', $dep->id]
        ]);; ?>

                            <?php echo Form::submit( __('Delete'), ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?")']);; ?>


                            <?php echo Form::close();; ?></td></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>