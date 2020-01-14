<div class="container-fluid mt-lg-5">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Upload File</li>
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

        <form class="offset-1 col-sm-10" action="<?= base_url() ?>/add-file" method="POST" enctype="multipart/form-data">

            <div class="form-group row">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="file_name" value="">
                </div>
            </div>


            <div class="form-group row">
                <label class="control-label col-sm-2" for="code">File:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="file" value="">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2 offset-10">
                    <button type="submit" class="btn btn-info btn-block mb-lg-5">Upload</button>
                </div>
            </div>
        </form>

    </div>
</div>

</div>
<div class="mb-lg-5"></div>

