<!DOCTYPE html>  
 <html>  
      <head>  
        <title></title>  
           <style type="text/css">
               table, th, td, tr{
                border: 1px solid black;
                border-collapse: collapse;
               }

           </style>
      </head>  
      <body>  
                     <table>  
                          <tr>  
                               <th>Name</th> 
                               <th>E-mail</th>  
                               <th>User name</th>   
                               <th>Gender</th>   
                               <th>Date of birth</th>   
                          </tr>  
                          <?php   
                          include '../Controller/DataController.php' ;

                          $data = loadData();

                          foreach($data as $row)  
                          {  
                              ?>
                               <tr>
                               <td><a href="details.php?name=<?php echo $row['name'] ?>"><?php echo $row['name'] ?></a></td>
                               <td><?php echo $row['e-mail'] ?></td>
                               <td><?php echo $row['username'] ?></td>
                               <td><?php echo $row['gender'] ?></td>
                               <td><?php echo $row['dob'] ?></td>
                               </tr>
                               <?php 
                          }  
                          ?>  
                     </table> 
                     <a href="store.php" class="btn btn-primary">Add New</a> 
      </body>  
 </html>  