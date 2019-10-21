<template>
  <div class="add_users">
    <!-- Form horizontal -->
    <div class="panel panel-flat">
      <div class="panel-heading">
        <div class="heading-elements">
          <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                  </ul>
                </div>
      </div>

      <div class="panel-body">

        <form @submit.prevent="AddUsers">
          <fieldset class="content-group">
            <form class="form-horizontal" @submit.prevent="AddUsers">
            <legend class="text-bold">Add New User</legend>
            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Name:</label>
                  <div class="col-md-10">
                    <input type="text" v-model="UsersForm.users_name" class="form-control" placeholder="Name" >
                    <span class="text-danger" v-if="AllError.users_name" v-text="AllError.users_name[0]"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Guardian Name: </label>
                  <div class="col-md-10">
                    <input type="text" v-model="UsersForm.guardian_name" class="form-control" placeholder="Enter Guardian Name" >
                    <span class="text-danger" v-if="AllError.guardian_name" v-text="AllError.guardian_name[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12">
                <div class="row">
                  <label class="col-md-1 control-label text-left">Address: </label>
                  <div class="col-md-11">
                    <textarea v-model="UsersForm.address" class="form-control" placeholder="Enter Address"></textarea>
                    <span class="text-danger" v-if="AllError.address" v-text="AllError.address[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Phone:</label>
                  <div class="col-md-10">
                    <input type="text" v-model="UsersForm.phone" class="form-control" placeholder="Enter Phone Number" >
                    <span class="text-danger" v-if="AllError.phone" v-text="AllError.phone[0]"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Sex: </label>
                  <div class="col-md-10">
                    <select v-model="UsersForm.sex" class="form-control">
                      <option value="">Select</option>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                      <option value="3">Common</option>
                    </select>
                    <span class="text-danger" v-if="AllError.sex" v-text="AllError.sex[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Birth Date:</label>
                  <div class="col-md-10">
                    <input type="date" v-model="UsersForm.birth_date" class="form-control" placeholder="Enter Birth Date" >
                    <span class="text-danger" v-if="AllError.birth_date" v-text="AllError.birth_date[0]"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Age: </label>
                  <div class="col-md-10">
                    <input type="text" v-model="UsersForm.age" class="form-control" placeholder="Enter Age" >
                    <span class="text-danger" v-if="AllError.age" v-text="AllError.age[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Blood Group:</label>
                  <div class="col-md-10">
                    <select v-model="UsersForm.blood_group" class="form-control">
                      <option value="">Select</option>
                      <option>O−</option>
                      <option>O+</option>
                      <option>A−</option>
                      <option>A+</option>
                      <option>B−</option>
                      <option>B+</option>
                      <option>AB−</option>
                      <option>AB+</option>
                    </select>
                    <span class="text-danger" v-if="AllError.blood_group" v-text="AllError.blood_group[0]"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Department: </label>
                  <div class="col-md-10">
                    <select v-model="UsersForm.department_id" class="form-control">
                      <option value="">Select</option>
                      <option v-for="data_value in GetDataValue.department" v-text="data_value.department_name" :value="data_value.departments_id">Select</option>
                    </select>
                    <span class="text-danger" v-if="AllError.department_id" v-text="AllError.department_id[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Designation:</label>
                  <div class="col-md-10">
                    <select v-model="UsersForm.designation_id" class="form-control">
                      <option value="">Select</option>
                      <option v-for="data_value in GetDataValue.designation" v-text="data_value.designation_name" :value="data_value.designation_id">Select</option>
                    </select>
                    <span class="text-danger" v-if="AllError.designation_id" v-text="AllError.designation_id[0]"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Shift: </label>
                  <div class="col-md-10">
                    <select v-model="UsersForm.shift_id" class="form-control">
                      <option value="">Select</option>
                      <option v-for="data_value in GetDataValue.shift" v-text="data_value.shift_name" :value="data_value.shift_id">Select</option>
                    </select>
                    <span class="text-danger" v-if="AllError.shift_id" v-text="AllError.shift_id[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Working Hours</label>
                  <div class="col-md-10">
                    <input type="text" v-model="UsersForm.working_hours" class="form-control" placeholder="Enter Working Hours" >
                    <span class="text-danger" v-if="AllError.working_hours" v-text="AllError.working_hours[0]"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Status:</label>
                  <div class="col-md-10">
                    <select class="form-control" v-model="UsersForm.status">
                        <option value=''>Select</option>
                        <option value='1'>Active</option>
                        <option value="2">Inactive</option>
                    </select>
                    <span class="text-danger" v-if="AllError.status" v-text="AllError.status[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Email:</label>
                  <div class="col-md-10">
                    <input type="text" v-model="UsersForm.email" class="form-control" placeholder="Enter Email" >
                    <span class="text-danger" v-if="AllError.email" v-text="AllError.email[0]"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Image:</label>
                  <div class="col-md-10">
                    <input type="file" class="form-control" @change="ImageGet">
                    <span class="text-danger" v-if="AllError.project_logo_ext" v-text="AllError.project_logo_ext"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Password:</label>
                  <div class="col-md-10">
                    <input type="password" v-model="UsersForm.password" class="form-control" placeholder="Enter Password" >
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Confirm Password:</label>
                  <div class="col-md-10">
                    <input type="password" v-model="UsersForm.password_confirmation" class="form-control" placeholder="Re-Type Password" >
                    <span class="text-danger" v-if="AllError.password" v-text="AllError.password[0]"></span>
                  </div>
                </div>
              </div>
            </div>
          </form>
          </fieldset>

          <div class="text-right">
            <button  type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
          </div>
        </form>
      </div>
    </div>
    <!-- /form horizontal -->
  </div>
</template>
<script>
    export default{
      name:"Users",
      data(){
          return{
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
                type:'1',
                password_confirmation:'',

              },
              AllError:[],
              GetDataValue:[],
          }
        },
        methods:{
          GetData:function(){
            const _this = this;
            this.axios.get(base_path+"get_users_add_data")
              .then((response)=>{
                _this.GetDataValue = response.data;
                  console.log(response.data);
              })
              .catch((error)=>{
                console.error();
              });
          },
          AddUsers:function(){
              const _this = this;
              this.axios.post(base_path+"users",_this.UsersForm)
                .then((response)=>{
                    if(response.data.status==201)
                    {
                        this.$toastr.success('Users Added Successfully', 'Success');
                        //_this.UsersList.data.push(response.data.data);

                        this.LoadingStatus();
                        this.$router.push({path:'users'})
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
          ImageGet:function(event)
      		{
      			let file=event.target.files[0];
    			  let reader=new FileReader();
              reader.onload=event =>{
              	this.UsersForm.image = event.target.result;
              }
              reader.readAsDataURL(file)
      		},
        },
        mounted(){
          this.GetData();
        },
      }
  </script>
