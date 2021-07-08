<template>
  <!--header-->
  <div class="header">
    <div class="container">
      <div class="head">
        <div class="logo">
          <router-link :to="{ name: 'index' }">
            <img :src="'/user_assest/images/logo.png'"/>
          </router-link>
        </div>
      </div>
    </div>
    <div class="header-top">  
      <div class="container">
        <div class="col-sm-5 col-md-offset-2  header-login" style="float:right;text-align:right">
            <ul>
                <li v-if="auth=='loggedin'" class="nav-item">
                  <button @click="logout">Logout</button>
                </li>
                <li v-if="auth=='loggedin'" class="nav-item">
                  <router-link class="nav-link" to="/profile">{{user}}</router-link>
                </li>
                <!-- <li><button>{{session('username')->name}}</button></li> -->
            </ul>
        </div>
        <div class="col-sm-5 col-md-offset-2  header-login"  style="float:right;text-align:right">
            <ul>
                <li v-if="auth==''" class="nav-item">
                  <router-link class="nav-link" to="/userlogin">Login</router-link>
                </li>
                <li v-if="auth==''" class="nav-item">
                  <router-link class="nav-link" to="/userregister">Register</router-link>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>

    <div class="container">
      <div class="head-top">
        <div class="col-sm-8 col-md-offset-2 h_menu4">
          <nav class="navbar nav_bottom" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
              <button
                type="button"
                class="navbar-toggle collapsed navbar-toggle1"
                data-toggle="collapse"
                data-target="#bs-megadropdown-tabs"
              >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
              <ul class="nav navbar-nav nav_1">
                <li>
                  <router-link :to="{ name: 'index' }" class="color"
                    >Home</router-link
                  >
                </li>

                <li class="dropdown mega-dropdown active">
                  <a
                    href="javascript;"
                    class="color1 dropdown-toggle"
                    data-toggle="dropdown"
                    >Category<span class="caret"></span
                  ></a>

                  <div class="dropdown-menu">
                    <div class="menu-top">
                      <div class="col1" v-for="category in categories" :key="category.category_id">
                          <div class="h_nav">
                              <h4>{{ category.category_name }}</h4>
                                  <ul>
                                      <li v-for="subcategory in subcategories" :key="subcategory.subcategory_id">
                                        <template v-if="subcategory.subcat_name  == category.category_name">
                                          <router-link
                                            :to="{
                                              name: 'bookdata',
                                              params: {
                                                category: category.category_name,
                                                subcategory: subcategory.subcategory_name,
                                              },
                                            }"
                                          >
                                            {{ subcategory.subcategory_name }}
                                        </router-link>
                                        </template>
                                      </li>		
                                  </ul>	
                          </div>							
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <router-link :to="{ name: 'about' }" class="color4"
                    >About</router-link
                  >
                </li>
                <li>
                  <router-link :to="{ name: 'contact' }" class="color6"
                    >Contact</router-link
                  >
                </li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
          </nav>
        </div>
        <div class="col-sm-2 search-right" id="searchHeader">
          <ul class="heart">
            <li>
              <a class="play-icon popup-with-zoom-anim" href="#small-dialog"
                ><i class="glyphicon glyphicon-search searchicon"> </i
              ></a>
            </li>
          </ul>

          <div class="clearfix"></div>

          <div id="small-dialog" class="mfp-hide">
            <form @submit.prevent="searching()" >
              <div class="search-top">
                <div class="login-search">
                  <input type="text" v-model="search" name="search" />
                  <input type="submit" value="" name="submit" />
                </div>
              </div>
            </form>
            <div v-if="nodata">
              {{nodata}}
            </div>
          </div>
          <!----->
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</template>

<script>
import EventBus from './EventBus'

$(document).ready(function () {
  $(".popup-with-zoom-anim").magnificPopup({
    type: "inline",
    fixedContentPos: false,
    fixedBgPos: true,
    overflowY: "auto",
    closeBtnInside: true,
    preloader: false,
    midClick: true,
    removalDelay: 300,
    mainClass: "my-mfp-zoom-in",
  });
});

export default {
	data(){
		return{
		categories: [],
		subcategories: [],
    auth: '',
    user: '',
    search: '',
    nodata: '',
		}
	},
	created(){
		this.getCategory();
	},
	methods:{
		getCategory(){
			axios.get('/api/fetchdata').then(res => {
				this.categories = res.data.category;
				this.subcategories = res.data.subcategory;
			}).catch(err => {
				console.log(err);
			})
		},
    logout() {
      this.auth = '';
      localStorage.removeItem('usertoken')
      localStorage.removeItem('user')
      // this.$router.push({name: 'index'});
      this.$router.push("/").catch(()=>{});
    },
    searching(){
      axios.post(`/api/search`,{
        search: this.search
      }).then(res => {
        if(res.data.nodata){
          this.nodata = res.data.nodata
          }else{
          this.nodata = '';
          // this.$router.push("/", {search: this.search}).catch(()=>{});
          this.$router.push({path: `/searchbookdata/${this.search}`});
          $('.mfp-close').trigger( "click" );
        }
        console.log(res);
			}).catch(err => {
				console.log(err);
			})
    }
	},
  mounted() {
    EventBus.$on('logged-in', status => {
        this.auth = status
      if(localStorage.getItem('user')) {
        let user = localStorage.getItem('user');
        this.user = user;
    }
    });
      if(localStorage.getItem('usertoken')) {
        this.auth = 'loggedin';
        let user = localStorage.getItem('user');
        this.user = user;
     }
  },
}
</script>
