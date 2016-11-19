<template lang="html">
  <a @click.prevent="bookmark" href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a>
</template>

<script>
export default {

  props: ['post'],

  data: function() {
    return {
      postID: ''
    }
  },

  mounted() {

    this.postID = this.post.id;

  },
  methods: {

    bookmark: function() {
      console.log(this.post)
      console.log('click click!', this.postID);
    }

  }
}
</script>

<style lang="css">
</style>
