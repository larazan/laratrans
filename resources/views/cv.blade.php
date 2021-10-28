<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        /* =================================
------------------------------------
  Civic - CV Resume
  Version: 1.0
 ------------------------------------ 
 ====================================*/

        /*----------------------------------------*/
        /* Template default CSS
/*----------------------------------------*/
        html,
        body {
            height: 100%;
            font-family: 'Josefin Sans', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #40424a;
            margin: 0;
            font-weight: 600;
            font-family: 'Josefin Sans', sans-serif;
        }

        h2 {
            font-size: 48px;
        }

        h3 {
            font-size: 30px;
        }

        p {
            font-size: 18px;
            color: #808181;
            line-height: 1.8;
        }

        img {
            max-width: 100%;
        }

        input:focus,
        select:focus,
        button:focus,
        textarea:focus {
            outline: none;
        }

        a:hover,
        a:focus {
            text-decoration: none;
            outline: none;
        }

        ul,
        ol {
            padding: 0;
            margin: 0;
        }

        /*---------------------
	Helper CSS
-----------------------*/
        .spad {
            padding-top: 55px;
            padding-bottom: 110px;
        }

        .section-title h2 {
            display: inline-block;
            position: relative;
            margin-bottom: 30px;
            padding-bottom: 2px;
            line-height: normal;
        }

        .section-title h2:after {
            position: absolute;
            content: '';
            width: 100%;
            height: 2px;
            left: 0;
            bottom: 0;
            background: #40424a;
        }

        .set-bg {
            background-repeat: no-repeat;
            background-size: cover;
        }

        /*------------------------
  Common Elements
--------------------------*/

        /* Preloder */
        #preloder {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 999999;
            background: #fff;
        }

        .loader {
            width: 30px;
            height: 30px;
            border: 3px solid #000;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -13px;
            margin-left: -13px;
            border-radius: 60px;
            border-left-color: transparent;
            animation: loader 0.8s linear infinite;
            -webkit-animation: loader 0.8s linear infinite;
        }

        @keyframes loader {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            50% {
                -webkit-transform: rotate(180deg);
                transform: rotate(180deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @-webkit-keyframes loader {
            0% {
                -webkit-transform: rotate(0deg);
            }

            50% {
                -webkit-transform: rotate(180deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        /* Site Buttons */
        .site-btn {
            display: inline-block;
            text-transform: uppercase;
            font-size: 12px;
            min-width: 213px;
            min-height: 20px;
            text-align: center;
            padding: 20px 10px 15px;
            position: relative;
            background-color: #fff;
            margin-right: 10px;
            border: 2px solid #40424a;
            color: #40424a;
            font-weight: 700;
        }

        .site-btn:hover {
            color: #40424a;
        }

        .circle-progress {
            text-align: center;
            padding-top: 30px;
            display: inline-block;
        }

        .circle-progress .prog-circle {
            margin-bottom: -155px;
        }

        .circle-progress canvas {
            -webkit-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            transform: rotate(90deg);
        }

        .circle-progress .progress-info {
            background: #f2f7f8;
            width: 127px;
            height: 127px;
            border-radius: 150px;
            margin: 0 auto;
            padding-top: 45px;
        }

        .circle-progress .progress-info h2 {
            font-size: 36px;
            color: #40424a !important;
        }

        .circle-progress .prog-title {
            text-align: center;
            margin-top: 55px;
        }

        .circle-progress .prog-title h3 {
            font-size: 16px;
            text-transform: uppercase;
        }

        .circle-progress .prog-title p {
            font-size: 15px;
            color: #808181 !important;
        }

        /* Image Popup */
        .img-popup-warp .mfp-content,
        .img-popup-warp.mfp-ready.mfp-removing .mfp-content {
            opacity: 0;
            -webkit-transform: scale(0.8);
            -ms-transform: scale(0.8);
            transform: scale(0.8);
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            transition: all 0.4s;
        }

        .img-popup-warp.mfp-ready .mfp-content {
            opacity: 1;
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
        }

        /* Fact box */
        .fact-box {
            height: 375px;
            display: table;
            width: 100%;
            background: #40424a;
        }

        .fact-box.trans {
            background-color: transparent;
        }

        .fact-box .fact-content {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
        }

        .fact-box .fact-content img {
            width: 60px;
            margin-bottom: 30px;
        }

        .fact-box .fact-content h2 {
            font-size: 36px;
            color: #fff;
        }

        .fact-box .fact-content p {
            color: #fff;
            margin-bottom: 0;
        }

        /* Porgess bar */
        .single-progress-item {
            margin-bottom: 35px;
            position: relative;
        }

        .single-progress-item p {
            color: #40424a;
            margin-bottom: 0;
            font-weight: 600;
        }

        .progress-bar-style {
            display: block;
            height: 2px;
            position: relative;
            width: 100%;
            margin-bottom: 10px;
        }

        .bar-inner {
            position: absolute;
            height: 100%;
            left: 0;
            top: 0;
            background: #40424a;
        }

        .bar-inner span {
            position: absolute;
            right: 0;
            bottom: -30px;
            color: #40424a;
            font-weight: 600;
        }

        /* Progress dots */
        .language-progress {
            max-width: 280px;
            list-style: none;
        }

        .language-progress li {
            font-size: 24px;
            position: relative;
            padding-right: 150px;
            margin-bottom: 30px;
        }

        .language-progress .lan-prog {
            position: absolute;
            right: 0;
            top: 0;
        }

        .language-progress .lan-prog span {
            width: 12px;
            height: 12px;
            display: inline-block;
            margin-right: 18px;
            border-radius: 12px;
            background: #40424a;
        }

        .language-progress .lan-prog span.fade-ele {
            background: #cacaca;
        }

        /* Icon Box */
        .icon-box {
            text-align: center;
            display: inline-block;
            margin-right: 60px;
        }

        .icon-box:last-child {
            margin-right: 0;
        }

        .icon-box i {
            font-size: 60px;
        }

        .icon-box p {
            color: #40424a;
        }

        .social-links a {
            -webkit-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }

        /*---------------------
	Header section
-----------------------*/
        .header-section {
            padding: 50px 40px;
            background: #f2f7f8;
        }

        .site-logo h2 {
            font-size: 36px;
        }

        .site-logo h2 a {
            color: #40424a;
        }

        .site-logo p {
            font-size: 14px;
            line-height: normal;
        }

        .header-buttons a {
            margin-top: 15px;
        }

        /*---------------------
	Hero section
-----------------------*/
        .hero-section {
            background: #f2f7f8;
        }

        .hero-text {
            margin-bottom: 80px;
        }

        .hero-skill {
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .hero-text h2 {
            font-size: 170px;
            line-height: normal;
            margin-bottom: 20px;
        }

        .hero-text p {
            font-size: 33px;
            line-height: 1.3;
        }

        .hero-image {
            padding-top: 70px;
        }

        .hero-info h2 {
            margin-bottom: 30px;
        }

        .hero-info ul {
            list-style: none;
        }

        .hero-info ul li {
            font-size: 24px;
            color: #808181;
            margin-bottom: 15px;
        }

        .hero-info ul li span {
            color: #40424a;
            display: inline-block;
            min-width: 220px;
        }

        .hero-info ul li:last-child {
            margin-bottom: 0;
        }

        /*---------------------
	Social section
-----------------------*/
        .social-section {
            background: #f9f9f9;
            padding: 80px 0;
        }

        .social-section .social-links {
            display: inline-block;
            background: #f9f9f9;
            position: relative;
            z-index: 5;
        }

        .social-section .social-links a {
            color: #484848;
            font-size: 36px;
            margin-right: 40px;
        }

        .social-section .social-link-warp {
            position: relative;
        }

        .social-section .social-link-warp h2 {
            display: inline-block;
            float: right;
            font-weight: 400;
            padding-left: 30px;
            background: #f9f9f9;
            position: relative;
            z-index: 5;
        }

        .social-section .social-link-warp:after {
            position: absolute;
            content: '';
            width: 50%;
            height: 2px;
            left: 23%;
            top: 50%;
            margin-top: 1px;
            background: #cbcbcb;
        }

        /*---------------------
	Resume section
----------------------*/
        .resume-section.with-bg {
            background-image: url(../img/resume-bg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .resume-list {
            list-style: none;
            margin-left: 60px;
            padding-left: 110px;
            border-left: 2px solid #40424a;
        }

        .resume-list li {
            margin-bottom: 120px;
            position: relative;
        }

        .resume-list li:last-child {
            margin-bottom: 0;
        }

        .resume-list li:after {
            position: absolute;
            content: '';
            width: 15px;
            height: 15px;
            border: 2px solid #40424a;
            border-radius: 50px;
            background: #cacaca;
            top: 30px;
            left: -118px;
        }

        .resume-list h2 {
            font-size: 72px;
            margin-bottom: 10px;
        }

        .resume-list h4 {
            font-size: 16px;
            text-transform: uppercase;
            color: #808181;
            margin-top: 10px;
            margin-bottom: 45px;
        }

        .resume-list p {
            margin-bottom: 0;
        }

        /*---------------------
	Review section
-----------------------*/
        .review-slider {
            padding-left: 150px;
        }

        .review-slider .owl-dots {
            position: absolute;
            left: 50px;
            top: 70px;
        }

        .review-slider .owl-dots .owl-dot {
            width: 12px;
            height: 12px;
            border: 2px solid #40424a;
            border-radius: 50px;
            background: #cacaca;
            margin-bottom: 15px;
        }

        .review-slider .owl-dots .owl-dot.active {
            background: #40424a;
        }

        .single-review .qut {
            font-size: 120px;
            line-height: 0;
            color: #505259;
            margin-top: 60px;
        }

        .single-review p {
            margin-bottom: 40px;
        }

        .single-review h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .single-review h4 {
            font-size: 16px;
        }

        /*---------------------
	Portfolio section
----------------------*/
        .portfolio-warp {
            padding: 0 60px;
        }

        .portfolio-item h2 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .portfolio-item p {
            font-size: 14px;
            margin-bottom: 0;
        }

        .portfolio-item .port-pic {
            margin-bottom: 30px;
            display: block;
            height: 480px;
            background: #333;
            background-position: center center;
            background-size: cover;
            overflow: hidden;
            position: relative;
        }

        .portfolio-item .port-pic:after {
            position: absolute;
            content: '';
            left: 0;
            bottom: 0;
            width: 100%;
            height: 0;
            background: #000;
            opacity: 0;
            z-index: 2;
            -webkit-transition: all 0.4s cubic-bezier(0.55, 0.09, 0.68, 0.53) 0s;
            -o-transition: all 0.4s cubic-bezier(0.55, 0.09, 0.68, 0.53) 0s;
            transition: all 0.4s cubic-bezier(0.55, 0.09, 0.68, 0.53) 0s;
        }

        .portfolio-item:hover .port-pic:after {
            opacity: 0.8;
            height: 100%;
            top: 0;
        }

        /*---------------------
	Contact section
-----------------------*/
        .contact-form {
            display: block;
            width: 100%;
        }

        .contact-form input {
            background-color: transparent;
            padding-left: 25px;
            height: 60px;
            width: 100%;
            border: none;
            border-bottom: 2px solid #cacaca;
            margin-bottom: 30px;
            font-size: 13px;
        }

        .contact-form textarea {
            padding-left: 25px;
            height: 200px;
            width: 100%;
            border: none;
            border-bottom: 2px solid #cacaca;
            margin-bottom: 30px;
            font-size: 13px;
            background-color: transparent;
        }

        .contact-form ::-webkit-input-placeholder {
            font-style: italic;
        }

        .contact-form :-ms-input-placeholder {
            font-style: italic;
        }

        .contact-form ::-ms-input-placeholder {
            font-style: italic;
        }

        .contact-form ::placeholder {
            font-style: italic;
        }

        /*---------------------
	Footer section
-----------------------*/
        .footer-section {
            background: #40424a;
            padding: 20px 0;
        }

        .copyright {
            padding-top: 5px;
            font-size: 12px;
            color: #838488;
            line-height: normal;
        }

        /*---------------------
	Home 2 Style
-----------------------*/
        .home-two-style {
            background-image: url(../img/home-2-bg.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: top center;
            background-color: #009fff;
        }

        .home-two-style .header-section,
        .home-two-style .hero-section,
        .home-two-style .social-section,
        .home-two-style .review-slider .owl-dots .owl-dot,
        .home-two-style .site-btn,
        .home-two-style .fact-box,
        .home-two-style .social-links,
        .home-two-style .social-section .social-link-warp h2 {
            background-color: transparent;
        }

        .home-two-style h1,
        .home-two-style h2,
        .home-two-style h3,
        .home-two-style h4,
        .home-two-style h5,
        .home-two-style h6,
        .home-two-style p,
        .home-two-style .site-logo h2 a,
        .home-two-style .site-logo p,
        .home-two-style .hero-info ul li,
        .home-two-style .hero-info ul li span,
        .home-two-style .single-review .qut,
        .home-two-style .site-btn,
        .home-two-style .social-section .social-links a,
        .home-two-style .contact-form input,
        .home-two-style .contact-form textarea,
        .home-two-style .circle-progress .prog-title p,
        .home-two-style .circle-progress .prog-title h3,
        .home-two-style .circle-progress .progress-info h2 {
            color: #fff !important;
        }

        .home-two-style .section-title h2:after,
        .home-two-style .review-slider .owl-dots .owl-dot.active {
            background: #fff;
        }

        .home-two-style .resume-list,
        .home-two-style .resume-list li:after,
        .home-two-style .review-slider .owl-dots .owl-dot,
        .home-two-style .site-btn,
        .home-two-style .contact-form input,
        .home-two-style .contact-form textarea {
            border-color: #fff;
        }

        .home-two-style .hero-image {
            padding-left: 0px;
            padding-top: 200px;
        }

        .home-two-style .hero-image img {
            -webkit-box-shadow: 6px 20px 50px rgba(0, 0, 0, 0.5294117647);
            box-shadow: 6px 20px 50px rgba(0, 0, 0, 0.5294117647);
        }

        .home-two-style .resume-list li:after {
            background: #009fff;
        }

        .home-two-style .circle-progress .progress-info {
            background: #50bcfd;
        }

        .home-two-style .fact-box {
            border: 2px solid #fff;
        }

        .home-two-style .fact-box.trans {
            border: none;
        }

        .home-two-style .footer-section {
            background: #3a4db4;
        }

        .home-two-style .contact-form ::-webkit-input-placeholder {
            color: #fff;
        }

        .home-two-style .contact-form :-ms-input-placeholder {
            color: #fff;
        }

        .home-two-style .contact-form ::-ms-input-placeholder {
            color: #fff;
        }

        .home-two-style .contact-form ::placeholder {
            color: #fff;
        }

        /*---------------------
	Home 3 Style
-----------------------*/
        .home-three-style .main-left-area,
        .home-four-style .main-left-area {
            background: #f2f7f8;
            padding-top: 200px;
            padding-right: 80px;
            padding-left: 80px;
        }

        .home-three-style .main-left-area .section-title h2,
        .home-four-style .main-left-area .section-title h2 {
            margin-bottom: 130px;
        }

        .home-three-style .main-right-area,
        .home-four-style .main-right-area {
            padding-top: 200px;
            padding-left: 110px;
        }

        .home-three-style .resume-list li,
        .home-four-style .resume-list li {
            padding-left: 0;
        }

        .home-three-style .resume-list li:after,
        .home-four-style .resume-list li:after {
            display: none;
        }

        .home-three-style .resume-list,
        .home-four-style .resume-list {
            border-left: none;
            padding-left: 0;
            margin-left: 0;
        }

        .home-three-style .header-section,
        .home-four-style .header-section {
            padding: 50px 80px;
            background: transparent;
            position: absolute;
            width: 100%;
            z-index: 1;
        }

        .home-three-style .hero-image,
        .home-four-style .hero-image {
            margin-bottom: 100px;
        }

        .home-three-style .hero-text h2,
        .home-four-style .hero-text h2 {
            font-size: 72px;
            margin-bottom: 40px;
        }

        .home-three-style .review-slider,
        .home-four-style .review-slider {
            padding-left: 0;
        }

        .home-three-style .review-slider .owl-dots,
        .home-four-style .review-slider .owl-dots {
            position: relative;
            left: 0;
            top: 0;
            padding-top: 50px;
        }

        .home-three-style .review-slider .owl-dots .owl-dot,
        .home-four-style .review-slider .owl-dots .owl-dot {
            display: inline-block;
            margin-right: 15px;
            background: #cacaca;
            border: none;
        }

        .home-three-style .review-slider .owl-dots .owl-dot.active,
        .home-four-style .review-slider .owl-dots .owl-dot.active {
            background: #40424a;
        }

        .home-three-style .skills,
        .home-four-style .skills {
            max-width: 555px;
        }

        .home-three-style .fact-box.trans,
        .home-four-style .fact-box.trans {
            margin-bottom: 80px;
        }

        .home-three-style .social-links,
        .home-four-style .social-links {
            text-align: center;
            padding-bottom: 70px;
            padding-top: 120px;
        }

        .home-three-style .social-links a,
        .home-four-style .social-links a {
            font-size: 30px;
            margin-right: 40px;
            color: #b9b9b9;
        }

        .home-three-style .social-links a:hover,
        .home-four-style .social-links a:hover {
            color: #484848;
        }

        /*---------------------
	Home 4 Style
-----------------------*/
        .home-four-style .site-logo h2 a,
        .home-four-style .site-logo p {
            color: #fff;
        }

        .home-four-style .main-left-area {
            position: relative;
            /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#481340+0,ff0f3c+100,ff0f3c+100 */
            background: #481340;
            /* Old browsers */
            /* FF3.6-15 */
            background: -webkit-linear-gradient(top, #481340 0%, #ff0f3c 100%, #ff0f3c 100%);
            /* Chrome10-25,Safari5.1-6 */
            background: -webkit-gradient(linear, left top, left bottom, from(#481340), color-stop(100%, #ff0f3c), to(#ff0f3c));
            background: -o-linear-gradient(top, #481340 0%, #ff0f3c 100%, #ff0f3c 100%);
            background: linear-gradient(to bottom, #481340 0%, #ff0f3c 100%, #ff0f3c 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#481340', endColorstr='#ff0f3c', GradientType=0);
            /* IE6-9 */
        }

        .home-four-style .main-left-area:after {
            position: absolute;
            content: "";
            width: 100%;
            height: 800px;
            top: 0;
            left: 0;
            background-image: url("../img/home-4-bg.png");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .home-four-style .main-left-area h1,
        .home-four-style .main-left-area h2,
        .home-four-style .main-left-area h3,
        .home-four-style .main-left-area h4,
        .home-four-style .main-left-area h5,
        .home-four-style .main-left-area h6,
        .home-four-style .main-left-area p,
        .home-four-style .main-left-area .hero-info ul li,
        .home-four-style .main-left-area .hero-info ul li span,
        .home-four-style .main-left-area .site-btn,
        .home-four-style .main-left-area .social-section,
        .home-four-style .main-left-area .social-links a,
        .home-four-style .main-left-area .contact-form input,
        .home-four-style .main-left-area .contact-form textarea,
        .home-four-style .main-left-area .circle-progress .prog-title p,
        .home-four-style .main-left-area .circle-progress .prog-title h3,
        .home-four-style .main-left-area .circle-progress .progress-info h2,
        .home-four-style .main-left-area .language-progress li {
            color: #fff !important;
        }

        .home-four-style .main-left-area .circle-progress .progress-info {
            background: rgba(255, 255, 255, 0.29);
        }

        .home-four-style .main-left-area .section-title h2:after,
        .home-four-style .main-left-area .language-progress .lan-prog span {
            background: #fff;
        }

        .home-four-style .main-left-area .language-progress .lan-prog span.fade-ele {
            background: rgba(255, 255, 255, 0.29);
        }

        .home-four-style .main-left-area .fact-box {
            background-color: transparent;
            border: 2px solid #fff;
        }

        .home-four-style .main-left-area .fact-box.trans {
            border: none;
        }

        .home-four-style .main-left-area .intro-section {
            position: relative;
            z-index: 2;
        }

        .home-four-style .main-right-area .section-title h2:after,
        .home-four-style .main-right-area .review-slider .owl-dots .owl-dot.active {
            background: #ff0f3c;
        }

        .home-four-style .main-right-area .resume-list h2,
        .home-four-style .main-right-area .single-review .qut {
            color: #ff0f3c;
        }

        /*---------------------
	Home 5 Style
-----------------------*/
        .home-five-style .header-section {
            padding: 50px 80px;
            background: transparent;
            position: absolute;
            width: 100%;
            z-index: 1;
        }

        .home-five-style .hero-section {
            padding-top: 70px;
        }

        .home-five-style .hero-section img {
            margin-bottom: 60px;
        }

        .home-five-style .hero-text h2 {
            font-size: 72px;
            margin-bottom: 40px;
        }

        .home-five-style .social-links {
            padding-top: 0px;
            text-align: center;
            padding-bottom: 70px;
        }

        .home-five-style .social-links a {
            font-size: 30px;
            margin-right: 40px;
            color: #b9b9b9;
        }

        .home-five-style .social-links a:hover {
            color: #484848;
        }

        .home-five-style .resume-list li {
            padding-left: 0;
        }

        .home-five-style .resume-list li:after {
            display: none;
        }

        .home-five-style .resume-list {
            border-left: none;
            padding-left: 0;
            margin-left: 0;
        }

        .home-five-style .review-slider {
            padding-left: 0;
        }

        .home-five-style .review-slider .owl-dots {
            position: relative;
            left: 0;
            top: 0;
            padding-top: 50px;
        }

        .home-five-style .review-slider .owl-dots .owl-dot {
            display: inline-block;
            margin-right: 15px;
            background: #cacaca;
            border: none;
        }

        .home-five-style .review-slider .owl-dots .owl-dot.active {
            background: #40424a;
        }

        .home-five-style .circle-progress {
            padding-top: 0;
        }

        /*---------------------
	Home 6 Style
-----------------------*/
        .home-six-style .site-logo h2 a,
        .home-six-style .site-logo p,
        .home-six-style .hero-text h2,
        .home-six-style .hero-text p,
        .home-six-style .social-links a {
            color: #fff;
        }

        .home-six-style .resume-list h2,
        .home-six-style .icon-box i,
        .home-six-style .single-review .qut {
            color: #009fff;
        }

        .home-six-style .section-title h2:after,
        .home-six-style .fact-box,
        .home-six-style .review-slider .owl-dots .owl-dot.active,
        .home-six-style .language-progress .lan-prog span {
            background: #009fff;
        }

        .home-six-style .language-progress .lan-prog span.fade-ele {
            background: #cacaca;
        }

        .home-six-style .header-section {
            padding: 50px 80px;
            background: transparent;
            position: absolute;
            width: 100%;
            z-index: 1;
        }

        .home-six-style .hero-section {
            background: #009fff;
            padding-top: 70px;
        }

        .home-six-style .hero-section img {
            margin-bottom: 60px;
        }

        .home-six-style .hero-text h2 {
            font-size: 72px;
            margin-bottom: 40px;
        }

        .home-six-style .social-links {
            padding-top: 0px;
            text-align: center;
            padding-bottom: 70px;
        }

        .home-six-style .social-links a {
            font-size: 30px;
            margin-right: 40px;
            color: #b9b9b9;
        }

        .home-six-style .social-links a:hover {
            color: #484848;
        }

        .home-six-style .resume-list li {
            padding-left: 0;
        }

        .home-six-style .resume-list li:after {
            display: none;
        }

        .home-six-style .resume-list {
            border-left: none;
            padding-left: 0;
            margin-left: 0;
        }

        .home-six-style .review-slider {
            padding-left: 0;
        }

        .home-six-style .review-slider .owl-dots {
            position: relative;
            left: 0;
            top: 0;
            padding-top: 50px;
        }

        .home-six-style .review-slider .owl-dots .owl-dot {
            display: inline-block;
            margin-right: 15px;
            background: #cacaca;
            border: none;
        }

        .home-six-style .circle-progress {
            padding-top: 0;
        }

        .info-section {
            background: #40424a;
            padding: 60px 0;
        }

        .info-section .hero-info ul li {
            color: #fff;
        }

        .info-section .hero-info ul li span {
            color: #fff;
        }


        /* ===========================
  Responsive
==============================*/
        @media only screen and (max-width: 1730px) {
            .home-two-style .social-section .social-link-warp:after {
                display: none;
            }
        }

        @media only screen and (max-width: 1600px) {
            .hero-text h2 {
                font-size: 120px;
            }
        }

        @media only screen and (max-width: 1450px) {
            .home-five-style .header-section {
                position: relative;
                background: #f2f7f8;
            }

            .home-six-style .header-section {
                position: relative;
                background: #009fff;
            }
        }

        @media only screen and (max-width: 1366px) and (min-width: 1200px) {
            .home-five-style .header-section {
                position: relative;
                background: #f2f7f8;
            }

            .container-warp {
                min-width: 80%;
                margin-left: 10%;
            }

            .hero-info ul li span {
                min-width: 180px;
            }

            .portfolio-item .port-pic {
                height: 310px;
            }

            .home-three-style .header-section {
                padding: 50px 30px;
            }

            .home-three-style .main-left-area {
                padding-right: 30px;
                padding-left: 30px;
            }

            .home-three-style .main-right-area {
                padding-left: 100px;
            }
        }

        /* Medium screen : 992px. */
        @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .portfolio-warp {
                padding: 0;
            }

            .home-three-style .header-section {
                padding: 50px 15px;
            }

            .home-three-style .main-left-area {
                padding-right: 15px;
                padding-left: 15px;
            }

            .home-three-style .main-right-area {
                padding-left: 50px;
            }

            .home-three-style .main-right-area {
                padding-left: 100px;
            }

            .portfolio-item .port-pic {
                height: 310px;
            }

            .portfolio-item {
                margin-bottom: 30px;
            }
        }

        /* Tablet :768px. */
        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .portfolio-warp {
                padding: 0;
            }

            .hidden-md {
                display: none !important;
            }

            .icon-box {
                margin-right: 30px;
            }

            .social-section .social-links {
                display: block;
                text-align: center;
            }

            .social-link-warp:after {
                display: none;
            }

            .portfolio-item {
                margin-bottom: 30px;
            }

            .home-three-style .header-section {
                position: relative;
                background: #f2f7f8;
            }

            .home-three-style .main-left-area {
                padding-top: 0;
            }

            .home-three-style .main-left-area,
            .home-three-style .header-section,
            .home-three-style .main-right-area,
            .home-four-style .main-left-area,
            .home-four-style .header-section,
            .home-four-style .main-right-area {
                padding-right: 30px;
                padding-left: 30px;
            }

            .home-five-style .header-section,
            .home-six-style .header-section {
                padding: 50px 0;
            }

            .info-section .hero-info ul li span {
                color: #9c9b9b;
            }

            .hero-info ul li {
                margin-bottom: 30px;
            }

            .hero-info ul li span {
                display: block;
            }
        }

        /* Large Mobile :480px. */
        @media only screen and (max-width: 767px) {
            .icon-box {
                margin-right: 30px;
                text-align: left;
            }

            .hero-text h2 {
                font-size: 80px;
            }

            .portfolio-warp {
                padding: 0;
            }

            .hidden-md {
                display: none !important;
            }

            .resume-list {
                margin-left: 0;
                padding-left: 0;
                border-left: none;
            }

            .review-slider {
                padding-left: 0;
            }

            .review-slider .owl-dots {
                position: relative;
                left: 0;
                top: 70px;
            }

            .review-slider .owl-dots .owl-dot {
                display: inline-block;
                margin-right: 15px;
            }

            .portfolio-item {
                margin-bottom: 30px;
            }

            .fact-box {
                margin-bottom: 30px;
            }

            .header-section {
                padding: 50px 0;
            }

            .social-section .social-links {
                display: block;
                text-align: center;
            }

            .home-three-style .header-section {
                position: relative;
                background: #f2f7f8;
            }

            .home-three-style .main-left-area {
                padding-top: 0;
            }

            .home-three-style .main-left-area,
            .home-three-style .header-section,
            .home-three-style .main-right-area,
            .home-four-style .main-left-area,
            .home-four-style .header-section,
            .home-four-style .main-right-area {
                padding-right: 30px;
                padding-left: 30px;
            }

            .home-five-style .header-section,
            .home-six-style .header-section {
                padding: 50px 0;
            }

            .info-section .hero-info ul li span {
                color: #9c9b9b;
            }
        }

        /* small Mobile :320px. */
        @media only screen and (max-width: 479px) {
            .hero-text h2 {
                font-size: 50px;
            }

            .hero-info ul li {
                font-size: 18px;
            }

            .hero-info ul li span {
                display: block;
            }

            .social-section .social-links a {
                margin-right: 30px;
            }

            .resume-list h2 {
                font-size: 50px;
            }

            .portfolio-item {
                margin-bottom: 30px;
            }

            .home-three-style .main-left-area,
            .home-three-style .header-section,
            .home-three-style .main-right-area,
            .home-four-style .main-left-area,
            .home-four-style .header-section,
            .home-four-style .main-right-area {
                padding-right: 15px;
                padding-left: 15px;
            }

            .home-four-style .main-left-area {
                padding-top: 250px;
            }

            .extra-skill span.badge{
                color: white !important;
                font-size: 12px !important;

            }
        }
    </style>
</head>

<body>
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="site-logo">

                    </div>
                </div>
                <div class="col-md-8 text-md-right header-buttons">
                    <a href="https://zamroni-resume.netlify.app/" target="_blank" class="site-btn">Discover me</a>
                </div>
            </div>
        </div>
    </header>
    <section class="hero-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero-text">
                                <h2>Moch Zamroni</h2>
                                <p>Fullstack Web developer dengan pengalaman 4 tahun lebih membuat aplikasi E-commerce yang scalable</p>
                            </div>
                            <div class="hero-info">
                                <h2>Contact</h2>
                                <ul>
                                    <li>Balongsari blok 9c/5 Tandes, Surabaya</li>
                                    <li>forheron@gmail.com</li>
                                    <li>+62 896 5577 0894</li>
                                </ul>
                            </div>
                            
                            <div class="hero-skill">
                                <div class="section-title">
                                    <h2>Skills</h2>
                                    <div class="extra-skill">
                                    <h5>
                                        <span class="badge bg-primary">PHP</span>
                                        <span class="badge bg-secondary">Javascript</span>
                                        <span class="badge bg-success">Node</span>
                                        <span class="badge bg-danger">React</span>
                                        <span class="badge bg-warning text-dark">Python</span>
                                        <span class="badge bg-info text-dark">Mysql</span>
                                        <span class="badge bg-success text-dark">MongoDB</span>
                                        <span class="badge bg-danger">Tailwind</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="">
                                <div class="section-title">
                                    <h2>Experience</h2>
                                </div>
                                <ul class="resume-list">
                                    <li>
                                        <h2>2018-2020</h2>
                                        <h3>Wiklan Indonesia</h3>
                                        <h4>Fullstack Developer</h4>
                                        <p>Membuat proses input lokasi, proses chat pemilik, proses add to cart, proses validasi dan verifikasi dan lain-lain.</p>
                                    </li>
                                    <li>
                                        <h2>2017-2018</h2>
                                        <h3>Match Advertising</h3>
                                        <h4>Web Developer</h4>
                                        <p>Membuat sistem visit untuk marketing berdasarkan lokasi</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
</body>

</html>