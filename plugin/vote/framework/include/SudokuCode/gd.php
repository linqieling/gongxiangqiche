<?php     
    class gd_gradient_fill {  
        public $image;
        // Constructor. Creates, fills and returns an image   
        function gd_gradient_fill($w,$h,$d,$s,$e,$step=0) {  
            $this->width = $w;  
            $this->height = $h;  
            $this->direction = $d;  
            $this->startcolor = $s;  
            $this->endcolor = $e;  
            $this->step = intval(abs($step));  
            $this->image = imagecreatetruecolor($this->width,$this->height); 
            // Fill it   
            $this->fill($this->image,$this->direction,$this->startcolor,$this->endcolor);
 
        }  
        // The main function that draws the gradient   
        function fill($im,$direction,$start,$end) {  
            $line_numbers;  
            $line_width; 
            $width;
            $height;
            $rh;
            $rw;
           switch($direction) {  
            case 'horizontal':  
                $line_numbers = $this->width;  
                $line_width = $this->height;    
                break;  
            case 'vertical':  
                $line_numbers = $this->height;  
                $line_width = $this->width;   
                break;
            case 'diamond':   
                $width = $this->width;  
                $height = $this->height;  
                $rh=$height>$width?1:$width/$height;  
                $rw=$width>$height?1:$height/$width;  
                $line_numbers = min($width,$height);  
                break;
            case 'rectangle':  
                $width = $this->width;  
                $height = $this->height; 
                $line_numbers = max($width,$height)/2;   
                break;  
            }
            list($r1,$g1,$b1) = $start;  
            list($r2,$g2,$b2) = $end;  
            for ( $i = 0; $i < $line_numbers; $i=$i+1+$this->step ) {  
                // old values :   
                $old_r=$r1;  
                $old_g=$g1;  
                $old_b=$b1;  
                // new values :   
                $r = ( $r2 - $r1 != 0 ) ? intval( $r1 + ( $r2 - $r1 ) * ( $i / $line_numbers ) ): $r1;  
                $g = ( $g2 - $g1 != 0 ) ? intval( $g1 + ( $g2 - $g1 ) * ( $i / $line_numbers ) ): $g1;  
                $b = ( $b2 - $b1 != 0 ) ? intval( $b1 + ( $b2 - $b1 ) * ( $i / $line_numbers ) ): $b1;  
    
                $fill = imagecolorallocate( $im, $r, $g, $b );  
                switch($direction) {  
                    case 'vertical':  
                        imagefilledrectangle($im, 0, $i, $line_width, $i+$this->step, $fill);  
                        break;  
                    case 'horizontal':  
                        imagefilledrectangle( $im, $i, 0, $i+$this->step, $line_width, $fill);  
                        break;
                    case 'rectangle':  
                        imagefilledrectangle ($im,$i*$width/$height,$i*$height/$width,$width-($i*$width/$height), $height-($i*$height/$width),$fill);  
                        break;  
                    case 'diamond':  
                        imagefilledpolygon($im, array (  
                        $width/2, $i*$rw-0.5*$height,  
                        $i*$rh-0.5*$width, $height/2,  
                        $width/2,1.5*$height-$i*$rw,  
                        1.5*$width-$i*$rh, $height/2 ), 4, $fill);  
                        break;

                }         
            }  
        }  
          
    }  
?>