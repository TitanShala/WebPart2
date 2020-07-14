
const NameR = document.getElementById('Name');
const NrR = document.getElementById('NrRooms');
const formR = document.getElementById('formR');
const ErrorR = document.getElementById('errorR');

const ErrorE = document.getElementById('errorE');
const formE = document.getElementById('formE');
const NameE = document.getElementById('NameDR');
const NrE = document.getElementById('NumberOfRooms');


formR.addEventListener('submit', (e) =>{
	
	let messages = [];
	var NamePattern = /^[A-Za-z. ]{3,30}$/ ;
	var NrPattern = /^[0-9]{1,3}$/;
	

	if(!NamePattern.test(NameR.value)){
		messages.push('Name should be string and length should be between 3 to 20 characters');
	}
	 else if (!NrPattern.test(SpecializationR.value)){
		messages.push('Number of rooms should not contain more than 3 numbers');
	}

    if(messages.length > 0){
		
		e.preventDefault();
		errorR.innerText = messages.join('! ');           
	}})


formE.addEventListener('submit', (e) =>{
	
	let messages = [];
	var NamePattern = /^[A-Za-z. ]{3,30}$/ ;
	var ExperiencePattern = /^[0-9]{1,3}$/;

    if(NameE.value.length > 0){
		if(!NamePattern.test(NameE.value)){
			messages.push('Name should be string and length should be between 3 to 20 characters');
		}
	}
	else if(NrE.value.length > 0){
		if (!NamePattern.test(NrE.value)){
			messages.push('Number should not contain more than 3 numbers');
		}
	}
    if(messages.length > 0){
		
		e.preventDefault();
		errorE.innerText = messages.join('! ');           
	}})    
