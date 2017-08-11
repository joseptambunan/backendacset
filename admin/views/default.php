<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php 
                    $uri = $this->uri->uri_string();
                    $uri = explode('/', $uri);
                    echo ucfirst(str_replace('_', ' ', $uri[1]));
                ?>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <?php 
        $this->help->proccess_data($content);
    ?>    
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
