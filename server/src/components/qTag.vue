<template>
    <div :class="'qd-tag ' + (theme == ''?'qd-tag-base':' qd-tag-' + theme)" >
        {{ value }}
    </div>
</template>

<script>
export default {
    props:["value",'theme'],
    name:'qTag',

}
</script>

<style lang = "less">
.qd-tag{
    padding: 0 7px;
    height: 22px;
    border-radius: 6px;
    margin-left:5px;
    justify-content: center;
    font-size:12px;
}
.qd-tag-base{
    background: #eaeaea;
    color:#666;
}
.qd-tag-warning{
    background: #e75319;
    color:#fff;
}
</style>
