
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('bookmark', require('./components/Bookmark.vue'));
Vue.component('like', require('./components/Like.vue'));

const app = new Vue({
    el: '#app',

    created: function() {

      // call function that fades flash messages
      this.fadeFlash();
      $("#markdown").markdown({autofocus:false,savable:false});

      // init syntax highlighting
      hljs.initHighlightingOnLoad();
    },

    methods: {
      // method to toggle navigation hambuger
      toggleNav: function() {
        $('.nav-toggle').toggleClass('is-active');
        $('.nav-menu').toggleClass('is-active');
      },
      // method to fade flash messages
      fadeFlash: function () {
        setTimeout(function() {
          $('#flash').fadeOut('slow', function() {
            $(this).remove();
          })
        }, 1500)
      },
    }
});
