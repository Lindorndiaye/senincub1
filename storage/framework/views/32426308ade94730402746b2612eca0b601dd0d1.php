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
                <p><?php echo e(__('Task information')); ?></p>
            </div>
            <div class="sidebarbox">
                <p><?php echo e(__('Assigned')); ?>:
                    <a href="<?php echo e(route('users.show', $tasks->user->id)); ?>">
                        <?php echo e($tasks->user->name); ?></a></p>
                <p><?php echo e(__('Created at')); ?>: <?php echo e(date('d F, Y, H:i', strtotime($tasks->created_at))); ?> </p>

                <?php if($tasks->days_until_deadline): ?>
                    <p><?php echo e(__('Deadline')); ?>: <span style="color:red;"><?php echo e(date('d, F Y', strTotime($tasks->deadline))); ?>


                            <?php if($tasks->status == 1): ?>(<?php echo $tasks->days_until_deadline; ?>)<?php endif; ?></span></p>
                    <!--Remove days left if tasks is completed-->

                <?php else: ?>
                    <p><?php echo e(__('Deadline')); ?>: <span style="color:green;"><?php echo e(date('d, F Y', strTotime($tasks->deadline))); ?>


                            <?php if($tasks->status == 1): ?>(<?php echo $tasks->days_until_deadline; ?>)<?php endif; ?></span></p>
                    <!--Remove days left if tasks is completed-->
                <?php endif; ?>

                <?php if($tasks->status == 1): ?>
                    <?php echo e(__('Status')); ?>: <?php echo e(__('Open')); ?>

                <?php else: ?>
                    <?php echo e(__('Status')); ?>: <?php echo e(__('Closed')); ?>

                <?php endif; ?>
            </div>
            <?php if($tasks->status == 1): ?>

                <?php echo Form::model($tasks, [
               'method' => 'PATCH',
                'url' => ['tasks/updateassign', $tasks->id],
                ]); ?>

                <?php echo Form::select('user_assigned_id', $users, null, ['class' => 'form-control ui search selection top right pointing search-select', 'id' => 'search-select']); ?>

                <?php echo Form::submit(__('Assign user'), ['class' => 'btn btn-primary form-control closebtn']); ?>

                <?php echo Form::close(); ?>


                <?php echo Form::model($tasks, [
          'method' => 'PATCH',
          'url' => ['tasks/updatestatus', $tasks->id],
          ]); ?>


                <?php echo Form::submit(__('Close task'), ['class' => 'btn btn-success form-control closebtn']); ?>

                <?php echo Form::close(); ?>


            <?php endif; ?>
            <div class="sidebarheader">
                <p><?php echo e(__('Time management')); ?></p>
            </div>
            <table class="table table_wrapper ">
                <tr>
                    <th><?php echo e(__('Title')); ?></th>
                    <th><?php echo e(__('Time')); ?></th>
                </tr>
                <tbody>
               <?php $__currentLoopData = $invoice_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="padding: 5px"><?php echo e($invoice_line->title); ?></td>
                        <td style="padding: 5px"><?php echo e($invoice_line->quantity); ?> </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     
                </tbody>
            </table>
            <br/>
            <button type="button" <?php echo e($tasks->canUpdateInvoice() == 'true' ? '' : 'disabled'); ?> class="btn btn-primary form-control" value="add_time_modal" data-toggle="modal" data-target="#ModalTimer" >
                <?php echo e(__('Add time')); ?>

            </button>
            <?php if($tasks->invoice): ?>
                <a href="/invoices/<?php echo e($tasks->invoice->id); ?>">See the invoice</a>
            <?php endif; ?> 
            <div class="activity-feed movedown">
                <?php $__currentLoopData = $tasks->activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="feed-item">
                        <div class="activity-date"><?php echo e(date('d, F Y H:i', strTotime($activity->created_at))); ?></div>
                        <div class="activity-text"><?php echo e($activity->text); ?></div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php echo $__env->make('invoices._invoiceLineModal', ['title' => $tasks->title, 'id' => $tasks->id, 'type' => 'task'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>