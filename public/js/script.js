var width = 100,heigth=100;
var canvas=null, ctx=null, x=50, y=50, z=0;
var bandera=false;
var bandera1=false;
var bandera2=false;
var bandera3=false;
var y1=10, y2=20, y3=30;
var x1=50, x2=70, x3=110;
var img1 =new Image(), img2=new Image();
//var img = new Image();
window.requestAnimationFrame=(function (){
   return window.requestAnimationFrame ||
           window.mozRequestAnimationFrame ||
           window.webkitRequestAnimationFrame ||
           function (callback){
               window.setTimeout(callback,17);
   }
}());
function paint(ctx){   
   
    ctx.fillStyle='#0A0';
    ctx.fillRect(0,0,width,heigth);
    
    ctx.fillStyle='#0f0';   
    ctx.fillRect(x1,y1,20,20);
    
    if(bandera){
    ctx.font="2.5em Showcard Gothic ";
    ctx.textAling="Center";    
    ctx.fillStyle= '#ABC';     
    ctx.fillText("Explore Nimarí",(width/2-170),heigth/2+10);
    }else{
    ctx.font="2em Showcard Gothic ";
    ctx.textAling="Center";    
    ctx.fillStyle= '#000';     
    ctx.fillText("Explore Nimarí",(width/2-150),heigth/2+10);
}
    ctx.fillStyle='#ABC';
    ctx.fillRect(x2,y2,15,15);
    
    ctx.fillStyle='#A12';
    ctx.fillRect(x3,y3,10,10);
    
    img=new Image();
    img.src='bino.jpg';
    ctx.drawImage(img,x3,y3,30,30);
    
    
}

function aroundy1() {
    x1 += 3;
    if (x1 > canvas.width) {
        x1 = 0;
    }
    if (y1 > 50) {
        bandera1 = false;
    }
    if (y1 < 1) {
        bandera1 = true;
    }

    if (bandera1) {
        y1++;

    } else {
        y1--;

    }
    
    aroundy2();

}
function aroundy2() {
    x2 += 2;
    if (x2 > canvas.width) {
        x2 = 0;
    }
    if (y2 > 50) {
        bandera2 = false;
    }
    if (y2 < 10) {
        bandera2 = true;
    }

    if (bandera2) {
        y2++;

    } else {
        y2--;

    }   
    
}
function aroundy3() {
    x3 += 2;
    if (x3 > canvas.width) {
        x3 = 0;
    }
    if (y3 > 50) {
        bandera3 = false;
    }
    if (y3 < 5) {
        bandera3 = true;
    }

    if (bandera3) {
        y3++;

    } else {
        y3--;
    }   

}
function aroundZ() {
    
    
    if (z > 10) {
        bandera = false;
    }
    if (z < 1) {
        bandera = true;
    }

    if (bandera3) {
        z++;

    } else {
        z--;
    }   

}

function update() {
    heigth = canvas.height;
    width = canvas.width;
    aroundy1();
    aroundy2();
    aroundy3();
    aroundZ();
    

}
function run(){
    window.requestAnimationFrame(run);
    update();
    paint(ctx);
}




function init(){
    
    canvas=document.getElementById('mycanvas');
    ctx=canvas.getContext('2d');
    run();
}
window.addEventListener('load', init, false);