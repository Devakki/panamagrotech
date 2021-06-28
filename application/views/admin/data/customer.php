<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left"><?php echo $page_title; ?></h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Dashbord');?>"><?php echo COMPANY; ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Customer/index');?>"><?php echo $page_title; ?></a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card-box">
                  <h4 class="header-title m-t-0 text-center m-b-30"><?php echo (($method=="edit")?"Update":"Add")?> Customer</h4>
                  <form id="<?php echo (($method=="edit")?"$frm_id":"$frm_id");?>" class="form-horizontal" role="form" >
                      <div class="form-group row">
                          <label for="name" class="col-3 col-form-label">Customer Name<span class="text-danger">*</span></label>
                          <div class="col-9">
                              <input placeholder="Customer Name" type="text" name="name" title="Customer Name" required="" data-parsley-required-message="Customer Name is Required" class="form-control" autocomplete="off" value="<?php echo (($method=="edit")?$result->name:"");  ?>">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="gst_no" class="col-3 col-form-label">GST No.<span class="text-danger">*</span></label>
                          <div class="col-9">
                              <input placeholder="GST No" type="text" name="gst_no" title="GST No" required=""  class="form-control" data-parsley-length="[15,15]" data-parsley-length-message="Enter Valid GST No." autocomplete="off" value="<?php echo (($method=="edit")?$result->gst_no:"");  ?>">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="pan_no" class="col-3 col-form-label">Pan No.<span class="text-danger">*</span></label>
                          <div class="col-9">
                              <input placeholder="Pan No" type="text" name="pan_no" title="Pan No" required=""  class="form-control" autocomplete="off" value="<?php echo (($method=="edit")?$result->pan_no:"");  ?>">
                          </div>
                      </div>
                      <div class="form-group row row">
                          <label for="mobile" class="col-3 col-form-label">Mo. <span class="text-danger">*</span></label>
                          <div class="col-9">
                              <input placeholder="Mobile Number" type="number" name="mobile" title="Mobile Number" required="" data-parsley-required-message="Mobile Number is Required" data-parsley-length="[10,10]" class="form-control"  data-parsley-length-message="Enter Valid Mobile Number" autocomplete="off" value="<?php echo (($method=="edit")?$result->mobile:"");  ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                          <label for="address" class="col-3 col-form-label">Address<span class="text-danger">*</span></label>
                          <div class="col-9">            
                              <textarea required="" class="form-control parsley-error" style="min-height: 60px;" name="address" required="" data-parsley-required-message="Address is Required" placeholder="Address"><?php echo (($method=="edit")?$result->address:"");  ?></textarea> 
                          </div>          
                      </div>
                      <div class="form-group row">
                          <label for="city" class="col-3 col-form-label">City<span class="text-danger">*</span></label>
                          <div class="col-9">
                            <select  name="city_id" class="">
                              <option value="0">None</option>
                              <?php foreach ($city as $city) { ?>
                                <option value="<?php echo $city->id; ?>" <?php echo (($method=="edit")?(($city->id==$result->city_id)?"selected":""):"");  ?>> <?php echo $city->name; ?></option>   
                              <?php } ?>             
                            </select>
                          </div>          
                      </div>
                      <div class="form-group row">
                          <label for="state" class="col-3 col-form-label">State<span class="text-danger">*</span></label>
                          <div class="col-9">
                            <select  name="state_id" class="">
                              <option value="0">None</option>
                              <?php foreach ($state as $state) { ?>
                                <option value="<?php echo $state->id; ?>" <?php echo (($method=="edit")?(($state->id==$result->state_id)?"selected":""):"");  ?>> <?php echo $state->name; ?></option>  
                              <?php } ?>             
                            </select>
                          </div>          
                      </div>
                      <?php if($method=="edit"){?>
                      <div class="form-group row">
                          <label for="status" class="col-3 col-form-label">Status</label>
                          <div class="col-9">
                              <select class="selectpicker" name="status"  data-style="btn-custom">
                                  <option value="1" <?php echo (($method=="edit")?(($result->status=="1")?"selected":""):"");  ?>>Active</option>                
                                  <option value="0" <?php echo (($method=="edit")?(($result->status=="0")?"selected":""):"");  ?>>InActive</option>
                              </select>
                          </div>
                          <?php echo (($method=="edit")?'<input type="hidden" name="id" value="'.$result->id_customer.'">':""); ?>
                      </div>
                      <?php } ?>
                      <div class="form-group row m-t-40">
                          <div class="col-8 offset-4">
                              <button type="submit" class="btn btn-primary waves-effect waves-light">
                                  <?php echo (($method=="edit")?"Update":"Register")?>
                              </button>
                          </div>
                      </div>
                  </form>
                </div> 
            </div>
            <div class="col-md-8">
                <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Party Name</th>
                            <th>Mobile No.</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>GST No.</th>
                            <th>Pan No.</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>                    
    </div> 
</div> 
<script type="text/javascript">
  $(document).ready(function() {
  $('form').parsley();
  $("select").select2(); 
  var table = $('#datatable-buttons').DataTable({
          processing: true,
          serverSide: true,
          order: [],
          dom: 'Blfrtip',
          ajax: {
                 "url": "<?php echo base_url('Customer/getLists/'); ?>",
                 "type": "POST",
             },
          columnDefs: [{ "targets": [0],"orderable": false  }],
          buttons: ['print','copy', 'excel', 'colvis'],
          lengthChange: false,
    });
    $("#Add_frm").submit(function(event){
        event.preventDefault();
        var data=$(this).serialize();            
        $.ajax({
            url: "<?php echo base_url('Customer/create')?>",
            type: "POST",
            data: data,              
            success: function(result){
                var result  = JSON.parse(result);
                if(result.status=="success"){
                    swal("success",result.msg,"success","#4fa7f3");
                     $('#Add_frm')[0].reset();
                     table.ajax.reload();
                }else{
                    swal("error",result.msg,"warning","#4fa7f3");
                }
            }
        });
    });
     $("#Edit_frm").submit(function(event){
        event.preventDefault(); 
        var data=$(this).serialize();            
        $.ajax({
            url: "<?php echo base_url('Customer/update')?>",
            type: "POST",
            data: data,              
            success: function(result){
                var result  = JSON.parse(result);
                if(result.status=="success"){
                    swal("success",result.msg,"success","#4fa7f3").then(function () { 
                     window.location="<?php echo base_url("Customer");?>";            
                });
                }else{
                    swal("error",result.msg,"warning","#4fa7f3");
                }
            }
        });
    });
   $('#datatable-buttons').on('click', '[data-id=delete]', function () {                        
        var id= $(this).data("value");
        swal({
                title: 'Are you sure delete?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4fa7f3',
                cancelButtonColor: '#d57171',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
            $.ajax({
              type: "POST",
              url: "<?php echo base_url('Customer/delete/');?>"+id+"",
              success: function(data){
                var data  = JSON.parse(data);
                if(data.status=="success"){
                    swal("success",data.message,"success","#4fa7f3");
                   table.ajax.reload();
                }else{
                    swal("error",data.message,"warning","#4fa7f3");
                }              
              }
           })
        });
     });
 });
</script>
 