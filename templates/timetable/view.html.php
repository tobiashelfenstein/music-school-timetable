<h1>Stundenplan</h1>

<form action="/timetable" id="timetable-form" method="get">
    <label for="teacher">Lehrerauswahl:</label>
    <select name="teacher" id="teacher" required>
        <option value="0">alle</option>
        <option value="1">Lukas Hesse</option>
        <option value="2">Ulrich Kuballa</option>
        <option value="3">Anke Hecking</option>
    </select>

    <br>

    <label for="year">Jahr:</label>
    <select name="year" id="year" required>
        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
        <option value="<?php echo $year - 1; ?>"><?php echo $year - 1; ?></option>
    </select>

    &nbsp;

    <?php

    // https://www.softwaresagacity.com/2014/07/php-one-liners-array-of-month-names-and-numbers/
    
    $monthNames = [
        '1' => "Januar",
        '2' => "Februar",
        '3' => "März",
        '4' => "April",
        '5' => "Mai",
        '6' => "Juni",
        '7' => "Juli",
        '8' => "August",
        '9' => "September",
        '10' => "Oktober",
        '11' => "November",
        '12' => "Dezember",
    ]; ?>

    <label for="month">Monat:</label>
    <select name="month" id="month" required>
        <?php for ($i = 1; $i <= 12; $i++) {
            $selected = '';
            if ($i == $month) {
                $selected = ' selected';
            }
            ?>
            <option value="<?php echo $i; ?>"<?php echo $selected; ?>><?php echo $monthNames[$i]; ?></option>
        <?php } ?>
    </select>

    &nbsp;

    <?php $dayNames = [
        '1' => "Montag",
        '2' => "Dienstag",
        '3' => "Mittwoch",
        '4' => "Donnerstag",
        '5' => "Freitag",
        '6' => "Samstag",
        '7' => "Sonntag",

    ]; ?>

    <label for="weekday">Wochentag:</label>
    <select name="weekday" id="weekday" required>
        <?php for ($i = 1; $i <= 7; $i++) {
            $selected = "";
            if ($i == $weekday) {
                $selected = " selected";
            }
            ?>
            <option value="<?php echo $i; ?>"<?php echo $selected; ?>><?php echo $dayNames[$i]; ?></option>
        <?php } ?>
    </select>

    <br>

    <input type="submit" value="Suchen">
</form>

<table>
    <thead>
        <tr>
            <th>Anfang</th>
            <th>Ende</th>
            <th>Unterrichtseinheit</th>
            <th>SchülerIn/Telefon</th>
            <?php

            foreach ($dp as $day) {
                echo "<th>" . $day->format("d.m.Y") . "</th>";
            }

            ?>
            <th>Bemerkungen</th>
            <th>Funktionen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($units as $unit) { ?>
            <tr data-id="<?= $unit->getId() ?>">
                <td><?= htmlspecialchars($unit->getBegin()) ?></td>
                <td><?= htmlspecialchars($unit->getEnd()) ?></td>
                <td><?= htmlspecialchars($unit->getType()) ?></td>
                <td><?= htmlspecialchars($unit->getStudent()) ?></td>
                <?php 
                
                $counter = 0;
                foreach ($dp as $day) {
                    echo "<td>" . $unit->getDayAttendance()[$counter] . "</td>";
                    $counter++;
                }

                ?>
                <td><?= htmlspecialchars($unit->getComment()) ?></td>
                <td>
                    <a href="/timetable/unit/<?= $unit->getId() ?>/edit">Bearbeiten</a>&nbsp;
                    <a href="/timetable/unit/<?= $unit->getId() ?>/delete">Löschen</a>&nbsp;
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>