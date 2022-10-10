{include file='templates/header.tpl'}

    <h2>Log In </h2>
    
    <form action="verify" method="post">
            <input type="text" name="email" id="email"  placeholder="email" required>
            <input type="password" name="password" id="password"  placeholder="Password" required>
       
            <input type="submit" value="Iniciar Sesión">
            
    </form>
    <p>{$error}</p>


{include file='templates/footer.tpl'}