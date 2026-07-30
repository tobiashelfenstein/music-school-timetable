<p>Stundenplan</p>

<table>
    <thead>
        <tr>
            <th>Anfang</th>
            <th>Ende</th>
            <th>Unterrichtseinheit</th>
            <th>SchülerIn/Telefon</th>
            <th>02.02.2026</th>
            <th>Bemerkungen</th>
            <th>Funktionen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($units as $unit) { ?>
            <tr data-id="<?= $unit['id'] ?>">
                <td><?= htmlspecialchars($unit['begin']) ?></td>
                <td><?= htmlspecialchars($unit['end']) ?></td>
                <td><?= htmlspecialchars($unit['type']) ?></td>
                <td><?= htmlspecialchars($unit['student']) ?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                    <a href="timetable_edit.php?id=<?= $unit['id'] ?>">Bearbeiten</a>&nbsp;
                    <a href="timetable.php?id=<?= $unit['id'] ?>&action=delete">Löschen</a>&nbsp;
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>