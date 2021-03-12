$(document).ready(function(){ 
  $(".stripe_tb tr").mouseover(function(){ 
  //如果鼠标移到class为stripe_tb的表格的tr上时，执行函数
  $(this).addClass("over");}).mouseout(function(){ 
  //给这行添加class值为over，并且当鼠标一出该行时执行函数
  $(this).removeClass("over");}) //移除该行的class
  $(".stripe_tb tr:even").addClass("alt");
  //给class为stripe_tb的表格的偶数行添加class值为alt
});

