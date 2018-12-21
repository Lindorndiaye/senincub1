<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 currenttask">

        <table class="table table-hover">
            <h3><?php echo e(__('All Roles')); ?></h3>
            <thead>
            <thead>
            <tr>
                <th><?php echo e(__('Name')); ?></th>
                <th><?php echo e(__('Description')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($role->display_name); ?></td>
                    <td><?php echo e(Str_limit($role->description, 50)); ?></td>

                    <td>   <?php echo Form::open([
            'method' => 'DELETE',
            'route' => ['roles.destroy', $role->id]
        ]);; ?>

                        <?php if($role->id !== 1): ?>
                            <?php echo Form::submit(__('Delete'), ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?")']);; ?>

                        <?php endif; ?>
                        <?php echo Form::close();; ?></td>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>

        <a href="<?php echo e(route('roles.create')); ?>">
            <button class="btn btn-success"><?php echo e(__('Add new Role')); ?>e</button>
        </a>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>