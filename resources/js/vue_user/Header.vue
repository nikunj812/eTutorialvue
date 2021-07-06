<template>
  <!--header-->
  <div class="header">
    <div class="container">
      <div class="head">
        <div class="logo">
          <router-link :to="{ name: 'index' }">
            <img :src="'/user_assest/images/logo.png'" style="margin-top:15px"/>
          </router-link>
        </div>
      </div>
    </div>
    <div class="header-top">  
      <div class="container">
        <!-- @if(session('username'))
                    <div class="col-sm-5 col-md-offset-2  header-login" style="float:right;text-align:right">
                                <ul>
                                    <li> <a href="{{ url('/userlogout') }}">Logout</a></li>
                                    <li><button>{{session('username')->name}}</button></li>
                                    
                                </ul>
                    </div>
                @else
                    <div class="col-sm-5 col-md-offset-2  header-login"  style="float:right;text-align:right">
                                    <ul>
                                        <li><a href='{{ url("/userlogin")}}'>Login</a></li>
                                        <li><a href='{{ url("/userregister")}}'>Register</a></li>
                                    </ul>
                    </div>
                @endelse
            @endif -->
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
                  <router-link
                    :to="{ name: 'index' }"
                    class="color1 dropdown-toggle"
                    data-toggle="dropdown"
                    >Category<span class="caret"></span
                  ></router-link>

                  <div class="dropdown-menu">
                    <div class="menu-top">
                                            <div class="col1" v-for="category in categories" :key="category.category_id">
                                                <div class="h_nav">
                                                    <h4>{{ category.category_name }}</h4>
                                                        <ul>
                                                            <li v-for="subcategory in subcategories" :key="subcategory.subcategory_id">
                                                              <template v-if="subcategory.subcat_name  == category.category_name">
                                                                <router-link :to="{
                                                                                    name: 'bookdata', 
                                                                                    params: { category: category.category_name, subcategory: subcategory.subcategory_name}
                                                                                }"
                                                                                >
                                                                                {{ subcategory.subcategory_name}}
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
        <div class="col-sm-2 search-right">
          <ul class="heart">
            <li>
              <a class="play-icon popup-with-zoom-anim" href="#small-dialog"
                ><i class="glyphicon glyphicon-search searchicon"> </i
              ></a>
            </li>
          </ul>

          <div class="clearfix"></div>

          <div id="small-dialog" class="mfp-hide">
            <form>
              <div class="search-top">
                <div class="login-search">
                  <input type="text" value="Search.." name="search" />
                  <input type="submit" value="" name="submit" />
                </div>
              </div>
            </form>
          </div>
          <!----->
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</template>

<script>

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
		}
	},
}
</script>
