    <!-- nav -->  
    <?php if($_SESSION['userLevel'] == 99){ ?>               
                <nav class="nav-primary hidden-xs">
                  <!--<div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div>-->
                  <ul class="nav nav-main" data-ride="collapse">
                    
                    <li <?php if ( $this->uri->uri_string() == 'package' or  $this->uri->uri_string() == 'package/insert' ):  ?> class="active"<?php endif; ?>>
                      <a href="javascript:void(0);" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <!--<b class="badge bg-danger pull-right">4</b>-->
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">Package</span>
                      </a>
                      <ul class="nav dk">
                        <li >
                          <a href="<?php echo base_url(); ?>package" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Manage Package</span>
                          </a>
                        </li>
                                                
                      </ul>
                    </li>
                    <li <?php if ( $this->uri->uri_string() == 'course' or  $this->uri->uri_string() == 'course/insert' ):  ?> class="active"<?php endif; ?>>
                        <a href="javascript:void(0);" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <!--<b class="badge bg-danger pull-right">4</b>-->
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">Module</span>
                      </a>
                        <ul class="nav dk">
                          <li >
                          <a href="<?php echo base_url(); ?>course" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Manage Module</span>
                          </a>
                   
                        </ul>
                    </li>
                    <li <?php if ( $this->uri->uri_string() == 'module' or  $this->uri->uri_string() == 'module/insert' ):  ?> class="active"<?php endif; ?>>
                        <a href="javascript:void(0);" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <!--<b class="badge bg-danger pull-right">4</b>-->
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">Package Module</span>
                      </a>
                        <ul class="nav dk">
                          <li >
                          <a href="<?php echo base_url(); ?>module" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Manage Package Module</span>
                          </a>
                   
                        </ul>
                    </li>
                    <li <?php if ( $this->uri->uri_string() == 'question' or  $this->uri->uri_string() == 'question/insert' ):  ?> class="active"<?php endif; ?>>
                        <a href="javascript:void(0);" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <!--<b class="badge bg-danger pull-right">4</b>-->
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">Question</span>
                      </a>
                        <ul class="nav dk">
                          <li >
                          <a href="<?php echo base_url(); ?>question" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Manage Question</span>
                          </a>
                        </li>
                        </ul>
                      </li>
                     <li <?php if ( $this->uri->uri_string() == 'reporting'):  ?> class="active"<?php endif; ?>>
                        <a href="javascript:void(0);" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <!--<b class="badge bg-danger pull-right">4</b>-->
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">Report</span>
                      </a>
                        <ul class="nav dk">
                          <li>
                          <a href="<?php echo base_url(); ?>reporting" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Manage Report</span>                        
                          </a>
                        </ul>
                    </li>                      

                  </ul>
                </nav>
                <nav class="nav-primary hidden-xs">
                  <!--<div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div>-->
                  <ul class="nav nav-main" data-ride="collapse">
                  <li <?php if ( $this->uri->uri_string() == 'importcsv'):  ?> class="active"<?php endif; ?>>
                        <a href="javascript:void(0);" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <!--<b class="badge bg-danger pull-right">4</b>-->
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">Import</span>
                      </a>
                        <ul class="nav dk">
                          <li>
                          <a href="<?php echo base_url(); ?>importcsv" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Import CSV</span>                        
                          </a>
                        </ul>
                    </li>                      

                  </ul>
                </nav>                
                 <?php } ?> 
                  <?php if ($_SESSION['userLevel'] == 2 || $_SESSION['userLevel'] == 3 || $_SESSION['userLevel'] == 4) { ?>               
                <nav class="nav-primary hidden-xs">
                  <!--<div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div>-->
                  <ul class="nav nav-main" data-ride="collapse">
                  <li <?php if ( $this->uri->uri_string() == 'reporting'):  ?> class="active"<?php endif; ?>>
                        <a href="javascript:void(0);" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <!--<b class="badge bg-danger pull-right">4</b>-->
                        <i class="i i-stack icon">
                        </i>
                        <span class="font-bold">Report</span>
                      </a>
                        <ul class="nav dk">
                          <li>
                          <a href="<?php echo base_url(); ?>reporting" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Manage Report</span>                        
                          </a>
                        </ul>
                    </li>                      

                  </ul>
                </nav>                
                <?php } ?>
                  
                      <!-- <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-lab icon">
                        </i>
                        <span class="font-bold">Quizs</span>
                      </a>
                      <ul class="nav dk">
                        <li >
                          <a href="<?php echo base_url(); ?>index.php/quizs" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Manage Quizs</span>
                          </a>
                        </li> -->
                    <!--     <li >
                          <a href="<?php echo base_url(); ?>index.php/answer/insert/?" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Add answer</span>
                          </a>
                        </li>
                      </ul>
                    </li>-->
                <!--     <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-docs icon">
                        </i>
                        <span class="font-bold">Answer</span>
                      </a>
                      <ul class="nav dk">
                        <li >
                          <a href="<?php echo base_url(); ?>index.php/answer" class="auto">                                                        
                            <i class="i i-dot"></i>

                           <span>Manage Answer</span>
                          </a>
                        </li>
                      
                      </ul>
                    </li>
                    <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-docs icon">
                        </i>
                        <span class="font-bold">Certificate</span>
                      </a>
                      <ul class="nav dk">
                        <li >
                          <a href="profile.html" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Manage Cert</span>
                          </a>
                        </li>
                      
                      </ul>
                    </li>-->
                  
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer hidden-xs no-padder text-center-nav-xs">
        
              <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs">
                <i class="i i-circleleft text"></i>
                <i class="i i-circleright text-active"></i>
              </a>
            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <!--left_side-->
