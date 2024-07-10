function submitForm() {
  
    var Fname = document.getElementById("fname").value;
    var Lname = document.getElementById("lname").value;
    var age = document.getElementById("age").value;
    
    var exp = document.getElementById("exp").value;
    var number =document.getElementById("num").value;
    var gen =document.getElementById("gender").value;

    var add =document.getElementById("address").value;
    var city =document.getElementById("city").value;
    var zipcode = document.getElementById("zipcode").value;
    var state = document.getElementById("state").value;

    // Validate form input
    if (!Fname || !Lname || !age || !exp || !number || !gen || !add || !city || !zipcode || !state ) {
      alert("Please fill out all fields.");
      return;
    }
}
