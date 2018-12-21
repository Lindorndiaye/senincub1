<?php $__env->startSection('heading'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
<?php $__env->stopPush(); ?>

    <div class="row">
        <?php echo $__env->make('partials.clientheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('partials.userheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <div class="row">
        <div class="col-md-9">
            <?php echo $__env->make('partials.comments', ['subject' => $tasks], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-md-3">
            <div class="sidebarheader">
                <p><?php echo e(__('Informations sur la tâche')); ?></p>
            </div>
            <div class="sidebarbox">
                <p><?php echo e(__('Attribué')); ?>:
                    <a href="<?php echo e(route('users.show', $tasks->user->id)); ?>">
                        <?php echo e($tasks->user->name); ?></a></p>
                <p><?php echo e(__('Créé à')); ?>: <?php echo e(date('d F, Y, H:i', strtotime($tasks->created_at))); ?> </p>

                <?php if($tasks->days_until_deadline): ?>
                    <p><?php echo e(__('Date limite')); ?>: <span style="color:red;"><?php echo e(date('d, F Y', strTotime($tasks->deadline))); ?>


                            <?php if($tasks->status == 1): ?>(<?php echo $tasks->days_until_deadline; ?>)<?php endif; ?></span></p>
                    <!--Remove days left if tasks is completed-->

                <?php else: ?>
                    <p><?php echo e(__('Date limite')); ?>: <span style="color:green;"><?php echo e(date('d, F Y', strTotime($tasks->deadline))); ?>


                            <?php if($tasks->status == 1): ?>(<?php echo $tasks->days_until_deadline; ?>)<?php endif; ?></span></p>
                    <!--Remove days left if tasks is completed-->
                <?php endif; ?>

                <?php if($tasks->status == 1): ?>
                    <?php echo e(__('Status')); ?>: <?php echo e(__('Ouvert')); ?>

                <?php else: ?>
                    <?php echo e(__('Status')); ?>: <?php echo e(__('Fermé')); ?>

                <?php endif; ?>
            </div>
            <?php if($tasks->status == 1): ?>

                <?php echo Form::model($tasks, [
               'method' => 'PATCH',
                'url' => ['tasks/updateassign', $tasks->id],
                ]); ?>

                <?php echo Form::close(); ?>


                <?php echo Form::model($tasks, [
          'method' => 'PATCH',
          'url' => ['tasks/updatestatus', $tasks->id],
          ]); ?>


                <?php echo Form::submit(__('Fermer la tâche'), ['class' => 'btn btn-success form-control closebtn']); ?>

                <?php echo Form::close(); ?>


            <?php endif; ?>
         <br/>
            <?php if($tasks->invoice): ?>
                <a href="/invoices/<?php echo e($tasks->invoice->id); ?>">See the invoice</a>
            <?php endif; ?> 
           

            <?php echo $__env->make('invoices._invoiceLineModal', ['title' => $tasks->title, 'id' => $tasks->id, 'type' => 'task'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>