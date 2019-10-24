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

import PatientComponent from './components/Monitor_hospital/Patient/PatientComponent'
import PatientEditComponent from './components/Monitor_hospital/Patient/PatientEditComponent'
import PatientListComponent from './components/Monitor_hospital/Patient/PatientListComponent'
import PatientAppointmentComponent from './components/Monitor_hospital/Patient/PatientAppointmentComponent'

import TestCategoryComponent from './components/Test/TestCategory'
import TestSubCategoryComponent from './components/Test/TestSubCategory'
import TestTypeComponent from './components/Test/TestType'
import TestComponent from './components/Test/Test'

import AmbulanceComponent from './components/Ambulance/ambulance_details/ambulance'

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
	  	path: '/users',
	  	component: UsersComponent,
	  	name:"users"
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
  		path:'/ambulance_details',
  		component:AmbulanceComponent,
  		name:'/ambulance_details'
  	},

]
