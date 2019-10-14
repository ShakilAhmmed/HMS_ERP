import DashBoardComponent from './components/DashBoardComponent'
import DepartmentComponent from './components/Config/Department'
import DesignationComponent from './components/Config/Designation'
import ShiftComponent from './components/Config/Shift'
import NoticeComponent from './components/Notice/Notice'
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
	  	path: '/notice',
	  	component: NoticeComponent,
	  	name:"/notice"
  	},

]
