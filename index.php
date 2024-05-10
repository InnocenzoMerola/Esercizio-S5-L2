<?php

include __DIR__ . "/includes/db.php";


$stmt = $pdo->prepare('SELECT * FROM libri');
$stmt->execute();
$libri = $stmt->fetchAll();


include __DIR__ . "/includes/initial.php";?>
    <h1><?= $labels[$language]['saluto'] ?></h1>
    <h2 class="text-center"><?= $labels[$language]['sottotitolo']?> </h2>
    <?php foreach ($libri as $row) {?>
        <div class="col-3">
            <div class="card">
                <a href="http://localhost/IFOA-BackEnd/Esercizio%20S5-L2/detail.php?id=<?= $row['id'] ?>">
                    <img src="<?= $row['image'] ?>" class="card-img-top cover" alt="..." >
                </a>
                <div class="card-body pb-0 border-top border-2">
                    <h5 class="card-title"><?= $row['titolo'] ?></h5>
                    <p class="card-text mb-1 author">Scritto da <span class="fw-medium"><?= $row['autore'] ?></span></p>
                    <div class="d-flex justify-content-between">
                        <p class="card-text mb-0"><?= $row['genere'] ?></p>
                        <p class="card-text mb-0"><?= $row['anno_pubblicazione'] ?></p>
                    </div>
                    <div class="d-flex mt-2 justify-content-end gap-2 border-top border-1 py-2 ">
                        <a class="btn btn-info text-white text-decoration-none" href="http://localhost/IFOA-BackEnd/Esercizio%20S5-L2/detail.php?id=<?= $row['id'] ?>">Dettagli</a>
                    </div>
                </div>
            </div>
        </div><?php     
        }?> 

<?php
include __DIR__ . "/includes/end.php";