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

        <form @submit.prevent="UpdateShift">
          <fieldset class="content-group">
            <form class="form-horizontal" @submit.prevent="AddUsers">
            <legend class="text-bold">Add New User</legend>
            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Name:</label>
                  <div class="col-md-10">
                    <input type="text" v-model="EditUsersForm.users_name" class="form-control" placeholder="Name" >
                    <span class="text-danger" v-if="AllError.users_name" v-text="AllError.users_name[0]"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">User type: </label>
                  <div class="col-md-10">
                    <select v-model="EditUsersForm.type" class="form-control">
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
                    <textarea v-model="EditUsersForm.address" class="form-control" placeholder="Enter Address"></textarea>
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
                    <input type="text" v-model="EditUsersForm.phone" class="form-control" placeholder="Enter Phone Number" >
                    <span class="text-danger" v-if="AllError.phone" v-text="AllError.phone[0]"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Sex: </label>
                  <div class="col-md-10">
                    <select v-model="EditUsersForm.sex" class="form-control">
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
                    <input type="date" v-model="EditUsersForm.birth_date" class="form-control" placeholder="Enter Birth Date" >
                    <span class="text-danger" v-if="AllError.birth_date" v-text="AllError.birth_date[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Blood Group:</label>
                  <div class="col-md-10">
                    <select v-model="EditUsersForm.blood_group" class="form-control">
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
                    <input type="text" v-model="EditUsersForm.email" class="form-control" placeholder="Enter Email" >
                    <span class="text-danger" v-if="AllError.email" v-text="AllError.email[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
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
                        <img class="custom-image" v-if="EditUsersForm.image" :src="EditUsersForm.image">
                        <img class="custom-image" else :src="image_source">
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
            EditUsersForm:{
                users_id:'',
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
                // password:'',
                // password_confirmation:'',
              },
              AllError:[],
              GetDataValue:[],
              image_source:"https://images.onlinelabels.com/images/clip-art/GDJ/Male%20Avatar-277081.png",
          }
        },
        methods:{
          UpdateShift:function()
          {
            const _this=this;
            this.axios.put(base_path+'users/'+_this.EditUsersForm.users_id,this.EditUsersForm)
            .then((response)=>{
                if(response.data.status==201)
                {
                    this.$toastr.success('User Edited Successfully', 'Success');
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
          ImageGet:function(event)
      		{
      			let file=event.target.files[0];
    			  let reader=new FileReader();
              reader.onload=event =>{
              	this.EditUsersForm.image = event.target.result;
              }
              reader.readAsDataURL(file)
      		},
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
        },
        mounted(){
          const _this=this;
          this.GetData();
           this.axios.get(base_path+'users/'+this.$route.params.id+'/edit')
            .then((response)=>{
              console.log(response.data);
              _this.EditUsersForm=response.data,
              _this.EditUsersForm.password=''
            })
        }
      }
  </script>
