var tools = require('./tools');


exports.create = function(){
    return {
        username:'admin',
        nickname:'env107',
        logintime:tools.getTimeStamp(),
        status:'on',
        avatar:':default'
    }
}