<?php
    /**
     *  use browser to send extra custom headers
     *      1- developer mode
     *      2- extension/addon
     *          FireFox
     *              Heasder Editor
     *              HTTP Request Maker
     *              Modify Header Value (HHTP Headers)
     *          Chrome (ium/edge)
     *              ModHeader - Modify HTTP Headers (7.0.14)        currently using
     *                  sample exported settings below
     */

    /**
    [{
        "alwaysOn": true,
        "headers": [{
            "appendMode": false,
            "enabled": true,
            "name": "x-mmart-amm",
            "value": "a_m_m"
        }],
        "hideComment": false,
        "shortTitle": "1",
        "title": "mMart",
        "urlFilters": [
            {
                "enabled": true,
                "urlRegex": "https://tsv2.bnet.gr.jp/.*"
            },
            {
                "enabled": true,
                "urlRegex": "https://tsv2.m-mart.co.jp/.*"
            }
        ],
        "version": 2
    }]
     */

    // the custom header will be converted to lower case b4 reaching the called PHP script
    // better use only lower case when sending so it won't be ignored on the way
    // underscores are might not be allowed (didn't check the standard)

    $value = getallheaders()['x-mmart-amm'];

?>