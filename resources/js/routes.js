import index from './vue_user/Index'
import about from './vue_user/About'
import contact from './vue_user/Contact'
import bookdata from './vue_user/BookData'
// import Login from './components/login.vue'

export const routes = [
    {
        path: '/',
        name: 'index',
        component: index,
        props: true 
    },
    {
        path: '/about',
        name: 'about',
        component: about
    },
    {
        path: '/contact',
        name: 'contact',
        component: contact
    },
    {
        path: '/bookdata/:category/:subcategory',
        name: 'bookdata',
        component: bookdata,
        props: true 
    },
//     {
//         path: '/logintest',
//         name: 'Login',
//         component: Login
//     }
]