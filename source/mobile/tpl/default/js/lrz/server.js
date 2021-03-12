//是单图上传确认-------------------------------------------------
var upload_obj = document.querySelectorAll(".upload_input");
for(var i= 0; i< upload_obj.length; i ++){
    upload_obj[i].addEventListener('change', function (_this) {
        var that     = this,
        progress = document.querySelector('progress');
        if(typeof Loading_box !== "function") { //是函数    其中 FunName 为函数名称
              var Loading_box = bui.loading({appendTo:"#loading"});
            }
        if (that.files.length === 0) return false;
        progress.value=0;
        $('#loadbg').show();
        Loading_box.show();
        Loading_box.text("压缩中");
    
        lrz(that.files[0], {
            width: 800
        })
        .then(function (rst) {
            var img        = new Image(),
                sourceSize = toFixed2(that.files[0].size / 1024),
                resultSize = toFixed2(rst.fileLen / 1024),
                effect     = parseInt(100 - (resultSize / sourceSize * 100));
            progress.value = 0;
            /* ==================================================== */
            // 原生ajax上传代码，所以看起来特别多 ╮(╯_╰)╭，但绝对能用
            // 其他框架，例如ajax处理formData略有不同，请自行google，baidu。

            Loading_box.text("0%");
            var xhr = new XMLHttpRequest();
            xhr.open('POST', _this.target.dataset.url);
            xhr.onload = function () {
                var data = JSON.parse(xhr.response);
                if (xhr.status === 200) {
                    // 上传成功
                       if (data.error == 0) {
                            img.src= rst.base64;
                            progress.value = 100;
                            bui.hint('上传成功');
                            $(_this.target.dataset.show).attr('src', data.result);
                            $(_this.target.dataset.input).attr("value", data.data);
                            
                            $('#loadbg').hide();
                            Loading_box.hide();
                        }else{
                             $('#loadbg').hide();
                             Loading_box.hide();
                             bui.hint(data.msg);
                             that.value = null;
                        }
                } else {
                    $('#loadbg').hide();
                    Loading_box.hide();
                    bui.hint(data.msg);
                    that.value = null;
                }
            };
            xhr.onerror = function (err) {
                bui.hint(JSON.stringify(err, null, 2));
                that.value = null;
            };
            // issues #45 提到似乎有兼容性问题,关于progress
            if (xhr.upload) {
                try {
                    xhr.upload.addEventListener('progress', function (e) {
                        if (!e.lengthComputable) return false;
                        // 上传进度
                        var value=((e.loaded / e.total) || 0) * 100;

                        progress.value =parseInt(value);

                        Loading_box.text(parseInt(value)+"%");
                    });
                } catch (err) {
                    console.log('进度展示出错了,似乎不支持此特性?', err);
                }
            }

            // 添加参数
            rst.formData.append('fileLen', rst.fileLen);
            // rst.formData.append('xxx', '我是其他参数');
            // 触发上传
            xhr.send(rst.formData);
            /* ==================================================== */

            return rst;
        });
   });
}
//是单图上传确认并实现模板回调-------------------------------------------------
var upload_mores = document.querySelector(".upload_more");
if(upload_mores){
    var _this='';
    upload_mores.addEventListener('change', function (_this) {
        var that     = this,
        progress = document.querySelector('progress');
        if(typeof Loading_box !== "function") { //是函数    其中 FunName 为函数名称
              var Loading_box = bui.loading({appendTo:"#loading"});
            }
        // console.log(upload_more)
        if (that.files.length === 0) return false;
        progress.value=0;
        $('#loadbg').show();
        Loading_box.show();
        Loading_box.text("压缩中");
    
        lrz(that.files[0], {
            width: 800
        })
        .then(function (rst) {
            var img        = new Image(),
                sourceSize = toFixed2(that.files[0].size / 1024),
                resultSize = toFixed2(rst.fileLen / 1024),
                effect     = parseInt(100 - (resultSize / sourceSize * 100));
            progress.value = 0;
            /* ==================================================== */
            // 原生ajax上传代码，所以看起来特别多 ╮(╯_╰)╭，但绝对能用
            // 其他框架，例如ajax处理formData略有不同，请自行google，baidu。

            Loading_box.text("0%");
            var xhr = new XMLHttpRequest();
            xhr.open('POST', _this.target.dataset.url);

            
            xhr.onload = function () {
                var data = JSON.parse(xhr.response);
                if (xhr.status === 200) {
                    // 上传成功
                       if (data.error == 0) {
                            img.src= rst.base64;
                            progress.value = 100;
                            bui.hint('上传成功');
                            var $facePhoto = $(_this.target.dataset.show);
                             $facePhoto.prepend(templatePhoto(data.result,data.data));
                            $('#loadbg').hide();
                            Loading_box.hide();
                        }else{
                             $('#loadbg').hide();
                             Loading_box.hide();
                             bui.hint(data.msg);
                             that.value = null;
                        }
                } else {
                    $('#loadbg').hide();
                    Loading_box.hide();
                    bui.hint(data.msg);
                    that.value = null;
                }
            };
            xhr.onerror = function (err) {
                bui.hint(JSON.stringify(err, null, 2));
                that.value = null;
            };
            // issues #45 提到似乎有兼容性问题,关于progress
            if (xhr.upload) {
                try {
                    xhr.upload.addEventListener('progress', function (e) {
                        if (!e.lengthComputable) return false;
                        // 上传进度
                        var value=((e.loaded / e.total) || 0) * 100;

                        progress.value =parseInt(value);

                        Loading_box.text(parseInt(value)+"%");
                    });
                } catch (err) {
                    console.log('进度展示出错了,似乎不支持此特性?', err);
                }
            }

            // 添加参数
            rst.formData.append('fileLen', rst.fileLen);
            // rst.formData.append('xxx', '我是其他参数');
            // 触发上传
            xhr.send(rst.formData);
            /* ==================================================== */

            return rst;
        });
   });
}

function toFixed2(num) {
    return parseFloat(+num.toFixed(2));
}
templatePhoto=function(result,data){
     return `<div class="span1">
                 <div class="bui-upload-thumbnail"><img src="${result}" alt="" /><i class="icon-removefill"></i>
                     <input id="more_phone" type="hidden" name="more_phone" value="${data}" /> 
                 </div>
            </div>`
}

/**
 * 替换字符串 !{}
 * @param obj
 * @returns {String}
 * @example
 * '我是!{str}'.render({str: '测试'});
 */
String.prototype.render = function (obj) {
    var str = this, reg;

    Object.keys(obj).forEach(function (v) {
        reg = new RegExp('\\!\\{' + v + '\\}', 'g');
        str = str.replace(reg, obj[v]);
    });

    return str;
};
/**
 * 触发事件 - 只是为了兼容演示demo而已
 * @param element
 * @param event
 * @returns {boolean}
 */
function fireEvent (element, event) {
    var evt;

    if (document.createEventObject) {
        // IE浏览器支持fireEvent方法
        evt = document.createEventObject();
        return element.fireEvent('on' + event, evt)
    }
    else {
        // 其他标准浏览器使用dispatchEvent方法
        evt = document.createEvent('HTMLEvents');
        // initEvent接受3个参数：
        // 事件类型，是否冒泡，是否阻止浏览器的默认行为
        evt.initEvent(event, true, true);
        return !element.dispatchEvent(evt);
    }
}
