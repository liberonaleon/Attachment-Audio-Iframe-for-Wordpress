// AUDIO JS
function CreateSeekBar(){var a=document.getElementById("audioSeekBar");a.min=0,a.value=0}function EndofAudio(){document.getElementById("audioSeekBar").value=0}function audioSeekBar(){var a=document.getElementById("audioSeekBar");audio.currentTime=a.value}function SeekBar(){var a=document.getElementById("audioSeekBar");a.value=audio.currentTime}var audio=document.getElementById("audio-player");audio.onloadedmetadata=function(){var a=document.getElementById("audioSeekBar");a.max=audio.duration;var b=parseInt(audio.duration/60,10),c=parseInt(audio.duration%60);c<10&&(c="0"+c),time=b+":"+c,$("#duration_time").text(time),$("#duration_time_two").text(time)},$(document).ready(function(){$("#play-button").click(function(){$(this).hasClass("unchecked")?($(this).addClass("play-active").removeClass("play-inactive").removeClass("unchecked"),$(".info-two").addClass("info-active"),$("#pause-button").addClass("scale-animation-active"),$(".waves-animation-one, #pause-button, .seek-field, .volume-icon, .volume-field, .info-two").show(),$(".waves-animation-two").hide(),$("#pause-button").children(".icon").addClass("icon-pause").removeClass("icon-play"),setTimeout(function(){$(".info-one").hide()},400),audio.play(),audio.currentTime=0):($(this).removeClass("play-active").addClass("play-inactive").addClass("unchecked"),$("#pause-button").children(".icon").addClass("icon-pause").removeClass("icon-play"),$(".info-two").removeClass("info-active"),$(".waves-animation-one, #pause-button, .seek-field, .volume-icon, .volume-field, .info-two").hide(),$(".waves-animation-two").show(),setTimeout(function(){$(".info-one").show()},150),audio.pause(),audio.currentTime=0)}),$("#pause-button").click(function(){$(this).children(".icon").toggleClass("icon-pause").toggleClass("icon-play"),audio.paused?audio.play():audio.pause()}),$("#play-button").click(function(){setTimeout(function(){$("#play-button").children(".icon").toggleClass("icon-play").toggleClass("icon-cancel")},350)}),$(".like").click(function(){$(".icon-heart").toggleClass("like-active")})}),audio.addEventListener("timeupdate",function(){var a=document.getElementById("duration"),b=parseInt(audio.currentTime%60),c=parseInt(audio.currentTime/60%60);b<10&&(b="0"+b),a.innerHTML=c+":"+b},!1),Waves.init(),Waves.attach("#play-button",["waves-button","waves-float"]),Waves.attach("#pause-button",["waves-button","waves-float"]);
