Date.prototype.format = function(format) {
    var date = {
           "M+": this.getMonth() + 1,
           "d+": this.getDate(),
           "h+": this.getHours(),
           "m+": this.getMinutes(),
           "s+": this.getSeconds(),
           "q+": Math.floor((this.getMonth() + 3) / 3),
           "S+": this.getMilliseconds()
    };
    if (/(y+)/i.test(format)) {
           format = format.replace(RegExp.$1, (this.getFullYear() + '').substr(4 - RegExp.$1.length));
    }
    for (var k in date) {
           if (new RegExp("(" + k + ")").test(format)) {
                  format = format.replace(RegExp.$1, RegExp.$1.length == 1
                         ? date[k] : ("00" + date[k]).substr(("" + date[k]).length));
           }
    }
    return format;
}

//获取时间戳
exports.getTimeStamp = function(date,deep = true){
    if(date == undefined){
        var timeStamp = Date.parse(new Date());
    }else{
        var timeStamp = Date.parse(date);
    }
    
    if(deep){
        return timeStamp/1000;
    }

    return timeStamp;
}

//时间戳转换成日期
exports.formatTime = function(timeStamp,format = 'yyyy-MM-dd h:m:s'){
    var date = new Date();
    date.setTime(timeStamp);
    return date.format(format);
}

