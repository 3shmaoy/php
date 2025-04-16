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

    $aryAttachments = [
        'sNewFileName' => ['ammTest.pdf'],
        'tmp_name' => ['C:\temp\php8.4\upload\1.tmp'],
    ];

    $mVersion = phpversion();
    var_dump($mVersion);


    $oFtpConnection = ftp_connect(ATTACHMENTS_SERVER);
    if  ( ($oFtpConnection !== false) && ftp_login($oFtpConnection, 'ftpuser', 'gxyc2r!j') ) {
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
                $iRet++;
            } else {
                $iRet = -$iRet;
                // uploadされたファイルを削除!?
                break;
            }
        }
    } else {}
    echo $iRet;

?>