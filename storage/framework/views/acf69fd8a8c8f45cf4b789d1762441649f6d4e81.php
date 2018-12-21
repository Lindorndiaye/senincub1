<br/><br/>
<div class="col-sm-6">
   easily
    
</div> 
<div class="col-sm-6">

    <div class="col-lg-12">
        <!-- Info Boxes Style 2 -->
        <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion ion-ios-book-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"> <?php echo e(__('Toutes les tâches')); ?> </span>
                <span class="info-box-number"><?php echo e($allCompletedTasks); ?> / <?php echo e($alltasks); ?></span>

                <div class="progress">
                    <div class="progress-bar" style="width: <?php echo e($totalPercentageTasks); ?>%"></div>
                </div>
                  <span class="progress-description">
                    <?php echo e(number_format($totalPercentageTasks, 0)); ?>% <?php echo e(__('Completée')); ?>

                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
    <div class="col-lg-12">
        <!-- /.info-box -->
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-stats-bars"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><?php echo e(__('Tous les rendez-vous')); ?></span>
                <span class="info-box-number"><?php echo e($allCompletedLeads); ?> / <?php echo e($allleads); ?></span>

                <div class="progress">
                    <div class="progress-bar" style="width: <?php echo e($totalPercentageLeads); ?>%"></div>
                </div>
                  <span class="progress-description">
                    <?php echo e(number_format($totalPercentageLeads, 0)); ?>% <?php echo e(__('Completé')); ?>

                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>

    </div>
    <div class="col-sm-12">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h4 class="box-title"
                >
                    <?php echo e(__('Utilisateurs')); ?>

                </h4>
                <div class="box-tools pull-right">

                </div>
            </div>
            <div id="collapseOne" class="panel-collapse">

                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-1">
                        <?php if($user->isOnline()): ?>
                            <i class="dot-online" data-toggle="tooltip" title="Online" data-placement="left"></i>
                        <?php else: ?>
                            <i class="dot-offline" data-toggle="tooltip" title="Offline" data-placement="left"></i>
                        <?php endif; ?>
                        <a href="<?php echo e(route('users.show', $user->id)); ?>">
                            <img class="small-profile-picture" data-toggle="tooltip" title="<?php echo e($user->name); ?>"
                                 data-placement="left"
                                 <?php if($user->image_path != ""): ?>
                                 src="images/<?php echo e($companyname); ?>/<?php echo e($user->image_path); ?>"
                                 <?php else: ?>
                                 src="images/default_avatar.jpg"
                                    <?php endif; ?> />
                        </a>

                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>


</div> 
</div> 


<!-- Info boxes -->

<!-- /.info-box -->
    
