// JavaScript source code



function RegisterClick(){

        var DeleteForm = document.querySelector('.DeleteForm');
        var RegisterForm = document.querySelector('.RegisterForm');
        var EditForm = document.querySelector('.EditForm');
       // DeleteForm.style.visibility = "hidden";
       // RegisterForm.style.visibility = "visible";
       DeleteForm.style.display='none'; 
       EditForm.style.display='none';
        RegisterForm.style.display = 'block';	

}

function DeleteClick(){
        
        var DeleteForm = document.querySelector('.DeleteForm');
        var RegisterForm = document.querySelector('.RegisterForm');
        var EditForm = document.querySelector('.EditForm');
        //RegisterForm.style.visibility = "hidden";
        //DeleteForm.style.visibility = "visible";
        RegisterForm.style.display = 'none';
        DeleteForm.style.display='block'; 
        EditForm.style.display='none';
        	

}

function cancelEdit(){
        document.getElementById('idE').value = '';
        document.getElementById('NameE').value = '';
        document.getElementById('SurnameE').value = '';
        document.getElementById('ExperienceE').value = '';
        document.getElementById('SpecializationE').value = ''; 
            
}

function cancelRegister(){
        
        document.getElementById('Name').value = '';
        document.getElementById('Surname').value = '';
        document.getElementById('Experience').value = '';
        document.getElementById('Specialization').value = '';
} 

function cancelDelete(){
        document.getElementById('idD').value = '';     
}

function EditClick(){
        var DeleteForm = document.querySelector('.DeleteForm');
        var RegisterForm = document.querySelector('.RegisterForm');
        var EditForm = document.querySelector('.EditForm');

        RegisterForm.style.display ='none';
        DeleteForm.style.display='none'; 
        EditForm.style.display='block';

}

function CancelDepReg(){
        document.getElementById('Name').value = '';
        document.getElementById('NrRoom').value = '';

}

function CancelDepEdit(){
        document.getElementById('idDR').value = '';
        document.getElementById('NumberOfRooms').value = '';
        document.getElementById('NameDR').value = '';
        document.getElementById('NrRoom').value = '';
}

function CancelDepDel(){
        document.getElementById('idDep').value = '';
}