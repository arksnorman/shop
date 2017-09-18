<br />
<div class="alert alert-info alert-dismissible fade show text-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    <strong><?=BRANDNAME;?> | Full Catalog of Smartphones</strong>
    <hr />
    Grab yourself one of the latest smartphones below! Rethink what a smartphone can do
</div>
<div class="row">
    <?php
    foreach ($allPhones as $phone)
    {
    ?>
    <div class="col-md-3 text-center" style="margin-bottom: 40px;">
        <div class="card" >
            <img class="card-img-top" src="<?=$phone['img'];?>" alt="Card image cap">
            <div class="card-body">
                <hr />
                <h4 class="card-title"><?=$phone['name'];?></h4>
                <hr />
                <a href="/phone/<?=$phone['id'];?>/" class="btn btn-info"><i class="fa fa-eye"></i> View Details</a>
            </div>
        </div>
    </div>
    <?php }?>
</div>
