<br><br><br><br>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="alert alert-info" role="alert">
            <strong>
                <h4 class="text-center">Login to purchase one of our latest smartphones</h4>
            </strong>
        </div>
        <br>
        <form action="/login/" method="POST" role="form">
            <?php
            if (isset($errorMessages) && count($errorMessages))
            {
                foreach ($errorMessages as $errorMessage)
                {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>' . $errorMessage . '</div>';
                }
            }
            ?>
            <div class="form-group">
                <label class="form-control-label" for="username">Username/Email</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username or email address" value="<?=Input::get('username');?>">
            </div>
            <div class="form-group">
                <label class="form-control-label" for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-info float-md-right"><i class="fa fa-send"></i>  Let me in</button>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
