<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="row" style="margin-bottom: 10px;">        			
                <div class="col-sm-12">
                        <?php echo form_open_multipart('report/user_activity/search', array("class"=>"form-inline form-horizontal data-parsley-validate novalidate","autocomplete"=>"off"));?>
                                <div class="form-group m-r-10">
                                        <label for="User">User : </label>
                                        <select name="user" required="" class="form-control">
                                            <option value="">Please Select</option>
                                            <?php 
                                            if(isset($user)): 
                                                foreach ($user as $uval):
                                             ?>
                                            <option value="<?php echo $uval['user_id'];?>"><?php echo $uval['real_name'];?></option>
                                            <?php
                                                endforeach; 
                                            endif;
                                             ?>
                                         </select>
                                </div>
                                <div class="form-group m-r-10">
                                        <label for="FromDate">From :</label>
                                        <input type="text" name="from_date" required="" class="form-control datepickerFrom" placeholder="mm/dd/yyyy" data-parsley-id="10">
                                </div>
                                <div class="form-group m-r-10">
                                        <label for="Todate">To :</label>
                                        <input type="text" name="to_date" required="" class="form-control datepickerFrom" placeholder="mm/dd/yyyy" data-parsley-id="10">
                                </div>
                                <button class="btn btn-default waves-effect waves-light btn-md" type="submit">
                                        Submit
                                </button>
                        <?php echo form_close();?>
                </div>           			
            </div>
           <div style="height: 400px; overflow: hidden;" class="nicescroll" tabindex="5001">
                    <div class="table-responsive">
                        <table class="table table-actions-bar">	
                               <thead>
                                        <tr>
                                                <th>Quotation Sent</th>
                                                <th>Customer</th>
                                                <th>Signin Hours</th>
                                                <th>Expenses</th>
                                                <th>First Login</th>
                                                <th>Last Sign Out</th>
                                                <th>Login Hours</th>
                                                <th>Customer Viewed</th>
                                                <th>Login sessions</th>
                                                <th>Email sent</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sl=1;
//                                        if(isset($loghis)): 
//                                            foreach ($loghis as $lval):
//                                            $to_time = $lval['logout_date'];
//                                            $from_time = $lval['login_date'];
//                                            $signinhour  = round(abs($to_time - $from_time) / 60/60,2);
                                    ?>
                                        <tr>
                                                <td><?php echo $totalQto;?></td>
                                                <td><?php echo $totalCustomer;?></td>
                                                <td><?php echo $loghis;?></td>
                                                <td><?php echo $totalExpense;?></td>
                                                <td><?php echo date('d-m-Y H:i:s',$signintime['MIN(login_date)']);?></td>
                                                <td><?php echo date('d-m-Y H:i:s',$signintime['MAX(logout_date)']);?></td>
                                                <td><?php echo round(abs($signintime['MAX(logout_date)'] - $signintime['MIN(login_date)']) / 60/60,2);?></td>
                                                <td><?php echo $lval['login_session'];?></td>
                                                <td><?php echo $lval['login_session'];?></td>
                                                <td><?php echo $lval['login_session'];?></td>
                                        </tr>
                                    <?php
//                                            $sl++;
//                                            endforeach; 
//                                        endif;
                                     ?>
                               </tbody>
                         </table>
                    </div>
            </div>
        </div>
    </div>
</div>