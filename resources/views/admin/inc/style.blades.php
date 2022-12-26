@php
$websetting=\App\Models\WebSetting::first();
@endphp
<link rel="icon" type="image/x-icon" href="{{ !empty($websetting) ? asset('WebSetting/'.$websetting->dashboard_fav_icon) : asset('assets/img/favicon.ico') }}"/>
      {{-- @import url('https://fonts.googleapis.com/css?family=Quicksand:400,500,700&subset=latin-ext'); --}}
<link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/js/loader.js') }}"></script>
<!-- BEGIN GLOBAL MANDATORY STYLES -->

<link href="https://script.bugfinder.net/payescrow/assets/admin/css/bootstrap4-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://script.bugfinder.net/payescrow/assets/themes/darkmode/css/all.min.css"/>
<link href="https://script.bugfinder.net/payescrow/assets/admin/css/select2.min.css" rel="stylesheet">
<link href="https://script.bugfinder.net/payescrow/assets/admin/css/style.min.css" rel="stylesheet">
<link href="https://script.bugfinder.net/payescrow/assets/admin/css/style.css" rel="stylesheet">
@if(isset($page_name))

@switch($page_name)

@case('manage_coach')


@break;

@case('manage_profile')
 
 <style type="text/css">
    html {
position: relative;
overflow-x: hidden !important;
}

* {
box-sizing: border-box;
}

body {
font-family: "Quicksand", sans-serif;
color: #324e63;
}

a, a:hover {
text-decoration: none;
}

.icon {
display: inline-block;
width: 1em;
height: 1em;
stroke-width: 0;
stroke: currentColor;
fill: currentColor;
}

.wrapper {
width: 100%;
width: 100%;
height: auto;
min-height: 100vh;
padding: 50px 20px;
padding-top: 100px;
display: flex;
/*background-image: linear-gradient(-20deg, #ff2846 0%, #6944ff 100%);*/
display: flex;
/* background-image: linear-gradient(-20deg, #ff2846 0%, #6944ff 100%);*/
}
@media screen and (max-width: 768px) {
.wrapper {
height: auto;
min-height: 100vh;
padding-top: 100px;
}
}

.profile-card {
width: 100%;
min-height: 460px;
margin: auto;
box-shadow: 0px 8px 60px -10px rgba(13, 28, 39, 0.6);
background: #fff;
border-radius: 12px;
max-width: 700px;
position: relative;
}
.profile-card.active .profile-card__cnt {
filter: blur(6px);
}
.profile-card.active .profile-card-message,
.profile-card.active .profile-card__overlay {
opacity: 1;
pointer-events: auto;
transition-delay: 0.1s;
}
.profile-card.active .profile-card-form {
transform: none;
transition-delay: 0.1s;
}
.profile-card__img {
width: 150px;
height: 150px;
margin-left: auto;
margin-right: auto;
transform: translateY(-50%);
border-radius: 50%;
overflow: hidden;
position: relative;
z-index: 4;
box-shadow: 0px 5px 50px 0px #6c44fc, 0px 0px 0px 7px rgba(107, 74, 255, 0.5);
}
@media screen and (max-width: 576px) {
.profile-card__img {
width: 120px;
height: 120px;
}
}
.profile-card__img img {
display: block;
width: 100%;
height: 100%;
object-fit: cover;
border-radius: 50%;
}
.profile-card__cnt {
margin-top: -35px;
text-align: center;
padding: 0 20px;
padding-bottom: 40px;
transition: all 0.3s;
}
.profile-card__name {
font-weight: 700;
font-size: 24px;
color: #6944ff;
margin-bottom: 15px;
}
.profile-card__txt {
font-size: 18px;
font-weight: 500;
color: #324e63;
margin-bottom: 15px;
}
.profile-card__txt strong {
font-weight: 700;
}
.profile-card-loc {
display: flex;
justify-content: center;
align-items: center;
font-size: 18px;
font-weight: 600;
}
.profile-card-loc__icon {
display: inline-flex;
font-size: 27px;
margin-right: 10px;
}
.profile-card-inf {
display: flex;
justify-content: center;
flex-wrap: wrap;
align-items: flex-start;
margin-top: 35px;
}
.profile-card-inf__item {
padding: 10px 35px;
min-width: 150px;
}
@media screen and (max-width: 768px) {
.profile-card-inf__item {
padding: 10px 20px;
min-width: 120px;
}
}
.profile-card-inf__title {
font-weight: 700;
font-size: 27px;
color: #324e63;
}
.profile-card-inf__txt {
font-weight: 500;
margin-top: 7px;
}
.profile-card-social {
margin-top: 25px;
display: flex;
justify-content: center;
align-items: center;
flex-wrap: wrap;
}
.profile-card-social__item {
display: inline-flex;
width: 55px;
height: 55px;
margin: 15px;
border-radius: 50%;
align-items: center;
justify-content: center;
color: #fff;
background: #405de6;
box-shadow: 0px 7px 30px rgba(43, 98, 169, 0.5);
position: relative;
font-size: 21px;
flex-shrink: 0;
transition: all 0.3s;
}
@media screen and (max-width: 768px) {
.profile-card-social__item {
width: 50px;
height: 50px;
margin: 10px;
}
}
@media screen and (min-width: 768px) {
.profile-card-social__item:hover {
transform: scale(1.2);
}
}
.profile-card-social__item.facebook {
background: linear-gradient(45deg, #3b5998, #0078d7);
box-shadow: 0px 4px 30px rgba(43, 98, 169, 0.5);
}
.profile-card-social__item.twitter {
background: linear-gradient(45deg, #1da1f2, #0e71c8);
box-shadow: 0px 4px 30px rgba(19, 127, 212, 0.7);
}
.profile-card-social__item.instagram {
background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
box-shadow: 0px 4px 30px rgba(120, 64, 190, 0.6);
}
.profile-card-social__item.behance {
background: linear-gradient(45deg, #1769ff, #213fca);
box-shadow: 0px 4px 30px rgba(27, 86, 231, 0.7);
}
.profile-card-social__item.github {
background: linear-gradient(45deg, #333333, #626b73);
box-shadow: 0px 4px 30px rgba(63, 65, 67, 0.6);
}
.profile-card-social__item.codepen {
background: linear-gradient(45deg, #324e63, #414447);
box-shadow: 0px 4px 30px rgba(55, 75, 90, 0.6);
}
.profile-card-social__item.link {
background: linear-gradient(45deg, #d5135a, #f05924);
box-shadow: 0px 4px 30px rgba(223, 45, 70, 0.6);
}
.profile-card-social .icon-font {
display: inline-flex;
}
.profile-card-ctr {
display: flex;
justify-content: center;
align-items: center;
margin-top: 40px;
}
@media screen and (max-width: 576px) {
.profile-card-ctr {
flex-wrap: wrap;
}
}
.profile-card__button {
background: none;
border: none;
font-family: "Quicksand", sans-serif;
font-weight: 700;
font-size: 19px;
margin: 15px 35px;
padding: 15px 40px;
min-width: 201px;
border-radius: 50px;
min-height: 55px;
color: #fff;
cursor: pointer;
backface-visibility: hidden;
transition: all 0.3s;
}
@media screen and (max-width: 768px) {
.profile-card__button {
min-width: 170px;
margin: 15px 25px;
}
}
@media screen and (max-width: 576px) {
.profile-card__button {
min-width: inherit;
margin: 0;
margin-bottom: 16px;
width: 100%;
max-width: 300px;
}
.profile-card__button:last-child {
margin-bottom: 0;
}
}
.profile-card__button:focus {
outline: none !important;
}
@media screen and (min-width: 768px) {
.profile-card__button:hover {
transform: translateY(-5px);
}
}
.profile-card__button:first-child {
margin-left: 0;
}
.profile-card__button:last-child {
margin-right: 0;
}
.profile-card__button.button--blue {
background: linear-gradient(45deg, #1da1f2, #0e71c8);
box-shadow: 0px 4px 30px rgba(19, 127, 212, 0.4);
}
.profile-card__button.button--blue:hover {
box-shadow: 0px 7px 30px rgba(19, 127, 212, 0.75);
}
.profile-card__button.button--orange {
background: linear-gradient(45deg, #d5135a, #f05924);
box-shadow: 0px 4px 30px rgba(223, 45, 70, 0.35);
}
.profile-card__button.button--orange:hover {
box-shadow: 0px 7px 30px rgba(223, 45, 70, 0.75);
}
.profile-card__button.button--gray {
box-shadow: none;
background: #dcdcdc;
color: #142029;
}
.profile-card-message {
width: 100%;
height: 100%;
position: absolute;
top: 0;
left: 0;
padding-top: 130px;
padding-bottom: 100px;
opacity: 0;
pointer-events: none;
transition: all 0.3s;
}
.profile-card-form {
box-shadow: 0 4px 30px rgba(15, 22, 56, 0.35);
max-width: 80%;
margin-left: auto;
margin-right: auto;
height: 100%;
background: #fff;
border-radius: 10px;
padding: 35px;
transform: scale(0.8);
position: relative;
z-index: 3;
transition: all 0.3s;
}
@media screen and (max-width: 768px) {
.profile-card-form {
max-width: 90%;
height: auto;
}
}
@media screen and (max-width: 576px) {
.profile-card-form {
padding: 20px;
}
}
.profile-card-form__bottom {
justify-content: space-between;
display: flex;
}
@media screen and (max-width: 576px) {
.profile-card-form__bottom {
flex-wrap: wrap;
}
}
.profile-card textarea {
width: 100%;
resize: none;
height: 210px;
margin-bottom: 20px;
border: 2px solid #dcdcdc;
border-radius: 10px;
padding: 15px 20px;
color: #324e63;
font-weight: 500;
font-family: "Quicksand", sans-serif;
outline: none;
transition: all 0.3s;
}
.profile-card textarea:focus {
outline: none;
border-color: #8a979e;
}
.profile-card__overlay {
width: 100%;
height: 100%;
position: absolute;
top: 0;
left: 0;
pointer-events: none;
opacity: 0;
background: rgba(22, 33, 72, 0.35);
border-radius: 12px;
transition: all 0.3s;
}
 </style>

@break;


@endswitch

@endif