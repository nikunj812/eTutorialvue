<template>
<div>
    <div>
        <div class="banner-top">
            <div class="container">
                <h1>Login</h1>
                <em></em>
                <h2><router-link :to="{name: 'index'}">Home</router-link><label>/</label>Recover Password</h2>
            </div>
        </div>    
    </div>
<!--login-->
    <div class="container">
            <div class="login" >
                
                
                <form @submit.prevent="sendEmail()">
                    <div class="col-md-6 login-do">
                        <div class="login-mail">
                            <input type="text" v-model="email" placeholder="Email" required="" name='email'>
                            <i  class="glyphicon glyphicon-envelope"></i>
                        </div>
                        <label class="hvr-skew-backward">
                            <input type="submit" value="Recover">
                        </label>
                    </div>
                    <div class="clearfix"> </div>
                </form>
            </div>

    </div>
</div>
</template>

<script>

export default {
	data(){
		return{
		email: '',
   
		}
	},
	methods:{
        sendEmail(){
            axios.post('/api/forgetpassword',{
                    email: this.email
            }).then(res => {
                localStorage.setItem('otp', res.data.otp.body);
                localStorage.setItem('email', res.data.otp.email);
                this.$router.push({name: 'otpcheck' , params: {successmessage : res.data.message}});
            }).catch(err => {
                console.log(err);
            })
        }
    }
}
</script>   