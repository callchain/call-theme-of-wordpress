var n=0;
var next=function(){
    if(n<$('.loop-wrap li').length){
        $('.loop-wrap ul').css('left',-360*n+'px');
    }else{

    }
}
// $('.loop-wrap .to-right').on('click',function(){
//     if(n<$('.loop-wrap li').length-1){n++;}
//     next();
// })
// $('.loop-wrap .to-left').on('click',function(){
//     if(n>0){n--;}
//     next();
// })
// setInterval(function(){
//     if(n<$('.loop-wrap li').length-1){n++;}else{
//         n=0;
//     }
//     next();
// },2000);