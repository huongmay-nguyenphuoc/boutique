<form method="post" action="inscription.php">
    <label for="login">Login</label><br>
    <input type="text" id="login" name="login" maxlength="20" placeholder="login" pattern="[a-zA-Z0-9-_.]{1,20}" title="caractères acceptés : a-zA-Z0-9-_." required="required"><br><br>
          
    <label for="password">Password</label><br>
    <input type="password" id="password" name="password" required="required"><br><br>
          
    <label for="lastname">Lastname</label><br>
    <input type="text" id="lastname" name="lastname" placeholder="lastname"><br><br>
          
    <label for="vorname">Vorname</label><br>
    <input type="text" id="vorname" name="vorname" placeholder="vorname"><br><br>
  
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" placeholder="exemple@gmail.com"><br><br>
                  
    <label for="city">City</label><br>
    <input type="text" id="city" name="city" placeholder="city" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés : a-zA-Z0-9-_."><br><br>
          
    <label for="zip">Zip</label><br>
    <input type="text" id="zip" name="zip" placeholder="zip" pattern="[0-9]{5}" title="5 chiffres requis : 0-9"><br><br>
          
    <label for="adress">Adress</label><br>
    <textarea id="adress" name="adress" placeholder="adress" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés :  a-zA-Z0-9-_."></textarea><br><br>
 
    <input type="submit" name="submit" value="submit">
</form>
 