<?php use Config\Services; ?>
<div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Manage Item</li>
        </ol>
        <?php if(Services::session()->has('Message')){ ?>
        <div class="alert alert-success" role="alert">
            
            <?php echo Services::session()->get('Message'); ?>
            
        </div>
        <?php }?>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Serial NO</th>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Product Price</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Serial NO</th>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Product Price</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        
                        <?php foreach ($results as $result) { ?>
                            
                            <tr>
                                <td><?= $result->id;?></td>
                                <td><?= $result->product_name;?></td>
                                <td><?= $result->product_code;?></td>
                                <td><?= $result->product_price;?></td>
                                <td><?= $result->description;?></td>
                                <td>

                                    <a href="edit-item/<?= $result->id; ?>" class="btn btn-info btn-sm">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                    <a href="delete-item/<?= $result->id; ?>" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>