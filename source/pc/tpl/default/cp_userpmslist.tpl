[##include file='head.tpl'##][##*头部文件*##]
<div class="banner">
  [##$_SMODEL->instance('common')->getadtpl(2)##]
</div>
<div class="wrap">
  <div class="f-l" style="overflow:hidden;">
    [##include file='cp_left.tpl'##][##*左部文件*##]
  </div>
  <div class="f-r" style="overflow:hidden;">
      <div class="box1" style="width:960px;">
        <div class="boxtitle">
          当前位置:&nbsp;[##$_SCONFIG.sitename##]
          &gt;&nbsp;<a href="#">信息中心</a>
        </div>
        <div class="boxcontent">
            
            [##if !$op##] 
            [##section name=loop loop=$data##]
            <div style="width:100%; height:40px; line-height:40px;">
             <div style="float:left; width:20px; padding-top:10px;">
               <img 
                 [##if $data[loop].new##]
                     src="[##$_SPATH.images##]icon/pmread.jpg" 
                 [##else##]
                     src="[##$_SPATH.images##]icon/pmnoread.jpg"
                 [##/if##]
               />
             </div>
             <div style="float:left; width:285px;">
               <a href="[##$_SCONFIG.webroot##]cp-userpmsshow-id-[##$data[loop].pmid##].html" target="_self">[##$data[loop].subject##]</a>
             </div>
             <div style="float:left; width:100px;">
              来自:[##$data[loop].msgfrom##]
             </div>
             <div style="float:left; width:180px;">[##$data[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</div>
             <div style="float:left; width:150px; text-align:right;">
              <a href="[##$_SCONFIG.webroot##]cp-userpmslist-op-view-pmid-[##$data[loop].pmid##].html" target="_self">查看</a>&nbsp;
              <a href="[##$_SCONFIG.webroot##]cp-userpmslist-op-add-pmid-[##$data[loop].pmid##]-uid-[##$data[loop].msgfromid##].html" target="_self">回复</a>&nbsp;
              <a href="[##$_SCONFIG.webroot##]cp-userpmslist-op-del-pmid-[##$data[loop].pmid##].html" target="_self">删除</a>
             </div>
            </div>
            [##sectionelse##]
                <div style="text-align:center; margin:20px auto;">暂无信息,点此<a href="[##$_SCONFIG.webroot##]cp-userpmslist-op-add.html" style="color:#F00">发送信息</a></div>
            [##/section##]
            [##if $multi##]<div class="pages">[##$multi##]</div>[##/if##]
            
            [##elseif $op eq "add"##]
            <form  method=post action="[##$_SCONFIG.webroot##]cp-userpmslist-op-[##$op##].html">
            <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
            <div style="margin:20px; line-height:40px;">
                <div style="width:100%; height:40px; ">标&nbsp;&nbsp;&nbsp;题：<input type="text" name="subject" value=""/></div>
                <div style="width:100%; height:40px;">发&nbsp;&nbsp;&nbsp;给：[##if $result##][##$result.username##]([##$result.name##])<input type="hidden" name="username" value="[##$result.username##]"/>[##else##]<input type="text" name="username" value=""/>[##/if##]
                </div>
                <div style="width:100%; height:40px;">时&nbsp;&nbsp;&nbsp;间：[##$_SGLOBAL.timestamp|date_format:"%Y-%m-%d %H:%M"##]</div>
                <div style="width:100%; overflow:hidden;">
                  <div style="float:left;">内&nbsp;&nbsp;&nbsp;容：</div>
                  <div style="float:left; padding-top:8px;"><textarea cols="80" rows="5" name="content"></textarea></div>
                </div>
                <div style="margin-top:20px; text-align:center">
                <input type="submit" name="submit" class="scbutton"  value="发送">
                <input type="reset"  name="submit" class="scbutton"  value="重置">
                </div>
            </div>
            </form>
            [##elseif $op eq "view"##]
            <div style="margin:20px; line-height:40px;">
                <div style="width:100%; height:40px; ">标&nbsp;&nbsp;&nbsp;题：[##$result.subject##]</div>
                <div style="width:100%; height:40px;">来&nbsp;&nbsp;&nbsp;自：[##$result.msgfrom##]
                </div>
                <div style="width:100%; height:40px;">时&nbsp;&nbsp;&nbsp;间：[##$result.dateline|date_format:"%Y-%m-%d %H:%M"##]</div>
                <div style="width:100%; overflow:hidden;">
                  <div style="float:left;">内&nbsp;&nbsp;&nbsp;容：</div>
                  <div style="float:left;">[##$result.content##]
                </div>
            </div>
            <div style="margin-top:20px; text-align:center"><input type="button" onClick="javascript:window.location.href='[##$_SGLOBAL.refer##]'" value="返回" class="scbutton"></div>
            
            [##/if##]
        </div>
      </div>
  </div>
</div>
[##include file='foot.tpl'##][##*底部文件*##]