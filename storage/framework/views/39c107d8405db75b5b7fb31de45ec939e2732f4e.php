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
            <?php echo $__env->make('partials.comments', ['subject' => $lead], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-md-3">
            <div class="sidebarheader">
                <p> <?php echo e(__('Information sur le rendez-vous')); ?></p>
            </div>
            <div class="sidebarbox">
                <p><?php echo e(__('Assigned to')); ?>:
                    <a href="<?php echo e(route('leads.show', $lead->user->id)); ?>">
                        <?php echo e($lead->user->name); ?></a></p>
                <p><?php echo e(__('Created at')); ?>: <?php echo e(date('d F, Y, H:i', strtotime($lead->created_at))); ?> </p>
                <?php if($lead->days_until_contact < 2): ?>
                    <p><?php echo e(__('Follow up')); ?>: <span style="color:red;"><?php echo e(date('d, F Y, H:i', strTotime($lead->contact_date))); ?>


                            <?php if($lead->status == 1): ?> (<?php echo $lead->days_until_contact; ?>) <?php endif; ?></span> <i
                                class="glyphicon glyphicon-calendar" data-toggle="modal"
                                data-target="#ModalFollowUp"></i></p> <!--Remove days left if lead is completed-->

                <?php else: ?>
                    <p><?php echo e(__('Follow up')); ?>: <span style="color:green;"><?php echo e(date('d, F Y, H:i', strTotime($lead->contact_date))); ?>


                            <?php if($lead->status == 1): ?> (<?php echo $lead->days_until_contact; ?>)<i
                                    class="glyphicon glyphicon-calendar" data-toggle="modal"
                                    data-target="#ModalFollowUp"></i><?php endif; ?></span></p>
                    <!--Remove days left if lead is completed-->
                <?php endif; ?>
                <?php if($lead->status == 1): ?>
                    <?php echo e(__('Status')); ?>: <?php echo e(__('Contact')); ?>

                <?php elseif($lead->status == 2): ?>
                    <?php echo e(__('Status')); ?>: <?php echo e(__('Completed')); ?>

                <?php elseif($lead->status == 3): ?>
                    <?php echo e(__('Status')); ?>: <?php echo e(__('Not interested')); ?>

                <?php endif; ?>

            </div>
            <?php if($lead->status == 1): ?>
                <?php echo Form::model($lead, [
               'method' => 'PATCH',
                'url' => ['leads/updateassign', $lead->id],
                ]); ?>

                <?php echo Form::select('user_assigned_id', $users, null, ['class' => 'form-control ui search selection top right pointing search-select', 'id' => 'search-select']); ?>

                <?php echo Form::submit(__('Assigner un nouvel utilisateur'), ['class' => 'btn btn-primary form-control closebtn']); ?>

                <?php echo Form::close(); ?>

                <?php echo Form::model($lead, [
               'method' => 'PATCH',
               'url' => ['leads/updatestatus', $lead->id],
               ]); ?>


                <?php echo Form::submit(__('Fermer le Rendez-vous'), ['class' => 'btn btn-success form-control closebtn movedown']); ?>

                <?php echo Form::close(); ?>

            <?php endif; ?>

            <div class="activity-feed movedown">
                <?php $__currentLoopData = $lead->activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="feed-item">
                        <div class="activity-date"><?php echo e(date('d, F Y H:i', strTotime($activity->created_at))); ?></div>
                        <div class="activity-text"><?php echo e($activity->text); ?></div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>


    <div class="modal fade" id="ModalFollowUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Change deadline')); ?></h4>
                </div>

                <div class="modal-body">

                    <?php echo Form::model($lead, [
                      'method' => 'PATCH',
                      'route' => ['leads.followup', $lead->id],
                      ]); ?>

                    <?php echo Form::label('contact_date', __('Next follow up'), ['class' => 'control-label']); ?>

                    <?php echo Form::date('contact_date', \Carbon\Carbon::now()->addDays(7), ['class' => 'form-control']); ?>

                    <?php echo Form::time('contact_time', '11:00', ['class' => 'form-control']); ?>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-default col-lg-6"
                                data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <div class="col-lg-6">
                            <?php echo Form::submit( __('Update follow up'), ['class' => 'btn btn-success form-control closebtn']); ?>

                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
       

   
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>