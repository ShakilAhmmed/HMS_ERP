import Vue from 'vue'

import moment from 'moment'


Vue.filter('timeformat',(value)=> {
	return moment(value).format("MMM Do YYYY, h:mm:ss a");
});

Vue.filter('readMore', function (text, length, suffix) {
    return text.substring(0, length) + suffix;
});
