<template>
	<div class="BedAllotment">
		 <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
            Add New Bed Allotment
      </button>
<form class="form-horizontal">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Bed Allotment</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                            <div class="col-md-12">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="reload"></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Patient Name</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" >
                                                        <option value=''>--Select--</option>
                                                    </select>
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit"  class="btn btn-success">Save</button>
                  </div>

              </div>
          </div>
        </div>
    </form>
   <br><br>
   <div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title"></h5>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>



			<table class="table datatable-pagination">
				<thead>
					<tr>
						<th>Sl No</th>
						<th>Patient Name</th>
						<th>Bed Number</th>
						<th>Allotment Time</th>
						<th>Discharge Time</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td>Sss</td>
						<td>Sss</td>
						<td>Sss</td>
						<td>Sss</td>
						<td class="text-center">
                            <button class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i></button>

                            <button class="btn btn-info" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
						</td>
					</tr>


				</tbody>
			</table>

		</div>
</div>
</template>

<script>
	export default {
		name:"PatientAppointment",
		mounted(){
            console.log("PatientAppointment");
        }
	}
</script>