<template>
<div class="laboratorist">
      <button type="button" class="btn btn-info pull-right">
            <router-link to="/laboratorist_add" class="router_link_button">Add New Laboratorist</router-link>
      </button>
    <br><br>
    <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title"></h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
              <li><a data-action="reload" @click="GetLaboratoristList"></a></li>
              <li><a data-action="close"></a></li>
            </ul>
          </div>
          <div id="DataTables_Table_2_filter" class="dataTables_filter  margin-0">
              <select class="form-control" @change="GetLaboratoristList" v-model="custom_row">
                  <option v-for="row in select_row" v-text="row"></option>
              </select>
          </div>
          <div id="DataTables_Table_2_filter" class="dataTables_filter">
              <label>
                  <input type="search" v-model="search" @keyup="GetLaboratoristList" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_2">
              </label>
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
            <tr v-for="(laboratorist_data,index) in LaboratoristList.data">
              <td v-text="index+1"></td>
              <td v-text="laboratorist_data.users_name"></td>
              <td v-text="laboratorist_data.email"></td>
              <td v-text="laboratorist_data.phone"></td>
              <td>
                  <span v-if="laboratorist_data.sex == 1">Male</span>
                  <span v-else-if="laboratorist_data.sex == 2">Female</span>
                  <span v-else-if="laboratorist_data.sex == 3">Common</span>
              </td>
              <td v-text="laboratorist_data.blood_group"></td>
              <td>
                  <span  v-if="laboratorist_data.status==1" class='text-success'><i class="fa fa-check text-success"></i></span>
                  <span  v-else-if="laboratorist_data.status==2" class='text-danger'><i class="fa fa-close text-danger"></i></span>
              </td>
              <td class="text-center">
                  <button class="btn btn-danger" @click="DeleteLaboratorist(laboratorist_data.users_id,index)">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                  </button>

                  <button v-if="laboratorist_data.status==1" class="btn btn-success" @click="StatusChange(laboratorist_data.users_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>

                   <button v-else class="btn btn-primary" @click="StatusChange(laboratorist_data.users_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>
                 <button class="btn btn-info">
                  <router-link :to="{ name: 'edit-laboratorist', params:{laboratorist_id: laboratorist_data.users_id }}">
                      <i class="fa fa-pencil-square-o router_link_color" aria-hidden="true"></i>
                  </router-link>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <pagination :data="LaboratoristList"  :limit=3 @pagination-change-page="GetLaboratoristList">
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
        return {
            LaboratoristList:{},
            search:'',
            custom_row:10,
            select_row:[10,20,30,40,50]
        }
      },
      methods:{
          GetLaboratoristList:function(page = 1,custom_row=10)
          {
              const _this=this;
              const main_url=base_path+'laboratorist?q='+_this.search+'&page='+page+'&row='+_this.custom_row;
              if(_this.search=='')
              {
                this.LoadingStatus();
              }
              this.axios.get(main_url)
              .then((response)=>{
                  _this.LaboratoristList=response.data;
                  console.log(response.data);
              })
              .catch((error)=>{
                  console.log(error)
              })
          },
          DeleteLaboratorist:function(id,index)
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
                  this.axios.delete(base_path+'laboratorist/'+id)
                  .then((response)=>{
                      console.log(response);
                      if(response.data.status===200)
                      {
                          _this.LaboratoristList.data.splice(index,1);
                              swal.fire(
                                'Deleted!',
                                'Laboratorist Deleted Successfully',
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
              this.axios.get(base_path+'laboratorist/'+id)
              .then((response)=>{
                  if(response.data.status===200)
                  {
                       this.$toastr.success('Laboratorist Status Changed Into Active', 'Success');
                  }

                   if(response.data.status===202)
                  {
                      this.$toastr.warning('Laboratorist Status Changed Into Inactive', 'Success');
                  }
                  this.LoadingStatus();
                  _this.GetLaboratoristList();
              })
              .catch((error)=>{
                  console.log(error)
              })

          },
      },
      mounted()
      {
        this.LoadingStatus();
        this.GetLaboratoristList();
      }
    }
</script>
