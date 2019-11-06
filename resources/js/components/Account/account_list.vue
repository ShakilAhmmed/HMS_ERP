<template>
<div class="patient">
      <button type="button" class="btn btn-info pull-right">
            <router-link to="/account" class="router_link_button">Add New Account</router-link>
      </button>
    <br><br>
    <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title"></h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
              <li><a data-action="reload" ></a></li>
              <li><a data-action="close"></a></li>
            </ul>
          </div>
          <div id="DataTables_Table_2_filter" class="dataTables_filter  margin-0">
            
          </div>
          <div id="DataTables_Table_2_filter" class="dataTables_filter">
              
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
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(account,index) in  AccountList.data" :key="index">
              <td v-text="index+1"></td>
              <td>{{account.users_name}}</td>
              <td>{{account.email}}</td>
              <td>{{account.phone}}</td>
              <td>
                  <span v-if="account.sex == 1">Male</span>
                  <span v-else-if="account.sex == 2">Female</span>
                  <span v-else-if="account.sex == 3">Common</span>
              </td>
              <td v-text="account.blood_group"></td>
              <td>
                  <span v-if="account.status==1"  class='text-success'><i class="fa fa-check text-success"></i></span>
                  <span v-else-if="account.status==2"  class='text-danger'><i class="fa fa-close text-danger"></i></span>
              </td>
              <td class="text-center">
                  <button class="btn btn-danger" @click="Deleteaccount(account.users_id,index)">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                  </button>

                  <button v-if="account.status==1" class="btn btn-success" @click="StatusChange(account.users_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>

                   <button v-else  class="btn btn-primary" @click="StatusChange(account.users_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>
                 <button class="btn btn-info">
                  <router-link :to="{ name: 'edit_account', params:{account_id: account.users_id }}">
                      <i class="fa fa-pencil-square-o router_link_color" aria-hidden="true"></i>
                  </router-link>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <pagination :data="AccountList"  :limit=3 @pagination-change-page="getaccount">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
        </pagination>
      </div>
  </div>
</template>

<script>
    export default{
      
      data(){
        return {
            AccountList:{},
            
        }
      },
      methods:{
          getaccount:function(page=1){
                const _this=this;
                this.axios.get(this.baseUrl+'account?page'+page)
                .then((response)=>{
                    _this.AccountList = response.data
                })
                .catch((error)=>{
                    console.error();
                })
            },
          Deleteaccount:function(id,index)
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
                  this.axios.delete(base_path+'account/'+id)
                  .then((response)=>{
                      console.log(response);
                      if(response.data.status===200)
                      {
                          _this.AccountList.data.splice(index,1);
                              swal.fire(
                                'Deleted!',
                                'Account Deleted Successfully',
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
          StatusChange:function(id){
              const _this=this;
              this.axios.get(base_path+'account/'+id)
              .then((response)=>{
                  if(response.data.status===200)
                  {
                       this.$toastr.success('Account Changed Into Active', 'Success');
                  }

                   if(response.data.status===202)
                  {
                      this.$toastr.warning('Account Changed Into Inactive', 'Success');
                  }
                  this.LoadingStatus();
                  _this.getaccount();
              })
              .catch((error)=>{
                  console.log(error)
              })

          },
      },
      mounted()
      {
        this.LoadingStatus();
        this.getaccount();
      }
    }
</script>