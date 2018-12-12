<?php
/**获取数据库可用ID
 * @return 返回-1 数据库资源不足，满足返回ID
 */	
function judge(){
	
 	 $countinfer=countinfer();
     if($countinfer==-1){
	  	return -1;
     }
     
     
	 $i=1;
	 $cookieitem=setid();
 	 if($cookieitem[0]==-1){
		return -1;
  	 }
  	 
  	 
	 $num=$cookieitem[1];
	 $itme=$cookieitem[2];
	 date_default_timezone_set('PRC');
	 
		 do{
		 	if(date('Ymd',$itme)==date('Ymd')){
			  
			   if($num==1){
			   	
			   		$cookieitem=setid();
			   		if($cookieitem[0]==-1){	
						return -1;	
					}
					
			   		$num=$cookieitem[1];
			   		$itme=$cookieitem[2];
			   		
				}else {
					$i=0;
				}
				
		 	}else{
		 		
				Resettime($cookieitem[0]);
				$i=0;
				
		 	}
		 	
		}while($i==1);
		
return $cookieitem[0];
}


/**检测红包是否被领取
 * @param  $a 红包幸运值
 * @param  $b 红包已经被领取的值
 * @return 返回红包领取状态
 */
function calculate($a,$b){
	$a = intval($a);
	$b = intval($b);
	mLog('{"message":"总共需要:'.$a.',已领取:'.$b.'"}','datalog');
	if($b>=$a){
		return 2;
	}else{
		$c=$a-$b-1;
		if($c==0){
			return 1;
		}
	}
	return 0;
}