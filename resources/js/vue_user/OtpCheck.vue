<template>
<div>
    <div class="banner-top">
	<div class="container">
		<h1>Login</h1>
		<em></em>
		<h2><router-link :to="{name: 'index'}">Home</router-link><label>/</label>Check OTP</h2>
	</div>
</div>
<!--login-->
<div class="container">
		<div class="login">
           <div class="alert alert-success" v-if="message">
           	  {{ message }}
           </div>
		
			<form @submit.prevent="otpCheck()">
			<div class="col-md-6 login-do">
				<div class="login-mail">
					<input type="text" v-model='otp' placeholder="Enter Otp" required="" name='otp'>
					<i  class="glyphicon glyphicon-lock"></i>
				</div>
				<label class="hvr-skew-backward">
					<input type="submit" value="Verify">
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
		otp: '',
        checkotp : '',
		message: '',
		}
	},
	methods:{
        otpCheck(){
            axios.post('/api/checkotp',{
                otp: this.otp,
                checkotp: this.checkotp
            }).then(res => {
				if(res.data.status == 'no'){
					this.message = res.data.message
				}else{
					this.$router.push({name:'setnewpassword', params:{successmessage: res.data.message}});
				}
            }).catch(err => {
                console.log(err);
            })
        }
    },
    mounted(){
       if(localStorage.getItem('otp')){
           let checkotp = localStorage.getItem('otp');
           this.checkotp = checkotp;
        }
		if(this.successmessage){
			this.message = this.successmessage
		}
    },
}
</script>   