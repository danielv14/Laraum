<template lang="html">
    <a @click.prevent="bookmark" href="#">
      <i v-if="haveBookmarked" class="fa fa-bookmark" aria-hidden="true"></i>
      <i v-else class="fa fa-bookmark-o no-bookmarked" aria-hidden="true"></i>
    </a>
</template>

<script>
export default {

  props: ['post', 'state'],

  data: function() {
    return {
      haveBookmarked: ''
    }
  },

  mounted() {

    // set bookmark state for the passed state value from blade template
    this.haveBookmarked = this.state;

  },
  methods: {

    bookmark() {

      if (!this.haveBookmarked) {
        this.haveBookmarked = true;
        this.createBookmark();
      } else {
        this.haveBookmarked = false;
        this.deleteBookmark();
      }

    },

    createBookmark() {

      // store a data object to pass with the request to backend
      var data = {
        'post_id': this.post.id
      };

      this.$http.put('/bookmark', data).then((response) => {

      }, (response) => {
        console.log('error')
      });
    },

    deleteBookmark() {
      this.$http.delete('/bookmark/' + this.post.id).then((response) => {

      }, (response) => {
        console.log('error')
      });
    }

  }
}
</script>

<style lang="sass">
  .no-bookmarked {
    color: #b5b5b5;

    &:hover {
      color: #00D1B2;
    }
  }

</style>
