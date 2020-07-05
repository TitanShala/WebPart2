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

    if(text.value === '' || text.value == null){
		messages.push('Text message is required');
		console.log('Text message required');
		}

    else if(text.value.length <= 10){
		messages.push('Your message should be longer');
		console.log('Your message should be longer');
		}

    else if(text.value.length >= 500){
		messages.push('Your message should be shorter');
		console.log('Your message should be shorter');
		}

    if(messages.length > 0){
            e.preventDefault();
            errorElement.innerText = messages.join('! ');           
    }

            })