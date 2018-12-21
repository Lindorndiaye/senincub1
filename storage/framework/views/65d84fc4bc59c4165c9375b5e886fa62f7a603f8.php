<?php $__env->startSection('heading'); ?>
    <h1><?php echo e(__('Settings')); ?></h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
    <div class="col-lg-12">
        
    </div>
    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
    <div class="col-lg-12">
    <?php echo Form::model($permission, [
        'method' => 'PATCH',
        'url'    => 'settings/permissionsUpdate',
    ]); ?>


        <table class="table table-responsive table-hover table_wrapper" id="permissions-table">
            <thead>
            <tr>
            <th></th>
                <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <th><?php echo e($perm->display_name); ?></th>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <th></th>
            </tr>

            </thead>
            <tbody>
        <input type="hidden" name="role_id" value="<?php echo e($role->id); ?>"/>
                <tr>
                        <th><?php echo e($role->display_name); ?></th>
                        <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $isEnabled = !current(
                                    array_filter(
                                            $role->permissions->toArray(),
                                            function ($element) use ($perm) {
                                                return $element['id'] === $perm->id;
                                            }
                                    )
                            );  ?>

                            <td><input type="checkbox"
                                       <?php if (!$isEnabled) echo 'checked' ?> name="permissions[ <?php echo e($perm->id); ?> ]"
                                       value="1" data-role="<?php echo e($role->id); ?>">
                                <span class="perm-name"></span><br/></td>

                
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
    <td><?php echo Form::submit( __('Save Role') , ['class' => 'btn btn-primary']); ?></td>
   
            </tr>
      </tbody>
    </table>
     <?php echo Form::close(); ?>

     </div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>



    <div class="row">
        <div class="col-lg-12">
            <div class="sidebarheader movedown"><p><?php echo e(__('Overall Settings')); ?></p></div>


            <?php echo Form::model($settings, [
               'method' => 'PATCH',
               'url' => 'settings/overall'
               ]); ?>


                    <!-- *********************************************************************
     *                     Task complete       
     *********************************************************************-->
            <div class="panel panel-default movedown">
                <div class="panel-heading"><?php echo e(__('Task completion')); ?></div>
                <div class="panel-body">

                    <?php echo e(__('If Allowed only user who are assigned the task & the admin can complete the task.')); ?> <br/>
                    <?php echo e(__('If Not allowed anyone, can complete all tasks.')); ?>

                </div>
            </div>
            <?php echo Form::select('task_complete_allowed', 
            [
                1 => __('Allowed'), 
                2 => __('Not allowed')
            ], 
            $settings->task_complete_allowed, ['class' => 'form-control']); ?>

                    <!-- *********************************************************************
     *                     Task assign       
     *********************************************************************-->
            <div class="panel panel-default movedown">
                <div class="panel-heading"><?php echo e(__('Task assigning')); ?></div>
                <div class="panel-body">

                   <?php echo e(__('If Allowed only user who are assigned the task &amp; the admin can assign another user.')); ?> <br/>
                    <?php echo e(__('If Not allowed anyone, can assign another user.')); ?>

                </div>
            </div>
            <?php echo Form::select('task_assign_allowed', 
            [
                1 => __('Allowed'), 
                2 => __('Not allowed')
            ],
            $settings->task_assign_allowed, ['class' => 'form-control']); ?>

                    <!-- *********************************************************************
     *                     Lead complete       
     *********************************************************************-->

            <div class="panel panel-default movedown">
                <div class="panel-heading"><?php echo e(__('Lead completion')); ?></div>
                <div class="panel-body">

                    <?php echo e(__('If Allowed only user who are assigned the lead & the admin can complete the lead.')); ?> <br/>
                    <?php echo e(__('If Not allowed anyone, can complete all leads.')); ?>

                </div>
            </div>
            <?php echo Form::select('lead_complete_allowed', [
                1 => __('Allowed'), 
                2 => __('Not allowed')
            ], 
            $settings->lead_complete_allowed, ['class' => 'form-control']); ?>

                    <!-- *********************************************************************
     *                     Lead assign       
     *********************************************************************-->
            <div class="panel panel-default movedown">
                <div class="panel-heading"><?php echo e(__('Lead assigning')); ?></div>
                <div class="panel-body">

                    <?php echo e(__('If Allowed only user who are assigned the lead & the admin can complete the lead.')); ?> <br/>
                    <?php echo e(__('If Not allowed anyone, can complete all leads.')); ?>

                </div>
            </div>
            <?php echo Form::select('lead_assign_allowed', 
            [
                1 => __('Allowed'), 
                2 => __('Not allowed')
            ], 
            $settings->lead_assign_allowed, ['class' => 'form-control']); ?>

            <br/>
            <?php echo Form::submit( __('Save overall settings'), ['class' => 'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>