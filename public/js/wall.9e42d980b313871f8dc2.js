!function(o){function s(i){if(e[i])return e[i].exports;var t=e[i]={i:i,l:!1,exports:{}};return o[i].call(t.exports,t,t.exports,s),t.l=!0,t.exports}var e={};s.m=o,s.c=e,s.i=function(o){return o},s.d=function(o,e,i){s.o(o,e)||Object.defineProperty(o,e,{configurable:!1,enumerable:!0,get:i})},s.n=function(o){var e=o&&o.__esModule?function(){return o.default}:function(){return o};return s.d(e,"a",e),e},s.o=function(o,s){return Object.prototype.hasOwnProperty.call(o,s)},s.p="",s(s.s=1)}({1:function(o,s,e){o.exports=e("Bo+2")},"Bo+2":function(o,s){function e(o,s,e){return s in o?Object.defineProperty(o,s,{value:e,enumerable:!0,configurable:!0,writable:!0}):o[s]=e,o}$(document).ready(function(){$("#section-recent").slick({dots:!0,infinite:!0,slidesToShow:3,slidesToScroll:3,arrows:!1,rows:2,responsive:[{breakpoint:1024,settings:e({slidesToShow:2},"slidesToShow",2)},{breakpoint:600,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]}),$("#section-shared").slick({dots:!0,infinite:!0,slidesToShow:3,slidesToScroll:3,arrows:!1,rows:1,responsive:[{breakpoint:1024,settings:e({slidesToShow:2},"slidesToShow",2)},{breakpoint:600,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]}),$("#section-played").slick({dots:!0,infinite:!0,slidesToShow:3,slidesToScroll:3,arrows:!1,rows:1,responsive:[{breakpoint:1024,settings:e({slidesToShow:2},"slidesToShow",2)},{breakpoint:600,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]}),$("#section-downloaded").slick({dots:!0,infinite:!0,slidesToShow:3,slidesToScroll:3,arrows:!1,rows:1,responsive:[{breakpoint:1024,settings:e({slidesToShow:2},"slidesToShow",2)},{breakpoint:600,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]}),$(".footer-artists-container").slick({dots:!1,infinite:!0,autoplay:!0,autoplaySpeed:5e3,slidesToShow:6,slidesToScroll:6,responsive:[{breakpoint:1024,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:600,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:480,settings:{slidesToShow:2,slidesToScroll:2}}]})})}});