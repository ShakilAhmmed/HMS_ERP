<template>
<div class="diagnosis_report">
      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
            Add New DiagnosisReport
      </button>
<form class="form-horizontal" @submit.prevent="AddDiagnosisReport">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New DiagnosisReport</h5>
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
                                        <label class="col-lg-3 control-label">Doctor Name:</label>
                                        <div class="col-lg-9">
                                            <select v-model="DiagnosisReportForm.diagnosis_report_type_id" class="form-control">
                                              <option value="">--select--</option>
                                              <option v-for="data_value in DiagnosisReportType" :value="data_value.diagnosis_report_type_id" v-text="data_value.diagnosis_report_type_name"></option>
                                            </select>
                                            <span class="text-danger" v-if="AllError.diagnosis_report_type_id" v-text="AllError.diagnosis_report_type_id[0]"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Description:</label>
                                        <div class="col-lg-9">
                                            <textarea v-model="DiagnosisReportForm.description" class="form-control"></textarea>
                                            <span class="text-danger" v-if="AllError.description" v-text="AllError.description[0]"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Amount:</label>
                                        <div class="col-lg-9">
                                            <input type="text" v-model="DiagnosisReportForm.amount" class="form-control" placeholder="Enter Amount" >
                                            <span class="text-danger" v-if="AllError.amount" v-text="AllError.amount[0]"></span>
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
    <form class="form-horizontal" @submit.prevent="UpdateDiagnosisReport">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit {{  DiagnosisReportForm.diagnosis_report_name }} DiagnosisReport</h5>
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
                                            <label class="col-lg-3 control-label">DiagnosisReport Type Name:</label>
                                            <div class="col-lg-9">
                                                <select v-model="EditDiagnosisReportForm.diagnosis_report_type_id" class="form-control">
                                                  <option v-for="data_value in DiagnosisReportType" :value="data_value.diagnosis_report_type_id" v-text="data_value.diagnosis_report_type_name"></option>
                                                </select>
                                                <span class="text-danger" v-if="AllError.diagnosis_report_type_id" v-text="AllError.diagnosis_report_type_id[0]"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Description:</label>
                                            <div class="col-lg-9">
                                                <textarea v-model="EditDiagnosisReportForm.description" class="form-control"></textarea>
                                                <span class="text-danger" v-if="AllError.description" v-text="AllError.description[0]"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Amount:</label>
                                            <div class="col-lg-9">
                                                <input type="text" v-model="EditDiagnosisReportForm.amount" class="form-control" placeholder="Enter Amount" >
                                                <span class="text-danger" v-if="AllError.amount" v-text="AllError.amount[0]"></span>
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
    <br><br>
    <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title"></h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
              <li><a data-action="reload" @click="GetDiagnosisReportList"></a></li>
              <li><a data-action="close"></a></li>
            </ul>
          </div>
          <div id="DataTables_Table_2_filter" class="dataTables_filter  margin-0">
              <select class="form-control" @change="GetDiagnosisReportList" v-model="custom_row">
                  <option v-for="row in select_row" v-text="row"></option>
              </select>
          </div>
          <div id="DataTables_Table_2_filter" class="dataTables_filter">
              <label>
                  <input type="search" v-model="search" @keyup="GetDiagnosisReportList" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_2">
              </label>
          </div>
        </div>
        <table class="table datatable-pagination">
          <thead>
            <tr>
              <th>Sl No</th>
              <th>Patient Name</th>
              <th>Doctor Name</th>
              <th>Description</th>
              <th>Total</th>
              <th>Paid</th>
              <th>Due</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(diagnosis_report_list,index) in DiagnosisReportList.data">
              <td v-text="index+1"></td>
              <td>{{diagnosis_report_list.diagnosis_report_name}}</td>
              <td>{{diagnosis_report_list.diagnosis_report_type_name}}</td>
              <td>{{diagnosis_report_list.description | readMore(10,'...')}}</td>
              <td>{{diagnosis_report_list.amount}}</td>
              <td>{{diagnosis_report_list.amount}}</td>
              <td>{{diagnosis_report_list.amount}}</td>
              <td>
                  <span  v-if="diagnosis_report_list.diagnosis_report_status==1" class='text-success'>Active</span>
                  <span  v-else class='text-danger'>Inactive</span>
              </td>
              <td class="text-center">
                  <button class="btn btn-danger" @click="DeleteDiagnosisReport(diagnosis_report_list.diagnosis_report_id,index)"><i class="fa fa-trash" aria-hidden="true"></i></button>

                  <button v-if="diagnosis_report_list.diagnosis_report_status==1" class="btn btn-success" @click="StatusChange(diagnosis_report_list.diagnosis_report_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>

                   <button v-else class="btn btn-primary" @click="StatusChange(diagnosis_report_list.diagnosis_report_id)">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>

                  <button class="btn btn-info" data-toggle="modal" data-target="#editModal"  @click="EditDiagnosisReport(diagnosis_report_list.diagnosis_report_id,diagnosis_report_list,index)">
                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </button>
              </td>
            </tr>


          </tbody>
        </table>
        <pagination :data="DiagnosisReportList"  :limit=3 @pagination-change-page="GetDiagnosisReportList">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
        </pagination>
      </div>
  </div>
</template>
<script>
    export default{
      name:"DiagnosisReport",
      data(){
          return{
            DiagnosisReportList:{},
            DiagnosisReportForm:{
                diagnosis_report_name:'',
                diagnosis_report_type_id:'',
                description:'',
                amount:'',
                status:'',
            },
            EditDiagnosisReportForm:{
                diagnosis_report_id:'',
                diagnosis_report_name:'',
                diagnosis_report_type_id:'',
                description:'',
                amount:'',
                status:'',
            },
            DiagnosisReportType:[],
            DoctorPatientData:[],
            AllError:[],
            search:'',
            custom_row:10,
            select_row:[10,20,30,40,50],
            update_index:''
          }
      },
      methods:{
        AddDiagnosisReport:function(){
            const _this = this;
            this.axios.post(base_path+"diagnosis_report",_this.DiagnosisReportForm)
              .then((response)=>{
                  if(response.data.status==201)
                  {
                      this.$toastr.success('DiagnosisReport Added Successfully', 'Success');
                      //_this.DiagnosisReportList.data.push(response.data.data);
                      _this.GetDiagnosisReportList();
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
        GetDiagnosisReportList(page = 1,custom_row=10)
        {
            const _this=this;
            const main_url=base_path+'diagnosis_report?q='+_this.search+'&page='+page+'&row='+_this.custom_row;
            this.axios.get(main_url)
            .then((response)=>{
                _this.DiagnosisReportList=response.data.diagnosis_report;
                _this.DiagnosisReportType=response.data.diagnosis_report_type;
            })
            .catch((error)=>{
                console.log(error)
            })
        },
        GetDoctorPatientData()
        {
            const _this=this;
            const main_url=base_path+'diagnosis_report/create';
            this.axios.get(main_url)
            .then((response)=>{
                _this.DoctorPatientData = response.data;
            })
            .catch((error)=>{
                console.log(error)
            })
        },
        StatusChange:function(id)
        {
            const _this=this;
            this.axios.get(base_path+'diagnosis_report/'+id)
            .then((response)=>{
              if(response.data.status===200)
              {
                   this.$toastr.success('DiagnosisReport Status Changed Into Active', 'Success');
              }

              if(response.data.status===202)
              {
                  this.$toastr.warning('DiagnosisReport Status Changed Into Inactive', 'Success');
              }
              _this.LoadingStatus();
              _this.GetDiagnosisReportList();
            })
            .catch((error)=>{
              console.error();
            })
        },

        EditDiagnosisReport:function(id,data,index)
        {
            const _this=this;
            _this.update_index=index;
            _this.EditDiagnosisReportForm.diagnosis_report_id=id;
            _this.EditDiagnosisReportForm=JSON.parse(JSON.stringify(data));

        },

        UpdateDiagnosisReport:function()
        {
          const _this=this;
          this.axios.put(base_path+'diagnosis_report/'+_this.EditDiagnosisReportForm.diagnosis_report_id,this.EditDiagnosisReportForm)
          .then((response)=>{
              if(response.data.status==201)
              {
                  this.$toastr.success('DiagnosisReport Edited Successfully', 'Success');
                  _this.GetDiagnosisReportList();
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
        DeleteDiagnosisReport:function(id,index)
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
                _this.GetDiagnosisReportList();
                this.LoadingStatus();
                this.axios.delete(base_path+'diagnosis_report/'+id)
                .then((response)=>{
                    console.log(response);
                    if(response.data.status==200)
                    {
                        _this.DiagnosisReportList.data.splice(index,1);
                            swal.fire(
                              'Deleted!',
                              'DiagnosisReport Hasbeen Deleted',
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
        ClearForm() {
            var _this = this;
            var FORM = _this.DiagnosisReportForm;
            Object.keys(FORM).forEach(function (key, index) {
                FORM[key] = '';
            });
            _this.AllError=[];
        },
      },
      mounted()
      {
        this.LoadingStatus();
        this.GetDiagnosisReportList();
        this.GetDoctorPatientData();
      }
    }
</script>
