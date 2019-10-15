<template>
	<div class="Bed">
		 <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
            Add New Bed
      </button>
<form class="form-horizontal" @submit.prevent="Addbed">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Bed</h5>
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
                                                <label class="col-lg-3 control-label">Bed Number</label>
                                                <div class="col-lg-9">
                                                    <input type="text" v-model="Bedform.bed_number"  class="form-control" placeholder="Enter Title" >
                                                    <span class="text-danger"  v-if="Allerror.bed_number" v-text="Allerror.bed_number[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Description:</label>
                                                <div class="col-lg-9">
                                                    <textarea v-model="Bedform.description"  class="form-control"></textarea>
                                                    <span class="text-danger"  v-if="Allerror.description" v-text="Allerror.description[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Status:</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" v-model="Bedform.status">
                                                        <option value=''>--Select--</option>
                                                        <option value='1'>Active</option>
                                                        <option value="2">Inactive</option>
                                                    </select>
                                                  <span class="text-danger"  v-if="Allerror.status" v-text="Allerror.status[0]"></span>

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
   <form class="form-horizontal" @submit.prevent="UpdateSubmit">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit {{ EditBedform.bed_number }} Bed</h5>
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
                                                <label class="col-lg-3 control-label">Bed Number</label>
                                                <div class="col-lg-9">
                                                    <input type="text" v-model="EditBedform.bed_number"  class="form-control" placeholder="Enter Title" >
                                                    <span class="text-danger"  v-if="Allerror.bed_number" v-text="Allerror.bed_number[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Description:</label>
                                                <div class="col-lg-9">
                                                    <textarea v-model="EditBedform.description"  class="form-control"></textarea>
                                                    <span class="text-danger"  v-if="Allerror.description" v-text="Allerror.description[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Status:</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" v-model="EditBedform.status">
                                                        <option value=''>--Select--</option>
                                                        <option value='1'>Active</option>
                                                        <option value="2">Inactive</option>
                                                    </select>
                                                  <span class="text-danger"  v-if="Allerror.status" v-text="Allerror.status[0]"></span>

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
                		<li><a data-action="reload" @click=""></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>



			<table class="table datatable-pagination">
				<thead>
					<tr>
						<th>Sl No</th>
						<th>Bed Number</th>
						<th>Description</th>
						 
						<th>Status</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr  v-for="(bed,index) in  Bedlist.data" :key="index">
						<td v-text="index+1"></td>
						<td>{{ bed.bed_number }}</td>
						<td>{{ bed.description }}</td>
						<td>
                            <span  v-if="bed.status==1"  class='text-success'>Active</span>
                            <span  v-else  class='text-danger'>Inactive</span>
                        </td>
						<td class="text-center">
                            <button class="btn btn-danger" @click="DeleteBed(bed.bed_id,index)" ><i class="fa fa-trash" aria-hidden="true"></i></button>

                            <button  v-if="bed.status==1"  class="btn btn-success" @click="BedStatusChange(bed.bed_id)" ><i class="fa fa-refresh" aria-hidden="true"></i>
                            </button>

                             <button v-else class="btn btn-primary" @click="BedStatusChange(bed.bed_id)" ><i class="fa fa-refresh" aria-hidden="true"></i>
                            </button>

                            <button class="btn btn-info" data-toggle="modal" data-target="#editModal" @click="EditBed(bed.bed_id,bed)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
						</td>
					</tr>


				</tbody>
			</table>
            <pagination :data="Bedlist"  :limit=3 @pagination-change-page="GetBedList">
                            <span slot="prev-nav">&lt; Previous</span>
                            <span slot="next-nav">Next &gt;</span>
            </pagination>
		</div>
 </div>
</template>

<script>
	export default {
        name:"Bed",
		data(){
			return {
                Bedlist:{},
				Bedform:{
					bed_number:'',
					description:'',
					status:''
				},
                EditBedform:{
                    bed_number:'',
                    description:'',
                    status:''
                },
				Allerror:[],
			}
		},
		

		methods:{
            GetBedList:function(page=1){
                const _this=this;
                this.axios.get(this.baseUrl+'bed?page='+page)
                .then((response)=>{
                    console.log(response);
                    _this.Bedlist=response.data;
                    
                })
                .catch((error)=>{
                    console.log(error)
                })
            },
			Addbed:function(){
				const _this=this;
				this.axios.post(this.baseUrl+'bed',_this.Bedform)
				.then((response)=>{
                    console.log(response.data.status);
					if(response.data.status==200)
					{
						this.$toastr.success('Bed Added Successfully', 'Success');
                         _this.Bedlist.data.push(response.data.data);
                        $(".close").click();
                        this.Clearform();
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
            BedStatusChange:function(id){
                const _this=this;
                this.axios.get(this.baseUrl+'bed/'+id)
                .then((response)=>{
                    if(response.data.status===200)
                    {
                        this.$toastr.success('Bed Status Changed Into Active', 'Success');
                    }
                    if(response.data.status===202)
                    {
                        this.$toastr.success('Bed Status Changed Into InActive', 'Success');
                    }
                })
                .catch((error)=>{
                    console.log(error)
                })
                this.LoadingStatus();
                this.GetBedList();
            },
            DeleteBed:function(id,index){
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
                            this.axios.delete(this.baseUrl+'bed/'+id)
                            .then((response)=>{
                            if(response.data.status===200)
                            {
                                _this.Bedlist.data.splice(index,1);
                                    swal.fire(
                                      'Deleted!',
                                      'Bed Hasbeen Deleted',
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
            EditBed:function(id,data){
                const _this=this;
                _this.EditBedform.bed_id=id;
                _this.EditBedform=data;
            },
            UpdateSubmit:function(event){
                const _this=this;
                this.axios.put(this.baseUrl+'bed/'+_this.EditBedform.bed_id,_this.EditBedform)
                .then((response)=>{
                    if(response.data.status==201)
                        {
                            this.$toastr.success('Bed Edited Successfully', 'Success');
                            $(".close").click();
                            _this.Clearform();
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
			Clearform:function()
            {
				const _this=this;
				_this.Allerror=[];
				_this.Bedform.bed_number='';
				_this.Bedform.description='';
				_this.Bedform.status='';
   			}
		},
        mounted(){
            this.LoadingStatus();
            this.GetBedList();
        },
	}
</script>