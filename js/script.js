function showRegistration() {
   document.getElementById('registr').style.display='block';
   document.getElementById('auth').style.display='none';
   document.getElementById('allUsers').style.display='none';
}
function showAuth() {
   document.getElementById('registr').style.display='none';
   document.getElementById('auth').style.display='block';
   document.getElementById('allUsers').style.display='none';  
}
function showUsers() {
    document.getElementById('registr').style.display='none';
    document.getElementById('auth').style.display='none';
    document.getElementById('allUsers').style.display='block';  
    
}