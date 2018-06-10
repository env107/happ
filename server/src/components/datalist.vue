<template>
    <div class="list-table-container">
        <Table border :columns="memberField" :data="memberlist"></Table>
    </div>
</template>

<script>

export default {
    name:"list-table",
    data:function(){
        return {
            memberField:[
                { key:"id",title:"用户ID" },
                { key:"openid",title:"OPENID" },
                { key:"nickname",title:"昵称" },
                { key:"mobile",title:"手机号" },
                {key:"button",title:"操作",
                    render:(h,params)=>{
                        console.log(params)
                        return h('div', [
                                h('Button', {
                                    props: {
                                        type: 'primary',
                                        size: 'small'
                                    },
                                    style: {
                                        marginRight: '5px'
                                    },
                                    on: {
                                        click: () => {
                                           
                                        }
                                    }
                                }, '查看'),
                                h('Button', {
                                    props: {
                                        type: 'error',
                                        size: 'small'
                                    },
                                    on: {
                                        click: () => {
                                            
                                        }
                                    }
                                }, '删除')
                            ]);
                    }
                }
            ],
            memberlist :[
                {
                    id:1,
                    openid:'156f4sd56fg4sd7u23e9sad1-fds4f',
                    nickname:'env107',
                    mobile:'13005572277'
                }
            ]
        }
    }
}
</script>

<style>

</style>
