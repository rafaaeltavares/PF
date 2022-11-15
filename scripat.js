
var div = document.getElementById('anm');
//textos que vao aparecer no titulo
var textos = ['conhecimento','amizades.','informação.', 'um futuro.'];

function escrever(palavra, done) {
    var char = palavra.split('').reverse();
    var typer = setInterval(function() {
        if (!char.length) {
            clearInterval(typer);
            return setTimeout(done, 1000); // só para esperar um bocadinho
        }
        var prox = char.pop();
        div.innerHTML += prox;
    }, 190);
}
// vamos construir educação 
function limpar(done) {
    var char = div.innerHTML;
    var nr = char.length;
    var typer = setInterval(function() {
        if (nr-- == 16) {
            clearInterval(typer);
            return done();
        }
        div.innerHTML = char.slice(0, nr);//numero de caracteres
    }, 100);
}

function rodape(conteudos) {
    var atual = -1;
	function prox(cb){
		if (atual < conteudos.length - 1) atual++;
		else atual = 0;
		var palavra = conteudos[atual];
		escrever(palavra, function(){
			limpar(prox);
		});
	}
	prox(prox);
}
rodape(textos);

