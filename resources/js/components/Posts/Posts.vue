<template>
  <section>
    <h2>Lista Post:</h2>

    <div class="loader d-flex justify-content-center pt-5" v-if="isLoading">
      <div class="spinner-border text-info" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <PostCard v-else v-for="post in posts" :key="post.id" :post="post" />

    <nav aria-label="Page navigation example">
      <ul class="pagination pt-5 d-flex justify-content-center pb-3">
        <li v-if="currentPage > 1" class="page-item">
          <button class="page-link" @click="getPostList(currentPage - 1)">Previous</button>
        </li>
        <li v-for="n in lastPage" :key="n" class="page-item" @click="getPostList(n)"><a class="page-link">{{ n }}</a></li>
        <li v-if="currentPage < lastPage" class="page-item">
          <button class="page-link" @click="getPostList(currentPage + 1)">Next</button>
        </li>
      </ul>
    </nav>
  </section>
</template>

<script>
import PostCard from "./PostCard.vue";

export default {
  name: "Posts",
  components: {
    PostCard,
  },
  data() {
    return {
      baseUri:"http://127.0.0.1:8000",
      posts: [],
      isLoading: false,
      currentPage: 1,
      lastPage: null,
    };
  },
  methods: {
    getPostList(page) {
      this.isLoading = true;
      axios
        .get(`${this.baseUri}/api/posts/?page=${page}`)
        .then((res) => {
          this.posts = res.data.posts.data;
          console.dir(this.posts);
          this.isLoading = false;

          this.currentPage = res.data.posts.current_page;
          this.lastPage = res.data.posts.last_page;

          console.log(this.currentPage, this.lastPage);
        })
        .catch((err) => {
          console.error(err);
        });
    },
  },
  created() {
    this.getPostList(25);
  },
};
</script>

<style>
</style>