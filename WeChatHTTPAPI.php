<?php 
// HTTP/1.1
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
// HTTP/1.0
// 服务器掉线微信消息提醒中间件
// 消息类型为卡片模式
// 需配合云探针和实时监控平台使用
header("Pragma: no-cache");
$num=$_GET['num'];
$name=$_GET['name'];
$name=substr($name,1,20);

/////企业微信应用参数
$corpid=""; 
$corpsecret="";
$agentid="";

//通知消息拼接
$title="设备掉线提醒[".date("y-m-d_H:i:s")."]";
$url="";
$description="系统检测到：".$name."[".$num."]服务器已掉线";

//调用第三方接口
$getUrl="https://api.htm.fun/api/Wechat/text_card?corpid=".$corpid."&corpsecret=".$corpsecret."&title=".$title."&url=".$url."&agentid=".$agentid."&description=".$description;
$content= file_get_contents($getUrl);      
if($content){
  echo 'OK'; 
}else{
  echo 'ERROR';
}
?>