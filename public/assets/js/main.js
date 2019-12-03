
(function(){

    let forms=document.querySelectorAll('.elimina')
    for (var i = forms.length; i--; ) {
       forms[i].addEventListener('click',function (event){
           let confirma=confirm('¿Estas seguro de borrarlo?');
            if(!confirma){
                event.preventDefault();
            }
       });
    }

    console.log($('#json').value);
})();