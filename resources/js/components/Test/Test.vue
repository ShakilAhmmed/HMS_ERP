<template>
<div class="test">
      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
            Add New Test
      </button>
<form class="form-horizontal" @submit.prevent="AddTest">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Test</h5>
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
                                          <label class="col-lg-3 control-label">Test Name:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="TestForm.test_name" class="form-control" placeholder="Enter Test Name" >
                                              <span class="text-danger" v-if="AllError.test_name" v-text="AllError.test_name[0]"></span>

                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Test Type Name:</label>
                                          <div class="col-lg-9">
                                              <select v-model="TestForm.test_type_id" class="form-control">
                                                <option value="">--select--</option>
                                                <option v-for="data_value in TestType" :value="data_value.test_type_id" v-text="data_value.test_type_name"></option>
                                              </select>
                                              <span class="text-danger" v-if="AllError.test_type_id" v-text="AllError.test_type_id[0]"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Description:</label>
                                          <div class="col-lg-9">
                                              <textarea v-model="TestForm.description" class="form-control"></textarea>
                                              <span class="text-danger" v-if="AllError.description" v-text="AllError.description[0]"></span>

                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Status:</label>
                                          <div class="col-lg-9">
                                              <select class="form-control" v-model="TestForm.status">
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
    <form class="form-horizontal" @submit.prevent="UpdateTest">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit {{  TestForm.test_name }} Test</h5>
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
                                            <label class="col-lg-3 control-label">Test Name:</label>
                                            <div class="col-lg-9">
                                                <input type="text" v-model="EditTestForm.test_name" class="form-control" placeholder="Enter Test Name" >
                                                <span class="text-danger" v-if="AllError.test_name" v-text="AllError.test_name[0]"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Test Type Name:</label>
                                            <div class="col-lg-9">
                                                <select v-model="EditTestForm.test_type_id" class="form-control">
                                                  <option v-for="data_value in TestType" :value="data_value.test_type_id" v-text="data_value.test_type_name"></option>
                                                </select>
                                                <span class="text-danger" v-if="AllError.test_type_id" v-text="AllError.test_type_id[0]"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Description:</label>
                                            <div class="col-lg-9">
                                                <textarea v-model="EditTestForm.description" class="form-control"></textarea>
                                                <span class="text-danger" v-if="AllError.description" v-text="AllError.description[0]"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Status:</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" v-model="EditTestForm.status">
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
              <li><a data-action="reload" @click="GetTestList"></a></li>
              <li><a data-action="close"></a></li>
            </ul>
          </div>
        </div>
        <table class="table datatable-pagination">
          <thead>
            <tr>
              <th>Sl No</th>
              <th>Test Name</th>
              <th>TestType Name</th>
              <th>Description</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(test_list,index) in TestList.data">
              <td v-text="index+1"></td>
              <td>{{test_list.test_name}}</td>
              <td>{{test_list.test_type_name}}</td>
              <td>{{test_list.description | readMore(10,'...')}}</td>
              <td>
                  <span  v-if="test_list.test_status==1" class='text-success'>Active</span>
                  <span  v-else class='text-danger'>Inactive</span>
              </td>
              <td class="text-center">
                  <button class="btn btn-danger" @click="DeleteTest(test_list.test_id,index)"><i class="fa fa-trash" aria-hidden="true"></i></button>

                  <button v-if="test_list.test_status==1" class="btn btn-success" @click="StatusChange(test_list.test_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>

                   <button v-else class="btn btn-primary" @click="StatusChange(test_list.test_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>

                  <button class="btn btn-info" data-toggle="modal" data-target="#editModal"  @click="EditTest(test_list.test_id,test_list)">
                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </button>
              </td>
            </tr>


          </tbody>
        </table>
        <pagination :data="TestList"  :limit=3 @pagination-change-page="GetTestList">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
        </pagination>
      </div>
  </div>
</template>
<script>
    export default{
      name:"Test",
      data(){
          return{
            TestList:{},
            TestForm:{
                test_name:'',
                test_type_id:'',
                description:'',
                status:'',
            },
            EditTestForm:{
                test_id:'',
                test_name:'',
                test_type_id:'',
                description:'',
                status:'',
            },
            TestType:[],
            AllError:[],
          }
      },
      methods:{
        AddTest:function(){
            const _this = this;
            this.axios.post(base_path+"test",_this.TestForm)
              .then((response)=>{
                  if(response.data.status==201)
                  {
                      this.$toastr.success('Test Added Successfully', 'Success');
                      //_this.TestList.data.push(response.data.data);
                      _this.GetTestList();
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
        GetTestList(page = 1)
        {
            const _this=this;
            this.axios.get(base_path+'test?page='+page)
            .then((response)=>{
                _this.TestList=response.data.test;
                _this.TestType=response.data.test_type;
            })
            .catch((error)=>{
                console.log(error)
            })
        },
        StatusChange:function(id)
        {
            const _this=this;
            this.axios.get(base_path+'test/'+id)
            .then((response)=>{
              if(response.data.status===200)
              {
                   this.$toastr.success('Test Status Changed Into Active', 'Success');
              }

              if(response.data.status===202)
              {
                  this.$toastr.warning('Test Status Changed Into Inactive', 'Success');
              }
              _this.LoadingStatus();
              _this.GetTestList();
            })
            .catch((error)=>{
              console.error();
            })
        },
        EditTest:function(id,data)
        {
          const _this=this;
          _this.EditTestForm.id=id;
          _this.EditTestForm=data;
          _this.EditTestForm.status=data.test_status;
        },
        UpdateTest:function()
        {
          const _this=this;
          this.axios.put(base_path+'test/'+_this.EditTestForm.test_id,this.EditTestForm)
          .then((response)=>{
              if(response.data.status==201)
              {
                  this.$toastr.success('Test Edited Successfully', 'Success');
                  _this.GetTestList();
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
        DeleteTest:function(id,index)
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
                _this.GetTestList();
                this.LoadingStatus();
                this.axios.delete(base_path+'test/'+id)
                .then((response)=>{
                    console.log(response);
                    if(response.data.status==200)
                    {
                        _this.TestList.data.splice(index,1);
                            swal.fire(
                              'Deleted!',
                              'Test Hasbeen Deleted',
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
          _this.TestForm.test_name='';
          _this.TestForm.description='';
          _this.TestForm.status='';
        },
      },
      mounted()
      {
        this.LoadingStatus();
        this.GetTestList();
      }
    }
</script>
