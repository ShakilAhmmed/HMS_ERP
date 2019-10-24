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

        <form @submit.prevent="Addsystem">
          <fieldset class="content-group">
            <form class="form-horizontal">
            <legend class="text-bold">Add New System</legend>
            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">System Name:</label>
                  <div class="col-md-10">
                    <input type="text" v-model="Systemform.system_name" class="form-control" placeholder="System Name" >
                     <span class="text-danger" v-if="AllError.system_name" v-text="AllError.system_name[0]"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">System Title: </label>
                  <div class="col-md-10">
                    <input type="text" v-model="Systemform.system_title" class="form-control" placeholder="Enter Guardian Name" >
                     <span class="text-danger" v-if="AllError.system_title" v-text="AllError.system_title[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12">
                <div class="row">
                  <label class="col-md-1 control-label text-left">Address: </label>
                  <div class="col-md-11">
                    <textarea class="form-control" v-model="Systemform.address" placeholder="Enter Address"></textarea>
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
                    <input type="text" v-model="Systemform.phone" class="form-control" placeholder="Enter Phone Number" >
                     <span class="text-danger" v-if="AllError.phone" v-text="AllError.phone[0]"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                 <div class="row">
                	<label class="col-lg-2 control-label">Paypal Email :</label>
                  <div class="col-md-10">
                    <input type="text" v-model="Systemform.paypal_email" class="form-control" placeholder="Enter Phone Number" >
                     <span class="text-danger" v-if="AllError.paypal_email" v-text="AllError.paypal_email[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">Purchase Code:</label>
                  <div class="col-md-10">
                    <input type="text" v-model="Systemform.purchase_code" class="form-control" placeholder="Enter Birth Date" >
                    <span class="text-danger" v-if="AllError.purchase_code" v-text="AllError.purchase_code[0]"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">Currency: </label>
                  <div class="col-md-10">
                    <input type="text" v-model="Systemform.currency" class="form-control" placeholder="Enter Age" >
                     <span class="text-danger" v-if="AllError.currency" v-text="AllError.users_name[0]"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="row">
                  <label class="col-lg-2 control-label">System Email:</label>
                  <div class="col-md-10">
                    <input type="text" v-model="Systemform.system_email" class="form-control" placeholder="Enter Birth Date" >
                    <span class="text-danger" v-if="AllError.system_email" v-text="AllError.system_email[0]"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <label class="col-md-2 control-label text-left">System Language: </label>
                  <div class="col-md-10">
                    <input type="text" v-model="Systemform.system_language" class="form-control" placeholder="Enter Age" >
                     <span class="text-danger" v-if="AllError.system_language" v-text="AllError.system_language[0]"></span>
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
	export default {
    data(){
      return {
        Systemform:{
          system_name:'',
          system_title:'',
          address:'',
          phone:'',
          paypal_email:'',
          purchase_code:'',
          currency:'',
          system_email:'',
          system_language:'',
          logo:''
        },
        AllError:[],
      }
    },
    methods:{
      Addsystem:function(){
        const _this=this;
        this.axios.post(base_path+"system",_this.Systemform)
        .then((response)=>{
          if(response.data.status == 201)
          {
            this.$toastr.success('Users Added Successfully', 'Success');
            _this.Clearform();
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
      ImageGet:function(event){
        let file=event.target.files[0];
        let reader=new FileReader();
          reader.onload=event =>{
            this.Systemform.logo = event.target.result;
          }
          reader.readAsDataURL(file)
      },
      Clearform:function()
        {
          const _this=this;
          _this.AllError=[];
          _this.Systemform.system_name='';
          _this.Systemform.system_title='';
          _this.Systemform.address='';
          _this.Systemform.phone='';
          _this.Systemform.paypal_email='';
          _this.Systemform.purchase_code='';
          _this.Systemform.currency='';
          _this.Systemform.system_language='';
          _this.Systemform.logo='';
        },
    },
		mounted(){
            this.LoadingStatus();
        },
	}
</script>
