import index from './vue_user/Index'
import about from './vue_user/About'
import contact from './vue_user/Contact'
import bookdata from './vue_user/BookData'
import singlerecord from './vue_user/SingleRecord.vue'
import userregister from './vue_user/UserRegister.vue'
import userlogin from './vue_user/UserLogin.vue'
import searchbookdata from './vue_user/SearchBookdata.vue'
import forgetpassword from './vue_user/ForgetPassword.vue'
import otpcheck from './vue_user/OtpCheck.vue'
import setnewpassword from './vue_user/SetNewPassword.vue'

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
    {
        path: '/singlerecord/:id',
        name: 'singlerecord',
        component: singlerecord
    },
    {
        path: '/userregister',
        name: 'userregister',
        component: userregister
    },
    {
        path: '/userlogin',
        name: 'userlogin',
        component: userlogin,
        props: true 
    },
    {
        path: '/searchbookdata/:search',
        name: 'searchbookdata',
        component: searchbookdata,
        props: true 
    },
    {
        path: '/forgetpassword',
        name: 'forgetpassword',
        component: forgetpassword,
    },
    {
        path: '/otpcheck',
        name: 'otpcheck',
        component: otpcheck,
        props: true 
    },
    
    {
        path: '/setnewpassword',
        name: 'setnewpassword',
        component: setnewpassword,
        props: true 
    },
]