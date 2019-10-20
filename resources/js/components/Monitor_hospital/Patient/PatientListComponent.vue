<template>
<div class="patient">
      <button type="button" class="btn btn-info pull-right">
            <router-link to="/patient" class="router_link_button">Add New Patient</router-link>
      </button>
    <br><br>
    <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title"></h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
              <li><a data-action="reload" @click="GetPatientList"></a></li>
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
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(patient_data,index) in PatientList.data">
              <td v-text="index+1"></td>
              <td v-text="patient_data.users_name"></td>
              <td v-text="patient_data.email"></td>
              <td v-text="patient_data.phone"></td>
              <td>
                  <span v-if="patient_data.sex == 1">Male</span>
                  <span v-else-if="patient_data.sex == 2">Female</span>
                  <span v-else-if="patient_data.sex == 3">Common</span>
              </td>
              <td v-text="patient_data.blood_group"></td>
              <td>
                  <span  v-if="patient_data.status==1" class='text-success'><i class="fa fa-check text-success"></i></span>
                  <span  v-else-if="patient_data.status==2" class='text-danger'><i class="fa fa-close text-danger"></i></span>
              </td>
              <td class="text-center table_action_display">
                  <button class="btn btn-danger">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </button>
                  <button  class="btn btn-warning">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>
                  <button class="btn btn-info">
                        <i class="fa fa-pencil-square-o router_link_color" aria-hidden="true"></i>
                  </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
  </div>
</template>
<script>
    export default{
      name:"Users",
      data(){
        return {
            PatientList:{}
        }
      },
      methods:{
          GetPatientList:function(page = 1)
          {
              const _this=this;
              this.axios.get(base_path+'patient?page='+page)
              .then((response)=>{
                  _this.PatientList=response.data;
                  console.log(response.data);
              })
              .catch((error)=>{
                  console.log(error)
              })
          },
      },
      mounted()
      {
        this.LoadingStatus();  
        this.GetPatientList();
        console.log("Ok");
      }
    }
</script>
