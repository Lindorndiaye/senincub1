    <?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials.userheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="col-sm-8">
  <el-tabs active-name="tasks" style="width:100%">
    <el-tab-pane label="Tâches" name="tasks">
        <table class="table table-hover" id="tasks-table">
        <h3><?php echo e(__('Tâches assignées')); ?></h3>
            <thead>
                    <th><?php echo e(__('Titre')); ?></th>
                    <th><?php echo e(__('Client')); ?></th>
                    <th><?php echo e(__('Créé à')); ?></th>
                    <th><?php echo e(__('Date limite')); ?></th>
                    <th>
                        
                    </th>
                </tr>
            </thead>
        </table>
    </el-tab-pane>
    <el-tab-pane label="Rendez-vous" name="leads">
      <table class="table table-hover">
        <table class="table table-hover" id="leads-table">
                <h3><?php echo e(__('Rendez-vous assignés')); ?></h3>
                <thead>
                <tr>
                    <th><?php echo e(__('Titre')); ?></th>
                    <th><?php echo e(__('Client')); ?></th>
                    <th><?php echo e(__('Créé à')); ?></th>
                    <th><?php echo e(__('Date Limite')); ?></th>
                    <th>
                        
                    </th>
                </tr>
                </thead>
            </table>
    </el-tab-pane>
    <el-tab-pane label="Clients" name="clients">
         <table class="table table-hover" id="clients-table">
                <h3><?php echo e(__('Clients assignés')); ?></h3>
                <thead>
                <tr>
                    <th><?php echo e(__('Nom')); ?></th>
                    <th><?php echo e(__('Compagnie')); ?></th>
                    <th><?php echo e(__('Telephone')); ?></th>
                </tr>
                </thead>
            </table>
    </el-tab-pane>
  </el-tabs>
  </div>
  <div class="col-sm-4">
  
  </div>

   <?php $__env->stopSection(); ?> 
<?php $__env->startPush('scripts'); ?>
        <script>
        $('#pagination a').on('click', function (e) {
            e.preventDefault();
            var url = $('#search').attr('action') + '?page=' + page;
            $.post(url, $('#search').serialize(), function (data) {
                $('#posts').html(data);
            });
        });

            $(function () {
              var table = $('#tasks-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '<?php echo route('users.taskdata', ['id' => $user->id]); ?>',
                    columns: [

                        {data: 'titlelink', name: 'title'},
                        {data: 'client_id', name: 'Client', orderable: false, searchable: false},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'deadline', name: 'deadline'},
                        {data: 'status', name: 'status', orderable: false},
                    ]
                });

                $('#status-task').change(function() {
                selected = $("#status-task option:selected").val();
                    if(selected == 'open') {
                        table.columns(4).search(1).draw();
                    } else if(selected == 'closed') {
                        table.columns(4).search(2).draw();
                    } else {
                         table.columns(4).search( '' ).draw();
                    }
              });  

          });
            $(function () {
                $('#clients-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '<?php echo route('users.clientdata', ['id' => $user->id]); ?>',
                    columns: [

                        {data: 'clientlink', name: 'name'},
                        {data: 'company_name', name: 'company_name'},
                        {data: 'primary_number', name: 'primary_number'},

                    ]
                });
            });

            $(function () {
              var table = $('#leads-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '<?php echo route('users.leaddata', ['id' => $user->id]); ?>',
                    columns: [

                        {data: 'titlelink', name: 'title'},
                        {data: 'client_id', name: 'Client', orderable: false, searchable: false},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'contact_date', name: 'contact_date'},
                        {data: 'status', name: 'status', orderable: false},
                    ]
                });

              $('#status-lead').change(function() {
                selected = $("#status-lead option:selected").val();
                    if(selected == 'open') {
                        table.columns(4).search(1).draw();
                    } else if(selected == 'closed') {
                        table.columns(4).search(2).draw();
                    } else {
                         table.columns(4).search( '' ).draw();
                    }
              });  
          });
        </script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>