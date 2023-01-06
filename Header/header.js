const firstPos = "16%";
const secondPos = "49.6%";
const thirdPos = "82.8%";
const overlayFirstPos = "10%";
const overlaySecondPos = "33%";
const overlayThirdPos = "51%";
const homeOverlayTitleText = "HOME";
const homeOverlayDesc = "VISIT THE HOMEPAGE, HERE YOU WILL BE ABLE TO LEARN MORE ABOUT THIS PLATFORM AND IT'S PURPOSES";
const offerOverlayTitleText = "OFFER A RIDE";
const offerOverlayDesc = "HERE YOU WILL BE ABLE TO ADD YOUR OWN JOURNEY TO THE LIST AND START CARPOOLING";
const joinOverlayTitleText = "JOIN A RIDE";
const joinOverlayDesc = "HERE YOU WILL BE ABLE TO SEARCH FOR THE RIDE THAT BEFITS YOU THE BEST, AND JOIN IN ON A SPECIAL EXPERIENCE";


function checkSelected(selected){
if (selected == 1){
    document.getElementById("home").style.color= '#2992c2';
    indexPos = firstPos;
    overlayIndexPos = overlayFirstPos;
    document.getElementById("overlayTitle").innerHTML = homeOverlayTitleText ;
    document.getElementById("overlayDesc").innerHTML = homeOverlayDesc;
    overlayTitleIndex = homeOverlayTitleText;
    overlayDescIndex =homeOverlayDesc;
    document.getElementById("Offer").style.color= 'rgb(40, 40, 40)';
    document.getElementById("Join").style.color= 'rgb(40, 40, 40)';
    
}else if (selected == 2){
    document.getElementById("Offer").style.color= '#2992c2';
    indexPos = secondPos;
    overlayIndexPos = overlaySecondPos;
    document.getElementById("overlayTitle").innerHTML = offerOverlayTitleText;
    document.getElementById("overlayDesc").innerHTML = offerOverlayDesc;
    overlayTitleIndex = offerOverlayTitleText;
    overlayDescIndex =offerOverlayDesc;
    document.getElementById("home").style.color= 'rgb(40, 40, 40)';
    document.getElementById("Join").style.color= 'rgb(40, 40, 40)';

}else if (selected == 3){
    document.getElementById("Join").style.color= '#2992c2';
    indexPos = thirdPos;
    overlayIndexPos = overlayThirdPos;
    document.getElementById("overlayTitle").innerHTML = joinOverlayTitleText;
    document.getElementById("overlayDesc").innerHTML = joinOverlayDesc;
    overlayTitleIndex = joinOverlayTitleText;
    overlayDescIndex = joinOverlayDesc;
    document.getElementById("home").style.color= 'rgb(40, 40, 40)';
    document.getElementById("Offer").style.color= 'rgb(40, 40, 40)';
}
}
/*onload*/
window.addEventListener("load", function(){
    src = window.location.href;
    if(src.includes('home.php')){
        selected = 1;
    }else if(src.includes('Offer.php')){
        selected = 2;
    }else if(src.includes('search.php')){
        selected = 3;
    }
    checkSelected(selected); document.getElementById("selector").style.left= indexPos; document.getElementById("selector").style.opacity= '1'; document.getElementById("overlay").style.left= overlayIndexPos;
    if (selected == 1){  document.getElementById("overlayTitle").innerHTML = homeOverlayTitleText;document.getElementById("overlayDesc").innerHTML = homeOverlayDesc;
}else if(selected == 2){ document.getElementById("overlayTitle").innerHTML = offerOverlayTitleText;document.getElementById("overlayDesc").innerHTML = offerOverlayDesc;
}else if(selected == 3){document.getElementById("overlayTitle").innerHTML = joinOverlayTitleText;document.getElementById("overlayDesc").innerHTML = joinOverlayDesc;}
    
document.getElementById("overlay").style.transition= 'left 0.25s';});
/*onclick*/
document.getElementById("home").addEventListener("click", function(){selected = 1; checkSelected(selected)});
document.getElementById("Offer").addEventListener("click", function(){selected = 2; checkSelected(selected)});
document.getElementById("Join").addEventListener("click", function(){selected = 3; checkSelected(selected)});

/*onmouseover*/
/*items*/
document.getElementById("homeitem").addEventListener("mouseover", function(){
    document.getElementById("selector").style.left= firstPos;
    document.getElementById("selector").style.transition= 'left 0.25s';
    document.getElementById("overlay").style.left= overlayFirstPos;
    document.getElementById("overlayTitle").innerHTML = homeOverlayTitleText ;
    document.getElementById("overlayDesc").innerHTML = homeOverlayDesc;
    document.getElementById("overlay").style.transition= 'left 0.25s';

});
document.getElementById("Offeritem").addEventListener("mouseover", function(){
    document.getElementById("selector").style.left= secondPos;
    document.getElementById("selector").style.transition= 'left 0.25s';
    document.getElementById("overlay").style.left= overlaySecondPos;
    document.getElementById("overlayTitle").innerHTML = offerOverlayTitleText ;
    document.getElementById("overlayDesc").innerHTML = offerOverlayDesc;
    document.getElementById("overlay").style.transition= 'left 0.25s';
});
document.getElementById("Joinitem").addEventListener("mouseover", function(){
    document.getElementById("selector").style.left= thirdPos;
    document.getElementById("selector").style.transition= 'left 0.25s';
    document.getElementById("overlay").style.left= overlayThirdPos;
    document.getElementById("overlayTitle").innerHTML = joinOverlayTitleText ;
    document.getElementById("overlayDesc").innerHTML = joinOverlayDesc;
    document.getElementById("overlay").style.transition= 'left 0.25s';
});


/*links*/
document.getElementById("home").addEventListener("mouseover", function(){
    document.getElementById("home").style.color= 'rgb(107, 194, 245)';
});
document.getElementById("Offer").addEventListener("mouseover", function(){
    document.getElementById("Offer").style.color= 'rgb(107, 194, 245)';
});
document.getElementById("Join").addEventListener("mouseover", function(){
    document.getElementById("Join").style.color= 'rgb(107, 194, 245)';
});


/*onmouseout*/

/*items*/
document.getElementById("homeitem").addEventListener("mouseout", function(){
    document.getElementById("selector").style.left= indexPos;
    document.getElementById("selector").style.transition= 'left 0.25s';
    document.getElementById("overlay").style.left= overlayIndexPos;
    document.getElementById("overlayTitle").innerHTML = overlayTitleIndex ;
    document.getElementById("overlayDesc").innerHTML = overlayDescIndex;
    document.getElementById("overlay").style.transition= 'left 0.25s';

});
document.getElementById("Offeritem").addEventListener("mouseout", function(){
    document.getElementById("selector").style.left= indexPos;
    document.getElementById("selector").style.transition= 'left 0.25s';
    document.getElementById("overlay").style.left= overlayIndexPos;
    document.getElementById("overlayTitle").innerHTML = overlayTitleIndex ;
    document.getElementById("overlayDesc").innerHTML = overlayDescIndex;
    document.getElementById("overlay").style.transition= 'left 0.25s';


});
document.getElementById("Joinitem").addEventListener("mouseout", function(){
    document.getElementById("selector").style.left= indexPos;
    document.getElementById("selector").style.transition= 'left 0.25s';
    document.getElementById("overlay").style.left= overlayIndexPos;
    document.getElementById("overlayTitle").innerHTML = overlayTitleIndex ;
    document.getElementById("overlayDesc").innerHTML = overlayDescIndex;
    document.getElementById("overlay").style.transition= 'left 0.25s';


});

/*links*/
document.getElementById("home").addEventListener("mouseout", function(){
    if (selected != 1) {
    document.getElementById("home").style.color= 'rgb(40, 40, 40)';
    }else{
        document.getElementById("home").style.color= '#2992c2';
    }
});
document.getElementById("Offer").addEventListener("mouseout", function(){
    if (selected != 2) {
        document.getElementById("Offer").style.color= 'rgb(40, 40, 40)';
        }else{
            document.getElementById("Offer").style.color= '#2992c2';
        }
});
document.getElementById("Join").addEventListener("mouseout", function(){
    if (selected != 3) {
        document.getElementById("Join").style.color= 'rgb(40, 40, 40)';
        }else{
            document.getElementById("Join").style.color= '#2992c2';
        }
});