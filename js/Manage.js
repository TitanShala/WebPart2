// JavaScript source code
const formR = document.getElementById('formR');
const formE = document.getElementById('formE');
const formD = document.getElementById('formD');


function RegisterClick(){

       // DeleteForm.style.visibility = "hidden";
       // RegisterForm.style.visibility = "visible";
        formD.style.display='none'; 
        formE.style.display='none';
        formR.style.display = 'block';	

}

function DeleteClick(){
        
        // var DeleteForm = document.querySelector('.DeleteForm');
        // var RegisterForm = document.querySelector('.RegisterForm');
        // var EditForm = document.querySelector('.EditForm');
        //RegisterForm.style.visibility = "hidden";
        //DeleteForm.style.visibility = "visible";

        formR.style.display = 'none';
        formD.style.display='block'; 
        formE.style.display='none';
        	

}

function cancelEdit(){
        document.getElementById('idE').value = '';
        document.getElementById('NameE').value = '';
        document.getElementById('SurnameE').value = '';
        document.getElementById('ExperienceE').value = '';
        document.getElementById('SpecializationE').value = '';
        document.getElementById('errorE').value = '' ; 
            
}

function cancelRegister(){
        
        document.getElementById('NameR').value = '';
        document.getElementById('SurnameR').value = '';
        document.getElementById('ExperienceR').value = '';
        document.getElementById('SpecializationR').value = '';
        document.getElementById('error');
} 

function cancelDelete(){
        document.getElementById('idD').value = ''; 
        document.getElementById('errorD');    
}

function EditClick(){
        // var DeleteForm = document.querySelector('.DeleteForm');
        // var RegisterForm = document.querySelector('.RegisterForm');
        // var EditForm = document.querySelector('.EditForm');
        formR.style.display ='none';
        formD.style.display='none'; 
        formE.style.display='block';

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