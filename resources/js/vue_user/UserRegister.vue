<template>
<div>
        <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h1>Register</h1>
            <em></em>
            <h2><router-link :to="{name:'index'}">Home</router-link><label>/</label>Register</h2>
        </div>
    </div>
<!--login-->

    <div class="container">
        <div class="login">
            <div class="alert alert-success" v-if="message">
                {{ message }}
            </div>
            
            <form v-on:submit.prevent="userRegister">
                <div class="col-md-6 login-do">
                    <div class="login-mail">
                            <input type="text" v-model="name" placeholder="Name"  name="name" id="name">
                            <i  class="glyphicon glyphicon-user"></i>
                            <strong v-if="errorname">{{ errorname}}</strong>
                    </div>
                    <div class="login-mail">
                        <input type="text" v-model="phone" placeholder="Phone Number"  name="phone" id="phone">
                        <i  class="glyphicon glyphicon-phone"></i>
                        <strong v-if="errorphone">{{ errorphone}}</strong>
                    </div>
                    <div class="login-mail">
                        <input type="text" v-model="email" placeholder="Email" id="email" name="email" >
                        <i  class="glyphicon glyphicon-envelope"></i>
                        <strong v-if="erroremail">{{ erroremail}}</strong>
                    </div>
                    <div class="login-mail">
                        <input type="password" v-model="password" placeholder="Password"  name="password" id="password">
                        <i class="glyphicon glyphicon-lock"></i>
                        <strong class="alert" v-if="errorpassword">{{ errorpassword}}</strong>
                    </div>
                    <label class="hvr-skew-backward">
                        <input type="submit" value="Submit">
                    </label>
                </div>
                <div class="clearfix"> </div>
            </form>
        </div>
        <hr>
    </div>
</div>
</template>



<script>
export default {
	data(){
		return{
		message: '',
        errorname:'',
        errorphone:'',
        erroremail: '',
        errorpassword: '',
        name: '',
        phone: '',
        email: '',
        password: '',
		}
	},
	methods:{
            userRegister() {
                axios.post('/api/userregister',
                    {
                        name:this.name,
                        phone:this.phone,
                        email:this.email,
                        password:this.password,
                    })
                    .then((res) => {
                        let errors = res.data.error;
                        if(errors){
                            this.erroremail = errors.email && errors.email[0];
                            this.errorpassword = errors.password && errors.password[0];
                            this.errorname = errors.name && errors.name[0];
                            this.errorphone = errors.phone && errors.phone[0];
                        }else{
                            this.$router.push({name: 'userlogin'})
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            }
    },
}
</script>