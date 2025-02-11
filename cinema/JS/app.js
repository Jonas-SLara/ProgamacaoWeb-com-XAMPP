/*classe feita para implementar a navbar para mobile*/
class MobileNavbar{
	
	constructor(mobileMenu, navList, navLinks){
		this.mobileMenu=document.querySelector(mobileMenu);
		this.navList=document.querySelector(navList);
		this.navLinks=document.querySelectorAll(navLinks);
		this.activeClass= "active";
		
		this.handleClick = this.handleClick.bind(this);
	}
	
	animateLinks(){
		this.navLinks.forEach((link, index) => {
			link.style.animation
				?(link.style.animation="")
				:(link.style.animation=`navLinkFade 0.5s ease forwards ${index / 5 + 0.3}s`); 
		});
	}
	
	handleClick(){
		this.navList.classList.toggle(this.activeClass);
		this.animateLinks();
	}
	
	//adiciona o evento click ao elemento com a classe .mobile-menu
	addClickEvent(){
		//aqui o this se refere ao objeto da classe
		this.mobileMenu.addEventListener("click", this.handleClick);
	}
	
	//adiciona o evento click quando existir mobileMenu
	init(){
		if(this.mobileMenu){
			this.addClickEvent();
		}
		return this;
	}
}

//inicializa o menu mobile
const mobileNavbar = new MobileNavbar(
	".menu-mobile",
	".nav-list",
	".nav-list li",
);

mobileNavbar.init();

/*implementação do carrosel de imagens e botoes*/

class Carrosel{
	constructor(data_botoes=null, slides=null){
		/*data_botoes se refere aos botoes com data-attribut
		assim como slide ativo tambem tem um data-attibut para identificar*/
		this.data_botoes = data_botoes ? document.querySelectorAll(data_botoes) : null;
		this.slides = slides ? document.querySelector(slides) : null;
		this.ativo = this.slides ? this.slides.querySelector("[data-ativo]") : null;			
		console.log(this.data_botoes);
		console.log(this.slides);
		console.log(this.ativo)
	}
	
	iniciar(){
		if(this.data_botoes){
			this.data_botoes.forEach(btn => {
			btn.addEventListener("click", (evento)=>{
					this.mover(evento);
					console.log(evento.target);
				});
			});
		}
	}
	
	mover(evento){//usar evento.target para obter o botao
		//obtem o index do slide ativo
		let indexAtivo = Array.from(this.slides.children).indexOf(this.ativo);
		console.log(indexAtivo);
		indexAtivo = evento.target.dataset.botao === "next"
			? indexAtivo + 1
			: indexAtivo - 1;
			
		//realiza a verificação de indice
		if(indexAtivo < 0){
			indexAtivo = this.slides.children.length -1;
		}
		else if(indexAtivo >= this.slides.children.length){
			indexAtivo=0;
		}
		console.log(indexAtivo);
		this.ativo.removeAttribute("data-ativo");//retirar o atributo ativo
		this.ativo = this.slides.children[indexAtivo];//mudar a referencia ao objeto de slide
		this.ativo.setAttribute("data-ativo", "");//definir esta nova referencia com ativo
	}
}

const imagens_slide = new Carrosel('[data-botao]', '.slides');
imagens_slide.iniciar();


/*implementação de efeito ripple para botoes*/
class RippleEffect{
	constructor(classe_ripple){
		this.buttons = document.querySelectorAll(classe_ripple);
		this.init();
	}
	//função init para adicionar o efeito a cada botão
	init(){
			this.buttons.forEach(button =>{
			button.addEventListener("click", (event) => this.createRipple(event, button))});
	}
	//cria o efeito no botao
	createRipple(event, button){
		const ripple = document.createElement('span');
		ripple.classList.add('ripple');
		
		//obtem as coordeadas do botao na tela
		const rect = button.getBoundingClientRect();
		const x = event.clientX - rect.left;
		const y = event.clientY - rect.top;
		
		ripple.style.left=`${x}px`;
		ripple.style.top=`${y}px`;
		
		button.appendChild(ripple);
		//remover efeito apos 600ms
		setTimeout(()=>ripple.remove(), 600);
	}
}

new RippleEffect('.ripple-button');