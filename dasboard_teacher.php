<?php include('session.php'); ?>
<?php include('header_dashboard.php'); ?>


<?php include('teacher_sidebar.php'); ?>
    <body id="class_div">
	
		<div id="timer"></div> 

	<section class="home">
		
        <div class="container-fluid">
            <div class="row-fluid">
			
				
				<a  class="muted pull-right"><button tabindex="-1" title="You can Create your Class here" href="#myModal1" class="btn-info pull-right" data-toggle="modal">Create Class</button>
						<?php include('create_teacher_class.php'); ?>		
</a>
                <div class="span9" id="content">
					
                     <div class="row-fluid ">
					    <!-- breadcrumb -->	
					     <ul class="breadcrumb ">
								<?php
								error_reporting(0);
								$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
								$school_year_query_row = mysqli_fetch_array($school_year_query);
								$school_year = $school_year_query_row['school_year'];
								?>
								
								<li><b>My Class</b><span class="divider">/</span></li>
								<li>School Year: <?php echo $school_year_query_row['school_year']; ?><span class="divider">/</span></li>
								<li> Semester: </li>
								
							
							</ul>
					
						 <!-- end breadcrumb -->
                        <!-- block -->
						
                        <div class="block">
								<div class="navbar navbar-inner block-header">
									<div id="count_class" class="muted pull-right">
									<?php $query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_id = '$session_id' and school_year = '$school_year' ")or die(mysqli_error());
										$count = mysqli_num_rows($query);
					$count = mysqli_num_rows($query);
		            ?>
									
												<span title="Numbers of Class" class="badge badge-info "><?php echo $count; ?></span>
								</div>
								</div>
                            <div class="block-content collapse in">
                                <div class="span12">
										<?php include('teacher_class.php'); ?>
                                </div>
                            </div>
                        </div>
</div>
</div>
                        <!-- /block -->

						<div class="span3" id="content">

						<div class="block1">
								<div class="navbar navbar-inner block1-header"> <center> <h4>TO DO LIST </h4> </center> </div>
                            <div class="block1-content collapse in">
								<div class="span12">
								<div class="task-input">
										<input type="text" placeholder="Add a New Task + Enter">
								</div>
									<div class="controls">
										<div class="filters">
											<span class="active" id="all">All</span>
											<span id="completed">Completed</span>
											<button class="clear-btn">Clear All</button>
										</div>
										
									</div>
										<ul class="task-box"></ul>
								</div>
								
								<script>
																			const taskInput = document.querySelector(".task-input input"),
											filters = document.querySelectorAll(".filters span"),
											clearAll = document.querySelector(".clear-btn"),
											taskBox = document.querySelector(".task-box");

											let editId,
											isEditTask = false,
											todos = JSON.parse(localStorage.getItem("todo-list"));

											filters.forEach((btn) => {
											btn.addEventListener("click", () => {
												document.querySelector("span.active").classList.remove("active");
												btn.classList.add("active");
												showTodo(btn.id);
											});
											});

											showTodo("all");

											function showTodo(filter) {
											let liTag = "";
											if (todos) {
												todos.forEach((todo, id) => {
												let completed = todo.status == "completed" ? "checked" : "";
												if (filter == todo.status || filter == "all") {
													liTag += `<li class="task">
																		<label for="${id}">
																			<input onclick="updateStatus(this)" type="checkbox" id="${id}" ${completed}>
																			<p class="${completed}">${todo.name}</p>
																		</label>
																		<div class="settings">
																			<i onclick="showMenu(this)" class="uil uil-ellipsis-h"></i>
																			<ul class="task-menu">
																				<li onclick='editTask(${id}, "${todo.name}")'><i class="uil uil-pen"></i>Edit</li>
																				<li onclick='deleteTask(${id}, "${filter}")'><i class="uil uil-trash"></i>Delete</li>
																			</ul>
																		</div>
																	</li>`;
												}
												});
											}
											taskBox.innerHTML = liTag || `<span>You don't have any task here</span>`;
											let checkTask = taskBox.querySelectorAll(".task");
											!checkTask.length
												? clearAll.classList.remove("active")
												: clearAll.classList.add("active");
											taskBox.offsetHeight >= 300
												? taskBox.classList.add("overflow")
												: taskBox.classList.remove("overflow");
											}

											function showMenu(selectedTask) {
											let menuDiv = selectedTask.parentElement.lastElementChild;
											menuDiv.classList.add("show");
											document.addEventListener("click", (e) => {
												if (e.target.tagName != "I" || e.target != selectedTask) {
												menuDiv.classList.remove("show");
												}
											});
											}

											function updateStatus(selectedTask) {
											let taskName = selectedTask.parentElement.lastElementChild;
											if (selectedTask.checked) {
												taskName.classList.add("checked");
												todos[selectedTask.id].status = "completed";
											} else {
												taskName.classList.remove("checked");
												todos[selectedTask.id].status = "pending";
											}
											localStorage.setItem("todo-list", JSON.stringify(todos));
											}

											function editTask(taskId, textName) {
											editId = taskId;
											isEditTask = true;
											taskInput.value = textName;
											taskInput.focus();
											taskInput.classList.add("active");
											}

											function deleteTask(deleteId, filter) {
											isEditTask = false;
											todos.splice(deleteId, 1);
											localStorage.setItem("todo-list", JSON.stringify(todos));
											showTodo(filter);
											}

											clearAll.addEventListener("click", () => {
											isEditTask = false;
											todos.splice(0, todos.length);
											localStorage.setItem("todo-list", JSON.stringify(todos));
											showTodo();
											});

											taskInput.addEventListener("keyup", (e) => {
											let userTask = taskInput.value.trim();
											if (e.key == "Enter" && userTask) {
												if (!isEditTask) {
												todos = !todos ? [] : todos;
												let taskInfo = { name: userTask, status: "pending" };
												todos.push(taskInfo);
												} else {
												isEditTask = false;
												todos[editId].name = userTask;
												}
												taskInput.value = "";
												localStorage.setItem("todo-list", JSON.stringify(todos));
												showTodo(document.querySelector("span.active").id);
											}
											});
											</script>
								 			
								</div>
                            </div>
                        </div>
					
                    
									<script type="text/javascript">
									$(document).ready( function() {
										$('.remove').click( function() {
										var id = $(this).attr("id");
											$.ajax({
											type: "POST",
											url: "delete_class.php",
											data: ({id: id}),
											cache: false,
											success: function(html){
											$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
											$('#'+id).modal('hide');
											$.jGrowl("Your Class is Successfully Deleted", { header: 'Class Delete' });
											}
											}); 	
											return false;
										});				
									});
									
									</script>
								
                </div>
			
				
            </div>
			
			
        </div>
		
		<?php include('script.php'); ?>
		</section>
		<script src="timeout_long.js"></script>
		
    </body>
</html>