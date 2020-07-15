        //konstantet per ruajtjen e vlerave gjate loginit
        const name = document.getElementById('name');
        const password = document.getElementById('password');
        const form= document.getElementById('form');
        const errorElement = document.getElementById('error');
        const rbs = document.querySelectorAll('input[name="account"]');
        // var LogedIn = false ;

        //Login Submit 
        form.addEventListener('submit', (e) =>{            
            let messages = [];
            let selectedValue ;
            for (const rb of rbs) {
                if (rb.checked) {
                    selectedValue = rb.value;
                    break; 
                }
            }

            if(name.value === '' || name.value == null){
                messages.push('Username is required');
            }

            else if(name.value.length <= 6){
                messages.push('Username must be longer than 6 characters');
            }

            else if(name.value.length >= 20){
                messages.push('Username must be shorter than 20 characters');
            }

            if(password.value === '' || password.value == null){
                messages.push('Password is required');
            }

           else if(password.value.length <= 6){
                messages.push('Password must be longer than 6 characters');
            }

            else if(password.value.length >= 20){
                messages.push('Password must be shorter than 20 characters');
            }
            
            if(selectedValue == null){  
                messages.push('Choose one account type');
            }

            if(messages.length > 0){
            e.preventDefault();
            errorElement.innerText = messages.join('! ');           
            }
       })

        //konstantet per ruajtjen e vlerave gjate regjistrimit
        const nameR = document.getElementById('Regname');
        const surnameR= document.getElementById('Regsurname');
        const UsernameR = document.getElementById('nameR');
        const passwordR = document.getElementById('passwordR');
        const passwordconfirmR = document.getElementById('passwordconfirmR');
        const emailR = document.getElementById('emailR');
        const formR= document.getElementById('formRegister');
        const errorElementR = document.getElementById('errorR');
        
       // Register submit
         formR.addEventListener('submit', (e) =>{
            let messagesR = [];
            var NamePattern = /^[A-Za-z. ]{3,30}$/ ;
            var ExperiencePattern = /^[0-9]{1,2}$/;

            if(!NamePattern.test(NameR.value)){
                messages.push('Name should be string and length should be between 3 to 20 characters');
            }

            if(!NamePattern.test(surnameR.value)){
                messages.push('Surname should be string and length should be between 3 to 20 characters');
            }
            if(passwordR.value.length <= 6){
                messagesR.push('Password must be longer than 6 characters');
            }

             if(passwordR.value.length >= 20){
                messagesR.push('Password must be shorter than 20 characters');
            }

             if(passwordconfirmR.value !== passwordR.value ){
                messagesR.push('Password is not the same');
            }
            
            if(messagesR.length > 0){
            e.preventDefault();
            errorElementR.innerText = messagesR.join('! ');   
            }     
        })
        
 //Go to register from login
 function NotRegistedYet(){

        //errorElement.innerText = '' ;
        cancelLogin();
        var login = document.querySelector('.login-box');
        var register = document.querySelector('.Register-box');
            
        login.style.display='none'; 
        register.style.display = 'block';
        }

 //Go to login from register 
 function HaveAnAccount(){
        
       // errorElementR.innerText = '' ;
       cancelLogin();
        var login = document.querySelector('.login-box');
        var register = document.querySelector('.Register-box');
           
        register.style.display = 'none';
        login.style.display = 'block';
        }

        //Cancel login or registration
function cancelLogin(){

        document.getElementById('Regname').value = '';
        document.getElementById('Regsurname').value = '';
        document.getElementById('name').value = '';
        document.getElementById('password').value = '';
        document.getElementById('error').innerText = '';
        
        document.getElementById('nameR').value = '';
        document.getElementById('passwordR').value = '';
        document.getElementById('passwordconfirmR').value = '';       
        document.getElementById('errorR').innerText = '';
        document.getElementById('emailR').value = '';
}

