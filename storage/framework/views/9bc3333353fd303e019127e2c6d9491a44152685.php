<?php $subject instanceof \App\Models\Task ? $instance = 'task' : $instance = 'lead' ?>

<div class="panel panel-primary shadow">
    <div class="panel-heading"><p><?php echo e($subject->title); ?></p></div>
    <div class="panel-body">
        <p><?php echo e($subject->description); ?></p>
        <p class="smalltext"><?php echo e(__('Créé à')); ?>:
            <?php echo e(date('d F, Y, H:i:s', strtotime($subject->created_at))); ?>

            <?php if($subject->updated_at != $subject->created_at): ?>
                <br/><?php echo e(__('Modifié')); ?>: <?php echo e(date('d F, Y, H:i:s', strtotime($subject->updated_at))); ?>

            <?php endif; ?></p>
    </div>
</div>

<?php $count = 0;?>
<?php $i = 1 ?>
<?php $__currentLoopData = $subject->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="panel panel-primary shadow" style="margin-top:15px; padding-top:10px;">
        <div class="panel-body">
            <p class="smalltext">#<?php echo e($i++); ?></p>
            <p>  <?php echo e($comment->description); ?></p>
            <p class="smalltext"><?php echo e(__('Commentaire de')); ?>: <a
                        href="<?php echo e(route('users.show', $comment->user->id)); ?>"> <?php echo e($comment->user->name); ?> </a>
            </p>
            <p class="smalltext"><?php echo e(__('Créé à')); ?>:
                <?php echo e(date('d F, Y, H:i:s', strtotime($comment->created_at))); ?>

                <?php if($comment->updated_at != $comment->created_at): ?>
                        <br/><?php echo e(__('Modifié')); ?> : <?php echo e(date('d F, Y, H:i:s', strtotime($comment->updated_at))); ?>

                <?php endif; ?></p>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<br/>

<?php if($instance == 'task'): ?>
    <?php echo Form::open(array('url' => array('/comments/task',$subject->id, ))); ?>

    <div class="form-group">
        <?php echo Form::textarea('description', null, ['class' => 'form-control', 'id' => 'comment-field']); ?>


        <?php echo Form::submit( __('Ajouter un commentaire') , ['class' => 'btn btn-primary']); ?>

    </div>
    <?php echo Form::close(); ?>

<?php else: ?>
    <?php echo Form::open(array('url' => array('/comments/lead',$lead->id, ))); ?>

    <div class="form-group">
        <?php echo Form::textarea('description', null, ['class' => 'form-control', 'id' => 'comment-field']); ?>


        <?php echo Form::submit( __('Ajouter un commentaire') , ['class' => 'btn btn-primary']); ?>

    </div>
    <?php echo Form::close(); ?>

<?php endif; ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $('#comment-field').atwho({
            at: "@",
            limit: 5, 
            delay: 400,
            callbacks: {
                remoteFilter: function (t, e) {
                    t.length <= 2 || $.getJSON("/users/users", {q: t}, function (t) {
                        e(t)
                    })
                }
            }
        })
    </script>
<?php $__env->stopPush(); ?>