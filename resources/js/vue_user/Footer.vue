<template>
<div class="footer">
	<div class="footer-middle">
				<div class="container">
					<div class=" rsidebar span_1_of_left footer-middle-in" style="float:left;">
							<h6 class="cate" >Categories</h6>
								<ul class="menu-drop" v-for="category in categories" :key="category.category_id">
								<li class="item1"><a href="#">{{ category.category_name }}</a>
									<ul class="cute" v-for="subcategory in subcategories" :key="subcategory.subcategory_id" >
										<template v-if="subcategory.subcat_name  == category.category_name">
											<li class="subitem1"><router-link :to="{name: 'index'}">{{ subcategory.subcategory_name}}</router-link></li>
										</template>
									</ul>
								</li>
								</ul>
					</div>
			
					
					<div class="col-md-3 footer-middle-in" style="margin-left:200px">
						<h6>Information</h6>
						<ul class=" in">
							<li><router-link :to="{name: 'about'}">About</router-link></li>
							<li><router-link :to="{name: 'contact'}">Contact Us</router-link></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-3 footer-middle-in" style="margin-left:200px">
						<h6>Tags</h6>
						<ul class="tag-in">
							<li><router-link :to="{name: 'index'}">Drama</router-link></li>
							<li><router-link :to="{name: 'index'}">Advertising</router-link></li>
							<li><router-link :to="{name: 'index'}">Archieves</router-link></li>
							<li><router-link :to="{name: 'index'}">Mathematics</router-link></li>
							<li><router-link :to="{name: 'index'}">Magazine</router-link></li>
							<li><router-link :to="{name: 'index'}">Scifi_Classic</router-link></li>
							<li><router-link :to="{name: 'index'}">Academic_article</router-link></li>
						</ul>
					</div>
					
				</div>
			</div>
			
		</div>
</template>

<script>

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
