
    <form method="post" >
        <div class="form-group">
            <input type="text" id="input" name="username" required="required"/>
            <label class="control-label" for="input">Email ou Telefone</label><i class="mtrl-select"></i>
        </div>
        <div class="form-group">
            <input type="password" name="senha" required="required"/>
            <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" checked="checked"/><i class="check-box"></i>Lembra-se de mim.
            </label>
        </div>
        <a href="landing.html#" title="" class="forgot-pwd">Esqueceu a password?</a>
        <div class="submit-btns">
            <input type="hidden" value="logar" name="operacao">
            <button class="mtr-btn signin"  type="submit"><span>Entrar</span></button>
            <button class="mtr-btn signup" type="button"><span>Registar</span></button>
        </div>
    </form>

