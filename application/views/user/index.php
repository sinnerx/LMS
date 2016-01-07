
        <!-- Main content -->
        <section class="content">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $nav_subtitle; ?></h3>
                    <div class="box-tools">
                        <div class="input-group">
                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th></th>
                        </tr>

                        <?php $count=0; foreach ($user as $user_list): $count++;?>

                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $user_list['nm_user']; ?></td>
                            <td> - </td>
                            <td><span class="label label-success">Approved</span></td>
                            <td>
                                <a class="fa fa-search" href="<?php echo base_url().'index.php/user/view/'.$user_list['id_user'] ;?>"></a>
                                <a class="fa fa-edit" href=""></a>
                            </td>
                        </tr>

                        <?php endforeach ?>

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->

    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->