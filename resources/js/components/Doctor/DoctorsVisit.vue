<template>
<div class="doctors_visit">
      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
            Add New DoctorsVisit
      </button>
<form class="form-horizontal" @submit.prevent="AddDoctorsVisit">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New DoctorsVisit</h5>
                      <button type="button" class="close" @click="ClearForm" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                            <div class="col-md-12">
                              <div class="panel panel-flat">
                                  <div class="panel-heading">
                                      <div class="heading-elements">
                                          <ul class="icons-list">
                                              <li><a data-action="reload" @click="ClearForm"></a></li>
                                          </ul>
                                      </div>
                                  </div>

                                  <div class="panel-body">

                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Doctor's Time:</label>
                                          <div class="col-lg-9">
                                              <select class="form-control" v-model="DoctorsVisitForm.status">
                                                  <option value=''>--Select--</option>
                                                  <option value='1'>Monthly</option>
                                                  <option value="2">Weekly</option>
                                              </select>
                                              <span class="text-danger" v-if="AllError.status" v-text="AllError.status[0]"></span>
                                          </div>
                                      </div>


                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" @click="ClearForm" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit"  class="btn btn-success">Save</button>
                  </div>
              </div>
          </div>
        </div>
    </form>
    <form class="form-horizontal" @submit.prevent="UpdateDoctorsVisit">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit {{  DoctorsVisitForm.doctors_visit_name }} DoctorsVisit</h5>
                      <button type="button" class="close" @click="ClearForm" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="reload" @click="ClearForm"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body">



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" @click="ClearForm" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit"  class="btn btn-success">Save</button>
                  </div>
              </div>
          </div>
        </div>
    </form>
    <br><br>
    <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title"></h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
              <li><a data-action="reload" @click="GetDoctorsVisitList"></a></li>
              <li><a data-action="close"></a></li>
            </ul>
          </div>
        </div>
        <table class="table datatable-pagination">
          <thead>
            <tr>
              <th>Sl No</th>
              <th>DoctorsVisit Name</th>
              <th>Description</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(doctors_visit_list,index) in DoctorsVisitList.data">
              <td v-text="index+1"></td>
              <td>{{doctors_visit_list.doctors_visit_name}}</td>
              <td>{{doctors_visit_list.description | readMore(10,'...')}}</td>
              <td>
                  <span  v-if="doctors_visit_list.status==1" class='text-success'>Active</span>
                  <span  v-else class='text-danger'>Inactive</span>
              </td>
              <td class="text-center">
                  <button class="btn btn-danger" @click="DeleteDoctorsVisit(doctors_visit_list.doctors_visit_id,index)"><i class="fa fa-trash" aria-hidden="true"></i></button>

                  <button v-if="doctors_visit_list.status==1" class="btn btn-success" @click="StatusChange(doctors_visit_list.doctors_visit_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>

                   <button v-else class="btn btn-primary" @click="StatusChange(doctors_visit_list.doctors_visit_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>

                  <button class="btn btn-info" data-toggle="modal" data-target="#editModal"  @click="EditDoctorsVisit(doctors_visit_list.doctors_visit_id,doctors_visit_list,index)">
                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </button>
              </td>
            </tr>


          </tbody>
        </table>
        <pagination :data="DoctorsVisitList"  :limit=3 @pagination-change-page="GetDoctorsVisitList">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
        </pagination>
      </div>
  </div>
</template>
<script>
    export default{
      name:"DoctorsVisit",
      data(){
          return{
            DoctorsVisitList:{},
            DoctorsVisitForm:{
                from_date:'',
                to_date:'',
                days:'',
                from_time:'',
                to_time:'',
                status:'', /*Monthly OR Weekly*/
            },
            EditDoctorsVisitForm:{
                from_date:'',
                to_date:'',
                days:'',
                from_time:'',
                to_time:'',
                status:'', /*Monthly OR Weekly*/
            },
            AllError:[],
            update_index:''
          }
      },
      methods:{
        AddDoctorsVisit:function(){
            const _this = this;
            this.axios.post(base_path+"doctors_visit",_this.DoctorsVisitForm)
              .then((response)=>{
                  if(response.data.status==201)
                  {
                      this.$toastr.success('DoctorsVisit Added Successfully', 'Success');
                      //_this.DoctorsVisitList.data.push(response.data.data);
                      _this.GetDoctorsVisitList();
                      $(".close").click();
                      _this.ClearForm();
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
        GetDoctorsVisitList(page = 1)
        {
            const _this=this;
            this.axios.get(base_path+'doctors_visit?page='+page)
            .then((response)=>{
                _this.DoctorsVisitList=response.data;
                //console.log(response.data);
            })
            .catch((error)=>{
                console.log(error)
            })
        },
        EditDoctorsVisit:function(id,data,index)
        {
            const _this=this;
            _this.update_index=index;
            _this.EditDoctorsVisitForm.doctors_visit_id=id;
            _this.EditDoctorsVisitForm=JSON.parse(JSON.stringify(data));
        },

        UpdateDoctorsVisit:function()
        {
          const _this=this;
          this.axios.put(base_path+'doctors_visit/'+_this.EditDoctorsVisitForm.doctors_visit_id,this.EditDoctorsVisitForm)
          .then((response)=>{
              if(response.data.status==201)
              {
                  this.$toastr.success('DoctorsVisit Edited Successfully', 'Success');
                  _this.GetDoctorsVisitList();
                  $(".close").click();
                  _this.ClearForm();
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
        DeleteDoctorsVisit:function(id,index)
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
                _this.GetDoctorsVisitList();
                this.LoadingStatus();
                this.axios.delete(base_path+'doctors_visit/'+id)
                .then((response)=>{
                    console.log(response);
                    if(response.data.status==200)
                    {
                        _this.DoctorsVisitList.data.splice(index,1);
                            swal.fire(
                              'Deleted!',
                              'DoctorsVisit Hasbeen Deleted',
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
        ClearForm:function()
        {
          const _this=this;
          _this.AllError=[];
          _this.DoctorsVisitForm.doctors_visit_name='';
          _this.DoctorsVisitForm.description='';
          _this.DoctorsVisitForm.status='';
        },
      },
      mounted()
      {
        this.LoadingStatus();
        //this.GetDoctorsVisitList();
      }
    }
</script>
