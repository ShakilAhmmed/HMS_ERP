<template>
<div class="users">
      <button type="button" class="btn btn-primary pull-right router_link_color" data-toggle="modal" data-target="#exampleModal">
            <router-link to="/add_users">Add New Users</router-link>
      </button>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content view_modal_width">
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
                                              <li><a data-action="reload" ></a></li>
                                          </ul>
                                      </div>
                                  </div>

                                  <div class="panel-body">
                                      <div class="col-lg-12 text-center view_modal_image_width">
                                        <img v-if="EditUsersForm.image" :src="EditUsersForm.image">
                                        <img v-else src="backend_assets/assets/images/users/avater.png">
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="col-lg-6">
                                          <span>Name:</span>
                                        </div>
                                        <div class="col-lg-6">
                                          <span v-text="EditUsersForm.users_name"></span>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="col-lg-6">
                                          <span>Guardian Name:</span>
                                        </div>
                                        <div class="col-lg-6">
                                          <span v-text="EditUsersForm.guardian_name"></span>
                                        </div>
                                      </div>
                                      <br><br>
                                      <div class="col-lg-6">
                                        <div class="col-lg-6">
                                          <span>Address</span>
                                        </div>
                                        <div class="col-lg-6">
                                          <span v-text="EditUsersForm.address"></span>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="col-lg-6">
                                          <span>Phone:</span>
                                        </div>
                                        <div class="col-lg-6">
                                          <span v-text="EditUsersForm.phone"></span>
                                        </div>
                                      </div>
                                      <br><br>
                                      <div class="col-lg-6">
                                        <div class="col-lg-6">
                                          <span>Sex:</span>
                                        </div>
                                        <div class="col-lg-6">
                                          <span v-if="EditUsersForm.sex == 1">Male</span>
                                          <span v-else-if="EditUsersForm.sex == 2">Female</span>
                                          <span v-else-if="EditUsersForm.sex == 3">Common</span>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="col-lg-6">
                                          <span>Birth Date:</span>
                                        </div>
                                        <div class="col-lg-6">
                                          <span v-text="EditUsersForm.birth_date"></span>
                                        </div>
                                      </div>
                                      <br><br>
                                      <div class="col-lg-6">
                                        <div class="col-lg-6">
                                          <span>Age:</span>
                                        </div>
                                        <div class="col-lg-6">
                                          <span v-text="EditUsersForm.age"></span>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="col-lg-6">
                                          <span>Blood Group:</span>
                                        </div>
                                        <div class="col-lg-6">
                                          <span v-text="EditUsersForm.blood_group"></span>
                                        </div>
                                      </div>
                                      <br><br>
                                      <div class="col-lg-6">
                                        <div class="col-lg-6">
                                          <span>Department:</span>
                                        </div>
                                        <div class="col-lg-6">
                                          <span v-text="EditUsersForm.department_id"></span>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="col-lg-6">
                                          <span>Designation:</span>
                                        </div>
                                        <div class="col-lg-6">
                                          <span v-text="EditUsersForm.designation_id"></span>
                                        </div>
                                      </div>
                                      <br><br>
                                      <div class="col-lg-6">
                                        <div class="col-lg-6">
                                          <span>Shift:</span>
                                        </div>
                                        <div class="col-lg-6">
                                          <span v-text="EditUsersForm.shift_id"></span>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="col-lg-6">
                                          <span>Email:</span>
                                        </div>
                                        <div class="col-lg-6">
                                          <span v-text="EditUsersForm.email"></span>
                                        </div>
                                      </div>
                                      <br><br>
                                      <div class="col-lg-6">
                                        <div class="col-lg-6">
                                          <span>Working Hours:</span>
                                        </div>
                                        <div class="col-lg-6">
                                          <span v-text="EditUsersForm.working_hours"></span>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="col-lg-6">
                                          <span>Status:</span>
                                        </div>
                                        <div class="col-lg-6">
                                          <span v-if="EditUsersForm.status == 1">Active</span>
                                          <span v-else-if="EditUsersForm.status == 2">Inactive</span>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
        </div>
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
              <th>Email</th>
              <th>Phone</th>
              <th>Sex</th>
              <th>Blood Group</th>
              <th>Image</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(users_list,index) in UsersList.data">
              <td v-text="index+1"></td>
              <td>{{users_list.users_name}}</td>
              <td>{{users_list.email}}</td>
              <td>{{users_list.phone}}</td>
              <td>{{users_list.sex}}
                <span v-if="users_list.sex == 1">Male</span>
                <span v-else-if="users_list.sex == 2">Female</span>
                <span v-else-if="users_list.sex == 3">Common</span>
              </td>
              <td>{{users_list.blood_group}}</td>
              <td>
                <img class="table_image" :src="users_list.image">
              </td>
              <td>
                  <span  v-if="users_list.status==1" class='text-success'><i class="fa fa-check text-success"></i></span>
                  <span  v-else class='text-danger'><i class="fa fa-close text-danger"></i></span>
              </td>
              <td class="text-center table_action_display">
                  <button class="btn btn-danger" @click="DeleteUsers(users_list.users_id,index)">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </button>
                  <button v-if="users_list.status==1" class="btn btn-success" @click="StatusChange(users_list.users_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>
                   <button v-else class="btn btn-primary" @click="StatusChange(users_list.users_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>
                  <button class="btn btn-info">
                    <router-link :to="{ name: 'edit-user', params:{id: users_list.users_id }}">
                        <i class="fa fa-pencil-square-o router_link_color" aria-hidden="true"></i>
                    </router-link>
                  </button>
                  <button type="button" class="btn btn-custom router_link_color" data-toggle="modal" data-target="#exampleModal" @click="ViewDetails(users_list.users_id, users_list)">
                        <i class="fa fa-eye router_link_color" aria-hidden="true"></i>
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
            this.axios.post(base_path+"users",_this.UsersForm)
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
            this.axios.get(base_path+'users?page='+page)
            .then((response)=>{
                _this.UsersList=response.data;
            })
            .catch((error)=>{
                console.log(error)
            })
        },
        StatusChange:function(id)
        {
            const _this=this;
            this.axios.get(base_path+'users/'+id)
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
        ViewDetails:function(id,data)
        {
          const _this=this;
          _this.EditUsersForm.id=id;
          _this.EditUsersForm=data;
          console.log(_this.EditUsersForm);
        },
        UpdateUsers:function()
        {
          const _this=this;
          this.axios.put(base_path+'users/'+_this.EditUsersForm.users_id,this.EditUsersForm)
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
                this.axios.delete(base_path+'users/'+id)
                .then((response)=>{
                    console.log(response);
                    if(response.data.status==200)
                    {
                        _this.UsersList.data.splice(index,1);
                            swal.fire(
                              'Deleted!',
                              'User Hasbeen Deleted',
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
