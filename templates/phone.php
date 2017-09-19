<br />
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="/phones/">Smartphones</a></li>
    <li class="breadcrumb-item active"><?=$product['name'];?></li>
</ol>
<div class="row">
<div class="col-md-4 text-center">
    <span>
    <img height="400px" width="400px" src="<?=$product['img'];?>" alt="<?=$product['name'];?>">
    </span>
    <hr />
    <?=$product['name'];?>
    <hr />
</div>
<div class="col-md-4">
    <table class="table table-hover">
        <tbody>
            <tr>
                <td>Network</td>
                <td><?=$phoneDetails['network'];?></td>
            </tr>
            <tr>
                <td>RAM/CPU</td>
                <td><?=$phoneDetails['ram_cpu'];?></td>
            </tr>
            <tr>
                <td>Camera</td>
                <td><?=$phoneDetails['camera'];?></td>
            </tr>
            <tr>
                <td>Storage</td>
                <td><?=$phoneDetails['storage'];?></td>
            </tr>
            <tr>
                <td>Size</td>
                <td><?=$phoneDetails['size'];?></td>
            </tr>
            <tr>
                <td>OS</td>
                <td><?=$phoneDetails['os'];?></td>
            </tr>
            <tr>
                <td>Battery</td>
                <td><?=$phoneDetails['battery'];?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="col-md-4">
    <form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST" role="form">
        <h2><span class="badge badge-info">PRICE: $<?=$product['price'];?></span></h2><hr />
        <input type="hidden" name="on0" value="Size">
        <select class="form-control custom-select" id="os0" name="os0">
            <option selected>Black</option>
            <option value="1">Pink</option>
            <option value="2">White</option>
        </select><hr />
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="<?=$product['paypal'];?>" />
        <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-shopping-cart"></i> Add to cart</button>
    </form>
</div>
