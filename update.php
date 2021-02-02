<form class="col s12" action="update.php" method="post">
    <div class="row">
        <div class="input-field col s12">
            <input placeholder="login" id="login" type="text" name="login" maxlength="20"
                    class="validate white-text"/>
            <label for="login">New Login</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="password" type="password" class="validate white-text" name="password" maxlength="20"/>
            <label for="password">Nouveau Password</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="password2" type="password" class="validate white-text" name="password2" maxlength="20"/>
            <label for="password2">Confirmation Password</label>
        </div>
    </div>
    <button class="btn waves-effect waves-light black" type="submit" name="formprofil">Submit
        <i class="material-icons right">send</i>
    </button>
</form>