<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>[##if $_SESSION.lang eq 'english'##]reminder[##else##]温馨提示[##/if##]</title>
        <link type="text/css" rel="stylesheet" href="[##$_SPATH.css##]showmessage.css" />
    </head>
    <body>

        <div class="mianBox">
            <img src="[##$_SPATH.images##]showmessage/yun0.png" class="yun yun0" />
            <img src="[##$_SPATH.images##]showmessage/yun1.png" class="yun yun1" />
            <img src="[##$_SPATH.images##]showmessage/yun2.png" class="yun yun2" />
            <img src="[##$_SPATH.images##]showmessage/bird.png" class="bird" />
            <img src="[##$_SPATH.images##]showmessage/san.png" class="san" />
            <div class="tipInfo">
                <div class="in">
                    <div class="textThis">
                        <h2>[##$message##]</h2>
                        <p>
                            [##if $_SESSION.lang eq 'english'##]
                            <span>The page will jump in <b id="wait">[##$second##]</b> seconds<a id="href" href="[##$url_forward##]">Jump</a></span>
                            [##else##]
                            <span>页面将在<b id="wait">[##$second##]</b>秒后<a id="href" href="[##$url_forward##]">跳转</a></span>
                            [##/if##]
                        </p>
                    </div>
                </div>
            </div>
        </div>
    
    </body>
    <script type="text/javascript" src="[##$_SPATH.js##]jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var h = $(window).height();
            $('body').height(h);
            $('.mianBox').height(h);
            centerWindow(".tipInfo");

            var wait = document.getElementById('wait'), href = document.getElementById('href').href;
            var interval = setInterval(function() {
                var time = --wait.innerHTML;
                if (time <= 0) {
                    clearInterval(interval);
                    location.href = href;
                }
            }, 1000);

            setInterval(function() {
                $('.san').addClass('upDown');
            }, 3000);

        });

        //2.将盒子方法放入这个方，方便法统一调用
        function centerWindow(a) {
            center(a);
            //自适应窗口
            $(window).bind('scroll resize', function() {
                center(a);
            });
        }

        //1.居中方法，传入需要剧中的标签
        function center(a) {
            var wWidth = $(window).width();
            var wHeight = $(window).height();
            var boxWidth = $(a).width();
            var boxHeight = $(a).height();
            var scrollTop = $(window).scrollTop();
            var scrollLeft = $(window).scrollLeft();
            var top = scrollTop + (wHeight - boxHeight) / 2;
            var left = scrollLeft + (wWidth - boxWidth) / 2;
            $(a).css({
                "top": top,
                "left": left
            });
        }
    </script>
</html>