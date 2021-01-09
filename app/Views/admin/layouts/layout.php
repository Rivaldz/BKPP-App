<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body id="page-top">
    <div id="wrapper">
       
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?= $this->include('admin/layouts/navbar'); ?>
                <div class="container-fluid">
                    <?= $this->renderSection('content'); ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('admin/layouts/footer'); ?>
    
</body>
</html>