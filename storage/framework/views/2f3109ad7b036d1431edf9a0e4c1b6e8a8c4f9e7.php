<div id="invoice" class="tab-pane fade">
    <div class="boxspace">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th><?php echo e(__('ID')); ?></th>
                <th><?php echo e(__('Hours')); ?></th>
                <th><?php echo e(__('Totalt amount')); ?></th>
                <th><?php echo e(__('Invoice sent')); ?></th>
                <th><?php echo e(__('Payment received')); ?></th>
                <th><?php echo e(__('Status')); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php $total = 0; ?>

            <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                    <td>
                        <a href="<?php echo e(route('invoices.show', $invoice->id)); ?>">
                            <?php echo e($invoice->id); ?>

                        </a>
                    </td>
                    <td>
                        <?php $total = 0; ?>
                        <?php $__currentLoopData = $invoice->invoiceLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoiceLine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $total += $invoiceLine->quantity; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($total); ?>

                    </td>
                    <td>
                        <?php $totalAmount = 0; ?>
                        <?php $__currentLoopData = $invoice->invoiceLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $totalAmount += $payment->price; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($totalAmount); ?>,-
                    </td>
                    <td>
                        <?php if($invoice->sent_at == null): ?>
                            <?php $color = "red"; ?>
                        <?php else: ?>
                            <?php $color = "green"; ?>
                        <?php endif; ?>
                        <p style=" color:<?php echo e($color); ?>"><?php echo e($invoice->sent_at ? 'yes' : 'no'); ?></p>
                    </td>
                    <td>
                        <?php if($invoice->payment_received_at == null): ?>
                            <?php $color = "red"; ?>
                        <?php else: ?>
                            <?php $color = "green"; ?>
                        <?php endif; ?>
                        <p style=" color:<?php echo e($color); ?>"><?php echo e($invoice->payment_received_at ? 'yes' : 'no'); ?></p>
                    </td>

                    <td>
                        <p><?php echo e($invoice->status); ?> </p>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>