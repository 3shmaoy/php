<?php
		define('OLD_SERVER', '192.168.29.8');
	    define('OLD_WEBSITE_SUPPORT', 'http://' . OLD_SERVER . '/support/');

	    // 添付upload用(FTP)
	    define('ATTACHMENTS_SERVER', OLD_SERVER);
	    define('ATTACHMENTS_USER_NUM', 0);
	    define('ATTACHMENTS_UPLOAD_PATH', 'ftpphp');        // ftpuser
	    define('ATTACHMENTS_PREFIX_SUPPORT', 'SupportImage');
	    define('ATTACHMENTS_PREFIX_FTP_SUPPORT', '/' . ATTACHMENTS_UPLOAD_PATH . '/' . ATTACHMENTS_PREFIX_SUPPORT . '/');      //   /ftpphp/SupportImage/
	    define('ATTACHMENTS_PREFIX_DB_SUPPORT', '../../../' . ATTACHMENTS_UPLOAD_PATH . '/' . ATTACHMENTS_PREFIX_SUPPORT . '/');      // ../../../ftpphp/SupportImage/
	    define('ATTACHMENTS_PREFIX_URL_SUPPORT', 'http://' . ATTACHMENTS_SERVER . '/' . ATTACHMENTS_UPLOAD_PATH . '/' . ATTACHMENTS_PREFIX_SUPPORT . '/');      // http://192.168.29.8/ftpphp/SupportImage/

		header('Cache-Control: no-store,private,no-cache,must-revalidate,max-age=0');
	    //header('Cache-Control: pre-check=0, post-check=0, max-stale=0', false);  // IIS old

	    /*
	    // Deprecated
	    header('Pragma: public');
	    header('Pragma: no-cache');             // HTTPS 1.0 sent by IIS anyway
	    */

	    // When accessed through proxy
	    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');          // Past date
	    //header('Expires: 0', false);

    
    // !DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
    <head></head>
    <body>
<?php
		$aryAttachments = [
	        'sNewFileName' => ['ammTest.pdf'],
	        'tmp_name' => [  $_FILES['fileTest']['tmp_name'] ?? 'C:\temp\php8.4\upload\1.tmp'],
	    ];

	    $mVersion = phpversion();
	    //var_export($mVersion);
		var_export($_FILES['fileTest']);


	    $oFtpConnection = ftp_connect(ATTACHMENTS_SERVER);
	    if  ( ($oFtpConnection !== false) ) {
			echo PHP_EOL .'connected ...' . PHP_EOL;
	    	if ( ftp_login($oFtpConnection, 'ftpuser', 'gxyc2r!j') ) {
		    	echo PHP_EOL .'logged in ... ' . PHP_EOL;
		    	$sRemoteURLprefix = ATTACHMENTS_PREFIX_FTP_SUPPORT;  //     /ftpphp/SupportImage/
		        $iRet = 0;
		        for ( $iLoopIndex=0; $iLoopIndex<count($aryAttachments['tmp_name']); $iLoopIndex++ ) {
		        	if (
		                ftp_put(
		                    $oFtpConnection,
		                    $sRemoteURLprefix . $aryAttachments['sNewFileName'][$iLoopIndex],
		                    $aryAttachments['tmp_name'][$iLoopIndex],
		                    FTP_BINARY)
		            ) {
		            	echo PHP_EOL .' ... ++ ... ' . PHP_EOL;
		                $iRet++;
		            } else {
		            	echo PHP_EOL .'-' . PHP_EOL;
		                $iRet = -$iRet;
		                // uploadされたファイルを削除!?
		                break;
		            }
				}
	        } else {
	        		echo PHP_EOL .'can not log in' . PHP_EOL;
	        }
	    } else {
	    	echo PHP_EOL .'can not connect' . PHP_EOL;
    	}
	    echo $iRet;
?>
	</body>
</html>