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
                      
                 <!-- 空白边框 --> 
                 <div class="content_main_rig_bot">
                  <ul>
                    <li>
                        [##section name=loop loop=$data##]
                          <div style="width:700px;">
                           <div style="float:left; width:530px;">
                             <a href="[##$_SCONFIG.webroot##]index-userpmsshow-id-[##$data[loop].pmid##].html" target="_self">                   
                                [##$data[loop].username##]（[##$data[loop].name##]）
                             </a>
                           </div>
                           <div style="float:left; width:170px;">
                            <a href="[##$_SCONFIG.webroot##]index-usershow-id-[##$data[loop].uid##].html" target="_self">查看资料</a>&nbsp;&nbsp;
                            <a href="[##$_SCONFIG.webroot##]index-usersendmsg-id-[##$data[loop].uid##].html" target="_self">发站内信</a>&nbsp;&nbsp;
                            <a href="#" target="_self">加为好友</a>
                           </div>
                          </div> 
                         [##sectionelse##]
                              <div style="text-align:center">暂无信息</div>
                         [##/section##]
                    </li>
                  </ul>
                </div>
                <div  class="pages">[##$multi##]</div>
                      
                      
                    </div>
                </div>
                
                
        </div>
      </div>

</div>

</div>




          
[##include file='foot.tpl'##][##*底部文件*##]