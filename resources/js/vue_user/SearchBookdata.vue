<template>
<div>   
    <div class="banner-top">
        <div class="container">
            <h1>Ebooks</h1>
                <em></em>
            <h2>
                <router-link :to="{ name: 'index' }">Home</router-link><label>/</label>Ebooks
            </h2>
        </div>
    </div>
	<!--content-->

	<div class="product">
        <div class="container">
            <div class="col-md-12">
                <div class="mid-popular">
                    <div class="col-md-4 item-grid1 simpleCart_shelfItem" v-for="book in books" :key="book.id">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img :src="'/admin/images/'+book.product_image" :alt="book.product_name" >
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <div class="demo">
                                            <span>{{ book.product_cat_name}}</span>
                                            <router-link :to="{name: 'singlerecord' , params:{id :  book.product_id}}" ><i class="glyphicon glyphicon-book"></i></router-link>
                                        </div>
                                        <h6><a >{{ book.product_name }}</a></h6>
                                        <a download><img :src="'user_assest/images/downloadd.png'" alt="" class="download_button"></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
     </div>   
	<div class="col-md-3 product-bottom"></div>
</div>            
</template>



<script>
export default {
	data(){
		return{
        books:[],
		}
	},
	created(){
		this.getCategory();
	},
	methods:{
		getCategory(){
			axios.post(`/api/search`,{
                search : this.$route.params.search
            }).then(res => {
                console.log(res);
				this.books = res.data.product;
			}).catch(err => {
				console.log(err);
			})
		},
	},
    watch:{
         $route () {
             this.getCategory();
         }
    }
}
</script>