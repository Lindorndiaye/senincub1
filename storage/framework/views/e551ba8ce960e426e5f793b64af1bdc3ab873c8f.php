<div id="document" class="tab-pane fade">
    <table class="table">
        <h4><?php echo e(__('Tous les documents')); ?></h4>
        <div class="col-xs-10">
            <div class="form-group">
                <form method="POST" action="<?php echo e(url('/clients/upload', $client->id)); ?>" class="dropzone" id="dropzone"
                      files="true" data-dz-removea
                      enctype="multipart/form-data"
                >
                    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
                </form>
                <p><b><?php echo e(__('Max size')); ?></b></p>
            </div>
        </div>
        <thead>
        <tr>
            <th><?php echo e(__('File')); ?></th>
            <th><?php echo e(__('Taille')); ?></th>
            <th><?php echo e(__('Créé à')); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $client->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><a href="../files/<?php echo e($companyname); ?>/<?php echo e($document->path); ?>"
                       target="_blank"><?php echo e($document->file_display); ?></a></td>
                <td><?php echo e($document->size); ?> <span class="moveright"> MB</span></td>
                <td><?php echo e($document->created_at); ?></td>
		
                <td>
		<form method="POST" action="<?php echo e(action('DocumentsController@destroy', $document->id)); ?>">
		<input type="hidden" name="_method" value="delete"/>
		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
		<input type="submit" class="btn btn-danger" value="Delete"/>
		</form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</div>
