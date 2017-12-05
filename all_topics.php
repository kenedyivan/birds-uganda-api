<?php
include 'allfx.php';
$allfx = new allfx();
$db = $allfx->db_properties();
$allfx->isLoggedIn();

?> <table class="table table-hover table-striped">
                    
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
                    
                </table> <?php