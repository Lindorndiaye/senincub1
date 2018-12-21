<?php $__env->startSection('heading'); ?>
    <h1>ajouter un client</h1>
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
                    html: true
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

    <?php
    $data = Session::get('data');
    ?>

    <?php echo Form::open([
            'url' => '/clients/create/cvrapi'

            ]); ?>

    <div class="form-group">
        <div class="input-group">

            

        </div>
        <?php echo Form::submit('Get client info', ['class' => 'btn btn-primary clientvat']); ?>


    </div>

    <?php echo Form::close(); ?>


    <?php echo Form::open([
            'route' => 'clients.store',
            'class' => 'ui-form'
            ]); ?>

    <?php echo $__env->make('clients.form', ['submitButtonText' => __('Create New Client')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo Form::close(); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>