<?php $__env->startSection('heading'); ?>
    <h1>Créer une tâche</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo Form::open([
            'route' => 'tasks.store'
            ]); ?>


    <div class="form-group">
        <?php echo Form::label('title', __('Titre') , ['class' => 'control-label']); ?>

        <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

    </div>

    <div class="form-group">
        <?php echo Form::label('description', __('Description'), ['class' => 'control-label']); ?>

        <?php echo Form::textarea('description', null, ['class' => 'form-control']); ?>

    </div>

    <div class="form-inline">
        <div class="form-group col-sm-6 removeleft ">
            <?php echo Form::label('deadline', __('Date limite'), ['class' => 'control-label']); ?>

            <?php echo Form::date('deadline', \Carbon\Carbon::now()->addDays(3), ['class' => 'form-control']); ?>

        </div>

        <div class="form-group col-sm-6 removeleft removeright">
            <?php echo Form::label('status', __('Statut'), ['class' => 'control-label']); ?>

            <?php echo Form::select('status', array(
            '1' => 'Ouvert', '2' => 'Completée'), null, ['class' => 'form-control'] ); ?>

        </div>

    </div>
    <div class="form-group form-inline">
        <?php echo Form::label('user_assigned_id', __('Attribuer un utilisateur'), ['class' => 'control-label']); ?>

        <?php echo Form::select('user_assigned_id', $users, null, ['class' => 'form-control']); ?>

        <?php if(Request::get('client') != ""): ?>
            <?php echo Form::hidden('client_id', Request::get('client')); ?>

        <?php else: ?>
            <?php echo Form::label('client_id', __('Assigner un client'), ['class' => 'control-label']); ?>

            <?php echo Form::select('client_id', $clients, null, ['class' => 'form-control']); ?>

        <?php endif; ?>
    </div>

    <?php echo Form::submit(__('Créer une tâche'), ['class' => 'btn btn-primary']); ?>


    <?php echo Form::close(); ?>






<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>