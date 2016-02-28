        <?php $__env->startSection('head'); ?>
         <h1>Add Test Questions</h1>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <?php $__env->stopSection(); ?>

        <?php $__env->startSection('content'); ?>
       
        	<div class="wrapper">
           <form method="POST" action="<?php echo e(URL::to('test/addQuestion')); ?> " name="SubmitAddQuestion">
           	 <?php echo csrf_field(); ?>

           		  <label class="text">
                                    <label>Question: </label>
                                     <div class="form-group">
                                		 <input type="textbox" name="question" >
                            		</div>      
                 
                                   
                  </label>
                  
                 
                  <label class="text">
                                      <div class="form-group">
                                		<label>Reverse: </label>
		                                <select class="form-control" name="reverse">
		                                    <option value='1'>Yes</option>
		                                    <option value='0'>No</option>		                                    
		                                </select>
                            </div>      
                  </label>

                  <label class="text">
                             <div class="form-group">
                                <label>Scale Type: </label>
		                                <select class="form-control" name="scale_type">
		                                    <option value='1'>1</option>
		                                    <option value='2'>2</option>
		                                    <option value='3'>3</option>
		                                    <option value='4'>4</option>
		                                    <option value='5'>5</option>
		                                    <option value='7'>7</option>
		                                    
		                                </select>
                            </div>                  
                  </label>


                  <label class="text">
                             <div class="form-group">
                                <label>Test Title</label>
		                                <select class="form-control" name='title_id'>
		                                <?php foreach($titles as $title): ?>
		                                    <option value= <?php echo e($title->id); ?>><?php echo e($title->test_title); ?></option>
		                                <?php endforeach; ?>    
		                                </select>
                            </div>
                                    <input type="hidden" name="status" value="1">
                  </label>

           
                  <button type="submit" class="btn btn-primary">Submit</button>
     			 </form>
     			 </div>

  			 <div class= "wrapper">
	     			 <table id="example" class="table table-hover table-bordered">
	     			 <thead>
	     			 	<th>Question</th>
	     			 	<th>Scale</th>
	     			 	<th>Reverse</th>
	     			 	<th>Test Title</th>
	     			 	<th>Status</th>
	     			 	<th>Edit</th>
	     			 </thead>

		     			 <tbody>
		     			 <?php foreach($questionsall as $question): ?>
		     			 <tr>
		     			 	<td><?php echo e($question->question); ?></td>
		     			 	<td><?php echo e($question->scale_type); ?></td>
		     			 	<td><?php echo e($question->reverse); ?></td>
		     			 	<td><?php echo e($question->title_id); ?></td>
		     			 	<td><?php echo e($question->status); ?></td>
		     			 	<td>
                			<div>
								  
								  <!-- Trigger the modal with a button -->
								  <button type="button" class="btn btn-info	 btn-lg" data-toggle="modal"  data-target="#myModal<?php echo e($question->id); ?>">Edit</button>

								  <!-- Modal -->
								  <div class="modal fade" id="myModal<?php echo e($question->id); ?>" role="dialog">
								    <div class="modal-dialog">
								    
								      <!-- Modal content-->
                    				<form method="POST" action="/test/addQuestion1/<?php echo e($question->id); ?>" name="submitEditQuestion">
								      <div class="modal-content">
								        <div class="modal-header">
								          <button type="button" class="close" data-dismiss="modal">&times;</button>
								          <h4 class="modal-title">Edit Question</h4>
								        </div>
								        <div class="modal-body">
								          	 <?php echo csrf_field(); ?>

      									          	<label>Question:</label>
      									          		<input type="hidden" name="id" placeholder="<?php echo e($question->id); ?>">
      									          	<div class="form-group">
      									          		<input type="text" name="question" placeholder="<?php echo e($question->question); ?>">
      									          	</div>
      									          	<label>Scale Type:</label>
      									          	<div class="form-group">
      									          		<input type="text" name="scale_type" placeholder="<?php echo e($question->scale_type); ?>">
      									          	</div>
								                    <label>Reverse:</label>
		   	   		                                <div class="form-group">
	                                      				<input type="text" name="reverse" placeholder="<?php echo e($question->reverse); ?>">
	                                    			</div>
	                                    			<label>Test Title</label>
										             <select class="form-control" name='title_id'>
										                                <?php foreach($titles as $title): ?>
										                                    <option value= <?php echo e($title->id); ?>><?php echo e($title->test_title); ?></option>
										                                <?php endforeach; ?>    
										             </select>

								       		<button type="submit" class="btn btn-primary">save</button>
								        	
								        </div>
								        
								         <div class="modal-footer">
								          <button type="button" class="btn btn-primary" data-dismiss="modal">cancel</button>
								        </div>
								      </div>
								      </form>
								    </div>
								  </div>
								  
								</div></td>
		     			 </tr>
		     			 <?php endforeach; ?>
		     			 </tbody>	
	 				</table>
 				</div>			
			<?php $__env->stopSection(); ?>


<?php $__env->startSection('scriptjs'); ?>

			<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
  <script>
  $(function(){
    $("#example").dataTable();
  })
  </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>