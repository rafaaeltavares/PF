const botao = document.querySelector('.myButton')
const post  = document.querySelector('.formulario')

botao.addEventListener('click', function(){
    post.classList.add('aparecer')
    botao.classList.add('sumir')
    // botao.classList.add('sumir');
})