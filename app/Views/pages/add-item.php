<div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Add Item</li>
</ol>

<!-- Icon Cards-->
<div class="col-md-6 offset-4 text-danger">
<?= \Config\Services::validation()->listErrors(); ?>
</div>
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-chart-area"></i>
        </div>
    <div class="card-body">

        <form class="offset-1 col-sm-10" action="create-item" method="POST" enctype="multipart/form-data">

            <div class="form-group row">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="product_name" value="">
                </div>
            </div>


            <div class="form-group row">
                <label class="control-label col-sm-2" for="code">Code:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="product_code" value="">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-sm-2" for="price">Price:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="product_price" value="">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-sm-2" for="description">Description:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" rows="4"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 offset-10">
                    <button type="submit" class="btn btn-info btn-block">Save</button>
                </div>
            </div>
        </form>

    </div>
</div>

</div>


