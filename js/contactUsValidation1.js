// JavaScript source code
const name = document.getElementById('name');
const email = document.getElementById('email');
const text = document.getElementById('text');
const form= document.getElementById('form');
const errorElement = document.getElementById('error');

form.addEventListener('submit', (e) =>{
	let messages = [];	
     
    
    

    //Validate the name
	if(name.value === '' || name.value == null){
		messages.push('Fullname is required');
		}

	else if(name.value.length < 6){
                messages.push('Full name must be longer than 6 characters');
            }

    else if(name.value.length > 40){
                messages.push('Full name should not be longer than 40 characters');
            }

    if(text.value === '' || text.value == null){
		messages.push('Text message is required');
		}

    else if(text.value.length <= 10){
		messages.push('Your message should be longer than 10 characters');
		}

    else if(text.value.length >= 500){
		messages.push('Your message should not be longer than 500 characters');
		}

    if(messages.length > 0){
            e.preventDefault();
            errorElement.innerText = messages.join('! ');           
    }

            })