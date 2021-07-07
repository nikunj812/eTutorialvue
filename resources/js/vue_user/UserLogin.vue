<template>
<div>
        
    <div class="banner-top">
        <div class="container">
            <h1>Login</h1>
            <em></em>
            <h2><router-link :to="{name:'index'}">Home</router-link><label>/</label>Login</h2>
        </div>
    </div>
<!--login-->
    <div class="container">
        <div class="login">
            <div class="alert alert-success" v-if="message" >
                {{ message }}
            </div>
            <div class="alert alert-danger" v-if="loginmessage" >
                {{ loginmessage }}
            </div>

            <form v-on:submit.prevent="userLogin">
                <div class="col-md-6 login-do">
                    <div class="login-mail">
                        <input type="text" v-model="email" placeholder="Email"  name='email'>
                        <i  class="glyphicon glyphicon-envelope"></i>
                        <strong v-if="erroremail">{{ erroremail}}</strong>
                    </div>
                    <div class="login-mail"> 
                        <input type="password" v-model="password" placeholder="Password"  name="password">
                        <i class="glyphicon glyphicon-lock"></i>
                        <strong class="alert" v-if="errorpassword">{{ errorpassword}}</strong>
                    </div>
                    <label class="hvr-skew-backward">
                        <input type="submit" value="login">
                    </label>
                </div>
                <div class="clearfix"> </div>
            </form>
            <!-- <a class="news-letter " href="/forgetpassword"> -->
                <button name="forget" @click="forgetPassword" >Forget Password????</button>
            <!-- </a> -->
        </div>

    </div>
</div>
</template>




<script>

import EventBus from './EventBus'

export default {
	data(){
		return{
		message: '',
        loginmessage: '',
        erroremail: '',
        errorpassword: '',
        email: '',
        password: '',
		}
	},
	methods:{
            userLogin() {
                axios.post('/api/userlogin',
                    {
                        email:this.email,
                        password:this.password,
                    })
                    .then((res) => {
                        let errors = res.data.error;
                        if(errors){
                            this.erroremail = errors.email && errors.email[0];
                            this.errorpassword = errors.password && errors.password[0];
                        }else{
                            if(res.data.status == 'cred_error'){
                                this.loginmessage = res.data.message
                            }else{
                                console.log(res.data.user[0].name);
                                localStorage.setItem('usertoken', res.data.token)
                                localStorage.setItem('user', res.data.user[0].name)
                                this.email = ''
                                this.password = ''
                                this.$router.push({name: 'index'});
                                this.emitMethod();
                            }                        
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })

                    
            },
            emitMethod() {
                EventBus.$emit('logged-in','loggedin')
            },
            forgetPassword(){
                this.$router.push({name: 'forgetpassword'});
            }
    },
}
</script>