
<!doctype html>
<head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Anton');
@import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:700');

body {
  margin: 0;
  padding: 0;
  font-family: 'Roboto Condensed', sans-serif;
  letter-spacing: 1px;
}

section {
  width: 100%;
  height: 100vh;
  background-image: url(https://picsum.photos/2880/1920?image=737);
  background-size: cover;
  background-position: center;
}

.layer {
  background-color: rgba(0, 34, 76, 0.94);
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.container {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 340px;
  text-align: center;
}

.login-form {
  position: relative;
  box-sizing: border-box;
  padding: 60px 30px;
  transition: 0.5s;
}

.login-form:hover {
  background-color: rgba(255, 255, 255, 0.1);
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

.login-form h1 {
  margin: 0 0 20px;
  color: white;
  font-size: 30px;
  text-transform: uppercase;
}

.login-form input {
  display: block;
  width: 100%;
  padding: 10px 20px;
  box-sizing: border-box;
  margin-bottom: 20px;
  border-radius: 25px;
  outline: none;
  font-size: 14px;
  letter-spacing: 1px;
  color: white;
  text-transform: uppercase;
  border: none;
  background-color: rgba(255, 255, 255, 0.1);
  font-family: 'Roboto Condensed', sans-serif;
}

.login-form input::placeholder {
  color: white;
}

.login-form input[type="submit"] {
  color: white;
  background-color: #0072ff;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.login-form input[type="submit"]:hover {
  background-color: #005aca;
}

.login-form a {
  text-decoration: none;
  color: white;
  text-transform: uppercase;
}

    
</style>
</head>
<html>
<body>
    <section>
  <div class="layer"></div>
  <div class="container">
    <div class="login-form">
      <h1>Log In</h1>    
    <form action="users.php" id="logIn" method="post">
    <input name="username" type="text" placeholder="username">
    <input name="password" type="password" placeholder="password">
    <input type="submit">
    
    </form>
    </div>
  </div>
</section>
    
    
    
    
    </body>
</html>