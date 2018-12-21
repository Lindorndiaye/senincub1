<div class="modal fade" id="ModalTimer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                <?php echo e(__('Time management')); ?>

                    (<?php echo e($title); ?>)</h4>
                
            </div>
            <?php if($type == 'task'): ?>
           <?php echo Form::open([
                'method' => 'post',
                'url' => ['tasks/updatetime', $id],
            ]); ?>

            <?php else: ?>
              <?php echo Form::open([
                'method' => 'post',
                 'route' => ['invoice.new.item', $id],
            ]); ?>

            <?php endif; ?>
            <div class="modal-body">
                <div class="form-group">
                    <?php echo Form::label('title', __('Title'), ['class' => 'control-label']); ?>

                    <?php echo Form::text('title', null, ['class' => 'form-control', 'placeholder' =>  __('Insert task title (will be shown on invoice)')]); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('comment',  __('Description'), ['class' => 'control-label']); ?>

                    <?php echo Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => __('A short description, as to what is being billed')]); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('price', __('Hourly price'), ['class' => 'control-label']); ?>

                    <?php echo Form::text('price', null, ['class' => 'form-control', 'placeholder' => '300']); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('quantity', __('Time spend'), ['class' => 'control-label']); ?>

                    <?php echo Form::text('quantity', null, ['class' => 'form-control', 'placeholder' => '3']); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('type', __('Type'), ['class' => 'control-label']); ?>

                    <?php echo Form::text('type', null, ['class' => 'form-control', 'placeholder' => '3']); ?>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default col-lg-6"
                        data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                <div class="col-lg-6">
                    <?php echo Form::submit( __('Register time'), ['class' => 'btn btn-success form-control closebtn']); ?>

                </div>
              
            </div>
              <?php echo Form::close(); ?>

        </div>
    </div>
</div>