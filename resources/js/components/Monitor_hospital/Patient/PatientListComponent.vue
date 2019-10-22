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
              <td class="text-center">
                  <button class="btn btn-danger" @click="DeletePatient(patient_data.users_id,index)">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                  </button>

                  <button v-if="patient_data.status==1" class="btn btn-success" @click="StatusChange(patient_data.users_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>

                   <button v-else class="btn btn-primary" @click="StatusChange(patient_data.users_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>

                  <button class="btn btn-info" data-toggle="modal" data-target="#editModal">
                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
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
          DeletePatient:function(id,index)
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
                  this.axios.delete(base_path+'patient/'+id)
                  .then((response)=>{
                      console.log(response);
                      if(response.data.status===200)
                      {
                          _this.PatientList.data.splice(index,1);
                              swal.fire(
                                'Deleted!',
                                'Patient Deleted Successfully',
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
              this.axios.get(base_path+'patient/'+id)
              .then((response)=>{
                  if(response.data.status===200)
                  {
                       this.$toastr.success('Patient Status Changed Into Active', 'Success');
                  }

                   if(response.data.status===202)
                  {
                      this.$toastr.warning('Patient Status Changed Into Inactive', 'Success');
                  }
                  this.LoadingStatus();
                  _this.GetPatientList();
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
