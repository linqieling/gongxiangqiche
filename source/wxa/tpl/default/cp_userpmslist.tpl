[##include file='head.tpl'##][##*头部文件*##]
[##include file='headmenu.tpl'##]
[##include file='headtop.tpl'##]
<div class="banner">
  [##$_SMODEL->instance('common')->getadtpl(2)##]
</div>
<div class="wrap">
  <!-- <div class="f-l" style="overflow:hidden;">
    [##include file='cp_left.tpl'##][##*左部文件*##]
  </div> -->
<div id="container">
  <div class="layout">
    <div class="container_02 mb20" style="margin-top:30px;">
            
            [##if !$op##] 
            [##section name=loop loop=$data##]
            <div style="width:100%; height:30px; line-height:30px;">
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

                <div style="width:100%;margin:auto;">暂无信息,点此<a href="[##$_SCONFIG.webroot##]cp-userpmslist-op-add.html" style="color:#F00">发送信息</a></div>
            [##/section##]
            [##if $multi##]<div class="pages">[##$multi##]</div>[##/if##]
            
            [##elseif $op eq "add"##]
         
            <form method=post action="[##$_SCONFIG.webroot##]cp-userpmslist-op-[##$op##].html">
            <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
            <div style="padding:20px; line-height:30px;">
                <div style="width:100%; height:30px; ">标&nbsp;&nbsp;&nbsp;题：<input type="text" name="subject" value=""/></div>
                <div style="width:100%; height:30px;">发&nbsp;&nbsp;&nbsp;给：[##if $result##][##$result.username##]([##$result.name##])<input type="hidden" name="username" value="[##$result.username##]"/>[##else##]<input type="text" name="username" value=""/>[##/if##]
                </div>
                <div style="width:100%; height:30px;">时&nbsp;&nbsp;&nbsp;间：[##$_SGLOBAL.timestamp|date_format:"%Y-%m-%d %H:%M"##]</div>
                <div style="width:100%; overflow:hidden;">
                  <div >内&nbsp;&nbsp;&nbsp;容：</div>
                  <div style="width:100%;margin:auto;"><textarea cols="80" rows="5" name="content"></textarea></div>
                </div>
                <div style="margin-top:20px; text-align:center">
                <input type="submit" name="submit" class="scbutton"  value="发送">
                <input type="reset"  name="submit" class="scbutton"  value="重置">
                </div>
            </div>
            </form>
            
            [##elseif $op eq "view"##]
            <div style="margin:20px; line-height:30px;">
                <div style="width:100%; height:30px; ">标&nbsp;&nbsp;&nbsp;题：[##$result.subject##]</div>
                <div style="width:100%; height:30px;">来&nbsp;&nbsp;&nbsp;自：[##$result.msgfrom##]
                </div>
                <div style="width:100%; height:30px;">时&nbsp;&nbsp;&nbsp;间：[##$result.dateline|date_format:"%Y-%m-%d %H:%M"##]</div>
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
[##include file='foot.tpl'##][##*底部导航*##]