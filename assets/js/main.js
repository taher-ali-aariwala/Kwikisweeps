(function($) {
"use strict";
jQuery(document).ready(function(e) {
background();
});
function background()
{
var img = $('.has_bg_image');
img.css('background-image', function() {
var bg = ('url(' + $(this).data('background') + ')');
return bg;
});
}
//wow animation
new WOW().init();
// menu options custom affix
var fixed_top = $(".header-section");
$(window).on("scroll", function() {
if ($(window).scrollTop() > 500) {
fixed_top.addClass("animated fadeInDown menu-fixed");
} else {
fixed_top.removeClass("animated fadeInDown menu-fixed");
}
});
$(window).on('load', function() {
// run test on initial page load
checkSize();
// run test on resize of the window
$(window).resize(checkSize);
//menu options custom affix
var fixed_top = $(".header-section");
$(window).on("scroll", function() {
if ($(this).scrollTop() > 50) {
fixed_top.addClass("header-close");
} else {
fixed_top.removeClass("header-close");
}
});
setInterval(function() {
$(".banner-elements-part").addClass("active")
}, 1000);
var swiper = new Swiper(".testimonial-slider", {
effect: "coverflow",
loop: 0,
slidesPerView: "auto",
grabCursor: 1,
parallax: 0,
centeredSlides: true,
coverflowEffect: {
rotate: 0,
stretch: 80,
depth: 200,
modifier: 1,
slideShadows: !1
},
navigation: {
nextEl: '.button-next',
prevEl: '.button-prev',
},
});
});
// date picker
$(function() {
$(".datepicker").datepicker();
});
$(function() {
$(".datepicker2").datepicker();
});
var today, datepicker;
today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
datepicker = $('#date-pic').datepicker({
minDate: today,
});
$("#date-pic").datepicker({
changeMonth: false,
changeYear: false
}).focus(function() {
$(".ui-datepicker-prev, .ui-datepicker-next").remove();
});
var today, datepicker;
today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
datepicker = $('#date-pic2').datepicker({
minDate: today,
});
$("#date-pic2").datepicker({
changeMonth: false,
changeYear: false
}).focus(function() {
$(".ui-datepicker-prev, .ui-datepicker-next").remove();
});
// Toggle field step form
$(function() {
$(document).on('click', '.btn-add', function(e) {
e.preventDefault();
var controlForm = $('.controls:first'),
currentEntry = $(this).parents('.entry:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry:not(:last) .btn-add')
.removeClass('btn-add').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry:first').remove();
e.preventDefault();
return false;
});
});
// Toggle field step form
$(function() {
$(document).on('click', '.btn-add', function(e) {
e.preventDefault();
var controlForm = $('.controls-new:first'),
currentEntry = $(this).parents('.entry-new:first'),
newEntry = $(currentEntry.clone()).appendTo(controlForm);
newEntry.find('input').val('');
controlForm.find('.entry-new:not(:last) .btn-add')
.removeClass('btn-add').addClass('btn-remove')
.removeClass('btn-success').addClass('btn-danger')
.html('<span class="fa fa-trash text-white"> </span>');
}).on('click', '.btn-remove', function(e) {
$(this).parents('.entry-new:first').remove();
e.preventDefault();
return false;
});
});
//Function to the css rule
function checkSize() {
if (window.matchMedia('(max-width: 1199px)').matches) {
// js code for responsive drop-down-menu-item with swing effect
$(".navbar-collapse>ul>li>a, .navbar-collapse ul.sub-menu>li>a").on("click", function() {
var element = $(this).parent("li");
if (element.hasClass("open")) {
element.removeClass("open");
element.find("li").removeClass("open");
element.find("ul").slideUp(500, "linear");
} else {
element.addClass("open");
element.children("ul").slideDown();
element.siblings("li").children("ul").slideUp();
element.siblings("li").removeClass("open");
element.siblings("li").find("li").removeClass("open");
element.siblings("li").find("ul").slideUp();
}
});
}
}
//js code for dropify file type 
$('.dropify').dropify();
//js code for mobile menu 
$(".menu-toggle").on("click", function() {
$(this).toggleClass("is-active");
});
$('.count').each(function() {
$(this).prop('Counter', 0).animate({
Counter: $(this).text()
}, {
duration: 3000,
easing: 'swing',
step: function(now) {
$(this).text(Math.ceil(now));
}
});
});
// take body to change the content
const body = document.getElementsByTagName('body');
// stop keyboard shortcuts
window.addEventListener("keydown", (event) => {
if(event.ctrlKey && (event.key === "S" || event.key === "s")) {
event.preventDefault();
body[0].innerHTML = "sorry, you can't do this 💔"
}
if(event.ctrlKey && (event.key === "C")) {
event.preventDefault();
body[0].innerHTML = "sorry, you can't do this 💔"
}
if(event.ctrlKey && (event.key === "E" || event.key === "e")) {
event.preventDefault();
body[0].innerHTML = "sorry, you can't do this 💔"
}
if(event.ctrlKey && (event.key === "I" || event.key === "i")) {
event.preventDefault();
body[0].innerHTML = "sorry, you can't do this 💔";
}
if(event.ctrlKey && (event.key === "K" || event.key === "k")) {
event.preventDefault();
body[0].innerHTML = "sorry, you can't do this 💔";
}
if(event.ctrlKey && (event.key === "U" || event.key === "u")) {
event.preventDefault();
body[0].innerHTML = "sorry, you can't do this 💔";
}
});
// stop right click
document.addEventListener('contextmenu', function(e) {
e.preventDefault();
});
$(window).on('keydown',function(event)
{
if(event.keyCode==123)
{
alert('Entered F12');
return false;
}
else if(event.ctrlKey && event.shiftKey && event.keyCode==73)
{
alert('Entered ctrl+shift+i')
return false;  //Prevent from ctrl+shift+i
}
else if(event.ctrlKey && event.keyCode==73)
{
alert('Entered ctrl+shift+i')
return false;  //Prevent from ctrl+shift+i
}
});
$(document).on("contextmenu",function(e)
{
alert('Right Click Not Allowed')
e.preventDefault();
});
// lightcase plugin init
$('a[data-rel^=lightcase]').lightcase();
// progress bar
$(".progressbar").each(function() {
$(this).find(".bar").animate({
"width": $(this).attr("data-perc")
}, 3000);
$(this).find(".label").animate({
"left": $(this).attr("data-perc")
}, 3000);
});
$('.brand-slider').slick({
infinite: true,
slidesToShow: 5,
slidesToScroll: 1,
autoplay: true,
arrows: false,
responsive: [
{
breakpoint: 1024,
settings: {
slidesToShow: 3
}
},
{
breakpoint: 600,
settings: {
slidesToShow: 2
}
},
{
breakpoint: 480,
settings: {
slidesToShow: 1
}
}
]
});
$('.product-slider').slick({
infinite: true,
slidesToShow: 1,
slidesToScroll: 1,
autoplay: true,
arrows: true,
prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
responsive: [
{
breakpoint: 1024,
settings: {
slidesToShow: 1
}
}
]
});
$(".play-card-body .number-list li").on('click', function() {
$(this).toggleClass("active");
});
// Show or hide the sticky footer button
$(window).on("scroll", function() {
if ($(this).scrollTop() > 200) {
$(".scroll-to-top").fadeIn(200);
} else {
$(".scroll-to-top").fadeOut(200);
}
});
})(jQuery);