var canvas= null, ctx=null, x=50, y=50;
window.requestAniamtionFrame=(
        function ( ){
           return window.requestAniamtionFrame || 
                   window.mozRequestAnimationFrame ||
                   window.webkitRequestAnimationFrame ||
                   function (callback){
                       window.setTimeout(callback,17);
           };
        }()//funtion
        );//request
        
function paint(ctx){
    ctx.fillStyle="#999";
    ctx.fillRect(0,0,canvas.width,canvas.height);
    
    ctx.fillStyle="#000";
    ctx.fillRect(10,10,10,10);
    
    ctx.fillStyle="#0f0";
    ctx.fillRect(x,y,10,10);
}//paint

function update(){
    x+=2;
    if(x>canvas.width){
        x=0;
    }//if
}//update
function run(){
    window.requestAniamtionFrame(run);
    update();
    paint(ctx);
}//run

function init(){
    canvas=document.getElementById('canvas');
    ctx=canvas.getContext('2d');
    //paint(ctx);
    run();
}//init}
window.addEventListener('load',init,false);