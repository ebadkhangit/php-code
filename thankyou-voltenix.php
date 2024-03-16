<?php
include('layout/header.php');
include('admin/include/dbconnect.php');
include('lib/class.sendgridmail.php');

?>

<div class="eaaS-platformForm py-5">
  <div class="container">

    <div class="centerboxes2">
    <div class="row justify-content-center m-0">
      <div class="col-lg-4 col-md-5   p-md-0">
        <div class="platformForm-left  cnts">
        <div>
          <?php
          $query_contact = "SELECT name, value FROM contents WHERE name = 'contact_us_address_text'";
          $result_contact = custom_my_sql_query($GLOBALS['con'], $query_contact);
          $contact_us_row = custom_my_sql_fetch_array($result_contact)
          ?>
          <?php echo $contact_us_row['value']; ?>
          <div class="row">
              <div class="col-2 col-md-2 col-xl-2">&nbsp;</div>
              <div class="col-10 col-md-10 col-xl-10 pl-0">
               <ul class="ftpSocial mb-4">

            <!--  <li>
                                   <?php
                                    $query = "SELECT name, value FROM contents WHERE name = 'linkedin'";
                                    $result2 = custom_my_sql_query($GLOBALS['con'], $query);
                                    $social_row = custom_my_sql_fetch_array($result2)
                                    ?>
                                <a href="<?php echo $social_row['value']; ?>" target="_blank;"><i class="fa fa-linkedin-in"></i></a>
                            </li> -->
            <li>
              <?php
              $query = "SELECT name, value FROM contents WHERE name = 'facebook'";
              $result3 = custom_my_sql_query($GLOBALS['con'], $query);
              $social_row = custom_my_sql_fetch_array($result3)
              ?>
              <a href="<?php echo $social_row['value']; ?>" target="_blank;"><i class="fa fa-facebook"></i></a>

            </li>
            <li>
              <?php
              $query = "SELECT name, value FROM contents WHERE name = 'twitter'";
              $result4 = custom_my_sql_query($GLOBALS['con'], $query);
              $social_row = custom_my_sql_fetch_array($result4)
              ?>
              <a href="<?php echo $social_row['value']; ?>" target="_blank;"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
              <?php
              $query = "SELECT name, value FROM contents WHERE name = 'youtube'";
              $result5 = custom_my_sql_query($GLOBALS['con'], $query);
              $social_row = custom_my_sql_fetch_array($result5)
              ?>
              <a href="<?php echo $social_row['value']; ?>" target="_blank;"><i class="fa fa-youtube"></i></a>
            </li>
            <li>
              <?php
              $query = "SELECT name, value FROM contents WHERE name = 'instagram'";
              $result6 = custom_my_sql_query($GLOBALS['con'], $query);
              $social_row = custom_my_sql_fetch_array($result6)
              ?>
              <a href="<?php echo $social_row['value']; ?>" target="_blank;"><i class="fa fa-instagram"></i></a>
            </li>
          </ul>    

              </div>  
          </div>

          

        </div>
        </div>

      </div>

      <div class="col-lg-8 col-md-7   p-md-0">
        <div class="platformFormRight">
         <!-- <h2>Contact us</h2>-->
          <section class="section-contact mb-0">
    <div class="container">

        <div class="row justify-content-center" style="padding:20px; border:1px solid #ddd;">
            <div class="col-md-12 col-12">
                   <div class="mb-4 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75"
                        fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                </div>
                <div class="sectionTitle">
                    <h1 class="title text-center"><span>Thank You for contacting Voltenix</span></h1>
                </div>
                
                <div class="text-center mt-5">
              
                Thank you for contacting us. We have received your message and will respond as soon as possible. Have a great day!
               </div>
            </div>
        </div>

     
    </div>
</section>
        </div>
      </div>
    </div>
    </div>
  
 
    
    
    
  </div>
</div>


<?php include('layout/footer.php') ?>

