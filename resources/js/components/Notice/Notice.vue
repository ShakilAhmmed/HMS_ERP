<template>
	<div class="notice">
		 <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
            Add New Notice
      </button>
<form class="form-horizontal" @submit.prevent="AddNotice">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Notice</h5>
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
                                                <label class="col-lg-3 control-label">Title</label>
                                                <div class="col-lg-9">
                                                    <input type="text" v-model="Noticeform.title"  class="form-control" placeholder="Enter Title" >
                                                    <span class="text-danger"  v-if="Allerror.title" v-text="Allerror.title[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Description:</label>
                                                <div class="col-lg-9">
                                                    <textarea v-model="Noticeform.description"  class="form-control"></textarea>
                                                    <span class="text-danger"  v-if="Allerror.description" v-text="Allerror.description[0]"></span>

                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-lg-3 control-label">Start Date</label>
                                                <div class="col-lg-9">
                                                    <input type="Date" v-model="Noticeform.start_date"  class="form-control" placeholder="Enter Start Date" >
                                                   <span class="text-danger"  v-if="Allerror.start_date" v-text="Allerror.start_date[0]"></span>

                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-lg-3 control-label">End Date</label>
                                                <div class="col-lg-9">
                                                    <input type="Date" v-model="Noticeform.end_date" class="form-control" placeholder="Enter End Date">
                                                    <span class="text-danger"  v-if="Allerror.end_date" v-text="Allerror.end_date[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Status:</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" v-model="Noticeform.status">
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
        <form class="form-horizontal" @submit.prevent="UpdateNotice">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit {{ EditNoticeform.title }} Notice</h5>
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
                                                <label class="col-lg-3 control-label">Title</label>
                                                <div class="col-lg-9">
                                                    <input type="text" v-model="EditNoticeform.title"  class="form-control" placeholder="Enter Title" >
                                                    <span class="text-danger"  v-if="Allerror.title" v-text="Allerror.title[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Description:</label>
                                                <div class="col-lg-9">
                                                    <textarea v-model="EditNoticeform.description"  class="form-control"></textarea>
                                                    <span class="text-danger"  v-if="Allerror.description" v-text="Allerror.description[0]"></span>

                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-lg-3 control-label">Start Date</label>
                                                <div class="col-lg-9">
                                                    <input type="Date" v-model="EditNoticeform.start_date"  class="form-control" placeholder="Enter Start Date" >
                                                   <span class="text-danger"  v-if="Allerror.start_date" v-text="Allerror.start_date[0]"></span>

                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-lg-3 control-label">End Date</label>
                                                <div class="col-lg-9">
                                                    <input type="Date" v-model="EditNoticeform.end_date" class="form-control" placeholder="Enter End Date">
                                                    <span class="text-danger"  v-if="Allerror.end_date" v-text="Allerror.end_date[0]"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Status:</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" v-model="EditNoticeform.status">
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
                		<li><a data-action="reload" @click="Getnoticelist"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>



			<table class="table datatable-pagination">
				<thead>
					<tr>
						<th>Sl No</th>
						<th>Title</th>
						<th>Description</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Status</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(notice,index) in Noticelist.data" :key="index" >
						<td v-text="index+1"></td>
						<td>{{ notice.title }}</td>
						<td>{{ notice.description }}</td>
						<td>{{ notice.start_date }}</td>
						<td>{{ notice.end_date }}</td>
						<td>
                            <span  v-if="notice.status==1"  class='text-success'>Active</span>
                            <span  v-else  class='text-danger'>Inactive</span>
                        </td>
						<td class="text-center">
                            <button class="btn btn-danger" @click="DeleteNotice(notice.notice_id,index)"><i class="fa fa-trash" aria-hidden="true"></i></button>

                            <button v-if="notice.status==1"  class="btn btn-success" @click="ChangeStatus(notice.notice_id)"><i class="fa fa-refresh" aria-hidden="true"></i>
                            </button>

                             <button v-else class="btn btn-primary" @click="ChangeStatus(notice.notice_id)"><i class="fa fa-refresh" aria-hidden="true"></i>
                            </button>

                            <button class="btn btn-info" data-toggle="modal" data-target="#editModal" @click="Editnotice(notice.notice_id,notice)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
						</td>
					</tr>


				</tbody>
			</table>
            <pagination :data="Noticelist"  :limit=3 @pagination-change-page="Getnoticelist">
                            <span slot="prev-nav">&lt; Previous</span>
                            <span slot="next-nav">Next &gt;</span>
            </pagination>
		</div>
	</div>
</template>

<script>
	export default {
		name:"notice",
		data(){
			return {
				Noticelist:{},
				Noticeform:{
					title:'',
					description:'',
					start_date:'',
					end_date:'',
					status:''
				},
                EditNoticeform:{
                    title:'',
                    description:'',
                    start_date:'',
                    end_date:'',
                    status:''
                },
				Allerror:[],
			}
		},

		methods:{
			Getnoticelist:function(page = 1){
				const _this=this;
				this.axios.get(this.baseUrl+'holidaynotice?page='+page)
                .then((response)=>{
                    _this.Noticelist=response.data;
                    console.log(response.data)
                })
                .catch((error)=>{
						console.log(error)
				})
			},
    		AddNotice:function(){
    			const _this=this;
    			this.axios.post(this.baseUrl+'holidaynotice',_this.Noticeform)
    			.then((response)=>{
    				console.log(response.data.errors);
                    if(response.data.status==200)
                    {
                        this.$toastr.success('Notice Added Successfully', 'Success');
                        _this.Noticelist.data.push(response.data.data);
                        $(".close").click();
                        _this.Clearform();
                        console.log(response.data);
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
            ChangeStatus:function(id){
                const _this=this;
                this.axios.get(this.baseUrl+'holidaynotice/'+id)
                .then((response)=>{
                    if(response.data.status===200)
                    {
                        this.$toastr.success('Notice Status Changed Into Active', 'Success');
                    }
                    if(response.data.status===202)
                    {
                        this.$toastr.success('Notice Status Changed Into Inactive', 'Success');
                    }
                    _this.LoadingStatus();
                    _this.Getnoticelist();
                })
                .catch((error)=>{
                    console.log(error)
                })
            },
            DeleteNotice:function(id,index){
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
                            this.axios.delete(this.baseUrl+'holidaynotice/'+id)
                            .then((response)=>{
                            console.log(response);
                            if(response.data.status===200)
                            {
                                _this.Noticelist.data.splice(index,1);
                                    swal.fire(
                                      'Deleted!',
                                      'Notice Hasbeen Deleted',
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
            Editnotice:function(id,data){
                const _this=this;
                _this.EditNoticeform.notice_id=id;
                _this.EditNoticeform=data;
            },
            UpdateNotice:function(event){
                const _this=this;
                this.axios.put(this.baseUrl+'holidaynotice/'+_this.EditNoticeform.notice_id,_this.EditNoticeform)
                .then((response)=>{
                        if(response.data.status==201)
                        {
                            this.$toastr.success('Notice Edited Successfully', 'Success');
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
    		Clearform:function()
    		{
    			const _this=this;
    			_this.Allerror=[];
    			_this.Noticeform.title='';
    			_this.Noticeform.description='';
    			_this.Noticeform.start_date='';
    			_this.Noticeform.end_date='';
    			_this.Noticeform.status='';
    		},
    	},
    	mounted(){
			this.LoadingStatus();
			this.Getnoticelist();
		},
    	
	}
</script>