<template>
<div class="shift">
      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
            Add New Shift
      </button>
<form class="form-horizontal" @submit.prevent="AddShift">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Shift</h5>
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
                                          <label class="col-lg-3 control-label">Shift Name:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="ShiftForm.shift_name" class="form-control" placeholder="Enter Shift Name" >
                                              <span class="text-danger" v-if="AllError.shift_name" v-text="AllError.shift_name[0]"></span>

                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Description:</label>
                                          <div class="col-lg-9">
                                              <textarea v-model="ShiftForm.description" class="form-control"></textarea>
                                              <span class="text-danger" v-if="AllError.description" v-text="AllError.description[0]"></span>

                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Status:</label>
                                          <div class="col-lg-9">
                                              <select class="form-control" v-model="ShiftForm.status">
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
    <form class="form-horizontal" @submit.prevent="UpdateShift">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit {{  ShiftForm.shift_name }} Shift</h5>
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
                                            <label class="col-lg-3 control-label">Shift Name:</label>
                                            <div class="col-lg-9">
                                                <input type="text" v-model="EditShiftForm.shift_name" class="form-control" placeholder="Enter Shift Name" >
                                                <span class="text-danger" v-if="AllError.shift_name" v-text="AllError.shift_name[0]"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Description:</label>
                                            <div class="col-lg-9">
                                                <textarea v-model="EditShiftForm.description" class="form-control"></textarea>
                                                <span class="text-danger" v-if="AllError.description" v-text="AllError.description[0]"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Status:</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" v-model="EditShiftForm.status">
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
              <li><a data-action="reload" @click="GetShiftList"></a></li>
              <li><a data-action="close"></a></li>
            </ul>
          </div>
        </div>
        <table class="table datatable-pagination">
          <thead>
            <tr>
              <th>Sl No</th>
              <th>Shift Name</th>
              <th>Description</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(shift_list,index) in ShiftList.data">
              <td v-text="index+1"></td>
              <td>{{shift_list.shift_name}}</td>
              <td>{{shift_list.description | readMore(10,'...')}}</td>
              <td>
                  <span  v-if="shift_list.status==1" class='text-success'>Active</span>
                  <span  v-else class='text-danger'>Inactive</span>
              </td>
              <td class="text-center">
                  <button class="btn btn-danger" @click="DeleteShift(shift_list.shift_id,index)"><i class="fa fa-trash" aria-hidden="true"></i></button>

                  <button v-if="shift_list.status==1" class="btn btn-success" @click="StatusChange(shift_list.shift_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>

                   <button v-else class="btn btn-primary" @click="StatusChange(shift_list.shift_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>

                  <button class="btn btn-info" data-toggle="modal" data-target="#editModal"  @click="EditShift(shift_list.shift_id,shift_list)">
                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </button>
              </td>
            </tr>


          </tbody>
        </table>
        <pagination :data="ShiftList"  :limit=3 @pagination-change-page="GetShiftList">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
        </pagination>
      </div>
  </div>
</template>
<script>
    export default{
      name:"Shift",
      data(){
          return{
            ShiftList:{},
            ShiftForm:{
                shift_name:'',
                description:'',
                status:'',
            },
            EditShiftForm:{
                shift_id:'',
                shift_name:'',
                description:'',
                status:'',
            },
            AllError:[],
          }
      },
      methods:{
        AddShift:function(){
            const _this = this;
            this.axios.post(this.baseUrl+"shift",_this.ShiftForm)
              .then((response)=>{
                  if(response.data.status==201)
                  {
                      this.$toastr.success('Shift Added Successfully', 'Success');
                      //_this.ShiftList.data.push(response.data.data);
                      _this.GetShiftList();
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
        GetShiftList(page = 1)
        {
            const _this=this;
            this.axios.get(this.baseUrl+'shift?page='+page)
            .then((response)=>{
                _this.ShiftList=response.data;
                //console.log(response.data);
            })
            .catch((error)=>{
                console.log(error)
            })
        },
        StatusChange:function(id)
        {
            const _this=this;
            this.axios.get(this.baseUrl+'shift/'+id)
            .then((response)=>{
              if(response.data.status===200)
              {
                   this.$toastr.success('Shift Status Changed Into Active', 'Success');
              }

              if(response.data.status===202)
              {
                  this.$toastr.warning('Shift Status Changed Into Inactive', 'Success');
              }
              _this.LoadingStatus();
              _this.GetShiftList();
            })
            .catch((error)=>{
              console.error();
            })
        },
        EditShift:function(id,data)
        {
          const _this=this;
          _this.EditShiftForm.id=id;
          _this.EditShiftForm=data;
        },
        UpdateShift:function()
        {
          const _this=this;
          this.axios.put(this.baseUrl+'shift/'+_this.EditShiftForm.shift_id,this.EditShiftForm)
          .then((response)=>{
              if(response.data.status==201)
              {
                  this.$toastr.success('Shift Edited Successfully', 'Success');
                  _this.GetShiftList();
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
        DeleteShift:function(id,index)
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
                _this.GetShiftList();
                this.LoadingStatus();
                this.axios.delete(this.baseUrl+'shift/'+id)
                .then((response)=>{
                    console.log(response);
                    if(response.data.status==200)
                    {
                        _this.ShiftList.data.splice(index,1);
                            swal.fire(
                              'Deleted!',
                              'Shift Hasbeen Deleted',
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
          _this.ShiftForm.shift_name='';
          _this.ShiftForm.description='';
          _this.ShiftForm.status='';
        },
      },
      mounted()
      {
        this.LoadingStatus();
        this.GetShiftList();
      }
    }
</script>
