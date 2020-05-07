<template>
	<div class="login">
        <div class="page-container login-container">

            <!-- Page content -->
            <div class="page-content">

                <!-- Main content -->
                <div class="content-wrapper">

                    <!-- Content area -->
                    <div class="content">
                		<form @submit.prevent="Login">
                            <div class="panel panel-body login-form">
                                <div class="text-center">
                                    <h5 class="content-group-lg">Login to your account <small class="display-block">Enter your credentials</small></h5>
                                </div>

                                <div class="form-group has-feedback has-feedback-left">
                                    <input type="text" class="form-control" placeholder="Email" v-model="LoginData.email">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                    <span class="text-danger" v-if="ValiationError.email" v-text="ValiationError.email[0]"></span>
                                </div>

                                <div class="form-group has-feedback has-feedback-left">
                                    <input type="text" class="form-control" placeholder="Password" v-model="LoginData.password">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                    <span class="text-danger" v-if="ValiationError.password" v-text="ValiationError.password[0]"></span>
                                </div>

                                <div class="form-group login-options">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" class="styled" checked="checked">
                                                Remember
                                            </label>
                                        </div>

                                        <div class="col-sm-6 text-right">
                                            <a href="login_password_recover.html">Forgot password?</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                        
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</div>
</template>
<script>
	export default{
		data(){
			return{
                LoginData:{
                    email : '',
                    password : '',
                },
                ValiationError : [],
			}
		},
		methods:{
			CheckPage:function(url){
		        if(url=="home")
		        {
		          this.$router.push("home")
		        }
		    },
            Login : function (){
                const _this = this;
                this.axios.post( base_path + 'login',_this.LoginData)
                .then((response) => {
                    if (response.data.error == 201) {
                        _this.ValiationError = response.data.data;
                    }else{
                        window.localStorage.setItem('access_token', response.data.access_token);
                    }
                })
                .catch((error) => {
                    console.log(error);
                })
            }
		},
		mounted(){
			
		}
	}
</script>