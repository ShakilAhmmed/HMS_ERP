<template>
  <div class="add_users">
    <!-- Form horizontal -->
    <div class="panel panel-flat">
      <div class="panel-heading">
        <div class="heading-elements">
          <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload" @click="resetForm()"></a></li>
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
                  <label class="col-md-2 control-label text-left">User type: </label>
                  <div class="col-md-10">
                    <select v-model="UsersForm.type" class="form-control">
                      <option value="">Select</option>
                      <option value="1">Super Admin</option>
                      <option value="2">Admin</option>
                    </select>
                    <span class="text-danger" v-if="AllError.type" v-text="AllError.type[0]"></span>
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

            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Password:</label>
                  <div class="col-md-10">
                    <input type="password" v-model="UsersForm.password" class="form-control" placeholder="Enter Password" >
                    <span class="text-warning" v-if="(UsersForm.password && UsersForm.password.length ? UsersForm.password.length : 0) == 0"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Password Is Empty</span>
                     <span class="text-danger" v-else-if="(UsersForm.password && UsersForm.password.length ? UsersForm.password.length : 0) < 8"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Password Is Weak</span>
                    <span class="text-success" v-else><i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;Password Is Strong</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Confirm Password:</label>
                  <div class="col-md-10">
                    <input type="password" v-model="UsersForm.password_confirmation" class="form-control" placeholder="Re-Type Password" >
                    <span class="text-danger" v-if="UsersForm.password_confirmation.length !=0 &&  UsersForm.password && UsersForm.password.length !=0 && UsersForm.password != UsersForm.password_confirmation"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Password Not Mactched</span>
                     <span class="text-success" v-else-if="UsersForm.password && UsersForm.password.length !=0 && UsersForm.password == UsersForm.password_confirmation"><i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;Password Matched</span>

                    <span class="text-danger" v-if="AllError.password" v-text="AllError.password[0]"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                </div>

                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-lg-2 control-label"></label>
                      <div class="col-md-10">
                        <img class="custom-image" :src="image_source">
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
                address:'',
                phone:'',
                sex:'',
                birth_date:'',
                blood_group:'',
                type:'',
                working_hours:'',
                status:'',
                image:'',
                email:'',
                password:'',
                password_confirmation:'',

              },
              AllError:[],
              image_source:"https://images.onlinelabels.com/images/clip-art/GDJ/Male%20Avatar-277081.png",
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
                        this.LoadingStatus();
                        _this.AllError=[];
                        _this.resetForm();
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
                this.image_source=event.target.result;
              }
              reader.readAsDataURL(file)
      		},
          resetForm() {
              var _this = this;
              var FORM = _this.UsersForm;
              Object.keys(FORM).forEach(function (key, index) {
                  FORM[key] = '';
              });
          },
        },
      }
  </script>
