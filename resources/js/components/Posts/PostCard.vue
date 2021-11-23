<template>
  <div class="card mt-5">
    <div class="card-header">{{ post.post_name }}</div>
    <div class="card-body">
      <h6 class="card-subtitle mb-2 text-muted pt-3">
        {{ post.post_description }}
      </h6>
      <p class="card-subtitle mb-2 text-muted pt-3">{{ post.content }}</p>
      <h6 class="card-subtitle mb-2 text-muted pt-3">
        Scritto il {{ post.published_at }}
      </h6>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCard",
  props: ["post"],
};
</script>

<style>
</style>