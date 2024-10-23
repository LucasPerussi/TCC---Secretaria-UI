
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
    <tr>
        <th>Column 1</th>
        <th>Column 2</th>
        <th>Countdown</th>
    </tr>
    <?php
        $conn = mysqli_connect("localhost", "root", "", "wetalksupport");
        $result = mysqli_query($conn, "SELECT tkt_id, tkt_title FROM tickets");
        while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['tkt_id'] . "</td>";
        echo "<td>" . $row['tkt_title'] . "</td>";
        echo "<td><div id='countdown-" . $row['tkt_id'] . "'></div></td>";
        echo "</tr>";
        }
        mysqli_close($conn);
    ?>
    </table>
    <script>
  function updateCountdown() {
    var currentTime = new Date();
    var dayOfWeek = currentTime.getDay();
    var hour = currentTime.getHours();
    <?php
      $conn = mysqli_connect("localhost", "root", "", "wetalksupport");
      $result = mysqli_query($conn, "SELECT tkt_id, tkt_due_date FROM tickets");
      while ($row = mysqli_fetch_assoc($result)) {
        echo "var countdown" . $row['tkt_id'] . " = document.getElementById('countdown-" . $row['tkt_id'] . "');";
        echo "var targetDate" . $row['tkt_id'] . " = new Date('" . $row['tkt_due_date'] . "');";
        echo "if ((dayOfWeek >= 1 && dayOfWeek <= 5) && (hour >= 9 && hour <= 17)) {";
        echo "  var timeDiff" . $row['tkt_id'] . " = targetDate" . $row['tkt_id'] . ".getTime() - currentTime.getTime();";
        echo "  if (timeDiff" . $row['tkt_id'] . " >= 0) {";
        echo "    var seconds" . $row['tkt_id'] . " = Math.floor((timeDiff" . $row['tkt_id'] . "/1000) % 60);";
        echo "    var minutes" . $row['tkt_id'] . " = Math.floor((timeDiff" . $row['tkt_id'] . "/1000/60) % 60);";
        echo "    var hours" . $row['tkt_id'] . " = Math.floor((timeDiff" . $row['tkt_id'] . "/(1000*60*60)) % 24);";
        echo "    var days" . $row['tkt_id'] . " = Math.floor(timeDiff" . $row['tkt_id'] . "/(1000*60*60*24));";
        echo "    countdown" . $row['tkt_id'] . ".innerHTML = days" . $row['tkt_id'] . " + 'd ' + hours" . $row['tkt_id'] . " + 'h ' + minutes" . $row['tkt_id'] . " + 'm ' + seconds" . $row['tkt_id'] . " + 's';";
        echo " } else {";
        echo " countdown" . $row['tkt_id'] . ".innerHTML = 'Expired';";
        echo " }";
        echo "} else {";
        echo " countdown" . $row['tkt_id'] . ".innerHTML = 'Paused';";
        echo "}";
        }
        mysqli_close($conn);
        ?>
        }
        setInterval(updateCountdown, 1000);
        </script>
</body>
</html>