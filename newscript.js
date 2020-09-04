 let check ={};

//Verif Saisie de Mail
check['mail'] = function(){
    let mail1 = document.querySelector('#mail'),
    mail2 = document.querySelector('#confirmMail'),
    masque1 = /^[\wa-z0-9_.-]{4,25}@[a-z]{2,12}\.[a-z]{2,4}$/gi;

    if(check.confirmMail() == false){
        mail2.value='';
        check.confirmMail();
    }

    if(mail1.value.length == 0){
        mail1.style.borderColor = '';
        mail2.disabled = true;
        return undefined;
    }
    else if(mail1.value.match(masque1) == null){
        mail1.style.borderColor = 'red';
        mail2.disabled = true;
        return false;
    }
    else{
        mail1.style.borderColor = 'green';
        mail2.disabled = false;
        return true;
    }
};

//Véerif Confirmation de Mail
check['confirmMail'] = function(){
    let confirm = document.querySelectorAll('#mail, #confirmMail');

    if(confirm[1].value.length == 0){
        confirm[1].style.borderColor = '';
        return undefined;
    }
    else if(confirm[0].value != confirm[1].value){
        confirm[1].style.borderColor = 'red';
        return false;
    }
    else{
        confirm[1].style.borderColor = 'green';
        return true;
    }

};
//Verif Saisie mot de Passe
check['mdp'] = function(){

    let password = document.querySelector('#mdp'),
    password2 = document.querySelector('#mdpconfirm'),
    masque1 = /^(?=.*[a-z])(?=.*\d)([\W\w]{8,15})$/g;
    
    if(check.mdpconfirm() == false ){
        password2.value='';
        check.mdpconfirm()
    }
    if(password.value.length == 0){
        password.style.borderColor = '';
        password2.disabled = true;
        return undefined;
    }
    else if(password.value.match(masque1) == null){
        password.style.borderColor = 'red';
        password2.disabled = true;
        return false;
    }
    else{
        password.style.borderColor = 'green';
        password2.disabled = false;
        return true;
    }
};

//Véerif Confirmation mot de passe
check['mdpconfirm'] = function(){
    let confirm = document.querySelectorAll('#mdp, #mdpconfirm')

    if(confirm[1].value.length == 0){
        confirm[1].style.borderColor = '';
        return undefined;
    }
    else if(confirm[0].value != confirm[1].value){
        confirm[1].style.borderColor = 'red';
        return false;
    }
    else{
        confirm[1].style.borderColor = 'green';
        return true;
    }
};

//Verif NOM
check['nom'] = function(id){
    let lenom = document.getElementById(id),
    masque1 = /^[A-Za-zéèâêùç-]{2,25}$/g;

    if(lenom.value.length == 0){
        lenom.style.borderColor = '';
        return undefined;
    }
    else if(lenom.value.match(masque1) == null){
        lenom.style.borderColor = 'red';
        return false;
    }
    else{
        lenom.style.borderColor = 'green';
        return true;
    }
};

//Verif Prenom
check['prenom'] = check['nom'];

//Verif CP
check['CP'] = function(){
    let codepost = document.querySelector('#CP'),
    masque1 = /^[\d]{5}$/g;

    if(codepost.value.length == 0){
        codepost.style.borderColor = '';
        return  undefined;
    }
    else if(codepost.value.match(masque1) == null){
        codepost.style.borderColor = 'red';
        return  false;
    }
    else{
        codepost.style.borderColor = 'green';
        return true;
    }
}; 
//Verif Ville
check['adresse'] = function(){
    let lenom = document.querySelector('#adresse'),
    masque1 = /^[0-9]{1,3} [ A-Za-zéèâêùç-]{4,25}$/g;

    if(lenom.value.length == 0){
        lenom.style.borderColor = '';
        return undefined;
    }
    else if(lenom.value.match(masque1) == null){
        lenom.style.borderColor = 'red';
        return false;
    }
    else{
        lenom.style.borderColor = 'green';
        return true;
    }
};




check['Ville'] = check['nom'];

//Verif Telephone
check['tel'] = function(x,e){
    let lenum = document.querySelector('#tel')
    masque1 = /^0[6197][ \d]{12}$/, masque3 = /[\d]{3}/;

    let anl = {
        pos : ()=> lenum.value.search(masque3),
        part1 : ()=> lenum.value.slice(0,anl.pos()),
        part2 : ()=> lenum.value.slice(anl.pos(),anl.pos()+2) + ' ',
        part3 : ()=> lenum.value.slice(anl.pos()+2),
        };
        
    while(anl.pos()!=-1){
        let p = lenum.value.search(masque3);
        lenum.value = anl.part1() + anl.part2() + anl.part3() ;
        
        if(e.target.value.substring(p-1,p) == ' ' && e.keyCode == '8'){
            lenum.setSelectionRange(p+2,p+3);
        }
        if(e.target.value.substring(p+2,p+3) == ' ' && e.keyCode >= '96' && e.keyCode <= '105'){
            lenum.setSelectionRange(p+4,p+4);
        }
        
    }

    if(lenum.value.length == 0){
        lenum.style.borderColor = '';
        return undefined;
    }
    else if(lenum.value.match(masque1) == null){
        lenum.style.borderColor = 'red';
        return false;
    }
    else{
        lenum.style.borderColor = 'green';
        return true;
    }
};

//Gestionnaire d'évènement 
(function(){
let inputs = document.querySelectorAll('input');
let myForm = document.getElementById('form1');

for(let i=0; i<inputs.length; i++){

    inputs[i].addEventListener('beforeinput',(e) => prevent(e) ); 

    inputs[i].addEventListener('keyup',function(e){
            check[e.target.id](e.target.id,e)
            displayIntero(e);
    });
}

myForm.addEventListener('submit', function(e) {
    
    let result = true;

    for (let i in check) {
        result = check[i](i) && result;
    }

    if (result) {
        let alert1 = 'Bravo ' + document.getElementById('prenom').value + " tu as reussi l'epreuve"
        console.log(alert1)
    }
    else{
        let alert2 = document.getElementById('prenom').value + " rempli moi ca correctement !"
        console.log(alert2)
    }
}); 

})();
 
function prevent(e){
    //CodePostale : Seulement numero + 5 max
    if(e.target.id == 'CP'){
        let valeur = e.target.value.length,
        masque1 = /[0-9]/,
        regex = masque1.test(e.data);
        if((!regex && e.inputType != 'deleteContentBackward') || (valeur ==5 && e.inputType != 'deleteContentBackward')){
            e.preventDefault();
        }
    } 
    //Telephone : Seulement numero + max 10 + espacecementauto
    else if(e.target.id == 'tel'){
        let masque = /[\d]/g,
        test = masque.test(e.data);

        if((!test && e.inputType != 'deleteContentBackward' )|| (e.target.value.match(masque).length == 10 && e.inputType != 'deleteContentBackward')){
            e.preventDefault();
        }
    };
    
} 

//---------------------Les bulles----------------------
function displayIntero(e){

    let selector = '.' + e.target.id + '-intero'
    let imge = document.querySelector(selector)

    if (check[e.target.id](e.target.id) == false && check[e.target.id](e.target.id).display != true){
        imge.style.display = 'block'
        check[e.target.id].display = true
    }
    else if(check[e.target.id](e.target.id) != false)
    {
        imge.style.display = 'none'
        check[e.target.id].display = false
    }
}

class Tooltip {

    static bind (selector) {
        document.querySelectorAll(selector).forEach(element => new Tooltip(element));
    }

    constructor (element){
        this.element = element
        this.title = element.getAttribute('alt')
        this.tooltip = null
        this.element.addEventListener('mouseout',this.mouseOut.bind(this))
        this.element.addEventListener('mouseover',this.mouseOver.bind(this))
    }

    mouseOver(e){
        let tooltip = this.creatTooltip()
        let left = e.pageX
        let top = e.pageY

        tooltip.style.left = left + 'px'
        tooltip.style.top = top + 'px'   
    }

    mouseOut(){
        if (this.tooltip !== null){
            document.body.removeChild(this.tooltip)
            this.tooltip = null
        }           
    }

    creatTooltip (){
        if(this.tooltip === null)
        {
            let tooltip =  document.createElement('div')
            tooltip.innerHTML = this.title
            tooltip.classList.add('class-tooltip')
            document.body.appendChild(tooltip)
            this.tooltip = tooltip
        }
        return this.tooltip
    }
}

Tooltip.bind('img[alt]') 