<?php

use API\Controller\Config;
use const Siler\Config\CONFIG;

require "src/api/api.imgbb.easyprojects.php";

/*$file_name = basename(__FILE__, ".php");
require __DIR__ . "/../template/imports.php";*/
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">


<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

    <title>WeJourney - Sorteio</title>
    <meta name='robots' content='noindex'>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/quill.bubble.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css2?family=Inconsolata&amp;family=Roboto+Slab&amp;family=Slabo+27px&amp;family=Sofia&amp;family=Ubuntu+Mono&amp;display=swap">
    <!-- END: Vendor CSS-->

    <?php include "view/src/head.php"; ?>
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/plugins/forms/form-quill-editor.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <script src="https://kit.fontawesome.com/94b5ea6607.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .containerr {
            display: flex;
            justify-content: center;
            position: relative;
        }

        span {
            font-size: 14px;
        }

        .mask {
            position: absolute;
            z-index: 3;
            background-color: rgba(138, 139, 140, 0.8);
            width: 100%;
            height: 100%;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            display: none;
            transition: opacity 5s 5s linear;
        }

        .mask.active {
            display: flex;
            opacity: 100;
            height: 100vh;
        }

        .mask .winner {
            width: 400px;
            height: 150px;
            background-color: #FEFFF9;
            margin-bottom: 50px;
            color: #001011;
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 30px;
            text-align: center;
            line-height: 150px;
            box-shadow: 1px 4px 5px rgba(76, 87, 96, 0.3);
            border: #001011 2px solid;
        }

        .mask svg {
            width: 200px;
        }

        .list-wrap {
            width: 100%;
            overflow: auto;
            transition: right .1s 0s linear;
            /* position: absolute;
            right: -300px;
            padding: 30px 30px 0 30px;
            background-color: #F8E7E4;
            height: 80vh;
            width: 300px;
            z-index: 2;
            overflow: auto !important;
            border: #001011 2px solid;*/
        }

        .list-wrap.active {
            right: 0px;
        }

        .list-wrap .listBtn {
            position: absolute;
            background-color: #F8E7E4;
            color: #001011;
            border-radius: 20% 0 0 20%;
            border: #001011 2px solid;
            border-right: none;
            left: -42px;
            width: 40px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .list-wrap .listBtn:hover {
            cursor: pointer;
        }

        input {
            border: #001011 3px solid;
            border-radius: 10px;
            outline: none;
            padding: 5px 10px;
            width: 270px;
        }

        .list-wrap .list {
            /* height: 90vh;
    overflow: scroll; */
        }

        .list-wrap li {
            color: #001011;
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 12px;
            margin: 15px 30px;
        }

        .gachapon {
            display: flex;
            align-items: center;
            position: relative;
            margin-top: 10%;
        }

        .winnersList{
            font-weight: bold !important;
            color:#2d76ff !important;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .switch {
            width: 70px;
            position: absolute;
            bottom: 75px;
            left: 115px;
            transition: transform .3s 0s linear;
        }

        .switch:hover {
            cursor: pointer;
        }

        .switch.active {
            transform: rotate(-90deg);
        }

        .machine {
            width: 300px;
        }

        .egg {
            display: none;
            opacity: 0;
            transform: translate(0, -25px);
            transition: transform .4s 1.5s linear, opacity .1s 1.5s linear;
            transition: transform 0s 0s linear, opacity 0s 0s linear;
        }

        .close-winner-btn{
            padding:10px; 
            background-color: #2d76ff;
            color: white !important;
            border-radius:20px;
            border: none !important;
        }

        .egg.active {
            display: block;
            opacity: 100;
            transform: translate(0, 35px);
            transition: transform .2s 1.5s linear, opacity .1s 1.5s linear;
        }

        ol {
            font-size: 11px;
        }

        .egg:hover {
            cursor: pointer;
        }
    </style>

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static   menu-collapsed" data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!--BEGIN: Navbar -->
    <?php include "view/src/header.php"; ?>
    <!--END: Navbar -->

    <!--BEGIN: Sidebar -->
    <?php include "view/src/mainMenu.php"; ?>

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <!-- <div class="content-wrapper container-xxl p-0"> -->

        <div class="content-body">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="containerr">
                            
                            <div class="mask">
                                <button class="close-winner-btn mb-1">Novo Nome</button> 
                                <div class="winner"></div>
                                <svg viewBox="0 0 439 215" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M295.5 14.0103C400.3 15.2103 429.167 117.51 430.5 168.51C338.1 208.51 207.667 185.177 154 168.51C157.5 116.51 190.7 12.8103 295.5 14.0103Z" fill="white" stroke="#531028" stroke-width="13" stroke-linecap="round" stroke-linejoin="round" />
                                    <path class="open-egg-color" d="M99.1013 198.787C-10.8987 165.987 1.26801 68.7865 21.1013 24.2865C152.701 -28.5135 247.268 59.6199 278.101 110.287C264.268 153.453 209.101 231.587 99.1013 198.787Z" fill="#00BBD3" />
                                    <path d="M21.1013 24.2865C1.26801 68.7865 -10.8987 165.987 99.1013 198.787C209.101 231.587 264.268 153.453 278.101 110.287M21.1013 24.2865C152.701 -28.5135 247.268 59.6199 278.101 110.287M21.1013 24.2865C44.6013 69.2865 128.901 149.487 278.101 110.287" stroke="#531028" stroke-width="13" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>

                            <!-- <div class="list-wrap">
    <div class="listBtn"><i class="fas fa-address-book fa-2x"></i></div>
    <div class="list">
        <ol></ol>
    </div>
</div> -->

                            <div class="gachapon">
                                <svg class="switch" viewBox="0 0 154 155" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="76.5828" cy="77.7004" r="43.5" transform="rotate(-45 76.5828 77.7004)" fill="#C6D2D5" stroke="#57162F" stroke-width="10" />
                                    <path d="M32.7422 110.934C30.399 108.591 30.399 104.792 32.7422 102.449L101.732 33.4592C104.075 31.1161 107.874 31.1161 110.217 33.4592L120.117 43.3587C122.46 45.7018 122.46 49.5008 120.117 51.844L51.127 120.834C48.7838 123.177 44.9848 123.177 42.6417 120.834L32.7422 110.934Z" fill="#C6D2D5" stroke="#57162F" stroke-width="10" />
                                </svg>

                                <svg class="machine" viewBox="0 0 617 979" fill="none" xmlns="http://www.w3.org/2000/svg">

                                    <circle cx="308.5" cy="388.5" r="302" fill="#DEECF3" stroke="#5A1830" stroke-width="13" />
                                    <path d="M308.5 5.14625C274.1 2.74625 257.833 30.4796 254 44.6462H361C357.833 32.4796 342.9 7.54625 308.5 5.14625Z" fill="#00BBD3" stroke="#5A1832" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M105 902L112.5 646H511.5L519 894.5L105 902Z" fill="#00BBD3" stroke="#57162F" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M517.219 611C345.719 677.5 173.552 639.5 101.219 611C88.219 623.5 102.552 645 111.219 647.5C354.219 724.5 490.719 656.5 517.219 639C538.419 625 526.052 614.5 517.219 611Z" fill="#00BBD3" stroke="#57162F" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M524.709 850.027C329.109 940.027 159.542 887.527 99.2088 850.027C71.2088 859.227 79.8755 895.194 87.7088 912.027C291.309 1022.43 476.875 958.027 544.209 912.027C549.009 860.827 533.209 849.36 524.709 850.027Z" fill="#00BBD3" stroke="#57162F" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M364.5 892.246C320.5 833.846 278.5 867.912 263 892.246V952.746C263 961.246 276.5 972.246 314 973.246C344 974.046 360.167 959.912 364.5 952.746V892.246Z" fill="#C7D2D5" stroke="#57162F" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <g class="egg">
                                        <circle class="egg-color" cx="313.5" cy="885.5" r="40.5" fill="#F3D478" stroke="#57172F" stroke-width="10" />
                                        <path d="M323.599 925.513C291.223 932.027 279.261 908.229 274.125 897.882C326.587 906.466 345.102 886.898 352.345 874.125C357.085 887.153 357.344 918.724 323.599 925.513Z" fill="white" stroke="#531028" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M243.412 860.068C266.912 827.568 327.812 782.068 383.412 860.068V943.568C379.188 952.287 363.761 967.867 332.925 972.391C350.339 968.419 360.249 959.122 363.5 953.746V893.246C319.5 834.846 277.5 868.912 262 893.246V953.746C262 960.44 270.374 968.685 292.25 972.374C254.704 968.395 247.653 956.911 244.35 951.532C244.007 950.973 243.704 950.48 243.412 950.068C242.797 949.201 242.998 923.309 243.203 897.032C243.307 883.748 243.412 870.365 243.412 860.068Z" fill="#00BBD3" />
                                    <path d="M383.412 860.068H388.412C388.412 859.027 388.087 858.013 387.483 857.166L383.412 860.068ZM243.412 860.068L239.36 857.138C238.743 857.991 238.412 859.016 238.412 860.068H243.412ZM383.412 943.568L387.911 945.748C388.241 945.068 388.412 944.323 388.412 943.568H383.412ZM332.925 972.391L331.813 967.516C329.195 968.113 327.516 970.671 328.01 973.31C328.504 975.949 330.994 977.727 333.651 977.338L332.925 972.391ZM363.5 953.746L367.779 956.333C368.251 955.552 368.5 954.658 368.5 953.746H363.5ZM363.5 893.246H368.5C368.5 892.16 368.147 891.104 367.493 890.237L363.5 893.246ZM262 893.246L257.783 890.559C257.272 891.362 257 892.294 257 893.246H262ZM292.25 972.374L291.723 977.347C294.41 977.631 296.836 975.73 297.204 973.054C297.571 970.377 295.746 967.893 293.082 967.444L292.25 972.374ZM244.35 951.532L248.611 948.915L248.611 948.915L244.35 951.532ZM243.412 950.068L239.334 952.961L239.334 952.961L243.412 950.068ZM243.203 897.032L238.204 896.993L243.203 897.032ZM387.483 857.166C373.209 837.14 358.331 824.672 343.421 818.025C328.457 811.353 313.786 810.693 300.27 813.754C273.513 819.814 251.489 840.364 239.36 857.138L247.463 862.998C258.834 847.272 279.01 828.822 302.478 823.507C314.074 820.881 326.523 821.439 339.349 827.158C352.23 832.901 365.814 843.995 379.34 862.97L387.483 857.166ZM388.412 943.568V860.068H378.412V943.568H388.412ZM333.651 977.338C365.817 972.619 382.84 956.218 387.911 945.748L378.912 941.388C375.536 948.356 361.705 963.115 332.199 967.444L333.651 977.338ZM334.037 977.265C352.617 973.028 363.748 962.999 367.779 956.333L359.221 951.159C356.751 955.244 348.061 963.81 331.813 967.516L334.037 977.265ZM368.5 953.746V893.246H358.5V953.746H368.5ZM367.493 890.237C356.138 875.165 344.642 865.697 333.3 860.622C321.888 855.516 310.902 854.983 300.908 857.356C281.205 862.033 265.896 877.823 257.783 890.559L266.217 895.932C273.604 884.335 287.045 870.925 303.217 867.085C311.161 865.2 319.893 865.579 329.216 869.75C338.608 873.953 348.862 882.126 359.507 896.254L367.493 890.237ZM257 893.246V953.746H267V893.246H257ZM257 953.746C257 959.316 260.461 964.391 266.066 968.291C271.706 972.215 280.05 975.387 291.419 977.305L293.082 967.444C282.573 965.672 275.793 962.877 271.777 960.083C267.726 957.264 267 954.87 267 953.746H257ZM240.089 954.148C241.926 957.14 245.037 962.148 252.924 966.788C260.616 971.313 272.531 975.312 291.723 977.347L292.777 967.402C274.424 965.457 264.04 961.725 257.994 958.169C252.143 954.727 250.076 951.303 248.611 948.915L240.089 954.148ZM239.334 952.961C239.51 953.21 239.72 953.547 240.089 954.148L248.611 948.915C248.293 948.399 247.898 947.75 247.489 947.174L239.334 952.961ZM238.204 896.993C238.101 910.124 237.999 923.189 238 933.079C238 938.019 238.026 942.203 238.092 945.219C238.125 946.719 238.168 947.985 238.227 948.932C238.257 949.394 238.294 949.862 238.349 950.274C238.375 950.473 238.417 950.754 238.488 951.056C238.506 951.132 238.693 952.058 239.334 952.961L247.489 947.174C247.858 947.694 248.031 948.158 248.089 948.32C248.165 948.531 248.206 948.695 248.224 948.772C248.26 948.924 248.268 949.007 248.262 948.962C248.252 948.887 248.232 948.684 248.208 948.304C248.161 947.566 248.121 946.462 248.09 945.002C248.026 942.099 248 938.004 248 933.078C247.999 923.236 248.101 910.217 248.203 897.071L238.204 896.993ZM238.412 860.068C238.412 870.341 238.307 883.702 238.204 896.993L248.203 897.071C248.307 883.794 248.412 870.389 248.412 860.068H238.412Z" fill="#57162F" />
                                    <path d="M234.569 45C154.169 61.4 136.736 111.167 138.069 134C289.669 155.6 427.236 143 477.069 134C486.669 79.2 418.069 51.8333 382.569 45H234.569Z" fill="#00BBD3" stroke="#5A1730" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <svg x="55" y="350" width="495" height="284" viewBox="0 0 495 284" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="138" cy="217" r="47" fill="white" stroke="#57172F" stroke-width="10" />
                                        <path d="M149.542 262.73C112.54 270.174 98.8693 242.975 93 231.151C152.957 240.961 174.117 218.598 182.394 204C187.812 218.889 188.108 254.97 149.542 262.73Z" fill="#9DCFE0" stroke="#531028" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <circle cx="113" cy="119" r="47" fill="#9DCFE0" stroke="#57172F" stroke-width="10" />
                                        <path d="M124.542 164.73C87.5401 172.174 73.8693 144.975 68 133.151C127.957 142.961 149.117 120.598 157.394 106C162.812 120.889 163.108 156.97 124.542 164.73Z" fill="white" stroke="#531028" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <circle cx="424.89" cy="105.89" r="47" transform="rotate(-87.8779 424.89 105.89)" fill="white" stroke="#57172F" stroke-width="10" />
                                        <path d="M471.015 96.0494C477.085 133.301 449.398 145.955 437.365 151.383C449.388 91.8302 427.824 69.857 413.543 61.045C428.622 56.1822 464.689 57.2225 471.015 96.0494Z" fill="#B9AFD4" stroke="#531028" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <circle cx="273.068" cy="79.0678" r="47" transform="rotate(-71.051 273.068 79.0678)" fill="#F3D478" stroke="#57172F" stroke-width="10" />
                                        <path d="M320.067 83.0013C315.093 120.415 284.929 124.513 271.84 126.225C300.587 72.702 286.307 45.4272 275.188 32.8583C291.03 32.5691 325.252 44.0055 320.067 83.0013Z" fill="white" stroke="#531028" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <circle cx="70.4229" cy="178.423" r="47" transform="rotate(151.74 70.4229 178.423)" fill="white" stroke="#57172F" stroke-width="10" />
                                        <path d="M38.605 143.609C67.6712 119.532 92.5905 137.016 103.359 144.651C45.9036 164.4 37.8548 194.116 37.4758 210.893C25.6539 200.343 8.30974 168.703 38.605 143.609Z" fill="#F3D478" stroke="#531028" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <circle cx="356.635" cy="68.6351" r="47" transform="rotate(113.957 356.635 68.6351)" fill="white" stroke="#57172F" stroke-width="10" />
                                        <path d="M310.159 60.6136C318.38 23.777 348.787 22.3282 361.975 21.7657C328.665 72.5742 340.51 100.992 350.489 114.483C334.682 113.388 301.589 99.0079 310.159 60.6136Z" fill="#E5A0B9" stroke="#531028" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <circle cx="172" cy="146" r="47" fill="#E5A0B9" stroke="#57172F" stroke-width="10" />
                                        <path d="M183.542 191.73C146.54 199.174 132.869 171.975 127 160.151C186.957 169.961 208.117 147.598 216.394 133C221.812 147.889 222.108 183.97 183.542 191.73Z" fill="white" stroke="#531028" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <circle cx="437.998" cy="167.998" r="47" transform="rotate(-5.8118 437.998 167.998)" fill="#E5A0B9" stroke="#57172F" stroke-width="10" />
                                        <path d="M454.111 212.324C418.054 223.477 401.699 197.803 394.662 186.634C455.305 190.322 474.091 165.93 480.847 150.57C487.745 164.834 491.693 200.699 454.111 212.324Z" fill="white" stroke="#531028" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <circle cx="209" cy="81" r="47" fill="white" stroke="#57172F" stroke-width="10" />
                                        <path d="M220.542 126.73C183.54 134.174 169.869 106.975 164 95.1514C223.957 104.961 245.117 82.5975 253.394 68C258.812 82.8895 259.108 118.97 220.542 126.73Z" fill="#B9AFD4" stroke="#531028" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <circle cx="341" cy="146" r="47" fill="white" stroke="#57172F" stroke-width="10" />
                                        <path d="M352.542 191.73C315.54 199.174 301.869 171.975 296 160.151C355.957 169.961 377.117 147.598 385.394 133C390.812 147.889 391.108 183.97 352.542 191.73Z" fill="#9DCFE0" stroke="#531028" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <circle cx="261.391" cy="163.026" r="47" transform="rotate(-115.664 261.391 163.026)" fill="white" stroke="#57172F" stroke-width="10" />
                                        <path d="M297.611 132.818C320.346 162.945 301.751 187.047 293.636 197.458C276.51 139.167 247.189 129.78 230.447 128.642C241.521 117.31 273.914 101.417 297.611 132.818Z" fill="#B9AFD4" stroke="#531028" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <circle cx="224" cy="230" r="47" fill="#B9AFD4" stroke="#57172F" stroke-width="10" />
                                        <path d="M235.542 275.73C198.54 283.174 184.869 255.975 179 244.151C238.957 253.961 260.117 231.598 268.394 217C273.812 231.889 274.108 267.97 235.542 275.73Z" fill="white" stroke="#531028" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <circle cx="384.423" cy="217.058" r="47" transform="rotate(-71.051 384.423 217.058)" fill="white" stroke="#57172F" stroke-width="10" />
                                        <path d="M431.422 220.991C426.448 258.405 396.284 262.503 383.195 264.215C411.942 210.692 397.662 183.417 386.543 170.848C402.385 170.559 436.607 181.996 431.422 220.991Z" fill="#F3D478" stroke="#531028" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <circle cx="302" cy="229.635" r="47" fill="white" stroke="#57172F" stroke-width="10" />
                                        <path d="M313.542 275.365C276.54 282.809 262.869 255.61 257 243.786C316.957 253.596 338.117 231.233 346.394 216.635C351.812 231.524 352.108 267.605 313.542 275.365Z" fill="#E5A0B9" stroke="#531028" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <h3>Ganhadores 🏆</h3>
                        <div class="card" style="padding:20px; padding-bottom:10px; margin-bottom: 20px;">
                            <ul class="winnersList" id="winners-list">
                                <span id="nenhumJogador">Nenhum ganhador anunciado!</span>
                            </ul> <!-- Lista de ganhadores -->
                        </div>
                        <h3>Participantes</h3>
                        <div class="card" style="padding:20px;">

                            <div class="list-wrap">
                                <div style="display:none;" class="listBtn"><i class="fas fa-address-book fa-2x"></i></div>
                                <div class="list">
                                    <ol></ol>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>





        </div>
    </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->

    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>


    <script src="https://cdn.tiny.cloud/1/kax3g6nv8huzxh65lnkeyjb9qhudlkdh33rgg5zydz16c8pe/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    <!-- BEGIN: Vendor JS-->
    <script src="layout/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="layout/app-assets/vendors/js/editors/quill/katex.min.js"></script>
    <script src="layout/app-assets/vendors/js/editors/quill/highlight.min.js"></script>
    <script src="layout/app-assets/vendors/js/editors/quill/quill.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="layout/app-assets/js/core/app-menu.js"></script>
    <script src="layout/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="layout/app-assets/js/scripts/forms/form-quill-editor.js"></script>



    <script src="layout/app-assets/js/scripts/my-department.js"></script>
    <script src="layout/app-assets/js/scripts/pages/page-api-key.js"></script>

    <!-- END: Page JS-->
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

    <script>
        const inputValue = document.querySelector("input");
        const egg = document.querySelector(".egg");
        const eggColor = document.querySelector(".egg-color");
        const openEggColor = document.querySelector(".open-egg-color");
        const list = document.querySelector("ol");
        const listBtn = document.querySelector(".listBtn");
        const winnersList = document.getElementById("winners-list");
        const mask = document.querySelector(".mask");

        // Lista inicial de participantes
        let lotteryList = [<?php foreach ($users as $user) { ?> "<?= $user["nome"] ?> <?= $user["sobrenome"] ?> (<?= $user["email"] ?>)", <?php } ?> "Gabriel Mestre (gabriel.mestre@trombini.com.br)"];

        // Renderiza a lista imediatamente ao carregar a página
        listRender();

        function listRender() {
            list.innerHTML = lotteryList.map((ele) => `<li>${ele}</li>`).join("");
        }

        listBtn.addEventListener("click", function() {
            document.querySelector(".list-wrap").classList.toggle("active");
        });

        egg.addEventListener("click", function(e) {
            if (lotteryList.length > 0) {
                const luckyNum = Math.floor(Math.random() * lotteryList.length);
                const winner = lotteryList[luckyNum];
                document.getElementById('nenhumJogador').hidden = true;
                document.querySelector(".winner").innerHTML = `<span>${winner}</span>`;

                // Adiciona a classe de ganhador ao item correspondente na lista
                const listItems = list.querySelectorAll("li");
                listItems[luckyNum].classList.add("winner-item");

                // Adiciona o nome do ganhador à lista de ganhadores
                const winnerItem = document.createElement("li");
                winnerItem.className = 'winnersList';
                winnerItem.textContent = winner;
                winnersList.appendChild(winnerItem);

                lotteryList.splice(luckyNum, 1); // Remove o nome sorteado da lista
                listRender(); // Atualiza a lista exibida

                mask.classList.add("active"); // Mostra o modal
            } else {
                document.querySelector(".winner").innerHTML = "Não há mais participantes para sortear!";
                mask.classList.add("active"); // Mostra o modal
            }
        });

        document.querySelector(".close-winner-btn").addEventListener("click", function() {
            mask.classList.remove("active"); // Esconde o modal
        });

        mask.addEventListener("click", function(e) {
            if (e.target === mask) {
                mask.classList.remove("active"); // Esconde o modal ao clicar fora
            }
        });

        const colors = ["#E5A0B9", "#F3D478", "#9DCFE0", "#B9AED4"];
        let currentColor = "#E5A0B9";

        document.querySelector(".switch").addEventListener("click", function() {
            currentColor = colors[Math.floor(Math.random() * colors.length)];
            eggColor.style.fill = currentColor;
            openEggColor.style.fill = currentColor;
            this.classList.toggle("active");
            setTimeout(() => this.classList.remove("active"), 700);
            egg.classList.toggle("active");
        });

        egg.addEventListener("click", function() {
            egg.classList.remove("active");
        });
    </script>
</body>
<!-- END: Body-->

</html>