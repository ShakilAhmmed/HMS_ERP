
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
        <form @submit.prevent="AddNewNurse">
          <fieldset class="content-group">
            <form class="form-horizontal">
            <legend class="text-bold">Add New Nurse</legend>
            <div class="form-group">
              <div class="col-md-12">
                <div class="row">
                  <label class="col-lg-1 control-label">Name:</label>
                  <div class="col-md-11">
                    <input type="text"  class="form-control" v-model="AddNurse.users_name" placeholder="Name" >
                    <span class="text-danger" v-if="Errors.users_name" v-text="Errors.users_name[0]"></span>
                  </div>
                </div>
              </div>

              <!-- <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Guardian Name: </label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" v-model="AddNurse.guardian_name" placeholder="Enter Guardian Name" >
                    <span class="text-danger" v-if="Errors.guardian_name" v-text="Errors.guardian_name[0]"></span>
                  </div>
                </div>
              </div> -->
            </div>

            <div class="form-group">
              <div class="col-md-12">
                <div class="row">
                  <label class="col-md-1 control-label text-left">Address: </label>
                  <div class="col-md-11">
                    <textarea class="form-control" v-model="AddNurse.address" placeholder="Enter Address"></textarea>
                    <span class="text-danger" v-if="Errors.address" v-text="Errors.address[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Phone:</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" v-model="AddNurse.phone" placeholder="Enter Phone Number" >
                    <span class="text-danger" v-if="Errors.phone" v-text="Errors.phone[0]"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Sex: </label>
                  <div class="col-md-10">
                    <select  class="form-control" v-model="AddNurse.sex">
                      <option value="">Select</option>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                      <option value="3">Common</option>
                    </select>
                    <span class="text-danger" v-if="Errors.sex" v-text="Errors.sex[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Shift:</label>
                  <div class="col-md-10">
                    <select  class="form-control" v-model="AddNurse.shift_id">
                      <option value="">Select</option>
                      <option v-for="data_value in ShiftData.shift" :value="data_value.shift_id" v-text="data_value.shift_name">Select</option>
                    </select>
                    <span class="text-danger" v-if="Errors.shift_id" v-text="Errors.shift_id[0]"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Working Hours:</label>
                  <div class="col-md-10">
                    <input class="form-control" v-model="AddNurse.working_hours" type="number">
                    <span class="text-danger" v-if="Errors.working_hours" v-text="Errors.working_hours[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Birth Date:</label>
                  <div class="col-md-10">
                    <input type="date" v-model="AddNurse.birth_date" class="form-control" placeholder="Enter Birth Date" >
                    <span class="text-danger" v-if="Errors.birth_date" v-text="Errors.birth_date[0]"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Age: </label>
                  <div class="col-md-10">
                    <input type="number" class="form-control" v-model="AddNurse.age" placeholder="Enter Age" >
                    <span class="text-danger" v-if="Errors.age" v-text="Errors.age[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Blood Group:</label>
                  <div class="col-md-10">
                    <select  class="form-control" v-model="AddNurse.blood_group">
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
                    <span class="text-danger" v-if="Errors.blood_group" v-text="Errors.blood_group[0]"></span>
                  </div>
                </div>
              </div>


              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Image:</label>
                  <div class="col-md-10">
                    <input type="file" class="form-control" @change="ImageGet">
                    <span class="text-danger" v-if="Errors.project_logo_ext" v-text="Errors.project_logo_ext"></span>
                  </div>
                </div>
              </div>

            </div>


            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Status:</label>
                  <div class="col-md-10">
                    <select class="form-control" v-model="AddNurse.status">
                        <option value=''>Select</option>
                        <option value='1'>Active</option>
                        <option value="2">Inactive</option>
                    </select>
                    <span class="text-danger" v-if="Errors.status" v-text="Errors.status[0]"></span>
                  </div>
                </div>
              </div>

            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Email:</label>
                  <div class="col-md-10">
                    <input type="text"  v-model="AddNurse.email" class="form-control" placeholder="Enter Email" >
                    <span class="text-danger" v-if="Errors.email" v-text="Errors.email[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Password:</label>
                  <div class="col-md-10">
                    <input type="password" v-model="AddNurse.password"  class="form-control" placeholder="Enter Password" >

                    <span class="text-warning" v-if="(AddNurse.password && AddNurse.password.length ? AddNurse.password.length : 0) == 0"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Password Is Empty</span>
                     <span class="text-danger" v-else-if="(AddNurse.password && AddNurse.password.length ? AddNurse.password.length : 0) < 8"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Password Is Weak</span>
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
                    <input type="password" v-model="confirm_password" class="form-control" placeholder="Enter Password" >
                    <span class="text-danger" v-if="confirm_password.length !=0 &&  AddNurse.password && AddNurse.password.length !=0 && AddNurse.password != confirm_password"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Password Not Mactched</span>
                     <span class="text-success" v-else-if="AddNurse.password && AddNurse.password.length !=0 && AddNurse.password == confirm_password"><i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;Password Matched</span>

                      <span class="text-danger" v-if="Errors.password" v-text="Errors.password[0]"></span>
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
            <button  type="submit" class="btn btn-success">Submit <i class="icon-arrow-right14 position-right"></i></button>
          </div>
        </form>
      </div>
    </div>
    <!-- /form horizontal -->
  </div>
</template>
<script>
    export default{
       name:"Nurse",
       data(){
          return {
            AddNurse:{
              users_name:'',
              address:'',
              phone:'',
              sex:'',
              birth_date:'',
              age:'',
              blood_group:'',
              shift_id:'',
              working_hours:'',
              status:'',
              password:'',
              image:'',
              email:'',
              type:'4'
            },
            confirm_password:'',
            image_source:"https://images.onlinelabels.com/images/clip-art/GDJ/Male%20Avatar-277081.png",
            Errors:[],
            ShiftData : [],
          }
       },
       methods:{
         ImageGet:function(event){
            let file=event.target.files[0];
            let reader=new FileReader();
            this.LoadingStatus();
            reader.onload=event =>{
              this.AddNurse.image = event.target.result;
              this.image_source=event.target.result;
            }
              reader.readAsDataURL(file)
          },
          AddNewNurse:function(){
              const _this=this;
              axios.post(this.baseUrl+'nurse',_this.AddNurse)
              .then((response)=>{
                  console.log(response.data);
                  if(response.data.status===201){
                     this.$toastr.success('Users Added Successfully', 'Success');
                     this.LoadingStatus();
                     _this.resetForm();
                  }
                  else{
                     _this.Errors=response.data.errors
                  }
              })
              .catch((error)=>{
                  console.log(error)
              })
          },
          GetData:function(){
              const _this=this;
              axios.get(this.baseUrl+'nurse/create',_this.AddNurse)
              .then((response)=>{
                _this.ShiftData = response.data;
                  console.log(response.data);
              })
              .catch((error)=>{
                  console.log(error)
              })
          },

          resetForm() {
              var _this = this;
              var FORM = _this.AddNurse;
              Object.keys(FORM).forEach(function (key, index) {
                  FORM[key] = '';
              });
              _this.AddNurse.type = '4';
              _this.Errors=[];
              image_source:'';
          },

        },
        mounted(){
          this.LoadingStatus();
          this.GetData();
        }
      }
  </script>
