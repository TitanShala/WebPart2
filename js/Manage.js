// JavaScript source code
const formR = document.getElementById('formR');
const formE = document.getElementById('formE');
const formD = document.getElementById('formD');


function RegisterClick(){
        formD.style.display='none'; 
        formE.style.display='none';
        formR.style.display = 'block';	
}

function DeleteClick(){
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