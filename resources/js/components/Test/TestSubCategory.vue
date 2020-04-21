<template>
<div class="test_sub_category">
      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
            Add New TestSubCategory
      </button>
<form class="form-horizontal" @submit.prevent="AddTestSubCategory">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New TestSubCategory</h5>
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
                                          <label class="col-lg-3 control-label">Test SubCategory Name:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="TestSubCategoryForm.test_sub_category_name" class="form-control" placeholder="Enter TestSubCategory Name" >
                                              <span class="text-danger" v-if="AllError.test_sub_category_name" v-text="AllError.test_sub_category_name[0]"></span>

                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Test Category Name:</label>
                                          <div class="col-lg-9">
                                              <select v-model="TestSubCategoryForm.test_category_id" class="form-control">
                                                <option value="">--select--</option>
                                                <option v-for="data_value in TestCategory" :value="data_value.test_category_id" v-text="data_value.test_category_name"></option>
                                              </select>
                                              <span class="text-danger" v-if="AllError.test_category_id" v-text="AllError.test_category_id[0]"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Description:</label>
                                          <div class="col-lg-9">
                                              <textarea v-model="TestSubCategoryForm.description" class="form-control"></textarea>
                                              <span class="text-danger" v-if="AllError.description" v-text="AllError.description[0]"></span>

                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Status:</label>
                                          <div class="col-lg-9">
                                              <select class="form-control" v-model="TestSubCategoryForm.status">
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
    <form class="form-horizontal" @submit.prevent="UpdateTestSubCategory">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit {{  TestSubCategoryForm.test_sub_category_name }} TestSubCategory</h5>
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
                                            <label class="col-lg-3 control-label">TestSubCategory Name:</label>
                                            <div class="col-lg-9">
                                                <input type="text" v-model="EditTestSubCategoryForm.test_sub_category_name" class="form-control" placeholder="Enter TestSubCategory Name" >
                                                <span class="text-danger" v-if="AllError.test_sub_category_name" v-text="AllError.test_sub_category_name[0]"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Test Category Name:</label>
                                            <div class="col-lg-9">
                                                <select v-model="EditTestSubCategoryForm.test_category_id" class="form-control">
                                                  <option v-for="data_value in TestCategory" :value="data_value.test_category_id" v-text="data_value.test_category_name"></option>
                                                </select>
                                                <span class="text-danger" v-if="AllError.test_category_id" v-text="AllError.test_category_id[0]"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Description:</label>
                                            <div class="col-lg-9">
                                                <textarea v-model="EditTestSubCategoryForm.description" class="form-control"></textarea>
                                                <span class="text-danger" v-if="AllError.description" v-text="AllError.description[0]"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Status:</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" v-model="EditTestSubCategoryForm.status">
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
              <li><a data-action="reload" @click="GetTestSubCategoryList"></a></li>
              <li><a data-action="close"></a></li>
            </ul>
          </div>
          <div id="DataTables_Table_2_filter" class="dataTables_filter  margin-0">
              <select class="form-control" @change="GetTestSubCategoryList" v-model="custom_row">
                  <option v-for="row in select_row" v-text="row"></option>
              </select>
          </div>
          <div id="DataTables_Table_2_filter" class="dataTables_filter">
              <label>
                  <input type="search" v-model="search" @keyup="GetTestSubCategoryList" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_2">
              </label>
          </div>
        </div>
        <table class="table datatable-pagination">
          <thead>
            <tr>
              <th>Sl No</th>
              <th>SubCategory Name</th>
              <th>Category Name</th>
              <th>Description</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(test_sub_category_list,index) in TestSubCategoryList.data">
              <td v-text="index+1"></td>
              <td>{{test_sub_category_list.test_sub_category_name}}</td>
              <td>{{test_sub_category_list.test_category_name}}</td>
              <td>{{test_sub_category_list.description | readMore(10,'...')}}</td>
              <td>
                  <span  v-if="test_sub_category_list.sub_category_status==1" class='text-success'>Active</span>
                  <span  v-else class='text-danger'>Inactive</span>
              </td>
              <td class="text-center">
                  <button class="btn btn-danger" @click="DeleteTestSubCategory(test_sub_category_list.test_sub_category_id,index)"><i class="fa fa-trash" aria-hidden="true"></i></button>

                  <button v-if="test_sub_category_list.sub_category_status==1" class="btn btn-success" @click="StatusChange(test_sub_category_list.test_sub_category_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>

                   <button v-else class="btn btn-primary" @click="StatusChange(test_sub_category_list.test_sub_category_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>

                  <button class="btn btn-info" data-toggle="modal" data-target="#editModal"  @click="EditTestSubCategory(test_sub_category_list.test_sub_category_id,test_sub_category_list,index)">
                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </button>
              </td>
            </tr>


          </tbody>
        </table>
        <pagination :data="TestSubCategoryList"  :limit=3 @pagination-change-page="GetTestSubCategoryList">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
        </pagination>
      </div>
  </div>
</template>
<script>
    export default{
      name:"TestSubCategory",
      data(){
          return{
            TestSubCategoryList:{},
            TestSubCategoryForm:{
                test_sub_category_name:'',
                test_category_id:'',
                description:'',
                status:'',
            },
            EditTestSubCategoryForm:{
                test_sub_category_id:'',
                test_sub_category_name:'',
                test_category_id:'',
                description:'',
                status:'',
            },
            TestCategory:[],
            AllError:[],
            search:'',
            custom_row:10,
            select_row:[10,20,30,40,50],
            update_index:''
          }
      },
      methods:{
        AddTestSubCategory:function(){
            const _this = this;
            this.axios.post(base_path+"test_sub_category",_this.TestSubCategoryForm)
              .then((response)=>{
                  if(response.data.status==201)
                  {
                      this.$toastr.success('TestSubCategory Added Successfully', 'Success');
                      //_this.TestSubCategoryList.data.push(response.data.data);
                      _this.GetTestSubCategoryList();
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
        GetTestSubCategoryList(page = 1,custom_row=10)
        {
            const _this=this;
            const main_url=base_path+'test_sub_category?q='+_this.search+'&page='+page+'&row='+_this.custom_row;
            this.axios.get(main_url)
            .then((response)=>{
                _this.TestSubCategoryList=response.data.test_sub_category;
                _this.TestCategory=response.data.test_category;
            })
            .catch((error)=>{
                console.log(error)
            })
        },
        StatusChange:function(id)
        {
            const _this=this;
            this.axios.get(base_path+'test_sub_category/'+id)
            .then((response)=>{
              if(response.data.status===200)
              {
                   this.$toastr.success('TestSubCategory Status Changed Into Active', 'Success');
              }

              if(response.data.status===202)
              {
                  this.$toastr.warning('TestSubCategory Status Changed Into Inactive', 'Success');
              }
              _this.LoadingStatus();
              _this.GetTestSubCategoryList();
            })
            .catch((error)=>{
              console.error();
            })
        },

        EditTestCategory:function(id,data,index)
        {
            const _this=this;
            _this.update_index=index;
            _this.EditTestSubCategoryForm.test_sub_category_id=id;
            _this.EditTestSubCategoryForm=JSON.parse(JSON.stringify(data));
        },

        UpdateTestSubCategory:function()
        {
          const _this=this;
          this.axios.put(base_path+'test_sub_category/'+_this.EditTestSubCategoryForm.test_sub_category_id,this.EditTestSubCategoryForm)
          .then((response)=>{
              if(response.data.status==201)
              {
                  this.$toastr.success('TestSubCategory Edited Successfully', 'Success');
                  _this.GetTestSubCategoryList();
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
        DeleteTestSubCategory:function(id,index)
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
                _this.GetTestSubCategoryList();
                this.LoadingStatus();
                this.axios.delete(base_path+'test_sub_category/'+id)
                .then((response)=>{
                    console.log(response);
                    if(response.data.status==200)
                    {
                        _this.TestSubCategoryList.data.splice(index,1);
                            swal.fire(
                              'Deleted!',
                              'TestSubCategory Hasbeen Deleted',
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
          _this.TestSubCategoryForm.test_sub_category_name='';
          _this.TestSubCategoryForm.description='';
          _this.TestSubCategoryForm.status='';
        },
      },
      mounted()
      {
        this.LoadingStatus();
        this.GetTestSubCategoryList();
      }
    }
</script>
