<div id="lead" class="tab-pane fade">
    <div class="boxspace">
        <table class="table table-hover">
            <h4><?php echo e(__('Tous les rendez-vous')); ?></h4>
            <thead>
            <thead>
            <tr>
                <th><?php echo e(__('Titre')); ?></th>
                <th><?php echo e(__('Utilisateur assigné')); ?></th>
                <th><?php echo e(__('Créé à')); ?></th>
                <th><?php echo e(__('Date')); ?></th>

                <th><a href="<?php echo e(route('leads.create', ['client' => $client->id])); ?>">
                        <button class="btn btn-success"><?php echo e(__('Nouveau Rendez-vous')); ?></button>
                    </a></th>

            </tr>
            </thead>
            <tbody>
            <?php  $tr = ""; ?>
          
            <?php $__currentLoopData = $client->leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($lead->status == 1): ?>
                    <?php  $tr = '#adebad'; ?>
                <?php elseif($lead->status == 2): ?>
                    <?php $tr = '#ff6666'; ?>
                <?php endif; ?>
                <tr style="background-color:<?php echo $tr;?>">

                    <td><a href="<?php echo e(route('leads.show', $lead->id)); ?>"><?php echo e($lead->title); ?> </a></td>
                    <td>
                        <div class="popoverOption"
                             rel="popover"
                             data-placement="left"
                             data-html="true"
                             data-original-title="<span class='glyphicon glyphicon-user' aria-hidden='true'> </span> <?php echo e($lead->user->name); ?>">
                            <div id="popover_content_wrapper" style="display:none; width:250px;">
                                <img src='http://placehold.it/350x150' height='80px' width='80px'
                                     style="float:left; margin-bottom:5px;"/>
                                <p class="popovertext">
                                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"> </span>
                                    <a href="mailto:<?php echo e($lead->user->email); ?>">
                                        <?php echo e($lead->user->email); ?><br/>
                                    </a>
                                    <span class="glyphicon glyphicon-headphones" aria-hidden="true"> </span>
                                    <a href="mailto:<?php echo e($lead->user->work_number); ?>">
                                    <?php echo e($lead->user->work_number); ?></p>
                                </a>

                            </div>
                            <a href="<?php echo e(route('users.show', $lead->user->id)); ?>"> <?php echo e($lead->user->name); ?></a>

                        </div> <!--Shows users assigned to lead -->
                    </td>
                    <td><?php echo e(date('d, M Y, H:i', strTotime($lead->contact_date))); ?> </td>
                    <td><?php echo e(date('d, M Y', strTotime($lead->contact_date))); ?>

                        <?php if($lead->status == 1): ?>(<?php echo e($lead->days_until_contact); ?>)<?php endif; ?> </td>
                    <td></td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>
</div>