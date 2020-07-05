// JavaScript source code



window.onload = function(){

var conditionb = localStorage.getItem("logincondition") ;
console.log('vlera e marre eshte '+conditionb);

var signin = document.querySelector('.SignInNav');
var signout = document.querySelector('.SignOutNav');
            
if(conditionb == null){
console.log('IF I REALIZUAR == null');
    signin.style.display='block';
    signout.style.display='none';
}

if(conditionb == false){
console.log('IF I REALIZUAR == false');
    signin.style.display='block';
    signout.style.display='none';
}


if(conditionb === 'true'){
    console.log('IF I REALIZUAR == true');
    signin.style.display='none';
    signout.style.display='block';
}

}