// JavaScript source code



function RegisterClick(){

        var DeleteForm = document.querySelector('.DeleteForm');
        var RegisterForm = document.querySelector('.RegisterForm');
        var EditForm = document.querySelector('.EditForm');
       // DeleteForm.style.visibility = "hidden";
       // RegisterForm.style.visibility = "visible";
       DeleteForm.style.display='none'; 
       EditForm.style.display='none';
        RegisterForm.style.display = 'flex';	

}

function DeleteClick(){

        var DeleteForm = document.querySelector('.DeleteForm');
        var RegisterForm = document.querySelector('.RegisterForm');
        var EditForm = document.querySelector('.EditForm');
        //RegisterForm.style.visibility = "hidden";
        //DeleteForm.style.visibility = "visible";
        RegisterForm.style.display = 'none';
        DeleteForm.style.display='flex'; 
        EditForm.style.display='none';
        	

}

function EditClick(){
        var DeleteForm = document.querySelector('.DeleteForm');
        var RegisterForm = document.querySelector('.RegisterForm');
        var EditForm = document.querySelector('.EditForm');

        RegisterForm.style.display = 'none';
        DeleteForm.style.display='none'; 
        EditForm.style.display='flex';

}