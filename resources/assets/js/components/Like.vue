<template lang="html">
  <a class="like" @click.prevent="like" href="#">
    <i v-if="!haveLiked" class="fa fa-heart-o" aria-hidden="true"></i>
    <i v-else class="fa fa-heart heart" aria-hidden="true"></i>

  </a>
</template>

<script>
export default {

  props: ['post'],

  data: function() {
    return {
      haveLiked: '',
      likes: ''
    }
  },

  mounted() {
    this.likes = this.post.likes;

    // if localstorage exist set haveLiked value to true
     // this will toggle unlike state of the button
     if (localStorage.getItem('laraum-like-' + this.post.id)) {
       this.haveLiked = true;
     }
  },

  methods: {

    like() {
      console.log('click click', this.post.id);
      if (!this.haveLiked) {
        this.increment(this.post.id);
        // this.animation = true; // force bounce effect on heart icon
      } else {
        this.decrement(this.post.id);
        // this.animation = false; // if false will bounce on next click
      }
    },

    /*
    * Method to like a palette
    * Sends PUT request to Laravel backend to increment like value
    *
    * @param {id} id of the palette
    */
    increment(id) {
      // PUT request that iterates like value
      this.$http.put('/like/' + id).then((response) => {
            // toggle haveLiked state
            this.haveLiked = true;
            // set localStorage
            localStorage.setItem('laraum-like-' + id, true);
            // method that updates like value
           this.getNrOfLikes(id);
         }, (response) => {
           console.log('error');
         });
    },
    decrement(id) {
      // PUT request that iterates like value
      this.$http.put('/unlike/' + id).then((response) => {
            // toggle haveLiked state
            this.haveLiked = false;
            // remove localStorage
            localStorage.removeItem('laraum-like-' + id);
            // method that updates like value
           this.getNrOfLikes(id);
         }, (response) => {
           console.log('error');
         });
    },
    /*
    * Method to make GET request and update like value
    *
    * @param {id} id of the palette in question
    */
    getNrOfLikes(id) {
      this.$http.get('/likes/' + id).then((response) => {
          // update nr of likes
           this.likes = response.body.likes;
         }, (response) => {
           console.log('error')
         });
    }

  }
}
</script>

<style lang="sass">

  .like {
    color: #b5b5b5;

    &:hover {
      color: #ff3860;
    }
  }

  .heart {
    color: #ff3860;
  }

</style>
