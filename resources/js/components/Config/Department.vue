<template>
  <div class="department">
      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
            Add New Department
      </button>
<form class="form-horizontal" @submit.prevent="AddDepartment">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Department</h5>
                      <button type="button" class="close" @click="ClearForm" data-dismiss="modal" aria-label="Close">
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
                                                    <li><a data-action="reload" @click="ClearForm"></a></li>
                                                </ul>
                                            </div>

                                        </div>

                                        <div class="panel-body">

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Department Name:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" v-model="DepartmentForm.department_name" class="form-control" placeholder="Enter Department Name" >
                                                    <span class="text-danger" v-if="AllError.department_name" v-text="AllError.department_name[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Description:</label>
                                                <div class="col-lg-9">
                                                    <textarea v-model="DepartmentForm.description" class="form-control"></textarea>
                                                    <span class="text-danger" v-if="AllError.description" v-text="AllError.description[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Status:</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" v-model="DepartmentForm.status">
                                                        <option value=''>--Select--</option>
                                                        <option value='1'>Active</option>
                                                        <option value="2">Inactive</option>
                                                    </select>
                                                    <span class="text-danger" v-if="AllError.status" v-text="AllError.status[0]"></span>

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


        <form class="form-horizontal" @submit.prevent="UpdateDepartment">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit {{  EditDepartmentForm.department_name }} Department</h5>
                      <button type="button" class="close" @click="ClearForm" data-dismiss="modal" aria-label="Close">
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
                                                    <li><a data-action="reload" @click="ClearForm"></a></li>
                                                </ul>
                                            </div>

                                        </div>

                                        <div class="panel-body">

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Department Name:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" v-model="EditDepartmentForm.department_name" class="form-control" placeholder="Enter Department Name" >
                                                    <span class="text-danger" v-if="AllError.department_name" v-text="AllError.department_name[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Description:</label>
                                                <div class="col-lg-9">
                                                    <textarea v-model="EditDepartmentForm.description" class="form-control"></textarea>
                                                    <span class="text-danger" v-if="AllError.description" v-text="AllError.description[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Status:</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" v-model="EditDepartmentForm.status">
                                                        <option value=''>--Select--</option>
                                                        <option value='1'>Active</option>
                                                        <option value="2">Inactive</option>
                                                    </select>
                                                    <span class="text-danger" v-if="AllError.status" v-text="AllError.status[0]"></span>

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


        <div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title"></h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload" @click="GetDepartmentList"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
                            <div id="DataTables_Table_2_filter" class="dataTables_filter  margin-0">
                                <select class="form-control" @change="GetDepartmentList" v-model="custom_row">
                                    <option v-for="row in select_row" v-text="row"></option>
                                </select>
                            </div>
                            <div id="DataTables_Table_2_filter" class="dataTables_filter">
                                <label>
                                    <input type="search" v-model="search" @keyup="GetDepartmentList" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_2">
                                </label>
                            </div>

						</div>



						<table class="table datatable-pagination">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>Department Name</th>
									<th>Description</th>
									<th>Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(department_list,index) in DepartmentList.data" :key="index">
									<td v-text="index+1"></td>
									<td>{{department_list.department_name}}</td>
									<td>{{department_list.description | readMore(10,'...')}}</td>
									<td>
                                        <span  v-if="department_list.status==1" class='text-success'>Active</span>
                                        <span  v-else class='text-danger'>Inactive</span>
                                    </td>
									<td class="text-center">
                                        <button class="btn btn-danger" @click="DeleteDepartment(department_list.departments_id,index)"><i class="fa fa-trash" aria-hidden="true"></i></button>

                                        <button v-if="department_list.status==1" class="btn btn-success" @click="StatusChange(department_list.departments_id)">
                                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                        </button>

                                         <button v-else class="btn btn-primary" @click="StatusChange(department_list.departments_id)">
                                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                        </button>

                                        <button class="btn btn-info" data-toggle="modal" data-target="#editModal"  @click="EditDepartment(department_list.departments_id,department_list)">
                                               <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
									</td>
								</tr>


							</tbody>
						</table>
                        <pagination :data="DepartmentList"  :limit=3 @pagination-change-page="GetDepartmentList">
                                        <span slot="prev-nav">&lt; Previous</span>
                                        <span slot="next-nav">Next &gt;</span>
                        </pagination>
					</div>

  </div>
</template>
<script>
    export default{
        name:"Department",
        data(){
            return {
                DepartmentList:{},
                DepartmentForm:{
                    department_name: '',
                    description: '',
                    status: ''
                },
                EditDepartmentForm:{
                    departments_id: '',
                    department_name: '',
                    description: '',
                    status: ''
                },
                AllError:[],
                search:'',
                custom_row:10,
                select_row:[10,20,30,40,50]
            }
        },
        methods:{
            GetDepartmentList(page = 1,custom_row=10)
            {
                const _this=this;
                const main_url=base_path+'department?q='+_this.search+'&page='+page+'&row='+_this.custom_row;
                console.log(main_url);
                this.axios.get(main_url)
                .then((response)=>{
                    _this.DepartmentList=response.data;
                    console.log(response.data)
                })
                .catch((error)=>{
						console.log(error)
				})
            },
            AddDepartment:function(){

                const _this=this;
                this.axios.post(base_path+'department',_this.DepartmentForm)
                .then((response)=>{
                    if(response.data.status==201)
                    {
                        this.$toastr.success('Department Added Successfully', 'Success');
                        _this.DepartmentList.data.push(response.data.data);
                        $(".close").click();
                        _this.ClearForm();
                        this.LoadingStatus();
                    }
                    else
                    {
                        _this.AllError=response.data.errors;
                    }

                })
                .catch((error)=>{
                    console.log(error)
                })
            },
            ClearForm:function()
    		{
    			const _this=this;
    			_this.AllError=[];
    			_this.DepartmentForm.department_name='';
    			_this.DepartmentForm.description='';
    			_this.DepartmentForm.status='';
    		},
            DeleteDepartment:function(id,index){

                    const _this=this;

                    swal.fire({
                      title: 'Are you sure?',
                      text: "You won't be able to revert this!",
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.value) {
                        this.axios.delete(base_path+'department/'+id)
                        .then((response)=>{
                            console.log(response);
                            if(response.data.status===200)
                            {
                                _this.DepartmentList.data.splice(index,1);
                                    swal.fire(
                                      'Deleted!',
                                      'Department Hasbeen Deleted',
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
            StatusChange:function(id){
                const _this=this;
                this.axios.get(base_path+'department/'+id)
                .then((response)=>{
                    if(response.data.status===200)
                    {
                         this.$toastr.success('Department Status Changed Into Active', 'Success');
                    }

                     if(response.data.status===202)
                    {
                        this.$toastr.warning('Department Status Changed Into Inactive', 'Success');
                    }
                    _this.LoadingStatus();
                    _this.GetDepartmentList();

                })
                .catch((error)=>{
                     console.log(error);
                })
            },
            EditDepartment:function(id,data){
                const _this=this;
                _this.EditDepartmentForm.departments_id=id;
                _this.EditDepartmentForm=data;
            },
            UpdateDepartment:function(event){
                const _this=this;
                this.axios.put(base_path+'department/'+_this.EditDepartmentForm.departments_id,_this.EditDepartmentForm)
                .then((response)=>{

                        if(response.data.status==201)
                        {
                            this.$toastr.success('Department Edited Successfully', 'Success');
                            //_this.DepartmentList.data.push(response.data.data);
                            $(".close").click();
                            _this.ClearForm();
                            this.LoadingStatus();
                        }
                        else
                        {
                            _this.AllError=response.data.errors;
                        }
                })
                .catch((error)=>{
                    console.log(error)
                })
            }
        },
        mounted(){
            this.LoadingStatus();
            this.GetDepartmentList();
        }
    }
</script>
