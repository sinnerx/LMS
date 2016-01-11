<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="page-navi">
        <div class="page-navi-num">
            <?php echo $pagination; ?>
        </div>
        <div class="display-count">
            <?php echo "Number Of Total Records - " . $total_records; ?>
        </div>
    </div>
    <div class="row">
        <div  class="col-sm-12">
            <div class="table-responsive">     
                <table  class="table table-striped table-bordered table-condensed" >
                    <thead>
                    <th>S No</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($userData); $i++) {
                            ?>
                            <tr>
                                <td><?php echo $i+1; ?></td>
                                <td><?php echo $userData[$i]->fullname; ?></td>
                                <td><?php echo $userData[$i]->user_name; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="clearfix visible-lg"></div>
</div>
</body>
</html>