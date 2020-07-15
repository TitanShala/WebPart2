// JavaScript source code

const NameR = document.getElementById('NameR');
const SurnameR = document.getElementById('SurnameR');
const ExperienceR = document.getElementById('ExperienceR');
const SpecializationR = document.getElementById('SpecializationR');
const errorElement = document.getElementById('error');

const errorElementE = document.getElementById('errorE');
const IdE = document.getElementById('IdE');
const NameE = document.getElementById('NameE');
const SurnameE = document.getElementById('SurnameE');
const ExperienceE = document.getElementById('ExperienceE');
const SpecializationE = document.getElementById('SpecializationE');

const errorElementD = document.getElementById('errorD');
const IdD = document.getElementById('IdD');

formR.addEventListener('submit', (e) =>{
	
	let messages = [];
	var NamePattern = /^[A-Za-z. ]{3,30}$/ ;
	var ExperiencePattern = /^[0-9]{1,2}$/;
	
	if(!NamePattern.test(NameR.value)){
		messages.push('Name should be string and length should be between 3 to 20 characters');
	}
	 else if (!NamePattern.test(SurnameR.value)){
		messages.push('Surname should be string and length should be between 3 to 20 characters');
	}
	 else if (!NamePattern.test(SpecializationR.value)){
		messages.push('Specialization should be string and length should be between 3 to 20 characters');
	}
	 else if(!ExperiencePattern.test(ExperienceR.value)){
		messages.push('Experience should be typed as integer and can not contatin more than 2 numbers');
	}

    if(messages.length > 0){
		
		e.preventDefault();
		errorElement.innerText = messages.join('! ');           
	}})


formE.addEventListener('submit', (e) =>{

	let messages = [];
	var NotNull = /^[A-Za-z. ]{3,30}$/ ;
	var NamePattern = /^[A-Za-z. ]{3,30}$/ ;
	var ExperiencePattern = /^[0-9]{1,2}$/;

	if(NameE.value.length > 0){
		console.log('Name not null');
		if(!NamePattern.test(NameE.value)){
			console.log('Name not correct');
			messages.push('Name should be string and length should be between 3 to 20 characters');
		}
	}
	else if(SurnameE.value.length > 0){
		if (!NamePattern.test(SurnameE.value)){
			messages.push('Surname should be string and length should be between 3 to 20 characters');
		}
	}
	else if(SpecializationE.value.length > 0){
		 if (!NamePattern.test(SpecializationE.value)){
			messages.push('Specialization should be string and length should be between 3 to 20 characters');
		}
	}
	else if(ExperienceE.value.length > 0){
		if(!ExperiencePattern.test(ExperienceE.value) == true){
			messages.push('Experience should be typed as integer and can not contatin more than 2 numbers');

		}
	}else{
		messages.push('Please fill one of the fields');
	}


    if(messages.length > 0){
		
		e.preventDefault();
		errorElementE.innerText = messages.join('! ');           
	}}
)
	

