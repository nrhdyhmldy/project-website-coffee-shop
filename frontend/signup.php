<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign Up</title>
  <link rel="stylesheet" href="../Asset/stylesignup.css">
</head>
<body>
  <header style = "text-align: center; font-family: brush script mt">
    <h2> Logo </h2>
  </header>
    <div class="card-flex">
      <div></div>        
      <div style = "border: solid 1 px; background-color: white;">
      
      <h1 style = "text-align: center;"> Sign Up</h1>
      <p style = "text-align: center;"> Lorem ipsum dolor sit amet adipiscing elit. </p><br>
      <form action="../backend/prosessignup.php" style = "margin-left: 20px; " method="POST"> 
        <label class="font">Nama*</label><br> 
        <input id="nama" name="nama" type="text" class="kotak"><p id="hasilnama"></p>
        <label class="font">Email*</label><br> 
        <input id="email" name="email" type="email*" class="kotak"><p id="hasilemail"></p> 
        <label class="font">Password*</label><br>
        <input id="sandi" name="password" type="password*" class="kotak"> <p id="hasilsandi"> </p> 
        <button class="buttonstyle" id="signup" ><a href="signin.php"> Sign Up </button></a><br> 
        <button class="buttonstyle2"> 
          <img src= "gugel.jpg" alt="" > Sign Up with Google</button>
          <p style = "text-align: center; font-size:12px"><a href="signin.php" style="color:black;"> Already have an account? Log In </a></p>
      </form> 
    </div>
      <div></div>
    </div>

    <footer>© 2025 NamaKelompok</footer>

  <script src="../Asset/logic.js"></script>

</body>
</html>
