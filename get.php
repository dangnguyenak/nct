<?php
/**
 * Code by Nguyen Huu Dat - https://www.facebook.com/dl2811
 * Code được chia sẻ miễn phí tại J2TEAM Community - https://www.facebook.com/groups/j2team.community
 * Website: https://trolyfacebook.com
 * 
 */

error_reporting(0);

$url = $_POST['url'];
	$temp = explode(".",$url);
	$idbaihat = trim($temp[3]);
	if($idbaihat != "")
	{
		$token = gettoken();
		if($token != "")
		{
			$data = getlink($idbaihat,$token);

			$linkplay = $data->data->{7};
			$link128 = $data->data->{11};
			$link320 = $data->data->{12};
			$linklossless = $data->data->{19};
			$thumbnail = $data->data->{8};
			$tenbaihat = $data->data->{2};
			$casy = $data->data->{3};
			if($tenbaihat != "")
			{
				$tenfile = $tenbaihat.' - '.$casy;
				$msg.= '
				<div class="alert alert-info" style="display: inline-block;"><b>'.$tenfile.'</b></div>
				<div style="margin:12px auto;">
					<div id="amazingaudioplayer-1" style="display:block;position:relative;width:300px;height:300px;margin:0px auto 0px;">
						<ul class="amazingaudioplayer-audios" style="display:none;">
							<li data-artist="" data-title="'.$tenbaihat.' - '.$casy.'" data-album="" data-info="" data-image="'.$thumbnail.'" data-duration="0">
								<div class="amazingaudioplayer-source" data-src="'.$linkplay.'" data-type="audio/mpeg" />
							</li>
						</ul>
					</div>
				</div>
				<script src="assets/audioplayerengine/amazingaudioplayer.js"></script>
				<script src="assets/audioplayerengine/initaudioplayer-1.js"></script>';

				$msg.= ' <a target="_blank" href="'.$link128.'"><button type="button" class="btn btn-success"><i class="fa fa-cloud-download"></i> 128 Kbps</button></a> ';

				$msg.= ' <a target="_blanks" href="'.$link320.'"><button type="button" class="btn btn-success"><i class="fa fa-cloud-download"></i> 320 Kbps</button></a> ';

				$msg.= ' <a target="_banks" href="'.$linklossless.'"><button type="button" class="btn btn-success"><i class="fa fa-cloud-download"></i> Lossless</button></a> ';

				echo $msg;
			}
			else
			{
				echo "Lỗi cmnr: Không thể get bài này!!";
			}
		}
		else
		{
			echo "Lỗi cmnr: tạo token!";
		}
	}
	else
	{
		echo "Lỗi cmnr: Không tìm thấy ID bài hát! Link phải có dạng: http://www.nhaccuatui.com/bai-hat/yeu-la-tha-thu-em-chua-18-ost-onlyc.vmjlLAAxhof5.html";
	}

function gettoken()
{
	$headers = array();
	$headers[] = 'Content-Type: application/x-www-form-urlencoded';
	$headers[] = 'Host: graph.nhaccuatui.com';
	$headers[] = 'Connection: Keep-Alive';
	
	
	$c = curl_init();
	curl_setopt($c, CURLOPT_URL, "https://graph.nhaccuatui.com/v1/commons/token");
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($c, CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($c, CURLOPT_POST, 1);
	curl_setopt($c, CURLOPT_POSTFIELDS, "deviceinfo=%7B%22DeviceID%22%3A%22dd03852ada21ec149103d02f76eb0a04%22%2C%22DeviceName%22%3A%22Facebook%22%2C%22OsName%22%3A%22WINDOWS%22%2C%22OsVersion%22%3A%228.0%22%2C%22AppName%22%3A%22NCTTablet%22%2C%22Facebook%22%3A%221.3.0%22%2C%22UserName%22%3A%220%22%2C%22QualityPlay%22%3A%22128%22%2C%22QualityDownload%22%3A%22128%22%2C%22QualityCloud%22%3A%22128%22%2C%22Network%22%3A%22WIFI%22%2C%22Provider%22%3A%22NCTCorp%22%7D&md5=ebd547335f855f3e4f7136f92ccc6955&timestamp=1499177482892");


	$page = curl_exec($c);
	curl_close($c);
	
	$infotoken = json_decode($page);
	$token = $infotoken->data->accessToken;
	return $token;
}


function getlink($idbaihat,$token)
{
	//echo $idbaihat;
	$linklist = 'https://graph.nhaccuatui.com/v1/songs/'.$idbaihat.'?access_token='.$token;
	$c = curl_init();
	curl_setopt($c, CURLOPT_URL, $linklist);
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($c, CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

	$page = curl_exec($c);
	curl_close($c);
	
	$data = json_decode($page);
	return $data;
}

// if(isset($_POST['url']))
// {
	
	
// }

?>