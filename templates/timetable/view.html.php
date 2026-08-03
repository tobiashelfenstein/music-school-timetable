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
            <tr data-id="<?= $unit->getId() ?>">
                <td><?= htmlspecialchars($unit->getBegin()) ?></td>
                <td><?= htmlspecialchars($unit->getEnd()) ?></td>
                <td><?= htmlspecialchars($unit->getType()) ?></td>
                <td><?= htmlspecialchars($unit->getStudent()) ?></td>
                <td>&nbsp;</td>
                <td><?= htmlspecialchars($unit->getComment()) ?></td>
                <td>
                    <a href="/timetable/unit/<?= $unit->getId() ?>/edit">Bearbeiten</a>&nbsp;
                    <a href="/timetable/unit/<?= $unit->getId() ?>/delete">Löschen</a>&nbsp;
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>