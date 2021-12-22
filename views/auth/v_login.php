<div class="container">
    <form method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Login</label>
            <input type="text" name="login" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Remember Me</label>
            <input type="checkbox" name="remember" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?if($error):?>
        <div class="alert alert-danger" role="alert">
            <?=$error?>
        </div>
    <?endif;?>
</div>
