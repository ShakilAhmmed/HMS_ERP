<template>
<div class="users">
      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
            Add New Users
      </button>
<form class="form-horizontal" @submit.prevent="AddUsers">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Users</h5>
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
                                          <label class="col-lg-3 control-label">Name:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="UsersForm.users_name" class="form-control" placeholder="Name" >
                                              <span class="text-danger" v-if="AllError.users_name" v-text="AllError.users_name[0]"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Guardian Name:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="UsersForm.guardian_name" class="form-control" placeholder="Enter Guardian Name" >
                                              <span class="text-danger" v-if="AllError.guardian_name" v-text="AllError.guardian_name[0]"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Address:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="UsersForm.address" class="form-control" placeholder="Enter Address Name" >
                                              <span class="text-danger" v-if="AllError.address" v-text="AllError.address[0]"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Phone:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="UsersForm.phone" class="form-control" placeholder="Enter Phone Number" >
                                              <span class="text-danger" v-if="AllError.phone" v-text="AllError.phone[0]"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Sex:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="UsersForm.sex" class="form-control" placeholder="Enter Sex" >
                                              <span class="text-danger" v-if="AllError.sex" v-text="AllError.sex[0]"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Birth Date:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="UsersForm.birth_date" class="form-control" placeholder="Enter Birth Date" >
                                              <span class="text-danger" v-if="AllError.birth_date" v-text="AllError.birth_date[0]"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Age:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="UsersForm.age" class="form-control" placeholder="Enter Age" >
                                              <span class="text-danger" v-if="AllError.age" v-text="AllError.age[0]"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Blood Group:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="UsersForm.blood_group" class="form-control" placeholder="Enter Blood Group" >
                                              <span class="text-danger" v-if="AllError.blood_group" v-text="AllError.blood_group[0]"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Department:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="UsersForm.department_id" class="form-control" placeholder="Enter Department Name" >
                                              <span class="text-danger" v-if="AllError.department_id" v-text="AllError.department_id[0]"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Designation:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="UsersForm.designation_id" class="form-control" placeholder="Enter Designation Name" >
                                              <span class="text-danger" v-if="AllError.designation_id" v-text="AllError.designation_id[0]"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Shift:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="UsersForm.shift_id" class="form-control" placeholder="Enter Shift Name" >
                                              <span class="text-danger" v-if="AllError.shift_id" v-text="AllError.shift_id[0]"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Working Hours:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="UsersForm.working_hours" class="form-control" placeholder="Enter Working Hours" >
                                              <span class="text-danger" v-if="AllError.working_hours" v-text="AllError.working_hours[0]"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Status:</label>
                                          <div class="col-lg-9">
                                            <select class="form-control" v-model="UsersForm.status">
                                                <option value=''>--Select--</option>
                                                <option value='1'>Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                            <span class="text-danger" v-if="AllError.status" v-text="AllError.status[0]"></span>
                                        </div>
                                    </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Image:</label>
                                          <div class="col-lg-9">
                                              <input type="file" class="form-control">
                                              <span class="text-danger" v-if="AllError.image" v-text="AllError.image[0]"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Email:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="UsersForm.email" class="form-control" placeholder="Enter Email" >
                                              <span class="text-danger" v-if="AllError.email" v-text="AllError.email[0]"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Password</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="UsersForm.password" class="form-control" placeholder="Enter Password" >
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Confirm Password:</label>
                                          <div class="col-lg-9">
                                              <input type="text" v-model="UsersForm.password_confirmation" class="form-control" placeholder="Re-Type Password" >
                                              <span class="text-danger" v-if="AllError.password" v-text="AllError.password[0]"></span>
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
    <!-- <form class="form-horizontal" @submit.prevent="UpdateUsers">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit {{  UsersForm.users_name }} Users</h5>
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
                                            <label class="col-lg-3 control-label">Users Name:</label>
                                            <div class="col-lg-9">
                                                <input type="text" v-model="EditUsersForm.users_name" class="form-control" placeholder="Enter Users Name" >
                                                <span class="text-danger" v-if="AllError.users_name" v-text="AllError.users_name[0]"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Description:</label>
                                            <div class="col-lg-9">
                                                <textarea v-model="EditUsersForm.description" class="form-control"></textarea>
                                                <span class="text-danger" v-if="AllError.description" v-text="AllError.description[0]"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Status:</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" v-model="EditUsersForm.status">
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
    </form> -->
    <br><br>
    <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title"></h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
              <li><a data-action="reload" @click="GetUsersList"></a></li>
              <li><a data-action="close"></a></li>
            </ul>
          </div>
        </div>
        <table class="table datatable-pagination">
          <thead>
            <tr>
              <th>Sl No</th>
              <th>Name</th>
              <th>Guardian Name</th>
              <th>Address</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Sex</th>
              <th>Birth Date</th>
              <th>Age</th>
              <th>Blood Group</th>
              <!-- <th>Department Name</th>
              <th>Designation Name</th>
              <th>Shift Name</th> -->
              <th>Working Hours</th>
              <th>Image</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(users_list,index) in UsersList.data">
              <td v-text="index+1"></td>
              <td>{{users_list.users_name}}</td>
              <td>{{users_list.guardian_name}}</td>
              <td>{{users_list.address}}</td>
              <td>{{users_list.email}}</td>
              <td>{{users_list.phone}}</td>
              <td>{{users_list.sex}}</td>
              <td>{{users_list.birth_date}}</td>
              <td>{{users_list.age}}</td>
              <td>{{users_list.blood_group}}</td>
              <!-- <td>{{users_list.department_name}}</td>
              <td>{{users_list.designation_name}}</td>
              <td>{{users_list.shift_name}}</td> -->
              <td>{{users_list.working_hours}}</td>
              <td>
                  <span  v-if="users_list.status==1" class='text-success'>Active</span>
                  <span  v-else class='text-danger'>Inactive</span>
              </td>
              <td>{{users_list.image}}</td>
              <td>
                  <span  v-if="users_list.status==1" class='text-success'>Active</span>
                  <span  v-else class='text-danger'>Inactive</span>
              </td>
              <td class="text-center">
                  <button class="btn btn-danger" @click="DeleteUsers(users_list.users_id,index)"><i class="fa fa-trash" aria-hidden="true"></i></button>

                  <button v-if="users_list.status==1" class="btn btn-success" @click="StatusChange(users_list.users_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>

                   <button v-else class="btn btn-primary" @click="StatusChange(users_list.users_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>

                  <button class="btn btn-info" data-toggle="modal" data-target="#editModal"  @click="EditUsers(users_list.users_id,users_list)">
                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </button>
              </td>
            </tr>


          </tbody>
        </table>
        <pagination :data="UsersList"  :limit=3 @pagination-change-page="GetUsersList">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
        </pagination>
      </div>
  </div>
</template>
<script>
    export default{
      name:"Users",
      data(){
          return{
            UsersList:{},
            UsersForm:{
                users_name:'',
                guardian_name:'',
                address:'',
                phone:'',
                sex:'',
                birth_date:'',
                age:'',
                blood_group:'',
                department_id:'',
                designation_id:'',
                shift_id:'',
                working_hours:'',
                status:'',
                image:'',
                email:'',
                password:'',
                password_confirmation:'',
            },
            EditUsersForm:{
                users_id:'',
                guardian_name:'',
                address:'',
                phone:'',
                sex:'',
                birth_date:'',
                age:'',
                blood_group:'',
                department_id:'',
                designation_id:'',
                shift_id:'',
                working_hours:'',
                status:'',
                image:'',
                email:'',
                password:'',
                password_confirmation:'',
            },
            AllError:[],
          }
      },
      methods:{
        AddUsers:function(){
            const _this = this;
            this.axios.post(this.baseUrl+"users",_this.UsersForm)
              .then((response)=>{
                  if(response.data.status==201)
                  {
                      this.$toastr.success('Users Added Successfully', 'Success');
                      //_this.UsersList.data.push(response.data.data);
                      _this.GetUsersList();
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
        GetUsersList(page = 1)
        {
            const _this=this;
            this.axios.get(this.baseUrl+'users?page='+page)
            .then((response)=>{
                _this.UsersList=response.data;
                //console.log(response.data);
            })
            .catch((error)=>{
                console.log(error)
            })
        },
        StatusChange:function(id)
        {
            const _this=this;
            this.axios.get(this.baseUrl+'users/'+id)
            .then((response)=>{
              if(response.data.status===200)
              {
                   this.$toastr.success('Users Status Changed Into Active', 'Success');
              }

              if(response.data.status===202)
              {
                  this.$toastr.warning('Users Status Changed Into Inactive', 'Success');
              }
              _this.LoadingStatus();
              _this.GetUsersList();
            })
            .catch((error)=>{
              console.error();
            })
        },
        EditUsers:function(id,data)
        {
          const _this=this;
          _this.EditUsersForm.id=id;
          _this.EditUsersForm=data;
        },
        UpdateUsers:function()
        {
          const _this=this;
          this.axios.put(this.baseUrl+'users/'+_this.EditUsersForm.users_id,this.EditUsersForm)
          .then((response)=>{
              if(response.data.status==201)
              {
                  this.$toastr.success('Users Edited Successfully', 'Success');
                  _this.GetUsersList();
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
        DeleteUsers:function(id,index)
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
                _this.GetUsersList();
                this.LoadingStatus();
                this.axios.delete(this.baseUrl+'users/'+id)
                .then((response)=>{
                    console.log(response);
                    if(response.data.status==200)
                    {
                        _this.UsersList.data.splice(index,1);
                            swal.fire(
                              'Deleted!',
                              'Users Hasbeen Deleted',
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
          _this.UsersForm.users_name='';
        },
      },
      mounted()
      {
        this.LoadingStatus();
        this.GetUsersList();
      }
    }
</script>
