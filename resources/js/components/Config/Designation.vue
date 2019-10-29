<template>
  <div class="designation">
      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
            Add New Designation
      </button>
<form class="form-horizontal" @submit.prevent="AddDesignation">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Designation</h5>
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
                                                <label class="col-lg-3 control-label">Designation Name:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" v-model="DesignationForm.designation_name" class="form-control" placeholder="Enter Designation Name" >
                                                    <span class="text-danger" v-if="AllError.designation_name" v-text="AllError.designation_name[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Description:</label>
                                                <div class="col-lg-9">
                                                    <textarea v-model="DesignationForm.description" class="form-control"></textarea>
                                                    <span class="text-danger" v-if="AllError.description" v-text="AllError.description[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Status:</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" v-model="DesignationForm.status">
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
         <form class="form-horizontal" @submit.prevent="UpdateDesignation">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit {{  EditDesignationForm.designation_name }} Designation</h5>
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
                                                <label class="col-lg-3 control-label">Designation Name:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" v-model="EditDesignationForm.designation_name" class="form-control" placeholder="Enter Designation Name" >
                                                    <span class="text-danger" v-if="AllError.designation_name" v-text="AllError.designation_name[0]"></span>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Description:</label>
                                                <div class="col-lg-9">
                                                    <textarea v-model="EditDesignationForm.description" class="form-control"></textarea>
                                                    <span class="text-danger" v-if="AllError.description" v-text="AllError.description[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Status:</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" v-model="EditDesignationForm.status">
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
                		<li><a data-action="reload" @click="GetDesignationList"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
              <div id="DataTables_Table_2_filter" class="dataTables_filter  margin-0">
                  <select class="form-control" @change="GetDesignationList" v-model="custom_row">
                      <option v-for="row in select_row" v-text="row"></option>
                  </select>
              </div>
              <div id="DataTables_Table_2_filter" class="dataTables_filter">
                  <label>
                      <input type="search" v-model="search" @keyup="GetDesignationList" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_2">
                  </label>
              </div>
			</div>



			<table class="table datatable-pagination">
				<thead>
					<tr>
						<th>Sl No</th>
						<th>Designation Name</th>
						<th>Description</th>
						<th>Status</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(designationlist,index) in DesignationList.data" :key="index">
						<td v-text="index+1"></td>
						<td>{{designationlist.designation_name}}</td>
						<td>{{designationlist.description | readMore(10,'...')}}</td>
						<td>
                            <span  v-if="designationlist.status==1" class='text-success'>Active</span>
                            <span  v-else class='text-danger'>Inactive</span>
                        </td>
						<td class="text-center">
                            <button class="btn btn-danger" @click="DeleteDesignation(designationlist.designation_id,index)"><i class="fa fa-trash" aria-hidden="true"></i></button>

                            <button v-if="designationlist.status==1" class="btn btn-success" @click="StatusChange(designationlist.designation_id)"><i class="fa fa-refresh" aria-hidden="true"></i>
                            </button>

                             <button v-else class="btn btn-primary" @click="StatusChange(designationlist.designation_id)"><i class="fa fa-refresh" aria-hidden="true"></i>
                            </button>

                            <button class="btn btn-info" data-toggle="modal" data-target="#editModal" @click="EditDesignation(designationlist.designation_id,designationlist)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
						</td>
					</tr>


				</tbody>
			</table>
            <pagination :data="DesignationList"  :limit=3 @pagination-change-page="GetDesignationList">
                            <span slot="prev-nav">&lt; Previous</span>
                            <span slot="next-nav">Next &gt;</span>
            </pagination>
		</div>

  </div>
</template>
<script>
    export default{
        name:"Designation",
        data(){
            return {
                DesignationList:{},
                DesignationForm:{
                    designation_name: '',
                    description: '',
                    status: ''
                },
                 EditDesignationForm:{
                    designation_id: '',
                    designation_name: '',
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
            GetDesignationList(page = 1,custom_row=10)
            {
                const _this=this;
                const main_url=base_path+'designation?q='+_this.search+'&page='+page+'&row='+_this.custom_row;
                this.axios.get(main_url)
                .then((response)=>{
                    _this.DesignationList=response.data;
                })
                .catch((error)=>{
        						console.log(error)
        				})
            },
            AddDesignation:function(){

                const _this=this;
                this.axios.post(base_path+'designation',_this.DesignationForm)
                .then((response)=>{
                    if(response.data.status==200)
                    {
                        this.$toastr.success('Designation Added Successfully', 'Success');
                        _this.DesignationList.data.push(response.data.data);
                        $(".close").click();
                        _this.ClearForm();
                        console.log(response.data)
                        this.LoadingStatus();
                    }
                    else
                    {
                        this.AllError=response.data.errors;
                    }

                })
                .catch((error)=>{
                    console.log(error)
                })
            },
            StatusChange:function(id){
                const _this=this;
                this.axios.get(base_path+'designation/'+id)
                .then((response)=>{
                    if(response.data.status===200)
                    {
                         this.$toastr.success('Designation Status Changed Into Active', 'Success');
                    }

                     if(response.data.status===202)
                    {
                        this.$toastr.warning('Designation Status Changed Into Inactive', 'Success');
                    }
                    _this.LoadingStatus();
                    _this.GetDesignationList();

                })
                .catch((error)=>{
                     console.log(error);
                })
            },
            EditDesignation:function(id,data){
                const _this=this;
                _this.EditDesignationForm.designation_id=id;
                _this.EditDesignationForm=data;
            },
            UpdateDesignation:function(event){
                const _this=this;
                this.axios.put(base_path+'designation/'+_this.EditDesignationForm.designation_id,_this.EditDesignationForm)
                .then((response)=>{

                        if(response.data.status==201)
                        {
                            this.$toastr.success('Designation Edited Successfully', 'Success');
                            _this.DesignationList.data.push(response.data.data);
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
            DeleteDesignation:function(id,index){
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
                        this.axios.delete(base_path+'designation/'+id)
                        .then((response)=>{
                            console.log(response);
                            if(response.data.status===200)
                            {
                                _this.DesignationList.data.splice(index,1);
                                    swal.fire(
                                      'Deleted!',
                                      'Designation Hasbeen Deleted',
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
            ClearForm:function()
    		{
    			const _this=this;
    			_this.AllError=[];
    			_this.DesignationForm.designation_name='';
    			_this.DesignationForm.description='';
    			_this.DesignationForm.status='';
    		},
            UpdateDesignation:function(event){
                const _this=this;
                this.axios.put(this.baseUrl+'designation/'+_this.EditDesignationForm.designation_id,_this.EditDesignationForm)
                .then((response)=>{

                        if(response.data.status==201)
                        {
                            this.$toastr.success('Designation Edited Successfully', 'Success');
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
    },

	mounted(){
        this.LoadingStatus();
        this.GetDesignationList();
    },
}
</script>
