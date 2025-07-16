<?php
// Exemple : "2-3-2x5"
$configsalle = "2-3-2x5";

// Extraction des parties
preg_match("/^([\d\-]+)x(\d+)$/", $configsalle, $matches);
$colGroups = explode("-", $matches[1]);
$rowCount = intval($matches[2]);

// Construction d’un tableau contenant le type de chaque colonne
$columns = [];
foreach ($colGroups as $index => $groupSize) {
    $count = intval($groupSize);
    for ($i = 0; $i < $count; $i++) {
        $columns[] = "normal";
    }
    if ($index < count($colGroups) - 1) {
        $columns[] = "separator"; // Ajout d’un séparateur entre les groupes
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau dynamique</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px;
        }
        td {
            width: 60px;
            height: 60px;
            border: 2px solid black;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            transition: border 0.2s;
        }
        td.active {
            border: 6px solid red;
        }
        td.separator {
            width: 10px;
            height: 10px;
            background-color: black;
            border: none;
            cursor: default;
        }
    </style>
</head>
<body>

<table>
    <tbody>
        <?php for ($row = 1; $row <= $rowCount; $row++): ?>
            <tr>
                <?php
                $colNumber = 1;
                foreach ($columns as $type) {
                    if ($type === "separator") {
                        echo '<td class="separator"></td>';
                    } else {
                        echo '<td onclick="selectCell(this)">C' . $colNumber . '-L' . $row . '</td>';
                        $colNumber++;
                    }
                }
                ?>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>

<script>
function selectCell(cell) {
    const allCells = document.querySelectorAll('td');
    allCells.forEach(td => td.classList.remove('active'));
    if (!cell.classList.contains('separator')) {
        cell.classList.add('active');
    }
}
</script>

</body>
</html>
