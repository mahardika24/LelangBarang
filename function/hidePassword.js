function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var eyeIcon = document.getElementById("eye-icon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.className = 'fas fa-eye-slash';   
      } else{
        passwordInput.type = "password";
        eyeIcon.className = 'fas fa-eye'; 
    }
}