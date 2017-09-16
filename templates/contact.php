<br><br><br>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="alert alert-info" role="alert">
            <strong>
                <h4 class="text-center">Get in touch</h4>
            </strong>
            I would love to hear from you. Complete the form below to contact me.
        </div>
        <form action="/contact/" method="POST" role="form">
            <?php
            if (isset($errorMessages))
            {
                foreach ($errorMessages as $errorMessage)
                {
                    echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
                }
            }
            if ($sucess)
            {
                echo '<div class="alert alert-success">Message sent successfully</div>';
            }
            ?>
            <div class="form-group">
                <label for="">Name</label>
                <input type="name" class="form-control" name="name" value="<?=Input::get('name');?>" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value="<?=Input::get('email');?>" placeholder="Enter your email address">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" name="message" rows="3" id="comment"><?=Input::get('message');?></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-info float-right"><i class="fa fa-send"></i> Send</button>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
