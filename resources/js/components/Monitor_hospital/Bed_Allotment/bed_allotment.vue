<template>
	<div class="BedAllotment">
		 <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
            Add New Bed Allotment
      </button>
<form class="form-horizontal" @submit.prevent="AddBedAllotment">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Bed Allotment</h5>
                      <button type="button" class="close" @click="Clearfrom" data-dismiss="modal" aria-label="Close">
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
                                                    <li><a data-action="reload" @click="Clearfrom"></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Patient Name</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" v-model="bedallotmentform.patient_id">
                                                        <option value=''>--Select--</option>
                                                        <option v-for="getpatient in getallotmentdata.user" v-text="getpatient.users_name" :value="getpatient.users_id" ></option>
                                                    </select>
                                                    <span class="text-danger"  v-if="Allerror.patient_id" v-text="Allerror.patient_id[0]"></span>

                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-lg-3 control-label">Bed Number</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" v-model="bedallotmentform.bed_id">
                                                        <option value=''>--Select--</option>
                                                        <option v-for="getbed in getallotmentdata.bed" v-text="getbed.bed_number" :value="getbed.bed_id"></option>
                                                    </select>
                                                    <span class="text-danger"  v-if="Allerror.bed_id" v-text="Allerror.bed_id[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Allotment Time</label>
                                                <div class="col-lg-9">
                                                    <input type="datetime-local" v-model="bedallotmentform.allotment_time" class="form-control">
                                                    <span class="text-danger"  v-if="Allerror.allotment_time" v-text="Allerror.allotment_time[0]"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Discharge Time</label>
                                                <div class="col-lg-9">
                                                    <input type="datetime-local" v-model="bedallotmentform.discharge_time" class="form-control">
                                                    <span class="text-danger"  v-if="Allerror.discharge_time" v-text="Allerror.discharge_time[0]"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" @click="Clearfrom" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit"  class="btn btn-success">Save</button>
                  </div>

              </div>
          </div>
        </div>
    </form>
   <br><br>
   <form class="form-horizontal" @submit.prevent="UpdateBedAllotment">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update Bed Allotment</h5>
                      <button type="button" class="close" @click="Clearfrom" data-dismiss="modal" aria-label="Close">
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
                                                    <li><a data-action="reload" @click="Clearfrom"></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Patient Name</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" v-model="Editbedallotmentform.patient_id">
                                                        <option value=''>--Select--</option>
                                                        <option v-for="getpatient in getallotmentdata.user" v-text="getpatient.users_name" :value="getpatient.users_id" ></option>
                                                    </select>
                                                    <span class="text-danger"  v-if="Allerror.patient_id" v-text="Allerror.patient_id[0]"></span>

                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-lg-3 control-label">Bed Number</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" v-model="Editbedallotmentform.bed_id">
                                                        <option value=''>--Select--</option>
                                                        <option v-for="getbed in getallotmentdata.bed" v-text="getbed.bed_number" :value="getbed.bed_id"></option>
                                                    </select>
                                                    <span class="text-danger"  v-if="Allerror.bed_id" v-text="Allerror.bed_id[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Allotment Time</label>
                                                <div class="col-lg-9">
                                                    <input type="datetime" v-model="Editbedallotmentform.allotment_time" class="form-control">
                                                    <span class="text-danger"  v-if="Allerror.allotment_time" v-text="Allerror.allotment_time[0]"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Discharge Time</label>
                                                <div class="col-lg-9">
                                                    <input type="datetime" v-model="Editbedallotmentform.discharge_time" class="form-control">
                                                    <span class="text-danger"  v-if="Allerror.discharge_time" v-text="Allerror.discharge_time[0]"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" @click="Clearfrom" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit"  class="btn btn-success">Save</button>
                  </div>

              </div>
          </div>
        </div>
    </form>
   <div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title"></h5>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload" @click="Clearfrom"></a></li>
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
					<tr  v-for="(allotment,index) in  allotmentlist.data" :key="index">
						<td v-text="index+1"></td>
						<td>{{ allotment.users_name }}</td>
						<td>{{ allotment.bed_number }}</td>
						<td>{{ allotment.allotment_time |timeformat }}</td>
						<td>{{ allotment.discharge_time |timeformat }}</td>
						<td class="text-center">
                            <button class="btn btn-danger" @click="Deletebedallotment(allotment.bedallotment_id,index)" ><i class="fa fa-trash" aria-hidden="true"></i></button>

                            <button class="btn btn-info" data-toggle="modal" data-target="#editModal" @click="Editbedallotment(allotment.bedallotment_id,allotment)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
						</td>
					</tr>


				</tbody>
			</table>
            <pagination :data="allotmentlist"  :limit=3  @pagination-change-page="getbedallotment">
                            <span slot="prev-nav">&lt; Previous</span>
                            <span slot="next-nav">Next &gt;</span>
            </pagination>
		</div>
</div>
</template>

<script>
	export default {
		name:"BedAllotment",
		mounted(){
            this.LoadingStatus();
            this.getallotment();
            this.getbedallotment();
        },
		data(){
			return{

				getallotmentdata:[],
				allotmentlist:{},
				bedallotmentform:{
					patient_id:'',
					bed_id:'',
					allotment_time:'',
					discharge_time:''
				},
				Editbedallotmentform:{
					bedallotment_id:'',
					patient_id:'',
					bed_id:'',
					allotment_time:'',
					discharge_time:''
				},
				Allerror:[],
				
			}
		},
		

        methods:{
        	getallotment:function(){
        		const _this=this;
        		this.axios.get(this.baseUrl+'get_data')
        		.then((response)=>{
        			_this.getallotmentdata = response.data;
        			console.log(response.data);
        		})
        		.catch((error)=>{
        			console.error();
        		})
        	},
        	getbedallotment:function(page=1){
        		const _this=this;
        		this.axios.get(this.baseUrl+'bedallotment?page'+page)
        		.then((response)=>{
        			_this.allotmentlist = response.data
        		})
        		.catch((error)=>{
        			console.error();
        		})
        	},
        	AddBedAllotment:function(){
        		const _this=this;
        		this.axios.post(this.baseUrl+'bedallotment',_this.bedallotmentform)
        		.then((response)=>{
        			if(response.data.status==200)
        			{
        				this.$toastr.success('Bed Allotment Added Successfully', 'Success');
        				_this.allotmentlist.data.push(response.data.data)
        				$(".close").click();
        				this.Clearfrom();
        				this.LoadingStatus();
        			}
        			else
        			{
        				_this.Allerror=response.data.errors;
        			}
        		})
        		.catch((error)=>{
        			console.log(error);
        		})
        	},
        	Deletebedallotment:function(id,index){
        		const _this=this;
                    swal.fire({
                      title: 'Are you sure?',
                      text: "You won't be able to revert this!",
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!' 
                    })
                    .then((result)=>{
                    	if(result.value){
                    		this.axios.delete(this.baseUrl+'bedallotment/'+id)
                    		.then((response)=>{
                    			if(response.data.status==200)
                    			{
                    				_this.allotmentlist.data.splice(index,1);
                    				swal.fire(
                                      'Deleted!',
                                      'BedAllotment Hasbeen Deleted',
                                      'success'
                                    )
                    			}
                    			if(response.data.status===400)
	                            {
	                                swal.fire("Opps","Something Went Wrong","warning");
	                            }
                    		})
                    		.catch((error)=>{
                            	console.log(error)
	                        })
	                    	}
                    })
        	},
        	Editbedallotment:function(id,data){
        		const _this=this;
                _this.Editbedallotmentform.bedallotment_id=id;
                _this.Editbedallotmentform=data;
        	},
        	UpdateBedAllotment:function(event){
        		const _this=this;
        		this.axios.put(this.baseUrl+'bedallotment/'+_this.Editbedallotmentform.bedallotment_id,_this.Editbedallotmentform)
        		.then((response)=>{
        			if(response.data.status==201)
        			{
        				this.$toastr.success('Bed Edited Successfully', 'Success');
        				$(".close").click();
        				this.Clearfrom();
        				this.LoadingStatus();
        			}
        			else
        			{
        				_this.Allerror=response.data.errors;
        			}
        		})
        		.catch((error)=>{
        			console.log(error);
        		})
        	},
        	Clearfrom:function(){
        		const _this=this;
        		_this.Allerror=[];
        		_this.bedallotmentform.patient_id='';
        		_this.bedallotmentform.bed_id='';
        		_this.bedallotmentform.allotment_time='';
        		_this.bedallotmentform.discharge_time='';
        	}
        }
	}
</script>