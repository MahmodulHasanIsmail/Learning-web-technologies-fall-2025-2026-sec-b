document.getElementById('btn3').addEventListener('click',gencheck)


function gencheck(){
    let genmale=document.getElementById('m').checked ;
    let gefenmale=document.getElementById('f').checked ;
    let genother=document.getElementById('o').checked ;
    let msg=document.getElementById('emsg');
    let hmsg=document.getElementById('hmsg');

    if (!genmale && !genmale && !genother){
        msg.innerHTML="At least one of them has to be selected!"
        msg.style.color="red";
        hmsg.innerHTML="select your gender."
        hmsg.style.color="green";
        return;

    }
    else {
        document.getElementById('form3').submit();
    }


}