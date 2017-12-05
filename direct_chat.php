<?php
include 'allfx.php';
$allfx = new allfx();
$db = $allfx->db_properties();
$allfx->isLoggedIn();

              if(isset($_GET['chat_topic'])){
                  
                  $topic = $db->real_escape_string($_GET['chat_topic']);
                  $qry = $db->query("select * from admin_client_chat, admin where admin.u_number=admin_client_chat.chat_u_num and chat_topic='".$topic."' ORDER BY chat_id ASC");
                  
                  $db->query("update admin_client_chat set chat_status='1' where chat_topic='".$topic."'");
                  
                      while ($array = $qry->fetch_array()){
                          $u_num = $array['chat_u_num'];
                          $name = $array['name'];
                          $chat_msg = $array['chat_msg'];
                          $chat_date_time = $allfx->days_hours_minutes_ago($array['chat_date_time']);
                          
                          if($u_num==$allfx->user_number){
                              
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
                      
              }
                      
