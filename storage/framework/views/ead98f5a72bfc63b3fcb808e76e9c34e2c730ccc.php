<div id="task" class="tab-pane fade in active">
    <div class="boxspace">
        <table class="table table-hover">
            <h4><?php echo e(__('Toutes les tâches')); ?></h4>
            <thead>
            <thead>
            <tr>
                <th><?php echo e(__('Titre')); ?></th>
                <th><?php echo e(__('Attribué')); ?></th>
                <th><?php echo e(__('Créé à')); ?></th>
                <th><?php echo e(__('Date Limite')); ?></th>
                <th><a href="<?php echo e(route('tasks.create', ['client' => $client->id])); ?>">
                        <button class="btn btn-success"><?php echo e(__('Nouvelle tâche')); ?></button>
                    </a></th>

            </tr>
            </thead>
            <tbody>
            <?php  $tr = ""; ?>
            <?php $__currentLoopData = $client->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($task->status == 1): ?>
                    <?php  $tr = '#adebad'; ?>
                <?php elseif($task->status == 2): ?>
                    <?php $tr = '#ff6666'; ?>
                <?php endif; ?>
                <tr style="background-color:<?php echo $tr;?>">

                    <td><a href="<?php echo e(route('tasks.show', $task->id)); ?>"><?php echo e($task->title); ?> </a></td>
                    <td>
                        <div class="popoverOption"
                             rel="popover"
                             data-placement="left"
                             data-html="true"
                             data-original-title="<span class='glyphicon glyphicon-user' aria-hidden='true'> </span> <?php echo e($task->user->name); ?>">
                            <div id="popover_content_wrapper" style="display:none; width:250px;">
                                <img src='http://placehold.it/350x150' height='80px' width='80px'
                                     style="float:left; margin-bottom:5px;"/>
                                <p class="popovertext">
                                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"> </span>
                                    <a href="mailto:<?php echo e($task->user->email); ?>">
                                        <?php echo e($task->user->email); ?><br/>
                                    </a>
                                    <span class="glyphicon glyphicon-headphones" aria-hidden="true"> </span>
                                    <a href="mailto:<?php echo e($task->user->work_number); ?>">
                                    <?php echo e($task->user->work_number); ?></p>
                                </a>

                            </div>
                            <a href="<?php echo e(route('users.show', $task->user->id)); ?>"> <?php echo e($task->user->name); ?></a>

                        </div> <!--Shows users assigned to task -->
                    </td>
                    <td><?php echo e(date('d, M Y, H:i', strTotime($task->created_at))); ?>  </td>
                    <td><?php echo e(date('d, M Y', strTotime($task->deadline))); ?>

                        <?php if($task->status == 1): ?>(<?php echo e($task->days_until_deadline); ?>) <?php endif; ?></td>
                    <td></td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>