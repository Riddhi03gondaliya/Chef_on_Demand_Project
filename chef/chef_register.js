function submitForm() {
  
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var repeatPassword = document.getElementById("repeat-password").value;
    
    var name = document.getElementById("name").value;
  
    var username = name.substring(0, 2) + email.substring(0, 2) + c ;
    alert("Your unique username is: " + username);
    // Validate form input
    if (!username || !email || !password || !repeatPassword) {
      alert("Please fill out all fields.");
      return;
    }
    
    if(password !== repeatPassword){
      alert("Password and Repeat password should be same.")
      return false;
    }
    if (!/^[a-zA-Z0-9]+$/.test(username)) {
      alert("Username must consist of alphanumeric characters only.");
      return false;
    }
}

function showpassword() {
    let pass = document.getElementById("password");
    let rpass = document.getElementById("repeat-password")
    if (pass.type === "password") {
      pass.type = "text";
    } else {
        pass.type = "password";
    }
    if (rpass.type === "password") {
        rpass.type = "text";
      } else {
        rpass.type = "password";
      }
  }