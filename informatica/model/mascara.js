function cpf(ob){
    const v=ob.value.split("");
    if(isNaN(v[v.length-1]))
    {   
        //limpa os caracteres não numeros quando digitado
        v.splice(v.length-1, 1);
        ob.value=v.join('');
    }
    else
    {
        if(v.length==4 || v.length==8)
        {
            let temp=v.pop();
            v.push(".");
            v.push(temp);
            ob.value=v.join('');
        }
        else if(v.length==12)
        {
            let temp=v.pop();
            v.push("-");
            v.push(temp);
            ob.value=v.join('');
        }
    }
}

document.getElementById('cpf').addEventListener(
    'keyup', function(){cpf(this)}
);