<?php
          // Check if flash data exists
          if (isset($_SESSION['flash_data'])) {
            $errors = $_SESSION['flash_data'];

            // Clear the flash data from the session
            unset($_SESSION['flash_data']);

            // Use the flash data as needed
            // ...
          }
      ?>
        <?php  if(isset($errors)) {
          ?>
            <div class="alert alert-danger">
              <ul>
                  <?php
                    foreach ($errors as  $value) {
                      # code...

                      if(is_array($value)) {
                        foreach ($value as $error) {
                          # code...
                          ?>
                             <li>
                              <?= $error ?>
                             </li>
                          <?php
                        }

                      } else {
                        ?>
                          <li>
                            <?= $value ?>
                          </li>
                        <?php
                      }
                      
                    }
                  ?>
              </ul>
            </div>
          <?php
          
        } ?>