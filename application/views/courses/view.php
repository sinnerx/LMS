
        <!-- Main content -->
       <div class="col-lg-12">
           <div class="panel b-a">
                        <div class="row m-n">
                          <div class="col-lg-12 b-b b">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $nav_subtitle; ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover"><td><a class="fa fa-edit" href="http://localhost/montecarlo/index.php/course/edit/<?php echo $course['id']; ?>"></a></td>
                        <tr>
                            <th>Course ID</th>
                            <td><?php echo $course['courseID']; ?></td>
                              <tr>
                            <th>Topic</th>
                            <td><?php echo $course['Topics']; ?></td>

                        </tr>

                            <th>Description</th>
                            <td><?php echo ucwords($course['Descr']); ?></td>
                            

                        </tr>

                      
                       



                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->

    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->
  