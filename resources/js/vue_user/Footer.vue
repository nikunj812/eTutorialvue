<template>
  <div class="footer">
    <div class="footer-middle">
      <div class="container">
        <div
          class="rsidebar span_1_of_left footer-middle-in"
          style="float: left"
        >
          <h6 class="cate">Categories</h6>
          <div
            class="menu-drop"
            v-for="category in categories"
            :key="category.category_id"
          >
            <div class="item1">
              <label style="color: #b0b0e4a3">{{
                category.category_name
              }}</label>
              <ul class="cute">
                <li
                  class="subitem1"
                  v-for="subcategory in subcategories"
                  :key="subcategory.subcategory_id"
                >
                  <template
                    v-if="subcategory.subcat_name == category.category_name"
                  >
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

        <div class="col-md-3 footer-middle-in" style="margin-left: 200px">
          <h6>Information</h6>
          <ul class="in">
            <li><router-link :to="{ name: 'about' }">About</router-link></li>
            <li>
              <router-link :to="{ name: 'contact' }">Contact Us</router-link>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="col-md-3 footer-middle-in" style="margin-left: 200px">
          <h6>Tags</h6>
          <ul class="tag-in">
            <li>
              <router-link
                :to="{
                  name: 'bookdata',
                  params: { category: 'Fiction', subcategory: 'Drama' },
                }"
                >Drama</router-link
              >
            </li>
            <li>
              <router-link
                :to="{
                  name: 'bookdata',
                  params: {
                    category: 'Non-Fiction',
                    subcategory: 'Advertising',
                  },
                }"
                >Advertising</router-link
              >
            </li>
            <li>
              <router-link
                :to="{
                  name: 'bookdata',
                  params: { category: 'Academic', subcategory: 'archieves' },
                }"
                >Archieves</router-link
              >
            </li>
            <li>
              <router-link
                :to="{
                  name: 'bookdata',
                  params: { category: 'Textbooks', subcategory: 'Mathematics' },
                }"
                >Mathematics</router-link
              >
            </li>
            <li>
              <router-link
                :to="{
                  name: 'bookdata',
                  params: { category: 'Other', subcategory: 'Magazine' },
                }"
                >Magazine</router-link
              >
            </li>
            <li>
              <router-link
                :to="{
                  name: 'bookdata',
                  params: { category: 'classic', subcategory: 'scifi_classic' },
                }"
                >Scifi_Classic</router-link
              >
            </li>
            <li>
              <router-link
                :to="{
                  name: 'bookdata',
                  params: {
                    category: 'Academic',
                    subcategory: 'Academic_article',
                  },
                }"
                >Academic_article</router-link
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      categories: [],
      subcategories: [],
    };
  },
  created() {
    this.getCategory();
  },
  methods: {
    getCategory() {
      axios
        .get("/api/fetchdata")
        .then((res) => {
          this.categories = res.data.category;
          this.subcategories = res.data.subcategory;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
