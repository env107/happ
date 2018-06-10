<template>
  <div class="appContainer" id="app">
      <AppBase >
          <template slot="content">
                <router-view></router-view>
            </template>
      </AppBase>
  </div>
</template>

<script>
import AppBase from '@/components/app-base';
export default {
  name: 'App',
  components:{ AppBase },
}
</script>

<style lang="less">

</style>