<template>
<div class="operation">
      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
            Add New Operation
      </button>
<form class="form-horizontal" @submit.prevent="AddOperation">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Operation</h5>
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
                                          <label class="col-lg-3 control-label">Operation Name:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="OperationForm.operation_name" class="form-control" placeholder="Enter Operation Name" >
                                              <span class="text-danger" v-if="AllError.operation_name" v-text="AllError.operation_name[0]"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Operation Type:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="OperationForm.operation_type" class="form-control" placeholder="Enter Operation Type" >
                                              <span class="text-danger" v-if="AllError.operation_type" v-text="AllError.operation_type[0]"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Amount:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="OperationForm.amount" class="form-control" placeholder="Enter Operation Type" >
                                              <span class="text-danger" v-if="AllError.amount" v-text="AllError.amount[0]"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Description:</label>
                                          <div class="col-lg-9">
                                              <textarea v-model="OperationForm.description" class="form-control"></textarea>
                                              <span class="text-danger" v-if="AllError.description" v-text="AllError.description[0]"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Status:</label>
                                          <div class="col-lg-9">
                                              <select class="form-control" v-model="OperationForm.status">
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
    <form class="form-horizontal" @submit.prevent="UpdateOperation">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit {{  OperationForm.operation_name }} Operation</h5>
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
                                            <label class="col-lg-3 control-label">Operation Name:</label>
                                            <div class="col-lg-9">
                                                <input type="text" v-model="EditOperationForm.operation_name" class="form-control" placeholder="Enter Operation Name" >
                                                <span class="text-danger" v-if="AllError.operation_name" v-text="AllError.operation_name[0]"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Operation Type:</label>
                                            <div class="col-lg-9">
                                                <input type="text" v-model="EditOperationForm.operation_type" class="form-control" placeholder="Enter Operation Type" >
                                                <span class="text-danger" v-if="AllError.operation_type" v-text="AllError.operation_type[0]"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Amount:</label>
                                            <div class="col-lg-9">
                                                <input type="text" v-model="EditOperationForm.amount" class="form-control" placeholder="Enter Operation Type" >
                                                <span class="text-danger" v-if="AllError.amount" v-text="AllError.amount[0]"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Description:</label>
                                            <div class="col-lg-9">
                                                <textarea v-model="EditOperationForm.description" class="form-control"></textarea>
                                                <span class="text-danger" v-if="AllError.description" v-text="AllError.description[0]"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Status:</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" v-model="EditOperationForm.status">
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
    <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title"></h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
              <li><a data-action="reload" @click="GetOperationList"></a></li>
              <li><a data-action="close"></a></li>
            </ul>
          </div>
          <div id="DataTables_Table_2_filter" class="dataTables_filter  margin-0">
              <select class="form-control" @change="GetOperationList" v-model="custom_row">
                  <option v-for="row in select_row" v-text="row"></option>
              </select>
          </div>
          <div id="DataTables_Table_2_filter" class="dataTables_filter">
              <label>
                  <input type="search" v-model="search" @keyup="GetOperationList" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_2">
              </label>
          </div>
        </div>
        <table class="table datatable-pagination">
          <thead>
            <tr>
              <th>#</th>
              <th>Operation Name</th>
              <th>Operation Type</th>
              <th>Amount</th>
              <th>Description</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(operation_list,index) in OperationList.data">
              <td v-text="index+1"></td>
              <td>{{operation_list.operation_name}}</td>
              <td>{{operation_list.operation_type}}</td>
              <td>{{operation_list.amount}}</td>
              <td>{{operation_list.description | readMore(10,'...')}}</td>
              <td>
                  <span  v-if="operation_list.status==1" class='text-success'>Active</span>
                  <span  v-else class='text-danger'>Inactive</span>
              </td>
              <td class="text-center">
                  <button class="btn btn-danger" @click="DeleteOperation(operation_list.operation_id,index)">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                  </button>
                  <button v-if="operation_list.status==1" class="btn btn-success" @click="StatusChange(operation_list.operation_id)">
                      <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>
                   <button v-else class="btn btn-primary" @click="StatusChange(operation_list.operation_id)">
                      <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>
                  <button class="btn btn-info" data-toggle="modal" data-target="#editModal"  @click="EditOperation(operation_list.operation_id,operation_list)">
                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </button>
              </td>
            </tr>
          </tbody>
        </table>
        <pagination :data="OperationList"  :limit=3 @pagination-change-page="GetOperationList">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
        </pagination>
      </div>
  </div>
</template>
<script>
    export default{
      name:"Operation",
      data(){
          return{
            OperationList:{},
            OperationForm:{
                operation_name:'',
                operation_type:'',
                amount:'',
                description:'',
                status:'',
            },
            EditOperationForm:{
                operation_id:'',
                operation_name:'',
                operation_type:'',
                amount:'',
                description:'',
                status:'',
            },
            AllError:[],
            search:'',
            custom_row:10,
            select_row:[10,20,30,40,50]
          }
      },
      methods:{
        AddOperation:function(){
            const _this = this;
            this.axios.post(base_path+"operation",_this.OperationForm)
              .then((response)=>{
                  if(response.data.status==201)
                  {
                      this.$toastr.success('Operation Added Successfully', 'Success');
                      //_this.OperationList.data.push(response.data.data);
                      _this.GetOperationList();
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
                console.error();
              });
        },
        GetOperationList(page = 1,custom_row=10)
        {
            const _this=this;
            const main_url=base_path+'operation?q='+_this.search+'&page='+page+'&row='+_this.custom_row;
            this.axios.get(main_url)
            .then((response)=>{
                _this.OperationList=response.data;
            })
            .catch((error)=>{
                console.log(error)
            })
        },
        StatusChange:function(id)
        {
            const _this=this;
            this.axios.get(base_path+'operation/'+id)
            .then((response)=>{
              if(response.data.status===200)
              {
                   this.$toastr.success('Operation Status Changed Into Active', 'Success');
              }

              if(response.data.status===202)
              {
                  this.$toastr.warning('Operation Status Changed Into Inactive', 'Success');
              }
              _this.LoadingStatus();
              _this.GetOperationList();
            })
            .catch((error)=>{
              console.error();
            })
        },
        EditOperation:function(id,data)
        {
            const _this=this;
            _this.EditOperationForm.id=id;
            _this.EditOperationForm=data;
        },
        UpdateOperation:function()
        {
          const _this=this;
          this.axios.put(base_path+'operation/'+_this.EditOperationForm.operation_id,this.EditOperationForm)
          .then((response)=>{
              if(response.data.status==201)
              {
                  this.$toastr.success('Operation Edited Successfully', 'Success');
                  _this.GetOperationList();
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
            console.error();
          })

        },
        DeleteOperation:function(id,index)
        {
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
                _this.GetOperationList();
                this.LoadingStatus();
                this.axios.delete(base_path+'operation/'+id)
                .then((response)=>{
                    console.log(response);
                    if(response.data.status==200)
                    {
                        _this.OperationList.data.splice(index,1);
                            swal.fire(
                              'Deleted!',
                              'Operation Hasbeen Deleted',
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
          _this.OperationForm.operation_name='';
          _this.OperationForm.operation_type='';
          _this.OperationForm.amount='';
          _this.OperationForm.description='';
          _this.OperationForm.status='';
        },
      },
      mounted()
      {
        this.LoadingStatus();
        this.GetOperationList();
      }
    }
</script>
