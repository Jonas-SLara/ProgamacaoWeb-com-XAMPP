//classe para validação de inputs, não precisa ter todas obrigatoriamente

class validacao{
	constructor(submit, CPF=null, senha=null, msgSenha=null, telefone=null){
		this.submit=document.querySelector(submit);//querySelector retorna null quando não existe
		if(!this.submit){
			throw new Error("botão de submit é obrigatório");
		}
		
		this.CPF = CPF ? document.querySelector(CPF) : null;
		this.senha = senha ? document.querySelector(senha) : null;
		this.msgSenha = msgSenha ? document.querySelector(msgSenha) : null;
		this.telefone = telefone ? document.querySelector(telefone) : null;
		this.inicializar();
	}
	
	//adiciona os eventos e funções a cada elemento de validação
	//ela não adicionara eventos para elementos que não existem
	inicializar(){
		if(this.CPF){
			this.CPF.addEventListener("input", (evento) => this.validarCPF(evento));
		}
		if(this.senha){
			this.senha.addEventListener("input", (evento) => this.validarSenha(evento.target));
		}
		if(this.telefone){
			this.telefone.addEventListener("input", (evento) => this.validarTelefone(evento));
		}
		if(this.submit){
			this.submit.addEventListener("click", (evento) => this.validarTudo(evento));
		}
		
	}
	
	validarTelefone(evento){
		let valor=evento.target.value.replace(/\D/g, '');//tira tudo que não for numero
		
		if(valor.length > 11){//corta caso passe do limite
			valor=valor.slice(0, 11);
		}
		
		evento.target.style.boxShadow = valor.length===11 ? '2px 0 5px green' : '2px 0 5px red';
		
		if (valor.length > 10) {
       valor = valor.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3'); // Formato com 9 dígitos
     } else if (valor.length > 6) {
       valor = valor.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3'); // Formato com 8 dígitos
     } else if (valor.length > 2) {
       valor = valor.replace(/(\d{2})(\d{0,5})/, '($1) $2'); // Apenas DDD e início do número
     } else {
       valor = valor; // Apenas o DDD
     }
	 
		evento.target.value=valor;
	}
	
	validarCPF(evento){
		let valor=evento.target.value;
		let cpf_formatado="";
		
		valor=valor.replace(/\D/g, "");
		valor=valor.slice(0, 11);//limita a quantidade para ate 11 numeros
		
		
		for(let i=0; i<valor.length; i++){
			if(i==3 || i==6){
				cpf_formatado+='.';
			}
			if(i==9){
				cpf_formatado+='-';
			}
			cpf_formatado+=valor[i];
		}
		evento.target.value=cpf_formatado;
		
		//quando atingir o seu final verifica se este cpf é valido
		if(valor.length==11){
			if(this.cpfEvalido(valor)){
				evento.target.style.boxShadow='2px 0 5px green';
			}
			else{
				evento.target.style.boxShadow='2px 0 5px red';
			}
		}
		else{
			evento.target.style.boxShadow='2px 0 5px red';
		}
	}
	
	cpfEvalido(valor){//algoritmo de validação de cpf  
		let soma =0, resto;
		if (/^(\d)\1{10}$/.test(valor)) return false;

		//obtendo o primeiro digito verificador com a soma dos produtos dos 9 digitos
		for(let i=1; i<=9; i++)soma += parseInt(valor[i-1]) * i;
		resto = soma%11;
		if(resto >= 10) resto = 0;
		console.log(resto);
		if(resto != parseInt(valor[9]))return false;
		
		//obtendo o segundo digito verificador apartir dos 9digitos + o primeiro
		
		soma=0;
		for(let i=0; i<=9; i++)soma += parseInt(valor[i]) * i;
		resto = soma%11;
		if(resto >= 10) resto = 0;
		console.log(resto);
		if(resto != parseInt(valor[10]))return false;
		
		return true;
	}
	
	validarSenha(senha){
		let valor = senha.value;
		try{
			if(valor.length < 6) throw "a senha não pode ter menos que 6 caracteres";
			if(!/[A-Z]/.test(valor)) throw "a senha deve ter pelo menos uma letra maiuscula";
			if(!/[a-z]/.test(valor)) throw "a senha deve ter pelo menos uma letra minuscula";
			if(!/[0-9]/.test(valor)) throw "a senha deve conter digitos";
			if(!/[\W_]/.test(valor)) throw "a senha deve ter pelo menos um caractere especial";
			if(/\s/.test(valor)) throw "a senha não deve conter espaços";
			//caso exista a mensagem span para senha definida no construtor
			if(this.msgSenha)this.msgSenha.innerHTML='';
			
			senha.style.boxShadow='2px 0 5px green';
			return true;
		}
		catch(erro){
			if(this.msgSenha)this.msgSenha.innerHTML=erro;
			senha.style.boxShadow='2px 0 5px red';
			return false;
		}
	}
	
	validarTudo(evento){
		if(this.CPF){//se existir um campo cpf
			let valorCPF=this.CPF.value.replace(/\D/g, "");
			if(valorCPF.length != 11 || !this.cpfEvalido(valorCPF)){
				evento.preventDefault();
				alert("o CPF que voce inseriu é inválido");
				return false;
			}
		}
		
		if(this.senha){
			if(!this.validarSenha(this.senha)){
				evento.preventDefault();
				alert("a senha não combina com o padrão");
				return false;
			}
		}
		
		if(this.telefone){
			let valor = this.telefone.value.replace(/\D/,);
			if(!.length===15){
				evento.preventDefault();
				alert("o telefone não combina com o padrão");
				return false;
			}
		}
		alert("dados válidos");
		return true;
	}
}

const formulario = new validacao("#submit", "#cpf", "#senha", "#msgSenha", "#telefone");