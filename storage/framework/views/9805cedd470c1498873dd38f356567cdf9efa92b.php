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

                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>
    <div class="div">

      <!-- Small boxes (Stat box) -->
     <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?php $__currentLoopData = $taskCompletedThisMonth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thisMonth): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($thisMonth->total); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </h3>

                        <p><?php echo e(__('Tâches terminées ce mois-ci')); ?></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-book-outline"></i>
                    </div>
                    <a href="<?php echo e(route('tasks.index')); ?>" class="small-box-footer"><?php echo e(__('Toutes les tâches')); ?> <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            <?php $__currentLoopData = $leadCompletedThisMonth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thisMonth): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($thisMonth->total); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </h3>

                        <p><?php echo e(__('Rendez-vous terminés ce mois')); ?></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo e(route('leads.index')); ?>" class="small-box-footer" ><?php echo e(__('Tous les rendez-vous')); ?> <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo e($totalClients); ?></h3>

                        <p><?php echo e(__('Tous les clients')); ?></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="<?php echo e(route('clients.index')); ?>" class="small-box-footer"><?php echo e(__('Tous les clients')); ?> <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo e($totalUsers - 1); ?></h3>

                        <p><?php echo e(__('Tous les incubés')); ?></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="<?php echo e(route('users.index')); ?>" class="small-box-footer"><?php echo e(__('Tous les incubésg')); ?> <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
                
          
                    
                </div>
                
            <!-- ./col -->
        </div> 
        <!-- /.row --> 

        <?php $createdTaskEachMonths = array(); $taskCreated = array();?>
        <?php $__currentLoopData = $createdTasksMonthly; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $createdTaskEachMonths[] = date('F', strTotime($task->created_at)) ?>
            <?php $taskCreated[] = $task->month;?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $completedTaskEachMonths = array(); $taskCompleted = array();?>

        <?php $__currentLoopData = $completedTasksMonthly; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tasks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $completedTaskEachMonths[] = date('F', strTotime($tasks->updated_at)) ?>
            <?php $taskCompleted[] = $tasks->month;?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $completedLeadEachMonths = array(); $leadsCompleted = array();?>
        <?php $__currentLoopData = $completedLeadsMonthly; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leads): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $completedLeadEachMonths[] = date('F', strTotime($leads->updated_at)) ?>
            <?php $leadsCompleted[] = $leads->month;?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $createdLeadEachMonths = array(); $leadCreated = array();?>
        <?php $__currentLoopData = $createdLeadsMonthly; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $createdLeadEachMonths[] = date('F', strTotime($lead->created_at)) ?>
            <?php $leadCreated[] = $lead->month;?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="row">

             <?php echo $__env->make('partials.dashboardone', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  


        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>