import DashBoardComponent from './components/DashBoardComponent'
import DepartmentComponent from './components/Config/Department'
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

]
