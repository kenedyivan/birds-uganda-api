<?php
include 'dbcon.php';
class allfx extends dbcon{
    
    public $admin = "Admin", $full_names="", $email="", $user_number="";
    
    public function destroy_cookies(){
        @session_destroy();
         setcookie("u_number","",time() - 3600);
            setcookie("u_token", "", time() - 3600);
    }
    
    function days_hours_minutes_ago($past_date_time){
    
    $datetime1 = new DateTime(date('Y-m-d H:i:s')); // Today's Date/Time
$datetime2 = new DateTime($past_date_time); //'2012-07-17 15:30:17'
$interval = $datetime1->diff($datetime2);

$min = $interval->format('%i');
$hrs = $interval->format('%h');
$days = $interval->format('%d');
$numberOfMonths = $interval->format('%m');
$numberOfYears = $interval->format('%y');

$data = $interval->format('%d days %h hours %i minutes ago');

if($numberOfYears>0){
    
    $data = $numberOfYears." year(s) ago";
    
} else if($numberOfMonths>0){
    $data = $numberOfMonths." month(s) ago";
} else if($days>0){
    
       $data = $interval->format('%d day(s) ago');
       
    
} else if($hrs>0){
    $data = $interval->format('%h hour(s) ago'); 
} else {
    $data = $interval->format('%i minute(s) ago');
}

return $data;
    
} 

    public function isLoggedIn(){
        $db = $this->db_properties();           
        
        if(isset($_SESSION['u_number'])){
            /*
            if(isset($_COOKIE['u_number'])){
                $num = $_COOKIE['u_number'];
                $u_token = $_COOKIE['u_token'];
                $_SESSION['u_token'] = $u_token;
                $_SESSION['u_number'] = $num;
                
                $expire = time()+ 60*60*24*30;
            setcookie("u_number", $num,$expire);
            setcookie("u_token", $u_token, $expire);
                
            } else {
            $num = $_SESSION['u_number'];
            $u_token = $_SESSION['u_token'];
            } */
            
            $num = $_SESSION['u_number'];
            $u_token = $_SESSION['u_token'];
                        
            $qry = $db->query("select * from admin where u_number='".$num."' and password='".$u_token."'");
            
            if($qry->num_rows>0){
                
                $array = $qry->fetch_array();
                
                $this->full_names = $array['name'];
                $this->email = $array['email'];
                $this->user_number = $num;
                if($array['u_type']==$this->admin){
                    return TRUE;
                } else {
                    return FALSE;
                }
                
            } else {
                return FALSE;
            }
            
        } else {
            return false;
        }
        
    }
    
    public function alerts(){
        ?>  <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li> <?php
    }

    public function top_notifications($dir=null){
        ?>

<!-- Messages: style can be found in dropdown.less-->
         <?php
                 //$this->alerts();
         ?>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php print $dir; ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Profile</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php print $dir; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                    <?php print $this->full_names." - ".$this->admin; ?>
                    <small><?php print $this->email; ?></small>
                </p>
              </li>
              <!-- Menu Body 
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li> -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!--<a href="#" class="btn btn-default btn-flat">Profile</a> -->
                </div>
                <div class="pull-right">
                  <a href="<?php print $dir; ?>sign-out/" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
            
            <?php
    }
    
    public function footers(){
        ?> <div class="pull-right hidden-xs">
            <b>Powered by</b> <a href="http://hamsoftug.com" target="_blank">Hamsoft Uganda</a>
    </div>
    <strong>Copyright &copy; <?php print date('Y'); ?> <a href="#">Bird Uganda Safaris</a>.</strong> All rights
    reserved. <?php
    }

    public function sidebar($dir=null){
        ?>
          <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php print $dir; ?>?todo=chat-box">
            <i class="fa fa-envelope"></i> <span>Chat box</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        
        <li>
          <a href="<?php print $dir; ?>users">
            <i class="fa fa-users"></i> <span>Registered users</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">5</small>
            </span>
          </a>
        </li>
        
      </ul>
          <?php
    }
    
    public function chat_box(){
        $db = $this->db_properties();
        ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-md-4">
              <!-- DIRECT CHAT -->
              <?php
              if(isset($_GET['chat_topic'])){
                  
                  if(isset($_POST['reply_btn'])){
                      $reply = $db->real_escape_string($_POST['reply_msg']);
                      $topic_ = $db->real_escape_string($_POST['_topic']);
                      $date_ = date('Y-m-d H:i:s');
                      
                      $db->query("insert into admin_client_chat set chat_topic='".$topic_."', chat_msg='".$reply."', chat_u_num='".$this->user_number."', chat_date_time='".$date_."'");
                      
                  }
                  
                  $topic = $db->real_escape_string($_GET['chat_topic']);
                  $qry = $db->query("select * from admin_client_chat, admin where admin.u_number=admin_client_chat.chat_topic and chat_topic='".$topic."' ORDER BY chat_id ASC");
                  
                  
                  
              ?>
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Direct Chat</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages">
                      <div id="reload_here">
                      <?php
                      while ($array = $qry->fetch_array()){
                          $u_num = $array['chat_u_num'];
                          $name = $array['name'];
                          $chat_msg = $array['chat_msg'];
                          $chat_date_time = $this->days_hours_minutes_ago($array['chat_date_time']);
                          
                          if($u_num==$this->user_number){
                              
                              print '<div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">'.$name.'</span>
                        <span class="direct-chat-timestamp pull-left">'.$chat_date_time.'</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="dist/img/avatar5.png" alt="message user image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                      '.$chat_msg.'
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>';
                              
                      } else {
                          print '
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">'.$name.'</span>
                        <span class="direct-chat-timestamp pull-right">'.$chat_date_time.'</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="dist/img/avatar2.png" alt="message user image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                      '.$chat_msg.'
                      
                      </div>
                    </div>
                    ';
                      }
                      
                      }
                      ?>

                      </div>
                  </div>
                  <!--/.direct-chat-messages-->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <form method="post">
                    <div class="input-group">
                        <input type="text" name="reply_msg" required placeholder="Type Message ..." class="form-control">
                        <input type="hidden" name="_topic" value="<?php print $topic; ?>"/>
                          <span class="input-group-btn">
                              <button type="submit" name="reply_btn" class="btn btn-warning btn-flat">Reply</button>
                          </span>
                    </div>
                  </form>
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
              <?php
              }
              ?>
            </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Unread message box</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                
                  
              </div>
              <div class="table-responsive mailbox-messages">
                  <div id="reload_topics">
                <table class="table table-hover table-striped">
                    
                    <tbody>
                        <?php
                        $qry = $db->query("select * from admin_client_chat, admin where admin.u_number=admin_client_chat.chat_topic GROUP BY(chat_topic) ORDER BY chat_id DESC");
                        
                        while ($array = $qry->fetch_array()){
                            
                            print '<tr>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="?todo=chat-box&chat_topic='.$array['chat_topic'].'">'.$array['name'].'</a></td>
                    <td class="mailbox-subject">
                    '.$array['chat_msg'].'
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date"></td>
                  </tr>';
                            
                        }
                        
                        ?>
                        
                    </tbody>
                    
                </table>
                  </div>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                
                  
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content --> <?php
    }
    
}