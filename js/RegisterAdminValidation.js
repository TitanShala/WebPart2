
        //konstantet per ruajtjen e vlerave gjate regjistrimit
        const nameR = document.getElementById('Regname');
        const surnameR= document.getElementById('Regsurname');
        const UsernameR = document.getElementById('nameR');
        const passwordR = document.getElementById('passwordR');
        const passwordconfirmR = document.getElementById('passwordconfirmR');
        const emailR = document.getElementById('emailR');
        
        const formR= document.getElementById('form');
        const errorElementR = document.getElementById('errorR');

       // Register submit
       
       form.addEventListener('submit', (e) =>{
        let messagesR = [];
        console.log('Register');
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

        e.preventDefault();
        // if(messagesR.length > 0){
        // e.preventDefault();
        // errorElementR.innerText = messagesR.join('! ');
            
        // } 
    })

    function cancelLogin(){

        document.getElementById('Regname').value = '';
        document.getElementById('Regsurname').value = '';
        document.getElementById('nameR').value = '';
        document.getElementById('passwordR').value = '';
        document.getElementById('passwordconfirmR').value = '';       
        document.getElementById('errorR').innerText = '';
        document.getElementById('emailR').value = '';
}