[##include file="head.tpl"##]
<div style="width:100%; height:50px; line-height:50px; background-color:#587EAC;  font-size:14px; overflow:hidden;">
  <a href="http://www.weixinhbs.com/" style="margin-left:2%; color:#FFF; font-size:14px;">好帮手微信营销系统-投票</a>
</div>
<ul style="margin-top:10px; overflow:hidden;">
  [##section name=loop loop=$data##]
  <a href="[##$_PSPATH.plugroot##]index-voteitemlist-voteid-[##$data[loop].id##].html" target="_self">
    <li style="overflow:hidden; height:60px; width:100%; padding-left:2%; padding-bottom:5px; border-bottom:#CCC 1px solid;">
       <div style="width:90%; float:left">
           <div style="height:30px; line-height:30px; font-size:16px; color:#666;">[##$data[loop].name##]</div>
           <div style="height:15px; color:#999"><span>起止时间:[##$data[loop].starttime|date_format:"%Y-%m-%d"##]至[##$data[loop].endtime|date_format:"%Y-%m-%d"##]</span></div>
       </div>	
       <div style="float:right; height:15px; line-height:15px; width:15px; text-align:center; background:#999; color:#FFF;border-radius:50%; margin-right:2%; margin-top:18px;">&gt;</div>
    </li>
  </a>
  [##/section##]
</ul>
[##include file="foot.tpl"##]