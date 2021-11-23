<template>
  <section>
    <h2>Lista Post:</h2>

    <div class="loader d-flex justify-content-center pt-5" v-if="isLoading">
        <div class="spinner-border text-info " role="status">
            <span class="sr-only">Loading...</span>        
        </div>
    </div>

    <PostCard v-else v-for="post in posts" :key="post.id" :post="post"/>
  </section>
</template>

<script>
import PostCard from "./PostCard.vue";

export default {
    name: "Posts",
    components : {
        PostCard,
    },
    data() {
        return {
            posts : [],
            isLoading: false,

        }
    },
    methods: {
        getPostList(){
            this.isLoading = true;
            axios.get("http://127.0.0.1:8000/api/posts/")
            .then((res) => {
                this.posts = res.data.posts;
                console.dir(this.posts)
            })
             .catch((err)=> {
                console.error(err);
            })
            .then(()=>{
                this.isLoading = false;
            });
        }
    },
    created(){
        this.getPostList();
    }

}
</script>

<style>

</style>