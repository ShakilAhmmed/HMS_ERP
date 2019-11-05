<template>
	<div>
		<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
            Add New Ambulance
      </button>
<form class="form-horizontal" @submit.prevent="AddAmbulance">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Ambulance</h5>
                      <button type="button" class="close" @click="ClearForm" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                            <div class="col-lg-12">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="reload" @click="ClearForm"></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Vehicle Number:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" v-model="Ambulanceform.vehicle_number" placeholder="Vehicle Number" class="form-control" >
                                                    <span class="text-danger"  v-if="Allerror.vehicle_number" v-text="Allerror.vehicle_number[0]"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Vehicle Mode:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" v-model="Ambulanceform.vehicle_mode" placeholder="Vehicle Mode" class="form-control" >
                                                    <span class="text-danger"  v-if="Allerror.vehicle_mode" v-text="Allerror.vehicle_mode[0]"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Year Made:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" placeholder="Year Made" v-model="Ambulanceform.year_made" class="form-control" >
                                                    <span class="text-danger"  v-if="Allerror.year_made" v-text="Allerror.year_made[0]"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Driver Name:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" placeholder="Driver Name" v-model="Ambulanceform.driver_name" class="form-control" >
                                                    <span class="text-danger"  v-if="Allerror.driver_name" v-text="Allerror.driver_name[0]"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Driver Contact:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" placeholder="Driver Contact" v-model="Ambulanceform.driver_contact" class="form-control" >
                                                    <span class="text-danger"  v-if="Allerror.driver_contact" v-text="Allerror.driver_contact[0]"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Driver License:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" placeholder="Driver License" v-model="Ambulanceform.driver_license" class="form-control" >
                                                    <span class="text-danger"  v-if="Allerror.driver_license" v-text="Allerror.driver_license[0]"></span>
                                                </div>
                                            </div>

                                           <div class="form-group">
                                                <label class="col-lg-3 control-label">Vehicle Type:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" placeholder="Vehicle Type" v-model="Ambulanceform.vehicle_type" class="form-control" >
                                                    <span class="text-danger"  v-if="Allerror.vehicle_type" v-text="Allerror.vehicle_type[0]"></span>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" @click="ClearForm" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit"  class="btn btn-success">Save</button>
                  </div>

              </div>
          </div>
        </div>
    </form>
   <br><br>
   <form class="form-horizontal" @submit.prevent="UpdateAmbulance">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit {{ EditAmbulanceform.vehicle_number }} Ambulance</h5>
                      <button type="button" class="close" @click="" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                            <div class="col-lg-12">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="reload" @click="ClearForm"></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Vehicle Number:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" v-model="EditAmbulanceform.vehicle_number" placeholder="Vehicle Number" class="form-control" >
                                                    <span class="text-danger"  v-if="Allerror.vehicle_number" v-text="Allerror.vehicle_number[0]"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Vehicle Mode:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" v-model="EditAmbulanceform.vehicle_mode" placeholder="Vehicle Mode" class="form-control" >
                                                    <span class="text-danger"  v-if="Allerror.vehicle_mode" v-text="Allerror.vehicle_mode[0]"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Year Made:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" placeholder="Year Made" v-model="EditAmbulanceform.year_made" class="form-control" >
                                                    <span class="text-danger"  v-if="Allerror.year_made" v-text="Allerror.year_made[0]"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Driver Name:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" placeholder="Driver Name" v-model="EditAmbulanceform.driver_name" class="form-control" >
                                                    <span class="text-danger"  v-if="Allerror.driver_name" v-text="Allerror.driver_name[0]"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Driver Contact:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" placeholder="Driver Contact" v-model="EditAmbulanceform.driver_contact" class="form-control" >
                                                    <span class="text-danger"  v-if="Allerror.driver_contact" v-text="Allerror.driver_contact[0]"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Driver License:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" placeholder="Driver License" v-model="EditAmbulanceform.driver_license" class="form-control" >
                                                    <span class="text-danger"  v-if="Allerror.driver_license" v-text="Allerror.driver_license[0]"></span>
                                                </div>
                                            </div>

                                           <div class="form-group">
                                                <label class="col-lg-3 control-label">Vehicle Type:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" placeholder="Vehicle Type" v-model="EditAmbulanceform.vehicle_type" class="form-control" >
                                                    <span class="text-danger"  v-if="Allerror.vehicle_type" v-text="Allerror.vehicle_type[0]"></span>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" @click="" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                		<li><a data-action="reload" @click="ClearForm"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>



			<table class="table datatable-pagination">
				<thead>
					<tr>
						<th>Sl No</th>
						<th>Vehicle Number</th>
						<th>Vehicle Mode</th>
						<th>Year Made</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr  v-for="(ambulance,index) in ambulancelist.data" :key="index" >
						<td v-text="index+1"></td>
						<td>{{ambulance.vehicle_number}}</td>
						<td>{{ambulance.vehicle_mode}}</td>
						<td>{{ambulance.year_made}}</td>
						<td class="text-center">
                            <button class="btn btn-danger" @click="Deleteambulance(ambulance.ambulance_id,index)" ><i class="fa fa-trash" aria-hidden="true"></i></button>

                            <button class="btn btn-info" data-toggle="modal" data-target="#editModal" @click="Editambulance(ambulance.ambulance_id,ambulance)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
						</td>
					</tr>


				</tbody>
			</table>
            <pagination :data="ambulancelist"  :limit=3 @pagination-change-page="Getambulancelist">
                            <span slot="prev-nav">&lt; Previous</span>
                            <span slot="next-nav">Next &gt;</span>
            </pagination>
		</div>
	</div>
</template>
<script>
	export default {
		mounted(){
			 this.LoadingStatus();
             this.Getambulancelist();
		},
        data(){
            return {
                ambulancelist:{},
                Ambulanceform:{
                    vehicle_number:'',
                    vehicle_mode:'',
                    year_made:'',
                    driver_name:'',
                    driver_contact:'',
                    driver_license:'',
                    vehicle_type:''
                },
                EditAmbulanceform:{
                    vehicle_number:'',
                    vehicle_mode:'',
                    year_made:'',
                    driver_name:'',
                    driver_contact:'',
                    driver_license:'',
                    vehicle_type:''
                },
                Allerror:[],
            }
        },
        methods:{
            Getambulancelist:function(page = 1){
                const _this=this;
                this.axios.get(this.baseUrl+'ambulance?page='+page)
                .then((response)=>{
                    _this.ambulancelist=response.data;
                    console.log(response.data)
                })
                .catch((error)=>{
                        console.log(error)
                })
            },
            AddAmbulance:function(){
            const _this=this;
            this.axios.post(this.baseUrl+'ambulance',_this.Ambulanceform)
            .then((response)=>{
                if(response.data.status==200)
                {
                    this.$toastr.success('Notice Added Successfully', 'Success');
                     _this.ambulancelist.data.push(response.data.data);
                    $(".close").click();
                    _this.ClearForm();
                    this.LoadingStatus();
                }
                else
                {
                    this.Allerror=response.data.errors;
                }
            })
            .catch((error)=>{
                console.log(error)
            })
         },
         Deleteambulance:function(id,index){
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
                if (result.value) {
                    this.axios.delete(this.baseUrl+'ambulance/'+id)
                    .then((response)=>{
                    if(response.data.status===200)
                    {
                        _this.ambulancelist.data.splice(index,1);
                            swal.fire(
                              'Deleted!',
                              'Ambulance Hasbeen Deleted',
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
         Editambulance:function(id,data){
            const _this=this;
            _this.EditAmbulanceform.ambulance_id=id;
            _this.EditAmbulanceform=data;
         },
         UpdateAmbulance:function(event){
             const _this=this;
             this.axios.put(this.baseUrl+'ambulance/'+_this.EditAmbulanceform.ambulance_id,_this.EditAmbulanceform)
                 .then((response)=>{
                    console.log(response);
                    if(response.data.status==201)
                    {
                        this.$toastr.success('Ambulance Edited Successfully', 'Success');
                        $(".close").click();
                        _this.ClearForm();
                        this.LoadingStatus();
                    }
                    else
                    {
                        _this.Allerror=response.data.errors;
                    }
                    })
                    .catch((error)=>{
                        console.log(error)
                    })
         },
         ClearForm:function(){
            const _this=this;
            _this.Allerror=[];
            _this.Ambulanceform.vehicle_number='';
            _this.Ambulanceform.vehicle_mode='';
            _this.Ambulanceform.year_made='';
            _this.Ambulanceform.driver_name='';
            _this.Ambulanceform.driver_contact='';
            _this.Ambulanceform.driver_license='';
            _this.Ambulanceform.vehicle_type='';
        }
        },
        
    }
	
</script>