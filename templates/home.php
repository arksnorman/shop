<br>
<div class="alert alert-info alert-dismissible fade show text-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    <strong>Welcome to <?=BRANDNAME;?>. An Online Phone Shopping Mall</strong>
    <hr />
    Grab yourself one of the latest smartphones below! Rethink what a smartphone can do
</div>
<div class="row">
    <?php
    foreach ($latestPhones as $latestPhone)
    {
    ?>
    <div class="col-md-3 text-center">
        <div class="card" >
            <img class="card-img-top" src="<?=$latestPhone['img'];?>" alt="Card image cap">
            <div class="card-body">
                <hr />
                <h4 class="card-title"><?=$latestPhone['name'];?></h4>
                <hr />
                <a href="/phone/<?=$latestPhone['id'];?>/" class="btn btn-info"><i class="fa fa-eye"></i> View Details</a>
            </div>
        </div>
    </div>
    <?php }?>
</div>
