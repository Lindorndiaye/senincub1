<?php $__env->startSection('heading'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip(); //Tooltip on icons top
            $('.popoverOption').each(function () {
                var $this = $(this);
                $this.popover({
                    trigger: 'hover',
                    placement: 'left',
                    container: $this,
                    html: true,
                    content: $this.find('#popover_content_wrapper').html()
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>
    <div class="row">
        <?php echo $__env->make('partials.clientheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('partials.userheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <div class="row">
        <div class="col-md-8 currenttask">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#task"><?php echo e(__('Tâche')); ?></a></li>
                <li><a data-toggle="tab" href="#lead"><?php echo e(__('Rendez-Vous')); ?></a></li>
                <li><a data-toggle="tab" href="#document"><?php echo e(__('Documents')); ?></a></li>
                

            </ul>
            <div class="tab-content">
                <?php echo $__env->make('clients.tabs.tasktab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <?php echo $__env->make('clients.tabs.leadtab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('clients.tabs.documenttab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('clients.tabs.invoicetab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    <div class="col-md-4 currenttask">
                <?php echo Form::model($client, [
               'method' => 'PATCH',
                'url' => ['clients/updateassign', $client->id],
                ]); ?>

                <?php echo Form::select('user_assigned_id', $users, $client->user->id, ['class' => 'form-control ui search selection top right pointing search-select', 'id' => 'search-select']); ?>

                <?php echo Form::submit(__('Attribuer un nouvel utilisateur'), ['class' => 'btn btn-primary form-control closebtn']); ?>

                <?php echo Form::close(); ?>

    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>