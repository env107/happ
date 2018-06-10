<template>
    <div class="app-container">
        <!-- 基本布局 -->
        <Layout >
            <Header :style = "{background:'#373d41'}">
                <div class="app-header-container">
                    <div class="app-header-title">App数据管理平台</div>
                    <div class="app-header-center">
                        <!-- 下拉菜单 -->
                        <Dropdown  trigger="click" :style="{color:'#fff'}">
                            <a href="javascript:void(0)">
                                功能辅助菜单
                                <Icon type="arrow-down-b"></Icon>
                            </a>
                            <DropdownMenu slot="list" >
                                <DropdownItem>驴打滚</DropdownItem>
                                <DropdownItem>炸酱面</DropdownItem>
                                <DropdownItem disabled>豆汁儿</DropdownItem>
                                <DropdownItem>冰糖葫芦</DropdownItem>
                                <DropdownItem divided>北京烤鸭</DropdownItem>
                            </DropdownMenu>
                        </Dropdown>
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
                <Sider hide-trigger >
                    <Menu active-name="1-2" :theme="navTheme" width="auto" :open-names="['1']">
                        <Submenu name="1">
                            <template slot="title">
                                <Icon type="ios-navigate"></Icon>
                                Item 1
                            </template>
                            <MenuItem name="1-1">Option 1</MenuItem>
                            <MenuItem name="1-2">Option 2</MenuItem>
                            <MenuItem name="1-3">Option 3</MenuItem>
                        </Submenu>
                        <Submenu name="2">
                            <template slot="title">
                                <Icon type="ios-keypad"></Icon>
                                Item 2
                            </template>
                            <MenuItem name="2-1">Option 1</MenuItem>
                            <MenuItem name="2-2">Option 2</MenuItem>
                        </Submenu>
                        <Submenu name="3">
                            <template slot="title">
                                <Icon type="ios-analytics"></Icon>
                                Item 3
                            </template>
                            <MenuItem name="3-1">Option 1</MenuItem>
                            <MenuItem name="3-2">Option 2</MenuItem>
                        </Submenu>
                    </Menu>
                </Sider>
                <Layout :style="{padding: '0 24px 24px',height:'100%'}">
                    <Breadcrumb :style="{margin: '24px 0'}">
                        <BreadcrumbItem>Home</BreadcrumbItem>
                        <BreadcrumbItem>Components</BreadcrumbItem>
                        <BreadcrumbItem>Layout</BreadcrumbItem>
                    </Breadcrumb>
                    <Content :style="{padding: '24px', background: '#fff'}">
                        <router-view></router-view>
                    </Content>
                </Layout>
            </Layout>
        </Layout>
    </div>
</template>

<script>
import qTag from "@/components/qTag";
export default {
    name:'app-base',
    data:function(){
        return {
            navTheme:'dark'
        }
        
    },
    components:{
        qTag
    }
}
</script>

<style lang="less">
html,
body,
#app {
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
.app-container {
  height: 100%;
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
