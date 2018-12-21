    <?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials.userheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="col-sm-8">
  <el-tabs active-name="tasks" style="width:100%">
    <el-tab-pane label="Tasks" name="tasks">
        <table class="table table-hover" id="tasks-table">
        <h3><?php echo e(__('Tasks assigned')); ?></h3>
            <thead>
                    <th><?php echo e(__('Title')); ?></th>
                    <th><?php echo e(__('Client')); ?></th>
                    <th><?php echo e(__('Created at')); ?></th>
                    <th><?php echo e(__('Deadline')); ?></th>
                    <th>
                        <select name="status" id="status-task">
                        <option value="" disabled selected><?php echo e(__('Status')); ?></option>
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                            <option value="all">All</option>
                        </select>
                    </th>
                </tr>
            </thead>
        </table>
    </el-tab-pane>
    <el-tab-pane label="Leads" name="leads">
      <table class="table table-hover">
        <table class="table table-hover" id="leads-table">
                <h3><?php echo e(__('Leads assigned')); ?></h3>
                <thead>
                <tr>
                    <th><?php echo e(__('Title')); ?></th>
                    <th><?php echo e(__('Client')); ?></th>
                    <th><?php echo e(__('Created at')); ?></th>
                    <th><?php echo e(__('Deadline')); ?></th>
                    <th>
                        <select name="status" id="status-lead">
                        <option value="" disabled selected><?php echo e(__('Status')); ?></option>
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                            <option value="all">All</option>
                        </select>
                    </th>
                </tr>
                </thead>
            </table>
    </el-tab-pane>
    <el-tab-pane label="Clients" name="clients">
         <table class="table table-hover" id="clients-table">
                <h3><?php echo e(__('Clients assigned')); ?></h3>
                <thead>
                <tr>
                    <th><?php echo e(__('Name')); ?></th>
                    <th><?php echo e(__('Company')); ?></th>
                    <th><?php echo e(__('Primary number')); ?></th>
                </tr>
                </thead>
            </table>
    </el-tab-pane>
  </el-tabs>
  </div>
  <div class="col-sm-4">
  <h4><?php echo e(__('Tasks')); ?></h4>
<doughnut :statistics="<?php echo e($task_statistics); ?>"></doughnut>
<h4><?php echo e(__('Leads')); ?></h4>
<doughnut :statistics="<?php echo e($lead_statistics); ?>"></doughnut>
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