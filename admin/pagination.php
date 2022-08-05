<!-- pagination -->
<div class="page">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <a class="page-link" href="#" tabindex="-1">&laquo; Previous</a>
              </li>
              <?php

              for ($i = 1; $i <= $pagi; $i++) {
                $class = '';
                if ($current_page == $i) {
              ?>
                  <li class="page-item active"><a class="page-link" href="javascript:void(0)"><?php echo $i;?></a></li>
              <?php
                } else {
              ?>
                  <li class="page-item"><a class="page-link" href="?start=<?php echo $i; ?>"><?php echo $i;?></a></li>
              <?php
                }
              ?>
              <?php } ?>
              <li class="page-item">
                <a class="page-link" href="#">Next &raquo;</a>
              </li>
            </ul>
          </nav>
        </div>
<!-- end -->


