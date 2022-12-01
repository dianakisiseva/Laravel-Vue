const taskList = () => import('./components/task/List.vue')
const taskCreate = () => import('./components/task/Add.vue')
const taskEdit = () => import('./components/task/Edit.vue')
const taskShow = () => import('./components/task/Show.vue')
const Login = () => import('./components/Login.vue')

export const routes = [
    {
        name: 'login',
        path: '/',
        component: Login
    },
    {
        name: 'taskList',
        path: '/task',
        component: taskList
    },
    {
        name: 'taskEdit',
        path: '/task/:id/edit',
        component: taskEdit
    },
    {
        name: 'taskShow',
        path: '/task/:id/show',
        component: taskShow
    },
    {
        name: 'taskAdd',
        path: '/task/add',
        component: taskCreate
    }
]
