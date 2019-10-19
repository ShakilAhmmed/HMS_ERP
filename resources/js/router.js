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
import PatientAppointmentComponent from './components/Monitor_hospital/PatientAppointment/PatientAppointmentComponent'
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
  		path:'/patient_appointment',
  		component:PatientAppointmentComponent,
  		name:'/patient_appointment'
  	}

]
