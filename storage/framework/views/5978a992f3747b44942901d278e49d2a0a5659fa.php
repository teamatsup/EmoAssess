<?php $__env->startSection('head'); ?>
    <h1>Student Records</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div  class='row'>
		<div class="col-sm-12">
			<table id="studentsTestsTable" class="table table-hover table-bordered table-striped 
									 dataTable no-footer">
				<thead>
					<th>ID Number</th>
					<th>Student Name</th>
					<th>Age</th>
					<th>Gender</th>
					<th>Course</th>
					<th>Test Taken</th>
				</thead>
				<?php foreach( $tests as $test ): ?>
					<tr>
						<td><a href="<?php echo e(URL::to('records', [$test->user->id])); ?>">
							<?php echo e($test->user->id_number); ?> </a></td>
						<td><?php echo e($test->user->fname." ".$test->user->lname); ?></td>
						<td><?php echo e($test->user->age); ?></td>
						<td><?php if( $test->user->gender == 1 ): ?> male <?php else: ?> female <?php endif; ?></td>
						<td><?php echo e($test->user->course); ?></td>
						<td><?php echo e($test->date_taken); ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript" src="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"/></script>

	<script>
		$(document).ready(function(){
			$('#studentsTestsTable').DataTable();
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>