<template>
<div>
    <div class="banner-top">
        <div class="container">
            <h1>Ebooks</h1>
            <em></em>
            <h2><router-link :to="{name:'index'}">Home</router-link><label>/</label>Ebooks</h2>
        </div>
    </div>
	<!--content-->
	<hr>
	<div class="container-fluid text-center">    
        <div class="row content" v-for="book in bookData" :key="book.id">
                <div class="col-sm-4 sidenav">
                    <img :src="'/admin/images/'+book.product_image" :alt="book.product_name" >
                </div>
                <div class="col-sm-8 text-left" style="color:#ff5e007a"> 
                    <h4>Book Category : {{ book.product_cat_name}}</h4>
                    <hr>
                    <h4>Book SubCategory : {{ book.product_sub_name}}</h4>
                    <hr>
                    <h4>Book name : {{ book.product_name}}</h4>
                    <br>
                    <hr>
                    <h4> book_description </h4>
                    <br>
                    <p>{{book.product_desc}}</p>
                </div>
        </div>
    </div>
    <hr>
</div>
</template>


<script>
export default {
	data(){
		return{
		bookData: [],
		}
	},
	created(){
		this.getSingleRecord();
	},
	methods:{
		getSingleRecord(){
			axios.get(`/api/singlerecord/${this.$route.params.id}`).then(res => {
				this.bookData = res.data.singleData;
			}).catch(err => {
				console.log(err);
			})
		},
    // bookData(category,subcategory){
    //   this.$router.push(`/bookdata/${category}/${subcategory}`);
    // }
	},
}
</script>