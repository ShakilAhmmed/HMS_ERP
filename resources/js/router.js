import DashBoardComponent from './components/DashBoardComponent'
import DepartmentComponent from './components/Config/Department'
import DesignationComponent from './components/Config/Designation'
import ShiftComponent from './components/Config/Shift'
import UsersComponent from './components/RBAC/Users'
import AddUsersComponent from './components/RBAC/AddUsers'
import EditUsersComponent from './components/RBAC/EditUsers'
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
	  	name:"/department"
  	},
  	{
	  	path: '/designation',
	  	component: DesignationComponent,
	  	name:"/designation"
  	},
    {
	  	path: '/shift',
	  	component: ShiftComponent,
	  	name:"/shift"
  	},
    {
	  	path: '/users',
	  	component: UsersComponent,
	  	name:"/users"
  	},
    {
	  	path: '/add_users',
	  	component: AddUsersComponent,
	  	name:"/add_users"
  	},

    {
	  	path: '/edit_users/:id',
	  	component: EditUsersComponent,
	  	name:"/edit_users",
	  	props: true
  	},

]
