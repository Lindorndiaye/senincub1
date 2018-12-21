<?php $__env->startSection('heading'); ?>
    <h1><?php echo e(__('Créer Rendez-vous')); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo Form::open([
            'route' => 'leads.store'
            ]); ?>


    <div class="form-group">
        <?php echo Form::label('title', __('Titre'), ['class' => 'control-label']); ?>

        <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

    </div>

    <div class="form-group">
        <?php echo Form::label('description', __('Description'), ['class' => 'control-label']); ?>

        <?php echo Form::textarea('description', null, ['class' => 'form-control']); ?>

    </div>

    
    <div class="form-inline">
        <div class="form-group col-lg-3 removeleft">
              <?php echo Form::label('status', __('Status'), ['class' => 'control-label']); ?>

              <?php echo Form::select('status', array(
              '1' => 'Contact Client','2' => 'Contact SenIncurb' ), null, ['class' => 'form-control'] ); ?>

          </div>  
          <div class="form-group col-lg-5 removeleft">
              <?php echo Form::label('contact_date', __('Date'), ['class' => 'control-label']); ?>

              <?php echo Form::date('contact_date', \Carbon\Carbon::now()->addDays(7), ['class' => 'form-control']); ?>

          </div>
          <div class="form-group col-lg-4 removeleft removeright">
              <?php echo Form::label('contact_time', __('Heure'), ['class' => 'control-label']); ?>

              <?php echo Form::time('contact_time', '11:00', ['class' => 'form-control']); ?>

          </div>
  
      </div>



    <div class="form-group">
        <?php echo Form::label('user_assigned_id', __('Attribuer un utilisateur'), ['class' => 'control-label']); ?>

        <?php echo Form::select('user_assigned_id', $users, null, ['class' => 'form-control']); ?>

    </div>
    <div class="form-group">
        <?php if(Request::get('client') != ""): ?>
            <?php echo Form::hidden('client_id', Request::get('client')); ?>

        <?php else: ?>
            <?php echo Form::label('client_id', __('Assigner un client'), ['class' => 'control-label']); ?>

            <?php echo Form::select('client_id', $clients, null, ['class' => 'form-control']); ?>

        <?php endif; ?>
    </div>

    <?php echo Form::submit(__('Créer un nouveau rendez-vous'), ['class' => 'btn btn-primary']); ?>


    <?php echo Form::close(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>