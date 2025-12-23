document.getElementById('btn2').addEventListener('click',emailcheck)

function emailcheck(){
    let email= document.getElementById('email').value;
    let msg= document.getElementById('Eerror');
    let smsg= document.getElementById('btnmsg');

    if (email== ""){
        msg.innerHTML= "Email field cannot be empty!";
        msg.style.color="red";
        smsg.innerHTML= "Enter your email address here.";
        smsg.style.color="green";
        return;
    }
   let atpos =-1;
   let count = 0;
   let dotpos =-1;

   for ( let i=0;i<email.length;i++){
    if (email[i]==='@'){
        count++;
        atpos= i;
    }

   }
   for (let i=atpos +1;i<email.length;i++){
        if (email[i]==='.'){
            dotpos=i;
            break;
        }
    }

    if (atpos===0|| atpos ===email.length-1||count !==1|| dotpos===-1
        || dotpos === email.length -1|| dotpos === atpos+1

    )
    {
        msg.innerHTML= "Invalid Email Address!";
        msg.style.color="red";
        smsg.innerHTML= "Try entering the correct format.(i.e anything@example.com) ";
        smsg.style.color="green";
        return;
    }

    else {
        document.getElementById('form2').submit();
    }



}