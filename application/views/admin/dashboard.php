<div class="row">
    <div class="col-lg-12"> 
          <div class="search-result-box m-t-40">
                                	<ul class="nav nav-tabs">
	                                    <li class="active"> 
	                                        <a href="#today" data-toggle="tab" aria-expanded="false"> 
	                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
	                                            <span class="hidden-xs"><b>DUE TODAY</b> <span class="badge badge-pink m-l-10">9</span> </span> 
	                                        </a> 
	                                    </li> 
	                                    
	                                    <li class=""> 
	                                        <a href="#tomorrow" data-toggle="tab" aria-expanded="false"> 
	                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
	                                            <span class="hidden-xs"><b>DUE TOMORROW</b> <span class="badge badge-info m-l-10">8</span> </span> 
	                                        </a> 
	                                    </li> 
                                            <li class=""> 
	                                        <a href="#nextw" data-toggle="tab" aria-expanded="false"> 
	                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
	                                            <span class="hidden-xs"><b>DUE NEXT WEEK</b> <span class="badge badge-info m-l-10">6</span> </span> 
	                                        </a> 
	                                    </li> 
                                            <li class=""> 
	                                        <a href="#nextm" data-toggle="tab" aria-expanded="false"> 
	                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
	                                            <span class="hidden-xs"><b>DUE NEXT MONTH</b> <span class="badge badge-info m-l-10">7</span> </span> 
	                                        </a> 
	                                    </li> 
	                                </ul> 
	                                <div class="tab-content">
	                                    <!-- Users tab -->
	                                    <div class="tab-pane active" id="today"> 
	                                    	<div class="row">
							<div class="col-sm-12">
								<div class="card-box">
									<div class="row">
										<div class="col-lg-12">
                                                                                    <div class="p-20">
                                                                                        <div class="">
                                                                                            <table class="table m-0">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                            <th>Sl#</th>
                                                                                                            <th>Title</th>
                                                                                                            <th>Start Date</th>
                                                                                                            <th>Due Date</th>
                                                                                                            <th>Assigned To</th>
                                                                                                            <th>Status</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php if(isset($todo)): $sl=1; foreach ($todo as $valt):?>
                                                                                                    <tr>
                                                                                                        <?php if(date('Y-m-d', time())==$valt['due_date']):?>
                                                                                                            <th scope="row"><?php echo $sl;?></th>
                                                                                                            <td><?php echo $valt['title'];?></td>
                                                                                                            <td><?php echo $valt['start_date'];?></td>
                                                                                                            <td><?php echo $valt['due_date'];?></td>
                                                                                                            <td><?php echo $valt['assignedto'];?></td>
                                                                                                            <td>
                                                                                                            <?php 
                                                                                                                if(date('Y-m-d',time())>$value['due_date']):
                                                                                                                    echo '<div class="label label-table label-warning">Incompleted</div>';
                                                                                                                elseif($valt['status']==1):
                                                                                                                    echo '<div class="label label-table label-default">In Progress</div>';
                                                                                                                elseif($valt['status']==2):
                                                                                                                    echo '<div class="label label-table label-inverse">On Hold</div>';
                                                                                                                elseif($valt['status']==3):
                                                                                                                    echo '<div class="label label-table label-success">Completed</div>';
                                                                                                                elseif($valt['status']==4):
                                                                                                                    echo '<div class="label label-table label-danger">Cancelled</div>';
                                                                                                                endif;
                                                                                                             ?>
                                                                                                            </td>
                                                                                                          <?php endif;?>  
                                                                                                    </tr>
                                                                                                    <?php $sl++; endforeach; endif;?>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>

										</div>
										
									</div>
								</div>
							</div>
						</div>							
	                                    </div> 
	                                    <!-- end Users tab -->
	                                    
	                                    <div class="tab-pane" id="tomorrow">
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box">
									<div class="row">
										<div class="col-lg-12">
											<div class="p-20">
												<div class="">
													<table class="table m-0">
                                                                                                            <thead>
                                                                                                                <tr>
                                                                                                                        <th>Sl#</th>
                                                                                                                        <th>Title</th>
                                                                                                                        <th>Start Date</th>
                                                                                                                        <th>Due Date</th>
                                                                                                                        <th>Assigned To</th>
                                                                                                                        <th>Status</th>
                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php if(isset($todo)): $slm=1; foreach ($todo as $valm):?>
                                                                                                                <tr>
                                                                                                                <?php if(date('Y-m-d', strtotime('+1 day', time()))==$valm['due_date']):?>
                                                                                                                        <th scope="row"><?php echo $slm;?></th>
                                                                                                                        <td><?php echo $valm['title'];?></td>
                                                                                                                        <td><?php echo $valm['start_date'];?></td>
                                                                                                                        <td><?php echo $valm['due_date'];?></td>
                                                                                                                        <td><?php echo $valm['assignedto'];?></td>
                                                                                                                        <td>
                                                                                                                        <?php 
                                                                                                                            if(date('Y-m-d',time())>$valm['due_date']):
                                                                                                                                echo '<div class="label label-table label-warning">Incompleted</div>';
                                                                                                                            elseif($valm['status']==1):
                                                                                                                                echo '<div class="label label-table label-default">In Progress</div>';
                                                                                                                            elseif($valm['status']==2):
                                                                                                                                echo '<div class="label label-table label-inverse">On Hold</div>';
                                                                                                                            elseif($valm['status']==3):
                                                                                                                                echo '<div class="label label-table label-success">Completed</div>';
                                                                                                                            elseif($valm['status']==4):
                                                                                                                                echo '<div class="label label-table label-danger">Cancelled</div>';
                                                                                                                            endif;
                                                                                                                         ?>
                                                                                                                        </td>
                                                                                                                 <?php endif;?>       
                                                                                                                </tr>
                                                                                                                <?php $slm++; endforeach; endif;?>
                                                                                                            </tbody>
                                                                                                        </table>
												</div>
											</div>

										</div>
										
									</div>
								</div>
							</div>
						</div>					
					    </div> 
	                                    <div class="tab-pane" id="nextw">
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box">
									<div class="row">
										<div class="col-lg-12">
											<div class="p-20">
												<div class="">
													<table class="table m-0">
                                                                                                            <thead>
                                                                                                                <tr>
                                                                                                                        <th>Sl#</th>
                                                                                                                        <th>Title</th>
                                                                                                                        <th>Start Date</th>
                                                                                                                        <th>Due Date</th>
                                                                                                                        <th>Assigned To</th>
                                                                                                                        <th>Status</th>
                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php if(isset($todo)): $slw=1; foreach ($todo as $valw):?>
                                                                                                                <tr>
                                                                                                                    <?php if(date('W', time())+1== date("W", strtotime($valw['due_date']))):?>
                                                                                                                        <th scope="row"><?php echo $slw;?></th>
                                                                                                                        <td><?php echo $valw['title'];?></td>
                                                                                                                        <td><?php echo $valw['start_date'];?></td>
                                                                                                                        <td><?php echo $valw['due_date'];?></td>
                                                                                                                        <td><?php echo $valw['assignedto'];?></td>
                                                                                                                        <td>
                                                                                                                        <?php 
                                                                                                                            if(date('Y-m-d',time())>$valw['due_date']):
                                                                                                                                echo '<div class="label label-table label-warning">Incompleted</div>';
                                                                                                                            elseif($valw['status']==1):
                                                                                                                                echo '<div class="label label-table label-default">In Progress</div>';
                                                                                                                            elseif($valw['status']==2):
                                                                                                                                echo '<div class="label label-table label-inverse">On Hold</div>';
                                                                                                                            elseif($valw['status']==3):
                                                                                                                                echo '<div class="label label-table label-success">Completed</div>';
                                                                                                                            elseif($valw['status']==4):
                                                                                                                                echo '<div class="label label-table label-danger">Cancelled</div>';
                                                                                                                            endif;
                                                                                                                         ?>
                                                                                                                        </td>
                                                                                                                      <?php endif;?>
                                                                                                                </tr>
                                                                                                                <?php $slw++; endforeach; endif;?>
                                                                                                            </tbody>
                                                                                                               
                                                                                                        </table>
												</div>
											</div>

										</div>
										
									</div>
								</div>
							</div>
						</div>					
					    </div> 
                                            <div class="tab-pane" id="nextm">
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box">
									<div class="row">
										<div class="col-lg-12">
                                                                                    <div class="p-20">
                                                                                        <div class="">
													<table class="table m-0">
                                                                                                            <thead>
                                                                                                                <tr>
                                                                                                                        <th>Sl#</th>
                                                                                                                        <th>Title</th>
                                                                                                                        <th>Start Date</th>
                                                                                                                        <th>Due Date</th>
                                                                                                                        <th>Assigned To</th>
                                                                                                                        <th>Status</th>
                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php if(isset($todo)): $sl=1; foreach ($todo as $valn):?>
                                                                                                                <tr>
                                                                                                                <?php if(date('m',time())+1==date('m',  strtotime($valn['due_date']))):?>
                                                                                                                        <th scope="row"><?php echo $sl;?></th>
                                                                                                                        <td><?php echo $valn['title'];?></td>
                                                                                                                        <td><?php echo $valn['start_date'];?></td>
                                                                                                                        <td><?php echo $valn['due_date'];?></td>
                                                                                                                        <td><?php echo $valn['assignedto'];?></td>
                                                                                                                        <td>
                                                                                                                        <?php 
                                                                                                                            if(date('Y-m-d',time())>$valn['due_date']):
                                                                                                                                echo '<div class="label label-table label-warning">Incompleted</div>';
                                                                                                                            elseif($valn['status']==1):
                                                                                                                                echo '<div class="label label-table label-default">In Progress</div>';
                                                                                                                            elseif($valn['status']==2):
                                                                                                                                echo '<div class="label label-table label-inverse">On Hold</div>';
                                                                                                                            elseif($valn['status']==3):
                                                                                                                                echo '<div class="label label-table label-success">Completed</div>';
                                                                                                                            elseif($valn['status']==4):
                                                                                                                                echo '<div class="label label-table label-danger">Cancelled</div>';
                                                                                                                            endif;
                                                                                                                         ?>
                                                                                                                        </td>
                                                                                                                <?php endif;?>
                                                                                                                </tr>
                                                                                                                <?php $sl++; endforeach; endif;?>
                                                                                                            </tbody>
                                                                                                        </table>
												</div>
                                                                                    </div>

										</div>
										
									</div>
								</div>
							</div>
						</div>					
					    </div> 
	                                </div> 
                                </div>
    </div>
</div>
<div class="row">
        <!-- activities -->
        <div class="col-lg-4">
            <div class="card-box">
                <h4 class="m-t-0 m-b-20 header-title"><b>Last 20 Activities</b></h4>
                <div class="nicescroll mx-box" style="overflow: hidden;" tabindex="5001">
                    <ul class="list-unstyled transaction-list m-r-5">
                        <?php if(isset($activity)): foreach ($activity as $act):?>
                        <li>
                            <span><?php echo $act['description'].'<br/>'.$act['date'];?></span>
                            <span class="pull-right text-success tran-price"><?php echo $act['staffid'];?></span>
                            <span class="clearfix"></span>
                        </li>
                        <?php endforeach; endif;?>
                    </ul>
                </div>
            </div>
        </div> <!-- end col -->

        <!-- quotation -->
        <div class="col-lg-4">
            <div class="card-box">
                <h4 class="m-t-0 m-b-20 header-title"><b>Last 20 Quotation</b></h4>
                <div class="nicescroll mx-box" style="overflow: hidden;" tabindex="5001">
                    <ul class="list-unstyled transaction-list m-r-5">
                            <?php if(isset($quotation)): foreach ($quotation as $qt):?>
                            <li>
                                <a href="<?php echo base_url().'uploads/quotation/'.$qt['quotation_no'].'.pdf'?>" download="<?php $qt['quotation_no'];?>"><i class="ti-download text-success"></i></a>
                                <span class="tran-text"><?php echo $qt['quotation_no'];?></span>
                                <span class="pull-right text-muted"><?php echo $qt['exp_date'];?></span>
                                <span class="clearfix"></span>
                            </li>
                            <?php endforeach; endif;?>
                    </ul>
                </div>
            </div>
        </div>  <!-- end col-->

        <!-- Todos app -->
        <div class="col-lg-4">
                            	<div class="card-box">
									<h4 class="m-t-0 m-b-20 header-title"><b>Todo</b></h4>
									<div class="todoapp">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 id="todo-message"><span id="todo-remaining">2</span> of <span id="todo-total">6</span> remaining</h4>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="" class="pull-right btn btn-primary btn-sm waves-effect waves-light" id="btn-archive">Archive</a>
                                            </div>
                                        </div>

                                        <ul class="list-group no-margn nicescroll todo-list" style="height: 280px; overflow: hidden;" id="todo-list" tabindex="5003"><li class="list-group-item"><div class="checkbox checkbox-primary"><input class="todo-done" id="6" checked="" type="checkbox"><label for="6">Build an angular app</label></div></li><li class="list-group-item"><div class="checkbox checkbox-primary"><input class="todo-done" id="5" type="checkbox"><label for="5">Hehe!! This is looks cool!</label></div></li><li class="list-group-item"><div class="checkbox checkbox-primary"><input class="todo-done" id="4" checked="" type="checkbox"><label for="4">Testing??</label></div></li><li class="list-group-item"><div class="checkbox checkbox-primary"><input class="todo-done" id="3" checked="" type="checkbox"><label for="3">Creating component page</label></div></li><li class="list-group-item"><div class="checkbox checkbox-primary"><input class="todo-done" id="2" checked="" type="checkbox"><label for="2">Build a js based app</label></div></li><li class="list-group-item"><div class="checkbox checkbox-primary"><input class="todo-done" id="1" type="checkbox"><label for="1">Design One page theme</label></div></li></ul>

                                         <form name="todo-form" id="todo-form" role="form" class="m-t-20">
                                            <div class="row">
                                                <div class="col-sm-9 todo-inputbar">
                                                    <input id="todo-input-text" name="todo-input-text" class="form-control" placeholder="Add new todo" type="text">
                                                </div>
                                                <div class="col-sm-3 todo-send">
                                                    <button class="btn-primary btn-md btn-block btn waves-effect waves-light" type="button" id="todo-btn-submit">Add</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
								</div>

                            </div> <!-- end col -->
</div>