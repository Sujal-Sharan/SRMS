var count = 2;

function validate() {

   var username = document.login.username.value;    //gets 'username' from the form
   var password = document.login.password.value;    //gets 'password' from the form (has to be hashed for security)

   const user = users.find((u) => (u.username === username) && (u.password === password));  //matching if user exists and password matches

   if (user) {
      alert("Login was successful");
      window.location.href = "view.html"; // Redirect to view.html after successful login
      return false;
   }
    
   if (count >= 1) {
      alert("Wrong password or username. You have " + count + " attempt(s) left.");
      count--;
   }
   else {
      alert("You have exceeded the number of login attempts. Further login attempts have been disabled");
      document.login.username.disabled = true;
      document.login.password.disabled = true;
      document.login.submit.disabled = true;
   }    //maybe add 'count = 2' again in else part to reset count after 3 failed attempts for new user?
}

// Predefined list of users, to be replaced with a database
const users = [
   { username: "admin", password: "admin123" },
   { username: "user1", password: "password1" },
   { username: "user2", password: "password2" },
 ];

