// JavaScript source code

const name = document.getElementById('name');
const day = document.getElementById('day');
const month = document.getElementById('month');
const year = document.getElementById('year');
const time= document.getElementById('time');
const form= document.getElementById('form');
const errorElement = document.getElementById('error');
const rbs = document.querySelectorAll('input[name="dept"]');

var today = new Date() ;
var actualyear = today.getFullYear();

form.addEventListener('submit', (e) =>{
	let messages = [];	
     
    
    

    //Validate the name
	if(name.value === '' || name.value == null){
		messages.push('Fullname is required');
		console.log('name required');
		}

	else if(name.value.length <= 6){
                messages.push('Full name must be longer than 6 characters');
				console.log('name shorter than 6');
            }

    else if(name.value.length >= 20){
                messages.push('Full name must be shorter than 20 characters');
                console.log('name larger than 20');
            }

    //Validate if any department is checked
    let selectedValue;
                for (const rb of rbs) {
                if (rb.checked) {
                    selectedValue = rb.value;
                    break;
                }
            }
                if(selectedValue == null){
                    console.log('Choose one department');
                    messages.push('Choose one department');
                }
    //Date Validate

        //Day Validate
    console.log('day eshte' +day.value);
    if(day.value === "" || day.value == null){
         messages.push('Select a day');
    }
        
        //month validate
    if(month.value === "" || month.value == null){
         messages.push('Select a month');
    }
    

        //year validate
    if(year.value === "" || year.value == null){
         messages.push('Select a year');
    }
        //The costumer can make an appointment for the next year but not farther than january
    else if(year.value == today.getFullYear()+1){
        if(month.value > 1)
        messages.push('You can make an appointment for the next year not farther than january');
    }
        
        //If the upper condition is overtaken than this condition validate if the choosen year is for the actual year
    else if (year.value > today.getFullYear() || year.value <today.getFullYear()) {
         messages.push('Choose a correct year');
    
   }

   //Time can be null we choose a preffered time
    
        //Put all the error messages in screen
    if(messages.length > 0){
            e.preventDefault();
            errorElement.innerText = messages.join('! ');           
    }
    else
    alert('We are gonna make an appointment for you, approximately with your choosen date and time. We will sent your appointment in your email adress thankyou!');
})
/*
window.onload = function(){
console.log('u loadua');
clamp(year,1,2020);

}

function clamp(value, min, max) {
    return Math.min(Math.max(value, min), max);
}*/