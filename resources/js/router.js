import DashBoardComponent from './components/DashBoardComponent'
import DepartmentComponent from './components/Config/Department'
import DesignationComponent from './components/Config/Designation'
import ShiftComponent from './components/Config/Shift'
import UsersComponent from './components/RBAC/Users'
import AddUsersComponent from './components/RBAC/AddUsers'
import EditUsersComponent from './components/RBAC/EditUsers'
import NoticeComponent from './components/Notice/Notice'
import BedComponent from './components/Monitor_hospital/Bed/bed'
import BedAllotmentComponent from './components/Monitor_hospital/Bed_Allotment/bed_allotment'

import PrescriptionComponent from './components/Prescription/prescription'
import SystemComponent from './components/System/system'

// Patient
import PatientComponent from './components/Monitor_hospital/Patient/PatientComponent'
import PatientEditComponent from './components/Monitor_hospital/Patient/PatientEditComponent'
import PatientListComponent from './components/Monitor_hospital/Patient/PatientListComponent'
import PatientAppointmentComponent from './components/Monitor_hospital/Patient/PatientAppointmentComponent'

// Test
import TestCategoryComponent from './components/Test/TestCategory'
import TestSubCategoryComponent from './components/Test/TestSubCategory'
import TestTypeComponent from './components/Test/TestType'
import TestComponent from './components/Test/Test'

// Ambulance
import AmbulanceComponent from './components/Ambulance/ambulance_details/ambulance'
import AmbulanceCallComponent from './components/Ambulance/ambulance_call/ambulance_call'

import OperationComponent from './components/Operation/operation'

// Account
import AccountComponent from './components/Account/Account'
import Accountlistcomponent from './components/Account/account_list'
import AccountEditComponent from './components/Account/account_edit'

// Doctor
import DoctorAddComponent from './components/Doctor/DoctorAddComponent'
import DoctorListComponent from './components/Doctor/DoctorListComponent'
import DoctorEditComponent from './components/Doctor/DoctorEditComponent'

// Nurse
import NurseAddComponent from './components/Nurse/NurseAddComponent'
import NurseListComponent from './components/Nurse/NurseListComponent'
import NurseEditComponent from './components/Nurse/NurseEditComponent'

// Pharmacist
import PharmacistAddComponent from './components/Pharmacist/PharmacistAddComponent'
import PharmacistListComponent from './components/Pharmacist/PharmacistListComponent'
import PharmacistEditComponent from './components/Pharmacist/PharmacistEditComponent'

// Laboratorist
import LaboratoristAddComponent from './components/Laboratorist/LaboratoristAddComponent'
import LaboratoristListComponent from './components/Laboratorist/LaboratoristListComponent'
import LaboratoristEditComponent from './components/Laboratorist/LaboratoristEditComponent'


//let HomeComponent=require('./components/Admin/HomeComponent').default;

export const routes = [
  	{
	  	path: '/',
	  	component: DashBoardComponent,
	  	name:"/"
  	},
    {
	  	path: '/department',
	  	component: DepartmentComponent,
	  	name:"department"
  	},
  	{
	  	path: '/designation',
	  	component: DesignationComponent,
	  	name:"designation"
  	},
    {
	  	path: '/shift',
	  	component: ShiftComponent,
	  	name:"shift"
  	},
    {
	  	path: '/users_list',
	  	component: UsersComponent,
	  	name:"users_list"
  	},
    {
	  	path: '/add_users',
	  	component: AddUsersComponent,
	  	name:"add_users"
  	},
    {
	  	path: '/edit-user/:id',
	  	component: EditUsersComponent,
	  	name:"edit-user",
  	},
  	{
	  	path: '/notice',
	  	component: NoticeComponent,
	  	name:"/notice"
  	},
  	{
	  	path: '/bed',
	  	component: BedComponent,
	  	name:"/bed"
  	},
  	{
	  	path: '/bedallotment',
	  	component: BedAllotmentComponent,
	  	name:"/bedallotment"
  	},
  	{

	  	path: '/prescription',
	  	component: PrescriptionComponent,
	  	name:"/prescription"
  	},
  	{
	  	path: '/system',
	  	component: SystemComponent,
	  	name:"/system"
  	},
  	{
  		path:'/patient',
  		component:PatientComponent,
  		name:'/patient'
  	},
    {
      path:"/patient-list",
      component:PatientListComponent,
      name:'/patient-list'
    },
    {
  		path:'/edit-patient/:patient_id',
  		component:PatientEditComponent,
  		name:'edit-patient'
  	},
  	{
  		path:'/patient_appointment',
  		component:PatientAppointmentComponent,
  		name:'/patient_appointment'
  	},
    {
      path:'/test_category',
      component:TestCategoryComponent,
      name:'/test_category'
    },
    {
      path:'/test_sub_category',
      component:TestSubCategoryComponent,
      name:'/test_sub_category'
    },
    {
      path:'/test_type',
      component:TestTypeComponent,
      name:'/test_type'
    },
    {
      path:'/test',
      component:TestComponent,
      name:'/test'
    },
    {
      path:'/ambulance_call',
      component:AmbulanceCallComponent,
      name:'/ambulance_call'
    },
  	{
  		path:'/ambulance_details',
  		component:AmbulanceComponent,
  		name:'/ambulance_details'
  	},
  	{
  		path:'/operation',
  		component:OperationComponent,
  		name:'/operation'
  	},
  	{
  		path:'/doctor_add',
  		component:DoctorAddComponent,
  		name:'/doctor_add'
  	},
  	{
  		path:'/doctor_list',
  		component:DoctorListComponent,
  		name:'/doctor_list'
  	},
    {
      path:'/edit-doctor/:doctor_id',
      component:DoctorEditComponent,
      name:'edit-doctor'
    },
    {
      path:'/account',
      component:AccountComponent,
      name:'/account'
    },
    {
      path:'/account_list',
      component:Accountlistcomponent,
      name:'/account_list'
    },
    {
      path:'/edit_account/:account_id',
      component:AccountEditComponent,
      name:'edit_account'
    },

  	{
  		path:'/nurse_add',
  		component:NurseAddComponent,
  		name:'/nurse_add'
  	},
  	{
  		path:'/nurse_list',
  		component:NurseListComponent,
  		name:'/nurse_list'
  	},
    {
      path:'/edit-nurse/:nurse_id',
      component:NurseEditComponent,
      name:'edit-nurse'
    },

  	{
  		path:'/pharmacist_add',
  		component:PharmacistAddComponent,
  		name:'/pharmacist_add'
  	},
  	{
  		path:'/pharmacist_list',
  		component:PharmacistListComponent,
  		name:'/pharmacist_list'
  	},
    {
      path:'/edit-pharmacist/:nurse_id',
      component:PharmacistEditComponent,
      name:'edit-pharmacist'
    },

  	{
  		path:'/laboratorist_add',
  		component:LaboratoristAddComponent,
  		name:'/laboratorist_add'
  	},
  	{
  		path:'/laboratorist_list',
  		component:LaboratoristListComponent,
  		name:'/laboratorist_list'
  	},
    {
      path:'/edit-laboratorist/:nurse_id',
      component:LaboratoristEditComponent,
      name:'edit-laboratorist'
    },

]
