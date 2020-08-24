function procurarProdututos(categoria){
    var url = 'https://api.mercadolibre.com/sites/MLB/search?category=' + categoria;
    var configuracoes = {method: 'get'};
    
    fetch(url, configuracoes).then(function (resposta){
        return resposta.json();
    }).then(function(resposta){
        
        var produtos = resposta.results;
        
        for(var i = 0; i < produtos.length; i++){
            var div1 = document.createElement('div');
            div1.setAttribute('class', 'team-item  mb-5 card');
            var div2 = document.createElement('div');
            div2.setAttribute('class', 'item-image card-img');

            div1.appendChild(div2);

            var img1 = document.createElement('img');
            img1.setAttribute('src', produtos[i].thumbnail);
            div2.appendChild(img1);
            var p = document.createElement('p');
            var textoParagrafo = document.createTextNode(produtos[i].title);
            p.appendChild(textoParagrafo);
            div1.appendChild(p);
            
            document.getElementById('container').appendChild(div1);
        }
    });
}

var MLB1430 = document.getElementById('MLB1430');
MLB1430.addEventListener('click', function(){
    procurarProdututos(this.id);
})

var MLB1368= document.getElementById('MLB1368');
MLB1368.addEventListener('click',function(){

    procurarProdututos(this.id);

});
