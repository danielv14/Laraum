<template lang="html">
  <div class="buttons is-pulled-right">

    <a @click.prevent="bookmark" href="#">
      <i v-if="haveBookmarked" class="fa fa-bookmark" aria-hidden="true"></i>
      <i v-else class="fa fa-bookmark-o" aria-hidden="true"></i>

    </a>
  </div>


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

    bookmark: function() {

      if (!this.haveBookmarked) {
        console.log('creating bookmark');
        this.haveBookmarked = true;
        this.createBookmark();
      } else {
        console.log('deleting bookmark');
        this.haveBookmarked = false;
        this.deleteBookmark();
      }

    },

    createBookmark: function() {

      // store a data object to pass with the request to backend
      var data = {
        'post_id': this.post.id
      };

      this.$http.put('/bookmark', data).then((response) => {

      }, (response) => {
        console.log('error')
      });
    },

    deleteBookmark: function() {
      this.$http.delete('/bookmark/' + this.post.id).then((response) => {

      }, (response) => {
        console.log('error')
      });
    }

  }
}
</script>

<style lang="css">

</style>
