<?php
	$reservationId = $_POST["reservationId"];

	$reservationsSql = "SELECT * FROM tbl_reservation where user_id='$id'";
          $reservationsResult = $cn->query($reservationsSql);
            if ($reservationsResult->num_rows > 0) {

              while($row = $reservationsResult->fetch_assoc()) {
                $reservationId = $row["id"];
                $reservedDate = $row["reservedDate"];
                $time = $row["time"];
                $payment_id = $row["payment_id"];

                echo '

                    <option value="' . $reservationId . '">' . $reservedDate . "/" . $time .  '</option>
                  <!--<tr>
                    <td>
                      <a href="modify_reservation.php?id='. $reservationId .'">' . $reservationId . '</a>
                    </td>
                  </tr>-->
                ';

              }
            }
            else {
              echo '<script> alert("Non-existent in DB"); window.location.href="index.php"; </script>';
              }
?>