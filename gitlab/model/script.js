function telefone(ob){
    const v=ob.value.split("");
    if(isNaN(v[v.length-1]))
    {   
        //limpa os caracteres não numeros quando digitado
        v.splice(v.length-1, 1);
        ob.value=v.join('');
    }
    else
    {
        if(v.length==1)
        {
            let temp=v.pop();
            v.push("(");
            v.push(temp);
            ob.value=v.join('');
        }
        else if(v.length==4)
        {
            let temp=v.pop();
            v.push(") ");
            v.push(temp);
            ob.value=v.join('');
        }
        else if(v.length==11){
            let temp=v.pop();
            v.push("-");
            v.push(temp);
            ob.value=v.join('');
        }
    }
}

document.getElementById('telefone').addEventListener(
    'keyup', function(){telefone(this)}
);