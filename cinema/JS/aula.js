function Filme(autor, nome, valor, nota){
	this.nota = nota;
	this.valor = valor;
	this.autor = autor;
	this.nome = nome;
}
//obtendo elementos do DOM
const info = document.querySelectorAll('#container div p');
const filmes = [];

function criarFilme(){
	const nota = document.querySelector('#nota').value;
	const valor = document.querySelector('#valor').value;
	const autor = document.querySelector('#autor').value;
	const nome = document.querySelector('#nome').value;
	
	const filme= new Filme(autor, nome, valor, nota);
	filmes.push(filme);
	adicionarFilme(filme);
}

function adicionarFilme(filme){
	const container = document.getElementById('container');
	const novo = document.createElement("div");
	
	novo.innerHTML = `
		<p><strong>Nome: </strong>${filme.nome}</p>
		<p><strong>Autor Principal: </strong>${filme.autor}</p>
		<p><strong>Valor: </strong>${filme.valor}</p>
		<p><strong>Nota: </strong>${filme.nota}</p>
	`;
	container.appendChild(novo);
}

//adição de eventos
document.querySelector('.btnDrop').addEventListener('click', function(){
	const dropForm = document.querySelector('.dropForm');
	dropForm.classList.toggle('see');
});

document.querySelector('#nota').addEventListener('input', function(){
	document.querySelector('#rangeValue').textContent = this.value;
});

