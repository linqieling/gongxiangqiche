[##include file='head.tpl'##][##*头部文件*##]

    <div class="content">
      <div id="page_banner" ></div>
         <div class="p_line"></div>
          <div class="content_main">
            <div class="content_main_l">
                <div id="mune">
                <div class="munu_top">关于我们</div>
                <div class="munu_bot">
                 [##section name=loop loop=$pageclass##]
                  <div class="menu">
                    <a href="[##$_SCONFIG.webroot##][##$pageclass[loop].url##]" class="productclass_dolphin">[##$pageclass[loop].levelmark ##][##$pageclass[loop].name ##]</a>
                  </div>
                 [##/section##]
                  
                </div>
              </div>
            </div>
            <!--左边菜单栏结束-->
            <div class="content_main_r">
                <div class="content_main_rig_top">您现在的位置：[##$_SCONFIG.sitename##] &gt; 用户管理面板</div>
                <div class="content_main_rig_bot">
                     <div style="margin:20px;">
                      
                      <div style="width:710px; padding:0px;">
                  
                  [##cacheless##]
                    <div style="float:left; width:150px; height:200px;" >
                        <div style="width:120px; border:2px #999999 solid; margin-left:10px; padding:0px">
			               <div  style="padding:5px; width:120px; height:120px"><img  height="120" width="120" src="[##picredirect($_SGLOBAL.tq_avatar,1)##]"/></div>
		                </div>
                        <div style=" text-align:center; height:20px; line-height:20px;">[##$_SGLOBAL.tq_username##]</div>
                     </div>
                     <div style="float:left;   width:540px; height:150px;  margin-left:20px;">
                     <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                        <tr>
                          <td height="110px;"  style="font-size:14px; line-height:30px;">
                          <div style="width:500px; height:25px; margin-top:10px">
                            <div style="float:left; width:230px;">用户名：[##$result.username##]</div>
                            <div style="float:left; width:200px;">昵&nbsp;称：[##$result.name##]</div>
                          </div>  
                          <div style="width:500px; height:25px;">
                            <div style="float:left; width:230px;">email：[##$result.email##]</div>
                            <div style="float:left; width:200px;">性&nbsp;别：
                            [##if $result.sex eq 0##]
                              保密
                            [##elseif $result.sex eq 1##]
                              帅哥
                            [##elseif $result.sex eq 2##]
                              美女
                            [##/if##]
                            </div>
                          </div> 
                          
                          <div style="width:500px; height:25px;">
                            <div style="float:left; width:230px;">Q&nbsp;Q：[##$result.qq##]</div>
                            <div style="float:left; width:200px;">电&nbsp;话：[##$result.phone##]</div>
                          </div> 
                          
                          

                          
                          </td>
                        </tr>
                        <tr>
                          <td  style=" line-height:30px;">
                            <div style=" float:left">
                            <a href="[##$_SCONFIG.webroot##]index-userinfoedit.html" style="color:#666666; font-size:14px">发站内信</a>
                            </div>
                            <div style="margin-left:10px; float:left"><a href="#" style="color:#666666; font-size:14px">加为好友</a></div>

                          </td>
                        </tr>                  
                      </table>                     
                      </div>
                  </div>
                      
                      
                    </div>
                </div>
                
                
              [##/cacheless##] 
        </div>
      </div>

</div>

</div>




          
[##include file='foot.tpl'##][##*底部文件*##]