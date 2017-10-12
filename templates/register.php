<br>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="alert alert-info" role="alert">
            <strong>
                <h4 class="text-center">Register an account with us</h4>
            </strong>
        </div>
        <form action="/register/" method="POST" role="form">           
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
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstname" class="col-form-label">Firstname</label>
                    <input type="text" name="firstname" class="form-control" id="firstname" name="firstname" placeholder="Enter your firstname" value="<?=Input::get('firstname');?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="lastname" class="col-form-label">Lastname</label>
                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter your lastname" value="<?=Input::get('lastname');?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="username" class="col-form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" name="username" placeholder="Enter your username" value="<?=Input::get('username');?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="email" class="col-form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" value="<?=Input::get('email');?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password" class="col-form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                </div>
                <div class="form-group col-md-6">
                    <label for="password1" class="col-form-label">Confirm Password</label>
                    <input type="password" name="password1" class="form-control" id="password1" placeholder="Confirm your password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address" class="col-form-label">Phone number</label>
                    <input type="text" name="number" class="form-control" id="address" placeholder="eg. +256711111111" value="<?=Input::get('number');?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="address" class="col-form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St, Apartment, studio, or floor" value="<?=Input::get('address');?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city" class="col-form-label">City</label>
                    <input type="text" name="city" class="form-control" id="city" value="<?=Input::get('city');?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="state" class="col-form-label">State</label>
                    <input type="text" name="state" class="form-control" id="state" value="<?=Input::get('state');?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="zipcode" class="col-form-label">Zip</label>
                    <input type="text" name="zip" class="form-control" id="zipcode" value="<?=Input::get('zip');?>">
                </div>
            </div>
            <button type="submit" class="btn btn-info float-right"><i class="fa fa-user"></i> Register</button>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
