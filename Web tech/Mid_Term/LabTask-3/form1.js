document.getElementById('btn1').addEventListener('click', Test)

function Test() {
    let username = document.getElementById('username').value;
    let msg = document.getElementById('uError');
    let pmsg = document.getElementById('pError');
    let st = username[0];

    if (username == "") {
        msg.innerHTML = "username cannot be empty!";
        pmsg.innerHTML = "Enter Your username.";
        msg.style.color = "red";
        pmsg.style.color = "green";
        return;


    }
    else if (username.length <= 1) {
        msg.innerHTML = "username must contain at least two words!";
        msg.style.color = "red";
        pmsg.innerHTML = "use atleast two word.";
        pmsg.style.color = "green";
        return;


    }
    else if (!((st >= 'A' && st <= 'Z') || (st >= 'a' && st <= 'z'))) {
        msg.innerHTML = "username must start with a letter!";
        msg.style.color = "red";
        return;
    }
    else
    {

    for (let c of username) 
     {
        if (!(
            (c >= 'A' && c <= 'Z') ||
            (c >= 'a' && c <= 'z') ||
            c === '.' ||
            c === '-'
        )) {
            msg.innerHTML = "username can contain only letters, dot(.) or dash(-)!";
            msg.style.color = "red";
            return;
        }
     }
      document.getElementById("form1").submit();
    }
}