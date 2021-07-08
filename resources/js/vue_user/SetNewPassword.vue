<template>
<div>
        
    <div class="banner-top">
        <div class="container">
            <h1>Login</h1>
            <em></em>
            <h2><router-link :to="{name: 'index'}">Home</router-link><label>/</label>Login</h2>
        </div>
    </div>
<!--login-->
    <div class="container">
            <div class="login">
            <div class="alert alert-success" v-if="message">
                {{ message}}
            </div>
            
                <form  @submit.prevent="SubmitNewPassword()">
                <div class="col-md-6 login-do">
                    <div class="login-mail"> 
                        <input type="password" v-model="newpassword" placeholder="New Password" required="" name="npassword">
                        <i class="glyphicon glyphicon-lock"></i>
                    </div>
                    <div class="login-mail"> 
                        <input type="password" v-model="cnewpassword" placeholder="Confirm Password" required="" name="cpassword">
                        <i class="glyphicon glyphicon-lock"></i>
                    </div>
                        
                    <label class="hvr-skew-backward">
                        <input type="submit" value="Set Password">
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
	props:['successmessage'],
	data(){
		return{
		newpassword: '',
        cnewpassword : '',
		message: '',
        email:'',
		}
	},
	methods:{
        SubmitNewPassword(){
            let email =
            axios.post('/api/submitnewpassword',{
                newpassword: this.newpassword,
                cnewpassword: this.cnewpassword,
                email: this.email,
            }).then(res => {
				if(res.data.status == 'no'){
					this.message = res.data.message
				}else{
					this.$router.push({name:'userlogin', params:{successmessage: res.data.message}});
				}
            }).catch(err => {
                console.log(err);
            });
        }
        
    },
    mounted(){
        if(this.successmessage){
			this.message = this.successmessage
		}
        if(localStorage.getItem('email')){
           let email = localStorage.getItem('email');
           this.email = email;
        }
    }
}
</script>   