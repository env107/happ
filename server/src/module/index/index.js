// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App';
import router from './router'
import iView from 'iview';
import 'iview/dist/styles/iview.css';
Vue.use(iView);

Vue.config.productionTip = false


router.beforeEach((to, from, next) => {
    //判断是否包含登录信息
   var userinfo =  sessionStorage.getItem("userinfo");
  
   if(userinfo == undefined || userinfo == null){
      alert("你还没登录");
     location.href = "/app/login.html";
     return true;
   }

   next();
   
})


/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})