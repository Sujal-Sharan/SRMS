/*var count = 2;

function validate() {
   var user = document.login.username.value;
   var password = document.login.password.value;
   var valid = false;
   var usernameArray = ["student"]
   var passwordArray = ["1234"]
   for (var i = 0; i < usernameArray.length; i++)

      if (user == usernameArray[i])
         if (password == passwordArray[i]) {
            valid = true;
            break;
         }

   if (valid) {
      alert("Login was successful");
      window.location = "wwww.google.ie"
      return false;
   }
   var again = "tries";
   if (count == 1) {
      again = "try"
   }
   if (count >= 1) {
      alert("Wrong password or username")
      count--;
   }
}*/
var count = 2;

function validate() {

   var username = document.login.username.value;
   var password = document.login.password.value;
   //var valid = false;
    //var usernameArray = ["student"];
    //var passwordArray = ["1234"];

   const user = users.find((u) => u.username === username && u.password === password);
    
   //  for (var i = 0; i < usernameArray.length; i++) {
   //      if (user == usernameArray[i] && password == passwordArray[i]) {
   //          valid = true;
   //          break;
   //      }
   //  }

   if (user) {
      alert("Login was successful");
      window.location.href = "view.html"; // Redirect to view.html after successful login
      return false;
   }
    
   var again = "tries";
   if (count == 1) {
      again = "try";
   }
   if (count >= 1) {
      alert("Wrong password or username. You have " + count + " " + again + " left.");
      count--;
   } else {
      alert("You have exceeded the number of login attempts.");
      document.login.username.disabled = true;
      document.login.password.disabled = true;
      document.login.submit.disabled = true;
   }
}



// Predefined list of users
const users = [
   { username: "admin", password: "admin123" },
   { username: "user1", password: "password1" },
   { username: "user2", password: "password2" },
 ];

// const user = users.find((u) => u.username === username && u.password === password);


// HashTable Implementation
// class HashTable {
//    constructor() {
//        this.table = new Array(10);
//        this.size = 0;
//    }


//    contains(){
//         // Check if the user exists in the predefined list
//       // const user = users.find((u) => u.username === username && u.password === password);
//    }

// }
