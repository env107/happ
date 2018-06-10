<template>
  <div class="appContainer" id="app">
      <Content>
        <div class="login">
            <div class="message">{{ title }}</div>
            <div id="darkbannerwrap"></div> 
            <input name="action" value="login" type="hidden">
            <input v-model="form.username" placeholder="用户名" required="" type="text">
            <hr class="hr15">
            <input v-model="form.password" placeholder="密码" required="" type="password">
            <hr class="hr15">
            <input value="登录" style="width:100%;" @click="login()" type="submit"/>
            <hr class="hr20">
        </div>

        <!-- Dialog -->
        <Modal
            v-model = "manager.showDialog"
            :title= "manager.dialog.title"
            @on-ok="()=>{
             
              typeof manager.dialog.ok == 'function' && manager.dialog.ok();
              manager.showDialog = false;
            }"
            @on-cancel="()=>{
              typeof manager.dialog.cancel == 'function' && manager.dialog.cancel();
              manager.showDialog = false;
            }">
            <p>
              {{ manager.dialog.text }}
            </p>
        </Modal>

      </Content>
  </div>
</template>

<script>
var visitorMember = require("../../lib/visitorMember");
export default {
  name: 'App',
  data:function(){
    return {
      title:"APP数据后台管理系统",
      form:{
        username:'admin',
        password:''
      },
      manager:{
        showDialog:false,
        dialog:{
          title:'提示',
          text:'',
          ok:null,
          cancel:null
        }
      }
    }
  },
  methods:{
    login:function(){
      let { username , password } = this.form;
      let userinfo = {};
      sessionStorage.removeItem("userinfo");
      if(username == '' || password == ''){
        this.showMessage("请输入用户名或密码");
        return false;
      }
      if(username == 'admin' && password == '123456'){
          userinfo = visitorMember.create();
          sessionStorage.setItem("userinfo",userinfo);
      }else{
          this.showMessage("用户名或密码错误!");
          return false;
      }

      location.href = '/app/index.html';

    },
    showMessage:function(text,title = '提示',ok,cancel){
      this.manager.showDialog = true;
      this.manager.dialog.title = title;
      this.manager.dialog.text = text;
      this.manager.dialog.ok = ok;
      this.manager.dialog.cancel = cancel;
    }
  }
  
}
</script>

<style lang="less">
*{
    font: 13px/1.5 '微软雅黑', Verdana, Helvetica, Arial, sans-serif;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -box-sizing: border-box;
    padding:0;
    margin:0;
    list-style:none;
    box-sizing: border-box;
}

body,html{
    height:100%;
    overflow:hidden;
}
body{
    background:url(../../assets/web_login_bg.jpg) no-repeat center;
    background-size: cover;
}
a{
    color:#27A9E3;
    text-decoration:none;
    cursor:pointer;
}
.login{
    margin: 150px auto 0 auto;
    min-height: 420px;
    max-width: 420px;
    padding: 40px;
    background-color: #ffffff;
    margin-left: auto;
    margin-right: auto;
    border-radius: 4px;
    box-sizing: border-box;
}
a.logo{
    display: block;
    height: 58px;
    width: 167px;
    margin: 0 auto 30px auto;
    background-size: 167px 42px;
}
.message {
    margin: 10px 0 0 -58px;
    padding: 18px 10px 18px 60px;
    background: #27A9E3;
    position: relative;
    color: #fff;
    font-size: 16px;
}
#darkbannerwrap {
    background: url(../../assets/aiwrap.png);
    width: 18px;
    height: 10px;
    margin: 0 0 20px -58px;
    position: relative;
}

input[type=text],
input[type=file],
input[type=password],
input[type=email], select {
    border: 1px solid #DCDEE0;
    vertical-align: middle;
    border-radius: 3px;
    height: 50px;
    padding: 0px 16px;
    font-size: 14px;
    color: #555555;
    outline:none;
    width:100%;
}
input[type=text]:focus,
input[type=file]:focus,
input[type=password]:focus,
input[type=email]:focus, select:focus {
    border: 1px solid #27A9E3;
}


input[type=submit],
input[type=button]{
    display: inline-block;
    vertical-align: middle;
    padding: 12px 24px;
    margin: 0px;
    font-size: 18px;
    line-height: 24px;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    color: #ffffff;
    background-color: #27A9E3;
    border-radius: 3px;
    border: none;
    -webkit-appearance: none;
    outline:none;
    width:100%;
}
hr.hr15 {
    height: 15px;
    border: none;
    margin: 0px;
    padding: 0px;
    width: 100%;
}
hr.hr20 {
    height: 20px;
    border: none;
    margin: 0px;
    padding: 0px;
    width: 100%;
}

.copyright{
    font-size:14px;
    color:rgba(255,255,255,0.85);
    display:block;
    position:absolute;
    bottom:15px;
    right:15px;
}
</style>