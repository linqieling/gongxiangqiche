//将base64转换为文件-------------
function dataURLtoFile(dataurl, filename) {//将base64转换为文件
        var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],

        bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
        while(n--){
            u8arr[n] = bstr.charCodeAt(n);
        }
        return new File([u8arr], filename, {type:mime});
}
//将base64转换为图片接口-------------
function uploadimg(data64,url,show_id,input_id){
        if(data64=='' || url=='' || show_id=='' ||input_id==''){
           bui.hint({
                appendTo:"#main", 
                content:"<i class='icon-infofill'></i>参数错误", 
                position:"top" , 
                skin:'warning', 
                showClose:true, 
                autoClose: false
            });
        }
        if(typeof Loading_box !== "function") { //是函数    其中 FunName 为函数名称
            var Loading_box = bui.loading({appendTo:"#loading"});
        }
        var form=document.forms[0];
        var formData = new FormData();
        formData.append("file", dataURLtoFile(data64,"dianiuniu.png"));
        $.ajax({ 
                 url: url , 
                 type: 'POST', 
                 data: formData, 
                 async: true, 
                 cache: false,
                 dataType:'json',
                 contentType: false, 
                 processData: false,
                 beforeSend:function(res){
                   
                 },
                 success: function (res) { 
                        if (res.error == 0) {
                            $(show_id).attr('src', res.result);
                            $(input_id).val(res.result);
                            bui.hint('上传成功');
                        } else {
                            bui.hint({
                                appendTo:"#main", 
                                content:"<i class='icon-infofill'></i>"+res.msg, 
                                position:"top" , 
                                skin:'warning', 
                                showClose:true, 
                                autoClose: false
                            });
                            return false;
                        }

                 },
                 complete: function(){
                    Loading_box.hide();
                    if($('#loadbg').css("display") == 'block'){
                        $("#loadbg").hide();   
                    }
                 }, 
                 error: function (returndata) { 
                    bui.hint({
                                appendTo:"#main", 
                                content:"<i class='icon-infofill'></i>上传失败", 
                                position:"top" , 
                                skin:'warning', 
                                showClose:true, 
                                autoClose: false
                            }); 
                 } 
           });  
           

     
}
//图片压缩------------------
//用于压缩图片的canvas
// function compress(base64String, w, quality) {
//         var getMimeType = function (urlData) {
//             var arr = urlData.split(',');
//             var mime = arr[0].match(/:(.*?);/)[1];
//             // return mime.replace("image/", "");
//             return mime;
//         };
//         var newImage = new Image();
//         var imgWidth, imgHeight;
 
//         var promise = new Promise(resolve => newImage.onload = resolve);
//         newImage.src = base64String;

//         return promise.then(() => {
//             imgWidth = newImage.width;
//             imgHeight = newImage.height;
//             var canvas = document.createElement("canvas");
//             var ctx = canvas.getContext("2d");
//             if (Math.max(imgWidth, imgHeight) > w) {
//                 if (imgWidth > imgHeight) {
//                     canvas.width = w;
//                     canvas.height = w * imgHeight / imgWidth;
//                 } else {
//                     canvas.height = w;
//                     canvas.width = w * imgWidth / imgHeight;
//                 }
//             } else {
//                 canvas.width = imgWidth;
//                 canvas.height = imgHeight;
//             }
//             ctx.clearRect(0, 0, canvas.width, canvas.height);
//             ctx.drawImage(newImage, 0, 0, canvas.width, canvas.height);
//             var base64 = canvas.toDataURL(getMimeType(base64String), quality);
//             return base64;
//         });
// }
