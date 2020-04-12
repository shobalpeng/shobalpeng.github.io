<?php
/*
http://XXX.XXX.XXX/gdtv.php?id=CHTVB26
广东珠江$CHTVB26
广东卫视$CHTVB25
广东体育$CHTVB27
广东新闻$CHTVB28
广东公共$CHTVB31
广东国际$CHTVB30
广东经济科教$CHTVPtvs1hd
广东南方卫视$CHTVPtvs2
广东综艺$CHTVP4K
广东影视$CHTVPtvs4
广东少儿$CHTVPtvs5
嘉佳卡通$CHTVB29
高尔夫频道$CHTVB32
房产频道$CHTVB33
*/

$id=$_GET['id'];//26

if(strstr($id,"CHTVB")==true){
    $id=str_replace("CHTVB","",$id);
    $TV=json_decode(http_curl("http://public.gdtv.cn/m2o/channel/channel_info.php?id=".$id),true);
    $playlist=$TV[0]['channel_stream'][0]['url'];
    $live=$TV[0]['m3u8'];
    $live=str_replace("stream1.grtn.cn","nclive.grtn.cn",$live);
}

elseif(strstr($id,"CHTVP4K")==true){
    $TV=http_curl("http://live.grtn.cn/drm.php?refererurl=http://tvs3.gdtv.cn/&time=1586577612394&playerVersion=4.12.180327_RC&hash=4f9e24b802f27b82953d968c79c3a6f5&url=http://stream1.grtn.cn/4K/sd/live.m3u8"); //广东综艺
    $live=str_replace("stream1.grtn.cn","nclive.grtn.cn",$TV);
}

elseif(strstr($id,"CHTVPtvs5")==true){
    $TV=http_curl("http://live.grtn.cn/drm.php?refererurl=http://tvs5.gdtv.cn/&time=1586577764059&playerVersion=4.12.180327_RC&hash=62ef41d868a6226595f5e4faeeb3ea47&url=http://stream1.grtn.cn/tvs5/sd/live.m3u8"); //广东少儿
    $live=str_replace("stream1.grtn.cn","nclive.grtn.cn",$TV);
}

elseif(strstr($id,"CHTVPtvs4")==true){
    $TV=http_curl("http://live.grtn.cn/drm.php?hash=25872091f940bb0647d7a1a3320fa9f7&time=1586577808458&playerVersion=4.12.180327_RC&refererurl=http://tvs4.gdtv.cn/&url=http://stream1.grtn.cn/tvs4/sd/live.m3u8"); //广东影视
    $live=str_replace("stream1.grtn.cn","nclive.grtn.cn",$TV);
}

elseif(strstr($id,"CHTVPtvs1hd")==true){
    $TV=http_curl("http://live.grtn.cn/drm.php?refererurl=http://tvs1.gdtv.cn/&hash=a3e3fce8acd3433d610edbf35471035a&time=1586579683540&playerVersion=4.12.180327_RC&url=http://stream1.grtn.cn/tvs1hd/hd/live.m3u8"); //经济科教
    $live=str_replace("stream1.grtn.cn","nclive.grtn.cn",$TV);
}

elseif(strstr($id,"CHTVPtvs2")==true){
    $TV=http_curl("http://live.grtn.cn/drm.php?refererurl=http://tvs2.gdtv.cn/&playerVersion=4.12.180327_RC&time=1586579869655&url=http://stream1.grtn.cn/tvs2/sd/live.m3u8&hash=fe0ced68ac991f8b1b77dde264609e08"); //南方卫视
    $live=str_replace("stream1.grtn.cn","nclive.grtn.cn",$TV);
}

header("location:$live");

function http_curl($id){
    $curl=curl_init();
        $header=array(
        "Referer: http://zj.gdtv.cn/",
        "Connection: Keep-Alive",
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36",
        "Cookie: WEB=20111111; UM_distinctid=171256c4c99290-0465258ace307b-36664c08-1fa400-171256c4c9bb2e; CNZZDATA1000002509=69667788-1585466901-%7C1585466901; CNZZDATA683920=cnzz_eid%3D1462648007-1585469976-%26ntime%3D1585469976; __statCU=1585471323.001",
        );
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
    curl_setopt($curl,CURLOPT_URL,$id);
    curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
    curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,30);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
    $response=curl_exec($curl);
    curl_close($curl);
    return $response;
}
?>
