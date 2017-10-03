<?php
	include 'header.php';
?>



<?php
	if (isset($_SESSION['id'])) {
?>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Finder Tools</h2>
            <h3 class="section-subheading text-muted">A campus-wide lost and found database that allows you to turn in, search and notify lost items.</h3>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img src="img/turn_in_icon_round.svg" class="img-responsive img-centered img-rounded" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Turn In</h4>
              <p class="text-muted">Turn in a lost item into the system</p>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 portfolio-item">
            <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img src="img/claim_icon_round.svg" class="img-responsive img-centered img-rounded" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Search</h4>
              <p class="text-muted">Search for an item in the system</p>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 portfolio-item">
            <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img src="img/notify_icon_round.svg" class="img-responsive img-centered img-rounded" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Notify</h4>
              <p class="text-muted">Notify the system of a lost item</p>
            </div>
          </div>

        </div>
      </div>
    </section>

   <!-- Portfolio Modals -->
   <div class='portfolio-modal modal fade' id='portfolioModal1' tabindex='-1' role='dialog' aria-hidden='true'>
     <div class='modal-content'>
       <div class='close-modal' data-dismiss='modal'>
         <div class='lr'>
           <div class='rl'></div>
         </div>
       </div>
       <div class='col-lg-8 col-lg-offset-2'>
         <div class='modal-body'>
           <h2>Turn In</h2>
           <hr class='star-primary'>
           <div id='body_database'>
            <div id='turn_in_form'>
              <form method='post' action='process_turn_in_form.php'>
              <fieldset>
              <div class='form-group'>
                <input type='text' class='form-control input-lg' name='item_name' id='item_name' placeholder='Item name' required>
              </div>

              <div class='form-group'>
                <input type='text' class='form-control input-lg' name='item_description' id='item_description' placeholder='Description' required>
              </div>

							<div class="form-group">
								<input type="text" id="item_location" class="form-control input-lg" name="item_location" value="<?php $sql = 'SELECT id, first, last, userlocation FROM user'; $result = mysqli_query($cn, $sql) or die(mysqli_error($cn)); $id = 'id'; while ($row = mysqli_fetch_assoc($result))
								{ if ($_SESSION["id"] == $row['id']) { echo $row['userlocation'];}}
								?>" placeholder="Location" readonly>
							</div>

							<div class="form-group">
								<input type="text" class="form-control input-lg" name="aid_name_in" value="<?php $sql = 'SELECT id, first, last FROM user'; $result = mysqli_query($cn, $sql) or die(mysqli_error($cn)); $id = 'id'; while ($row = mysqli_fetch_assoc($result))
								{ if ($_SESSION["id"] == $row['id']) { echo $row['first'];}}
								?>" placeholder="Username" readonly>
							</div>

               <button type='submit' class='btn btn-portfolio' onclick='confirmation()' value='Submit'>Turn In</button>
               </form>
               <button type='button' class='btn btn-portfolio' data-dismiss='modal'><i class='fa fa-times'></i> Close</button>
              </fieldset>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>

   <div class='portfolio-modal modal fade' id='portfolioModal2' tabindex='-1' role='dialog' aria-hidden='true'>
     <div class='modal-content'>
        <div class='close-modal' data-dismiss='modal'>
          <div class='lr'>
            <div class='rl'>
            </div>
          </div>
        </div>
        <div class='col-lg-8 col-lg-offset-2'>
          <div class='modal-body'>
            <h2>Search</h2>
            <hr class='star-primary'>
            <span class='counter pull-right'></span>

            <table id='claim_table' class='table table-hover table-fixed'>
              <thead>
                <tr>
                  <th class='col-xs-1'>ID</th>
                  <th class='col-xs-2'>Name</th>
                  <th class='col-xs-2'>Description</th>
                  <th class='col-xs-2'>Location</th>
                  <th class='col-xs-3'>Turned In</th>
                </tr>
              </thead>
              <tbody>
                  <?php
          				$sql = 'SELECT
          				id, item_name, item_description, item_location, date_turned_in, claimed
          					FROM
          				items
          					ORDER BY
          				date_turned_in ASC';
          				$result = mysqli_query($cn, $sql) or
          					die(mysqli_error($cn));

          				while ($row = mysqli_fetch_assoc($result)) {
          					if ($row['claimed'] == 0) {
          						date_default_timezone_set('America/New_York');
          						$date = date('M j, Y g:i A', $row['date_turned_in']);

          						echo '
          						<tr class="clickable-row">
          							<td class="col-xs-1 class="clickable-row"">' . $row['id'] . '</td>
          							<td class="col-xs-2 class="clickable-row"">' . $row['item_name'] . '</td>
          							<td class="col-xs-2 class="clickable-row"">' . $row['item_description'] . '</td>
          							<td class="col-xs-2 class="clickable-row"">' . $row['item_location'] . '</td>
          							<td class="col-xs-3 class="clickable-row"">' . $date . '</td>
          						</tr>
          						';
          					}
          				}
                  ?>
              </tbody>
							<script>
								$("tr.clickable-row").click(function() {
									var tableData = $(this).children("td").map(function() {
										return $(this).text();
									}).get();

									$('[id$=itemID]').val($.trim(tableData[0]));
								});
							</script>
            </table>

            <form method="post" action="process_claim_form.php">
              <fieldset>
              <div class='form-group'>
                <input type='text' class='form-control' name='student_first_name' placeholder='First name' required>
              </div>
              <div class='form-group'>
                <input type='text' class='form-control' name='student_last_name' placeholder='Last name' required>
              </div>
              <div class='form-group'>
                <input type='text' class='form-control' name='student_id' placeholder='Panther ID' required>
              </div>

							<div class="form-group">
								<input type="hidden" class="form-control" name="student_aid_out" id="studentAid" value="<?php $sql = 'SELECT id, first, last FROM user'; $result = mysqli_query($cn, $sql) or die(mysqli_error($cn)); $id = 'id'; while ($row = mysqli_fetch_assoc($result))
								{ if ($_SESSION["id"] == $row['id']) { echo $row['first'];}}
								?>" placeholder="Username" readonly>
							</div>
							<div class="form-group">
								<input type="hidden" class="form-control" name="student_aid_id_out" value="<?php $sql = 'SELECT id, first, last, pid FROM user'; $result = mysqli_query($cn, $sql) or die(mysqli_error($cn)); $id = 'id'; while ($row = mysqli_fetch_assoc($result))
								{ if ($_SESSION["id"] == $row['id']) { echo $row['pid'];}}
								?>" placeholder="Panther ID" readonly>
							</div>
              <div class='form-group'>
                <input type='text' class='form-control' name='troll_face' id='itemID' placeholder='Item ID' readonly>
              </div>

            <button type='submit' class='btn btn-portfolio' onclick='confirmation()' value='Submit'>Claim</button>
            </form>
            <button type='button' class='btn btn-portfolio' data-dismiss='modal'><i class='fa fa-times'></i> Close</button>
            </fieldset>
          </div>
        </div>
      </div>
    </div>

    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl">
            </div>
          </div>
        </div>
          <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
              <h2>Notify</h2>
              <hr class="star-primary">
              <div>
               <div>
                <form method="post" action="process_report_form.php">
                <fieldset>
                <div class="form-group">
                  <input type="text" class="form-control input-lg" name="first_name" placeholder="First name" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control input-lg" name="last_name" placeholder="Last name" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control input-lg" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control input-lg" name="item_name" placeholder="Item name" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control input-lg reset" name="item_description" placeholder="Description" required>
                </div>

                <button type="submit" class="btn btn-portfolio" onclick="confirmation()" value="Submit">Notify</button>
                </form>
                <button type="button" class="btn btn-portfolio" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </fieldset>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    	} else {
    ?>


		<!-- Header -->
    <header>
      <div class="container">
        <div class="intro-text">
          <div class="intro-heading">Panther Finder</div>
          <div class="intro-lead-in">FIU's lost & found</div>
        </div>
      </div>
    </header>

  <?php
    }
  ?>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Panther Finder 2017</span>
          </div>
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li>
                <a href="#">Privacy Policy</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

		<script type="text/javascript">
		$(document).ready(function() {
			$(".modal").on("hidden.bs.modal", function() {
				$(this).find(.reset).val('').end();
				});
			});
		</script>

   <script type="text/javascript">
      $(document).ready( function () {
       $('#claim_table').DataTable();
   } );
   </script>

   <!-- Bootstrap Core JavaScript -->
   <script src="./js/bootstrap.min.js"></script>

   <!-- Plugin JavaScript -->
   <script src="./js/jquery.easing.min.js"></script>
   <script src="./js/classie.js"></script>
   <script src="./js/cbpAnimatedHeader.js"></script>

   <!-- Contact Form JavaScript -->
   <script src="./js/jqBootstrapValidation.js"></script>

   <!-- Custom Theme JavaScript -->
   <script src="./js/agency.js"></script>

  </body>
</html>
