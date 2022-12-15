function open1(){
    document.querySelector('.update-form').style.display = 'block';  
   }
   function close1(){
       document.querySelector('.update-form').style.display = 'none';  

   }

   function chooseFile(fileInput){
       if(fileInput.files && fileInput.files[0]){
           var reader = new FileReader();
           reader.onload = function(e){
               var data1 = document.querySelectorAll('.avatar-image')[0];
               var data2 = document.querySelectorAll('.avatar-image')[1];
               data1.src = e.target.result;
               data2.src = e.target.result;
           }
           reader.readAsDataURL(fileInput.files[0]);
       }
   }