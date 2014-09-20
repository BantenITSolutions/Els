<?php



function relativeTime($dt,$precision=2)
{
	$times=array(	365*24*60*60	=> "year",
					30*24*60*60		=> "month",
					7*24*60*60		=> "week",
					24*60*60		=> "day",
					60*60			=> "hour",
					60				=> "minute",
					1				=> "second");
	
	$passed=time()-$dt;
	
	if($passed<5)
	{
		$output='less than 5 seconds ago';
	}
	else
	{
		$output=array();
		$exit=0;
		
		foreach($times as $period=>$name)
		{
			if($exit>=$precision || ($exit>0 && $period<60)) break;
			
			$result = floor($passed/$period);
			if($result>0)
			{
				$output[]=$result.' '.$name.($result==1?'':'s');
				$passed-=$result*$period;
				$exit++;
			}
			else if($exit>0) $exit++;
		}
				
		$output=implode(' and ',$output).' ago';
	}
	
	return $output;
}

function formatTweet($id,$tweet,$dt,$id_member,$nama_pengirim,$foto_pengirim)
{
	if(is_string($dt)) $dt=strtotime($dt);

	$tweet=htmlspecialchars(stripslashes($tweet));
	$bagi=substr($tweet,0,1);
	$sisa=substr($tweet,1,140);
	$besar=strtoupper($bagi);
	
	$hps=mysql_query("select * from member where username='$_SESSION[namamember]'");
	while($hapus=mysql_fetch_array($hps)){
	$username=$hapus[username];
	$id_memberr=$hapus[id_member];
	}
	$tweeet=mysql_query("select * from demo_twitter_timeline where id_member='$id_member'");
	while($twt=mysql_fetch_array($tweeet)){
	$id_tweet=$twt[id];
	}
	if($id_memberr==$id_member){
	$tampil="<form method='post' action='hapus-status-$id.html'><input type='submit' value='Hapus' class='hapusButton hapus' onClick=\"return confirm('Anda yakin ingin menghapus Status ini???')\"></form>";
	} else {
	$tampil="";
	}
	return'
	<li>
	<a href="member-everydaylikesunday-2009'.$id_member.'-9002.html">
	<img class="avatar" src="member/'.$foto_pengirim.'" width="48" height="48" alt="Everyday Like Sunday" /></a>
	
	<strong><a href="member-everydaylikesunday-2009'.$id_member.'-9002.html">'.$nama_pengirim.'</a></strong> <br>'. preg_replace('/((?:http|https|ftp):\/\/(?:[A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?[^\s\"\']+)/i','<a href="$1" rel="nofollow" target="blank">$1</a>',$besar.$sisa).'
	<div class="date">'.relativeTime($dt).'' .$tampil. '</div>
	<div class="clear"></div>
	</li>';

}

?>