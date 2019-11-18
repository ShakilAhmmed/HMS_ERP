<template>
	<div class="Ambulance">
		<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
            Add New Ambulance Call
      </button>
<form class="form-horizontal" @submit.prevent="AddAmbulance">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Ambulance Call</h5>
                      <button type="button" class="close" @click="Clearform" data-dismiss="modal" aria-label="Close">
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
                                                    <li><a data-action="reload" @click="Clearform"></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Ambulance Name</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" v-model="ambulancecallform.ambulance_id">
                                                        <option value=''>--Select--</option>
                                                        <option v-for="getambulnce in getallotmentdata.ambulance" v-text="getambulnce.vehicle_number" :value="getambulnce.ambulance_id" ></option>
                                                    </select>
                                                    <span class="text-danger"  v-if="Allerror.ambulance_id" v-text="Allerror.ambulance_id[0]"></span>

                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-lg-3 control-label">Patient Name</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" v-model="ambulancecallform.patient_id">
                                                        <option value=''>--Select--</option>
                                                        <option v-for="getpatient in getallotmentdata.user" v-text="getpatient.users_name" :value="getpatient.users_id" ></option>
                                                    </select>
                                                    <span class="text-danger"  v-if="Allerror.patient_id" v-text="Allerror.patient_id[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">From</label>
                                                <div class="col-lg-9">
                                                    <textarea class="form-control" v-model="ambulancecallform.from" placeholder="From"></textarea>
                                                    <span class="text-danger"  v-if="Allerror.from" v-text="Allerror.from[0]"></span>
                                                </div>
                                            </div>

                                              <div class="form-group">
                                                <label class="col-lg-3 control-label">To</label>
                                                <div class="col-lg-9">
                                                    <textarea class="form-control" v-model="ambulancecallform.to" placeholder="To"></textarea>
                                                    <span class="text-danger"  v-if="Allerror.to" v-text="Allerror.to[0]"></span>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-lg-3 control-label">Amount</label>
                                                <div class="col-lg-9">
                                                <input type="text" v-model="ambulancecallform.amount" placeholder="Amount" class="form-control" >
                                                 <span class="text-danger"  v-if="Allerror.amount" v-text="Allerror.amount[0]"></span>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-lg-3 control-label">Contact</label>
                                                <div class="col-lg-9">
                                                   <input type="text" v-model="ambulancecallform.contact_no" placeholder="Contact" class="form-control" >
                                                    <span class="text-danger"  v-if="Allerror.contact_no" v-text="Allerror.contact_no[0]"></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" @click="Clearform" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit"  class="btn btn-success">Save</button>
                  </div>

              </div>
          </div>
        </div>
    </form>
   <br><br>
   <form class="form-horizontal" @submit.prevent="Updateambulance ">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update  {{Editambulanceform.vehicle_number}} Ambulance Call</h5>
                      <button type="button" class="close" @click="Clearform" data-dismiss="modal" aria-label="Close">
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
                                                    <li><a data-action="reload" @click="Clearform"></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Ambulance Name</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" v-model="Editambulanceform.ambulance_id">
                                                        <option value=''>--Select--</option>
                                                        <option v-for="getambulnce in getallotmentdata.ambulance" v-text="getambulnce.vehicle_number" :value="getambulnce.ambulance_id" ></option>
                                                    </select>
                                                    <span class="text-danger"  v-if="Allerror.ambulance_id" v-text="Allerror.ambulance_id[0]"></span>

                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-lg-3 control-label">Patient Name</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" v-model="Editambulanceform.patient_id">
                                                        <option value=''>--Select--</option>
                                                        <option v-for="getpatient in getallotmentdata.user" v-text="getpatient.users_name" :value="getpatient.users_id" ></option>
                                                    </select>
                                                    <span class="text-danger"  v-if="Allerror.patient_id" v-text="Allerror.patient_id[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">From</label>
                                                <div class="col-lg-9">
                                                    <textarea class="form-control" v-model="Editambulanceform.from" placeholder="From"></textarea>
                                                    <span class="text-danger"  v-if="Allerror.from" v-text="Allerror.from[0]"></span>
                                                </div>
                                            </div>

                                              <div class="form-group">
                                                <label class="col-lg-3 control-label">To</label>
                                                <div class="col-lg-9">
                                                    <textarea class="form-control" v-model="Editambulanceform.to" placeholder="To"></textarea>
                                                    <span class="text-danger"  v-if="Allerror.to" v-text="Allerror.to[0]"></span>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-lg-3 control-label">Amount</label>
                                                <div class="col-lg-9">
                                                <input type="text" v-model="Editambulanceform.amount" placeholder="Amount" class="form-control" >
                                                 <span class="text-danger"  v-if="Allerror.amount" v-text="Allerror.amount[0]"></span>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-lg-3 control-label">Contact</label>
                                                <div class="col-lg-9">
                                                   <input type="text" v-model="Editambulanceform.contact_no" placeholder="Contact" class="form-control" >
                                                    <span class="text-danger"  v-if="Allerror.contact_no" v-text="Allerror.contact_no[0]"></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" @click="Clearform" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                		<li><a data-action="reload" @click="Clearform"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
                <div id="DataTables_Table_2_filter" class="dataTables_filter  margin-0">
                  <select class="form-control" @change="getambulancedata" >
                      <option v-for="row in select_row" v-text="row"></option>
                  </select>
              </div>
              <div id="DataTables_Table_2_filter" class="dataTables_filter">
                  <label>
                      <input type="search" v-model="search" @keyup="getambulancedata" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_2">
                  </label>
              </div>
			</div>



			<table class="table datatable-pagination">
				<thead>
					<tr>
						<th>Sl No</th>
						<th>Ambulance Name</th>
						<th>Patient Name</th>
						<th>From</th>
                        <th>To</th>
                        <th>Amount</th>
                        <th>Contact Number</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr  v-for="(ambulance,index) in  ambulancelist.data" :key="index">
						<td v-text="index+1"></td>
						<td>{{ambulance.vehicle_number}}</td>
						<td>{{ambulance.users_name}}</td>
						<td>{{ambulance.from}}</td>
                        <td>{{ambulance.to  }}</td>
                        <td>{{ambulance.amount}}</td>
                        <td>{{ambulance.contact_no}}</td>
						<td class="text-center">
                        <button class="btn btn-danger" @click="Deleteambulancelist(ambulance.ambulancecall_id,index)"><i class="fa fa-trash" aria-hidden="true"></i></button>

                        <button class="btn btn-info" @click="Editambulancelist(ambulance.ambulancecall_id,ambulance)" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
						</td>
					</tr>


				</tbody>
			</table>
            <pagination :data="ambulancelist"  :limit=3 @pagination-change-page="getambulancedata">
                            <span slot="prev-nav">&lt; Previous</span>
                            <span slot="next-nav">Next &gt;</span>
            </pagination>
		</div>
	</div>
</template>

<script>
	export default {
        name:"Ambulance",
        data(){
        	return {
        		getallotmentdata:[],
                ambulancelist:{},
        		ambulancecallform:{
        			ambulance_id:'',
        			patient_id:'',
        			from:'',
        			to:'',
        			amount:'',
        			contact_no:''
        		},
                Editambulanceform:{
                    ambulance_id:'',
                    patient_id:'',
                    from:'',
                    to:'',
                    amount:'',
                    contact_no:''
                },
        		Allerror:[],
                search:'',
                custom_row:10,
                select_row:[10,20,30,40,50]
        	}
        },

        methods:{

            AddAmbulance:function(){
                const _this=this;
                this.axios.post(this.baseUrl+'ambulancecall',_this.ambulancecallform)
                .then((response)=>{
                    if(response.data.status==200)
                    {
                        this.$toastr.success('Ambulance Call Added Successfully', 'Success');
                        _this.ambulancelist.data.push(response.data.data)
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
            Deleteambulancelist:function(id,index){
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
                            this.axios.delete(this.baseUrl+'ambulancecall/'+id)
                            .then((response)=>{
                                if(response.data.status==200)
                                {
                                    _this.ambulancelist.data.splice(index,1);
                                    swal.fire(
                                      'Deleted!',
                                      'Ambulance Call Hasbeen Deleted',
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
            Editambulancelist:function(id,data){
                const _this=this;
                _this.Editambulanceform.ambulancecall_id=id;
                _this.Editambulanceform=data;
            },
            Updateambulance:function(event){
                const _this=this;
                this.axios.put(this.baseUrl+'ambulancecall/'+_this.Editambulanceform.ambulancecall_id,_this.Editambulanceform)
                .then((response)=>{
                    if(response.data.status==201)
                    {
                        this.$toastr.success('Ambulance Updated Successfully', 'Success');
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
            getambulancedata:function(page=1,custom_row=10){
                const _this=this;
                const main_url=base_path+'ambulancecall?q='+_this.search+'&page='+page+'&row='+_this.custom_row;
                this.axios.get(main_url)
                .then((response)=>{
                    _this.ambulancelist = response.data
                })
                .catch((error)=>{
                    console.error();
                })
            },
        	getambulance:function(){
        		const _this=this;
        		this.axios.get(this.baseUrl+'get_ambulance_data')
        		.then((response)=>{
        			_this.getallotmentdata = response.data;
        			console.log(response.data);
        		})
        		.catch((error)=>{
        			console.error();
        		})
        	},
        	Clearform:function(){
        		const _this=this;
        		_this.Allerror=[];
        		_this.ambulancecallform.ambulance_id='';
        		_this.ambulancecallform.patient_id='';
        		_this.ambulancecallform.from='';
        		_this.ambulancecallform.to='';
        		_this.ambulancecallform.amount='';
        		_this.ambulancecallform.contact_no='';

        	}
        },
		 
        mounted(){
            this.LoadingStatus();
            this.getambulance();
            this.getambulancedata();
        },
	}
</script>