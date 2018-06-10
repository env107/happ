<template>
    <div class="app-base">
        <!-- 基本布局 -->
        <Layout >
            <Header :style = "{background:'#373d41'}">
                <div class="app-header-container">
                    <div class="app-header-title">App数据管理平台</div>
                    <div class="app-header-center">
                        <!-- 顶部下拉菜单 -->
                        <Menu
                            v-if="navigation.mode == 'horizontal'"
                            :active-name="navigation.active" 
                            :theme="navigation.navTheme" 
                            :style = "{background:'#373d41'}"
                            @on-select="changeNav"
                            :mode="navigation.mode"
                        >
                            
                            <!-- 存在子菜单 -->
                            <Submenu :name="index"  v-for="(nav,index) in navigation.nav" :key="index" v-if="nav.hasOwnProperty('child')" >
                                <template slot="title">
                                    <Icon :type="nav.iron"></Icon>
                                    {{ nav.title }}
                                </template>
                                <MenuItem :name="index + '-' + nindex" v-for="(child,nindex) in nav.child" :key="nindex" >
                                    <router-link tag="div" :to = "{path:child.url == ''?'/':child.url}">
                                        {{ child.title }}
                                    </router-link>
                                </MenuItem>
                            </Submenu>
                            <!-- 没有子菜单 -->
                            <MenuItem :name="index"  v-for="(nav,index) in navigation.nav" :key="index" v-if="!nav.hasOwnProperty('child')" >
                                <Icon :type="nav.iron"></Icon>
                                <router-link tag="span" :to = "{path:nav.url == ''?'/':nav.url}">
                                    {{ nav.title }}
                                 </router-link>
                            </MenuItem>
                        </Menu>    

                    </div>
                    <div class="app-header-user">
                        <div class="app-user-notice">
                            <!-- <img src = "@/assets/notice.png" class="notice-image" /> -->
                           <Icon type="ios-bell" size="25" color="#fff"></Icon>
                            <q-tag value="100" theme="warning"></q-tag>
                        </div>
                        <div class="app-user-avatar">
                            <img src = "@/assets/default-user.jpg" class="avatar-image" />
                        </div>  
                    </div>
                </div>
            </Header>
            <Layout >
                <!-- 侧边栏目 -->
                <Sider hide-trigger  v-if="navigation.mode == 'vertical'">
                    <Menu 
                        :active-name="navigation.active" 
                        :theme="navigation.navTheme" 
                        width="auto" 
                        :open-names="navigation.collapse"
                        @on-select="changeNav"
                        :mode="navigation.mode"
                    >
                        
                        <!-- 包含子菜单       -->
                        <Submenu :name="index" v-for="(nav,index) in navigation.nav" :key="index" v-if="nav.hasOwnProperty('child')">
                            <template slot="title">
                                <Icon :type="nav.iron"></Icon>
                                {{ nav.title }}
                            </template>
                            <MenuItem :name="index + '-' + nindex" v-for="(child,nindex) in nav.child" :key="nindex" >
                                <router-link tag="div" :to = "{path:child.url == ''?'/':child.url}">
                                    {{ child.title }}
                                </router-link>
                            </MenuItem>
                        </Submenu>
                        <!-- 没有子菜单 -->
                        <MenuItem :name="index" v-for="(nav,index) in navigation.nav" :key="index"  v-if="!nav.hasOwnProperty('child')">
                            <Icon :type="nav.iron"></Icon>
                            <router-link tag="span" :to = "{path:nav.url == ''?'/':nav.url}">
                                {{ nav.title }}
                            </router-link>
                        </MenuItem> 
                    </Menu>
                </Sider>
                <!-- 主要内容 -->
                <Layout :style="{padding: '0 24px 24px',height:'100%'}">
                    <Breadcrumb :style="{margin: '24px 0'}">
                        <BreadcrumbItem v-for="(bread,index) in getBread" :key="index">
                            {{ bread }}
                        </BreadcrumbItem>
                    </Breadcrumb>
                    <Content :style="{padding: '24px', background: '#fff'}">
                         <slot name="content"></slot>
                    </Content>
                </Layout>
            </Layout>
        </Layout>
    </div>
</template>

<script>
import qTag from "@/components/qTag";
import navigation from "@/navigation.js";
export default {
    name:'app-base',
    data:function(){
        
        return {
           navigation
        }
        
    },
    mounted:function(){
        this.setBreadText();
    },
    components:{
        qTag
    },
    methods:{
        setBreadText : function(){
            let navigation = this.navigation;
            let active = String(navigation.active);
            let bread = [];

            if(active.indexOf("-") > -1){
                 bread =  active.split("-");
            }else{
                //选择主菜单连接
                bread.push(active)
            }

            let title = navigation.nav[bread[0]].title;
            navigation.breadText = [];
            navigation.breadText.push(title);
            let subtitle = '';
            if(navigation.nav[bread[0]].hasOwnProperty("child") && navigation.nav[bread[0]].child.length > 0){
                subtitle =  navigation.nav[bread[0]].child[bread[1]].title;
                navigation.breadText.push(subtitle);
            }
            
  
        },
        changeNav:function(path){
            this.navigation.active = path;
            this.setBreadText();
        }
    },
    computed:{
        getBread:function(){
            return this.navigation.breadText;
            
        }
    }
}
</script>

<style lang="less">
html,
body,
#app ,.appContainer{
  height: 100%;
}
body {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  font-size: 14px;
  height: 100%;
}
.app-container,.app-base{
  height: 100%;
  width: 100%;
  display: flex;
}
.layout {
  border: 1px solid #d7dde4;
  background: #f5f7f9;
  position: relative;
  border-radius: 4px;
  overflow: hidden;
  height: 100%;
}
.layout-logo {
  width: 100px;
  height: 30px;
  background: #5b6270;
  border-radius: 3px;
  float: left;
  position: relative;
  top: 15px;
  left: 20px;
}
.layout-nav {
  width: 420px;
  margin: 0 auto;
  margin-right: 20px;
}
.app-header-container {
  display: flex;
  height: 100%;
}
.app-header-title {
  width: 150px;
  color: #fff;
}
.app-header-center {
  flex: 1;
}
.app-user-avatar {
  width: 42px;
  height: 40px;
  border-radius: 100%;
  overflow: hidden;
}
.avatar-image {
  width: 100%;
  height: 100%;
}
.app-header-user {
  display: flex;
  align-items: center;
}
.app-user-notice {
  display: flex;
  align-items: center;
  padding-right: 20px;
}
.notice-image {
  width: 25px;
  height: 25px;
}
.qd-tag {
  background: #ff7303;
  height: 25px;
  line-height: 25px;

}
.app-header-center{
    padding-left:20px;
}
.ivu-dropdown-rel a{
    color:#fff;
}

</style>
