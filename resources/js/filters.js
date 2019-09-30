import Vue from 'vue'

Vue.filter('readMore', function (text, length, suffix) {
    return text.substring(0, length) + suffix;
});
