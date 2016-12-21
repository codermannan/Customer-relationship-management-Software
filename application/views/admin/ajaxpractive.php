<div class="row">
<div class="col-lg-12"> 
<div class="search-result-box m-t-40">
        <div class="row">
        <div class="col-sm-12">
                <div class="card-box">
                        <?php echo form_open_multipart('admin/gSearch', array("class"=>"form-horizontal data-parsley-validate novalidate","id"=>"comment","autocomplete"=>"off"));?>
                        <label for="roll">Student Roll Number</label>
                        <input type="text" id="txtRoll" value="" name="roll"/>

                        <label for="Name">Students Name</label>
                        <input type="text" id="txtName" value="" name="name"/>

                        <label for="Phone">Phone Number</label>
                        <input type="text" id="txtPhone" value="" name="phone"/>

                        <input type="submit" name="submit" value="Insert New Students"  />

                        <?php echo '</form>'; ?>
                </div>
        </div>
</div>
</div>
</div>
</div>
<script>
   $(function(){
       $("#comment").submit(function(){
         dataString = $("#comment").serialize();
 
         $.ajax({
           type: "POST",
           url: "<?php echo base_url(); ?>index.php/admin/gSearch",
           data: dataString,
 
           success: function(data){
               console.log(data);
//               alert('Successful!);
           }
 
         });
 
         return false;  //stop the actual form post !important!
 
      });
   });
</script>

        