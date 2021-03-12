<?php
require('randomchinese.php');
require('gd.php');
class CssSpriteHelp
{
    public $Code = '';
    public $Keyword = '';
    public $Key = '';
    public $endcode="UTF-8";

    private $ListModel=array(0=>array("X"=>4,"Y"=>20),
               1=>array("X"=>59,"Y"=>20),
               2=>array("X"=>114,"Y"=>20),
               3=>array("X"=>4,"Y"=>60),
               4=>array("X"=>59,"Y"=>60),
               5=>array("X"=>114,"Y"=>60),
               6=>array("X"=>4,"Y"=>100),
               7=>array("X"=>59,"Y"=>100),
               8=>array("X"=>114,"Y"=>100)
     );

  private $ListFonts=array(0=>"simhei.ttf",1=>"fzxy.ttf",2=>"msyh.ttf",3=>"stxihei.ttf");
  private $direct=array(0=>"vertical",1=>"horizontal",2=>"diamond",3=>"rectangle");
 
  public function setWarping($im){
     $rgb=array();
     $width = imagesx($im); 
     $height = imagesy($im); 
     $direct = 1;
     $level=$width /20; 
     for($j = 0;$j < $height;$j++) { 
            for($i = 0;$i < $width;$i++) { 
                $rgb[$i] = imagecolorat($im, $i , $j); 
                } 
            for($i = 0;$i < $width;$i++) { 
                $r = sin($j / $height * 2 * M_PI - M_PI * 0.5) * ($direct ? $level : -$level); 
                 imagesetpixel($im, $i + $r , $j , $rgb[$i]); 
                } 
        } 
     return $im;
  } 
  
  public function DrawingMap($image,$imageX,$imageY,$starX,$starY,$str,$size,$fontx,$fonty,$flage=true)
  {
    $color = array(0=>array(0=>1,1=>80),
                 1=>array(0=>161,1=>240),
                 2=>array(0=>81,1=>160));

    $selectIndex = rand(0,1);
    $wordarray = $color[$selectIndex];
    list($r,$g,$b) =array(
                   rand($color[$selectIndex][0],$color[$selectIndex][1]),
                   rand($color[$selectIndex][0],$color[$selectIndex][1]),
                   rand($color[$selectIndex][0],$color[$selectIndex][1]));

    $startc = array(rand($color[$selectIndex][0],$color[$selectIndex][0]+10),
                   rand($color[$selectIndex][0],$color[$selectIndex][0]+10),
                   rand($color[$selectIndex][0],$color[$selectIndex][0]+10));

    $endc = array(rand($color[$selectIndex][0]+69,$color[$selectIndex][1]),
                   rand($color[$selectIndex][0]+69,$color[$selectIndex][1]),
                   rand($color[$selectIndex][0]+69,$color[$selectIndex][1]));

    unset($color[$selectIndex]);
    $color = array_values($color);
    $selectIndex = rand(0,1);
    $startcolor = array(
                   rand($color[$selectIndex][0],$color[$selectIndex][1]),
                   rand($color[$selectIndex][0],$color[$selectIndex][1]),
                   rand($color[$selectIndex][0],$color[$selectIndex][1]));

    unset($color[$selectIndex]);
    $color = array_values($color);
    $endcolor = array(
                   rand($color[0][0],$color[0][1]),
                   rand($color[0][0],$color[0][1]),
                   rand($color[0][0],$color[0][1]));
    $im;
    $selectIndex=0;
	$flage=0;
    if($selectIndex) {
      //$startcolor =Array ( 0 => 0, 1 => 0 ,2 => 0 ) ;
      //$endcolor =Array ( 0 => 0 ,1  => 0 ,2 => 0 ) ;
	  //echo '123';
	  $gd = new gd_gradient_fill($imageX,$imageY,$this->direct[rand(0,3)],$startcolor,$endcolor);
      $im = $gd->image;
    }else {
      list($r1,$g1,$b1) = $startcolor;
      list($r2,$g2,$b2) = $endcolor;
      $im = imagecreatetruecolor($imageX,$imageY);
      /*
	  $back1 = imagecolorallocate($image, $r1, $g1, $b1);
      $back = imagecolorallocate($image, $r2, $g2, $b2);
      */
	  $back1 = imagecolorallocate($image, 255, 255, 255);
      $back = imagecolorallocate($image, 255, 255, 255);

      imagefilledrectangle($im, 0, 0, $imageX,$imageY , $back1);
      imagefilledrectangle($im, rand(0,10), rand(0,10), $imageX-rand(0,10),$imageY-rand(0,10) , $back);
    }
    $selectIndex = rand(0,1);
    $font =  "./font/".$this->ListFonts[rand(0,3)];
	//echo $font;

    if($selectIndex&&$flage){
      $r = 255; $g = 255; $b = 255;
      $font = "./font/".$this->ListFonts[0];
      $size = 20;
    }
    //$black = ImageColorAllocate($im, $r,$g,$b);
    $black = ImageColorAllocate($im, 0,0,0);
	
    imagettftext($im,$size,rand(-10,10),$fontx,$fonty,$black,$font,$str);
    if($flage){
      imageline($im,rand(0,$imageX),rand(0,$imageY),rand(0,$imageX) ,rand(0,$imageY),$black);
      imageline($im,rand(0,$imageX),rand(0,$imageY),rand(0,$imageX) ,rand(0,$imageY),$black);
    }
    if($selectIndex&&$flage) {
      $im = $this->DrawingWordGradue($im,$startc,$endc,$r,$g,$b);
	  //$im = $this->DrawingWordGradue($im,$startc,$endc,255,255,255);
    }
    if((!$selectIndex)&&$flage) {
      $im = $this->setWarping($im);
    }
    
    imagecopy ($image,$im,$starX,$starY,0,0,$imageX,$imageY);
    imagedestroy($im);
    return $image;
  }
  

  public function DrawingWordGradue($image,$startcolor,$endcolor)
  {
    $imageX =imagesx($image);
    $imageY = imagesy($image);
    list($r1,$g1,$b1) = $startcolor;  
    list($r2,$g2,$b2) = $endcolor;  
    for ($x=0;$x<$imageY;$x++) {
      for ($y=0;$y< $imageX;$y++) {
        $rgb = imagecolorat($image,$y,$x);
        $rgbarray = imagecolorsforindex($image, $rgb);
        if(($rgbarray['red']>250)&($rgbarray['green']>250)&($rgbarray['blue']>250)) {
          $old_r=$r1;  
          $old_g=$g1;  
          $old_b=$b1;  
          // new values :   
          $r3 = ( $r2 - $r1 != 0 ) ? intval( $r1 + ( $r2 - $r1 ) * ( $x / $imageY ) ): $r1;  
          $g3 = ( $g2 - $g1 != 0 ) ? intval( $g1 + ( $g2 - $g1 ) * ( $x / $imageY ) ): $g1;  
          $b3 = ( $b2 - $b1 != 0 ) ? intval( $b1 + ( $b2 - $b1 ) * ( $x / $imageY ) ): $b1;  
          $fill = imagecolorallocate( $image, $r3, $g3, $b3 );
          imagefilledrectangle($image, $y, $x-1, $y, $x, $fill);    
        }
      }
    } /**/
    return $image;     
  }


  public function DrawingShow($image)
  {
    for ($i = 0; $i <mb_strlen($this->Keyword,$this->endcode); $i++)
    {
       $str=mb_substr($this->Keyword,$i,1,$this->endcode);
       $image=$this->DrawingMap($image,26,34,$i*26,0,$str,12,4,rand(18,25),false);
    }
    $black = ImageColorAllocate($image, rand(0,120),rand(0,120),rand(0,120));
    imageline($image,0,rand(8,18),160 ,rand(6,20),$black);
    return $image;           
  }

  public function DrawingShow2($image)
  {
     $xyArray=$this->ListModel;
     for ($i = 0; $i <mb_strlen($this->Code,$this->endcode); $i++)
     {
       $str=mb_substr($this->Code,$i,1,$this->endcode);
       $image=$this->DrawingMap($image,55,40,$xyArray[$i]["X"]-4,($xyArray[$i]["Y"]+12),$str,rand(13,16),rand(4,10),rand(18,28));
     }
     return $image;
   }
   public function DrawingWord(){
        $imageX =165;
        $imageY = 165;
        $image = imagecreatetruecolor($imageX,$imageY);
        //$back = imagecolorallocate($image, rand(0,255), rand(0,255), rand(0,255));
		$back = imagecolorallocate($image,255,255,255);
        imagefilledrectangle($image, 0, 0, $imageX,$imageY , $back);
        $image=$this->DrawingShow($image);
        $image=$this->DrawingShow2($image);
        for ($i=0;$i<800;$i++)
        {
		   $pointcol = imagecolorallocate($image, rand(121,240), rand(121,240), rand(121,240));
           imagesetpixel($image,rand(2,$imageX*1.5-2),rand(2,$imageY-2),$pointcol);
        }
       //output to browser
	   //ob_end_clean();
	   header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	   header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	   header("Cache-Control: no-store, no-cache, must-revalidate");
	   header("Cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");/**/
	   header('Content-type: image/png');
	   imagepng($image);
	   imagedestroy($image);
   }

   public  function __construct(){
	   $RC = new RandomChinese("From2500");
	   $this->Code=$RC->GetUniqueCode(9);
	   $this->Keyword = $this->RandomCode($this->Code, 4);
	   $this->Key =$this->GetKey($this->Code, $this->Keyword);
   }

   public function RandomCode($Code, $CodeLength,$Source = ""){
	   $random =rand(0, mb_strlen($Code,$this->endcode)- 1);
	   $Source .=mb_substr($Code,$random,1,$this->endcode); 
	   $Code=mb_substr($Code,0,$random,$this->endcode).mb_substr($Code,($random+1),(mb_strlen($Code,$this->endcode)-($random+1)),$this->endcode);
	   //$Code =str_replace($Source,"",$Code);
	   while ($CodeLength >mb_strlen($Source,$this->endcode)){
		 $Source =$this->RandomCode($Code, $CodeLength, $Source);
	   }
	   return $Source;
   }
   
   public function GetKey($Code,$Keyword){
	   $Key = "";
	   for ($i = 0; $i < mb_strlen($Keyword,$this->endcode); $i++)
	   {
		  for ($a=0; $a <mb_strlen($Code,$this->endcode) ; $a++) { 
			if(mb_substr($Code,$a,1,$this->endcode) == mb_substr($Keyword,$i,1,$this->endcode)){
			   $Key.=$a+1;
			}
		  }
			   //$Key .= (mb_strpos($Code,mb_substr($Keyword,$i,1,$this->endcode),$this->endcode)+1);
	   }
	   return $Key;
   }
}
?>