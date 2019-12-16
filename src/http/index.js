import Vue from 'vue'
import VueResource from 'vue-resource'
Vue.use(VueResource)

const http = Vue.http

http.options.root = 'https://felss.dev/api/'

//this.$http.get('rendas')

export {http}