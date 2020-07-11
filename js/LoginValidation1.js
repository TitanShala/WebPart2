       
       
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
                break; }
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

         if(messages.length < 1){
            
            
            
            var signin = document.querySelector('.SignInNav');
            var signout = document.querySelector('.SignOutNav');
            LogedIn = true ;
            SaveLoginCondition ();
            
        
            signin.style.display='none'; 
            signout.style.display = 'block';
            }
            

       })





        //konstantet per ruajtjen e vlerave gjate regjistrimit
        const nameR = document.getElementById('nameR');
        const passwordR = document.getElementById('passwordR');
        const passwordconfirmR = document.getElementById('passwordconfirmR')
        const formR= document.getElementById('formRegister');
        const errorElementR = document.getElementById('errorR');
        const emailR = document.getElementById('emailR');
        



       // Register submit
         formR.addEventListener('submit', (e) =>{
            let messagesR = [];

            if(nameR.value === '' || nameR.value == null){
                messagesR.push('Username is required');
            }

            if(nameR.value.length <= 6){
                messagesR.push('Username must be longer than 6 characters');
            }

             if(nameR.value.length >= 20){
                messagesR.push('Username must be shorter than 20 characters');
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

/* Te pa nevojshme per momentin

function SaveLoginCondition () {
    
    
    localStorage.setItem("logincondition", LogedIn);
    window.location.href="Departmenti.html";
    window.location.href="contactUs.html";
    window.location.href="Doctors.html";
}

function SigningOut(){
        confirm("Confirm to sign out!");
       
       

     
           
            var signin = document.querySelector('.SignInNav');
            var signout = document.querySelector('.SignOutNav');
            LogedIn = false ;
            console.log(LogedIn);
            SaveLoginCondition ();
            
            localStorage.clear();
        
            signin.style.display='block'; 
            signout.style.display = 'none';
         
}*/