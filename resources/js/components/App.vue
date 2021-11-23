<template>
    <div class="container">
        <Header :title="title"/>
        <main>
            <Posts />
        </main>
    </div>
</template>

<script>
    import Header from "./Header.vue";
    import Posts from "./Posts/Posts.vue";

    export default {
       name:"App",
       data() {
           return {
               title : "Boolpress",
            }
       },
       components:{
           Header,
           Posts,
       },

    }
</script>
