<?php
class RandomChinese{
       public $SourceArray=array(0=>"From2500");
       private $source="";
       private $sourceLength=0;
       public $endcode="UTF-8";
       public function __construct($soucres){
		 switch ($soucres){
		   case "From2500": 
			 $this->source = $this->GetChinese2500(); 
		   break;
		 }
		 $this->sourceLength = mb_strlen($this->source,$this->endcode);
       }
       private function getRandom(){
		$time = explode ( " ", microtime () );  
		$time = $time [1] . ($time [0] * 1000);  
		$time2 = explode ( ".", $time );  
		$time = $time2 [0];
		$t = (int)mb_substr($time,10,mb_strlen($this->source,$this->endcode)-1,$this->endcode);
		$t = rand(0,microtime()*10);
		if($t > $this->sourceLength)
			return 0;
			return $t;
	   }
               
       private function GetString($count){
		 $totalcount=$count;
		 $sb="";             
		 while (($count--) > 0){
		   $str=mb_substr($this->source,rand($this->getRandom(),$this->sourceLength),1,$this->endcode);
		   $sb.=$str;
		 }
		 if((mb_strlen($sb,$this->endcode))!=$totalcount){
			return "胡子科技微信好帮手";
		 }
		 return $sb;
       }
       /// <summary>
       /// 判断一个字符串是否有相同的字母
       /// </summary>
       /// <param name="str"></param>
       /// <returns></returns>
      private function HasSameStr($str){
		   while(mb_strlen($str,$this->endcode)>0){
			  $chasr = mb_substr($str,0,1,$this->endcode);
			  $str = mb_substr($str,1,mb_strlen($str,$this->endcode)-1,$this->endcode);
			  if (mb_strpos($str,$chasr,0,$this->endcode))
				 return true;
		   }
		   return false;
       }
       /// <summary>
       /// 获取独一无二的字符串
       /// </summary>
       /// <param name="count"></param>
       /// <returns></returns>
       public function GetUniqueCode($count){
		 $Code = $this->GetString($count);
		 if ($this->HasSameStr($Code)){
			return $this->GetUniqueCode($count);
		 }else{
			return $Code;
		 }
       }
       // 现代汉语常用字中的常用字(共2500个)
       public function GetChinese2500(){
		 return "一乙二十丁厂七卜人入八九几儿了力乃刀又三于干亏士工土才寸下大丈与万上小口巾山千乞川亿个勺久凡及夕丸".
				"么广亡门义之尸弓己已子卫也女飞刃习叉马乡丰王井开夫天无元专云扎艺木五支厅不太犬区历尤友匹车巨牙屯比".
				"互切瓦止少日中冈贝内水见午牛手毛气升长仁什片仆化仇币仍仅斤爪反介父从今凶分乏公仓月氏勿欠风丹匀乌凤".
				"勾文六方火为斗忆订计户认心尺引丑巴孔队办以允予劝双书幻玉刊示末未击打巧正扑扒功扔去甘世古节本术可丙".
				"左厉右石布龙平灭轧东卡北占业旧帅归且旦目叶甲申叮电号田由史只央兄叼叫另刀叹四生失禾丘付仗代仙们仪白".
				"仔他斥瓜乎丛令用甩印乐句匆册犯外处冬鸟务包饥主市立闪兰半汁汇头汉宁穴它讨写让礼训必议讯记永司尼民出".
				"辽奶奴加召皮边发孕圣对台矛";
       }
}
?>