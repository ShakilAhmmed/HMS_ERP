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

        <form @submit.prevent="AccountUpdate">
          <fieldset class="content-group">
            <form class="form-horizontal">
            <legend class="text-bold">Update {{Accountedit.users_name}} Accountant</legend>
            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Name:</label>
                  <div class="col-md-10">
                    <input type="text"  class="form-control" v-model="Accountedit.users_name" placeholder="Name" >
                     <span class="text-danger" v-if="errors.users_name" v-text="errors.users_name[0]"></span>
                  </div>
                </div>
              </div>

             <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Shift: </label>
                  <div class="col-md-10">
                   <select class="form-control" v-model="Accountedit.shift_id">
                    <option value=''>--Select--</option>
                    <option v-for="getshift in getshiftdata.shift" v-text="getshift.shift_name" :value="getshift.shift_id"></option>
                   </select>
                     <span class="text-danger" v-if="errors.shift_id" v-text="errors.shift_id[0]"></span> 
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Address: </label>
                  <div class="col-md-10">
                    <textarea class="form-control" v-model="Accountedit.address"  placeholder="Enter Address"></textarea>
                    <span class="text-danger" v-if="errors.address" v-text="errors.address[0]"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Working Hours: </label>
                  <div class="col-md-10">
                     <input type="text" class="form-control" v-model="Accountedit.working_hours"  placeholder="Working Hours" >
                     <span class="text-danger" v-if="errors.working_hours" v-text="errors.working_hours[0]"></span>
                  </div>
                </div>
              </div>

            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Phone:</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" v-model="Accountedit.phone"  placeholder="Enter Phone Number" >
                    <span class="text-danger" v-if="errors.phone" v-text="errors.phone[0]"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Sex: </label>
                  <div class="col-md-10">
                    <select  class="form-control"  v-model="Accountedit.sex">
                      <option value="">Select</option>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                      <option value="3">Common</option>
                    </select>
                    <span class="text-danger" v-if="errors.sex" v-text="errors.sex[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Birth Date:</label>
                  <div class="col-md-10">
                    <input type="date" v-model="Accountedit.birth_date"  class="form-control" placeholder="Enter Birth Date" >
                    <span class="text-danger" v-if="errors.birth_date" v-text="errors.birth_date[0]"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Age: </label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" v-model="Accountedit.age"  placeholder="Enter Age" >
                    <span class="text-danger" v-if="errors.age" v-text="errors.age[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Blood Group:</label>
                  <div class="col-md-10">
                    <select  class="form-control"  v-model="Accountedit.blood_group">
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
                    <span class="text-danger" v-if="errors.blood_group" v-text="errors.blood_group[0]"></span>
                  </div>
                </div>
              </div>


              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Image:</label>
                  <div class="col-md-10">
                    <input type="file" class="form-control" @change="ImageGet">
                   <span class="text-danger" v-if="errors.project_logo_ext" v-text="errors.project_logo_ext"></span>
                  </div>
                </div>
              </div>

            </div>


            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Status:</label>
                  <div class="col-md-10">
                    <select class="form-control"  v-model="Accountedit.status">
                        <option value=''>Select</option>
                        <option value='1'>Active</option>
                        <option value="2">Inactive</option>
                    </select>
                     <span class="text-danger" v-if="errors.status" v-text="errors.status[0]"></span>
                  </div>
                </div>
              </div>

            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Email:</label>
                  <div class="col-md-10">
                    <input type="text"   v-model="Accountedit.email" class="form-control" placeholder="Enter Email" >
                    <span class="text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Password:</label>
                  <div class="col-md-10">
                    <input type="password" v-model="Accountedit.password"  class="form-control" placeholder="Enter Password" >

                    <span class="text-warning" v-if="(Accountedit.password && Accountedit.password.length ? Accountedit.password.length : 0) == 0"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Password Is Empty</span>
                     <span class="text-danger" v-else-if="(Accountedit.password && Accountedit.password.length ? Accountedit.password.length : 0) < 8"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Password Is Weak</span>
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
                    <span class="text-danger" v-if="confirm_password.length !=0 &&  Accountedit.password && Accountedit.password.length !=0 && Accountedit.password != confirm_password"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Password Not Mactched</span>
                     <span class="text-success" v-else-if="Accountedit.password && Accountedit.password.length !=0 && Accountedit.password == confirm_password"><i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;Password Matched</span>
                     <span class="text-danger" v-if="errors.password" v-text="errors.password[0]"></span>
                      
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
	export default {
		data(){
			return {
        getshiftdata:[],
				Accountedit:{
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
				image:'',
				email:'',
				password:'',
				type:6
			},
			image_source:"https://images.onlinelabels.com/images/clip-art/GDJ/Male%20Avatar-277081.png",
			confirm_password:'',
			errors:[]
		   }
		},
		methods:{
    getshift:function(){
          const _this=this;
          this.axios.get(this.baseUrl+'get_shift_data')
          .then((response)=>{
            _this.getshiftdata = response.data;
            console.log(response.data);
          })
          .catch((error)=>{
            console.error();
          })
        },
			ImageGet:function(event)
	          {
	            let file=event.target.files[0];
	            let reader=new FileReader();
	            this.LoadingStatus();
	            reader.onload=event =>{
	              this.Accountedit.image = event.target.result;
	              this.image_source=event.target.result;
	            }
	              reader.readAsDataURL(file)
	          },
			Getaccount:function(){
              const _this=this;
              this.axios.get(base_path+'account/'+this.$route.params.account_id+'/edit')
               .then((response)=>{
                 console.log(response.data);
                 _this.Accountedit=response.data;
                 _this.image_source=response.data.image;
               })
          	},
			AccountUpdate:function(){
              const _this=this;
              this.axios.put(base_path+'account/'+_this.Accountedit.users_id,_this.Accountedit)
              .then((response)=>{
                  console.log(response.data);
                  if(response.data.status==201)
                  {
                      this.$toastr.success('Account Edited Successfully', 'Success');
                      this.LoadingStatus();
                  }
                  else
                  {
                      _this.errors=response.data.errors;
                  }
              })
              .catch((error)=>{
                console.error();
              })
          },
        },
		mounted(){
			this.LoadingStatus();
			this.Getaccount();
      this.getshift();
		}
	}
</script>