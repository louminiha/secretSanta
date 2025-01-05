<section id="result">
    <div class="result-table">
        <h3>
            Draw result! Check this out
            <form action="achat" method="post">
                <div>
                    <p>Total validé : <span id="total" name="total">0</span> Ar</p>
                    <input type="hidden" id="somme" name="somme">
                    <input type="hidden" name="argent" value=<?php echo $argent ?>>

                    <p>Votre argent :<span><?php echo $argent ?></span> Ar</p>
                </div>
                <button class="button" type="submit"><i class="fa-solid fa-check"></i> Acheter</button>
        </h3>
        </form>
        <form action="reload_all" method="get">
            <button class="button"><i class="fa-solid fa-question-circle"></i> Reload all</button>
        </form>
        <form action="reload" method="get">
            <button class="button"><i class="fa-solid fa-question-circle"></i> Reload selected gifts</button>
            <div id="boxes">
                <div id="girls" class="card-box">
                    <?php
                    $i = 0;
                    // foreach ($cadeaux[$j]x as $cadeaux[$j]) {
                    for ($j = 0; $j < $nbfille; $j++) {
                        if ($i >= $nbfille) break;
                        $_SESSION['indice_cadeau'][] = $cadeaux[$j]['id_produit']; ?>
                        <div class="box">
                            <img id="card-img" src="assets/img/tree.png" alt="">
                            <div class="gift-info">
                                <input type="hidden" name="cadeau" <?= $i ?> value="<?php echo $cadeaux[$j]['id_produit']; ?>">
                                <p id="gift-name"><?php echo $cadeaux[$j]['nom_produit']; ?></p>
                                <p id="gift-price"><?php echo $cadeaux[$j]['prix']; ?> $</p>
                                <label class="radio-label">
                                    <input type="checkbox" name="choix<?= $i ?>" name="gift-choice" value="1">
                                    Reload?
                                </label>
                                <button type="button" class="valider-btn" data-prix="<?php echo $cadeaux[$j]['prix']; ?>">Valider</button>

                            </div>
                        </div>
                    <?php $i++;
                    }
                    ?>
                    <!-- <div class="box">
                        <img id="card-img" src="assets/img/ring.png" alt="">
                        <div class="gift-info">
                            <p id="gift-name">Gift Name</p>
                            <p id="gift-price">10$</p>
                            <label class="radio-label">
                                <input type="checkbox" name="gift-choice" value="2">
                                Reload?
                            </label>
                        </div>
                    </div>
                    <div class="box">
                        <img id="card-img" src="assets/img/snowflake-and-tree.png" alt="">
                        <div class="gift-info">
                            <p id="gift-name">Gift Name</p>
                            <p id="gift-price">10$</p>
                            <label class="radio-label">
                                <input type="checkbox" name="gift-choice" value="2">
                                Reload?
                            </label>
                        </div>
                    </div>
                    <div class="box">
                        <img id="card-img" src="assets/img/money.png" alt="">
                        <div class="gift-info">
                            <p id="gift-name">Gift Name</p>
                            <p id="gift-price">10$</p>
                            <label class="radio-label">
                                <input type="checkbox" name="gift-choice" value="2">
                                Reload?
                            </label>
                        </div>
                    </div> -->
                </div>
                <div id="boys" class="card-box">
                    <?php
                    //$i--;
                    // echo $i;
                    // foreach ($cadeaux[$j]x as $cadeaux[$j]) {
                    for ($j = $i; $j < $nbgarcon + $nbfille; $j++) {
                        $_SESSION['indice_cadeau'][] = $cadeaux[$j]['id_produit']; ?>
                        <div class="box">
                            <img id="card-img" src="assets/img/tree.png" alt="">
                            <div class="gift-info">
                                <input type="hidden" name="cadeau" <?= $i ?> value="<?php echo $cadeaux[$j]['id_produit']; ?>">
                                <p id="gift-name"><?php echo $cadeaux[$j]['nom_produit']; ?></p>
                                <p id="gift-price"><?php echo $cadeaux[$j]['prix']; ?> $</p>
                                <label class="radio-label">
                                    <input type="checkbox" name="choix<?= $i ?>" name="gift-choice" value="1">
                                    Reload?
                                </label>
                                <button type="button" class="valider-btn" data-prix="<?php echo $cadeaux[$j]['prix']; ?>">Valider</button>

                            </div>
                        </div>
                    <?php $i++;
                    }
                    ?>
                    <!-- <div class="box">
                        <img id="card-img" src="assets/img/tree.png" alt="">
                        <div class="gift-info">
                            <p id="gift-name">Gift Name</p>
                            <p id="gift-price">10$</p>
                            <label class="radio-label">
                                <input type="checkbox" name="gift-choice" value="2">
                                Reload?
                            </label>
                        </div>
                    </div>
                    <div class="box">
                        <img id="card-img" src="assets/img/ring.png" alt="">
                        <div class="gift-info">
                            <p id="gift-name">Gift Name</p>
                            <p id="gift-price">10$</p>
                            <label class="radio-label">
                                <input type="checkbox" name="gift-choice" value="2">
                                Reload?
                            </label>
                        </div>
                    </div>
                    <div class="box">
                        <img id="card-img" src="assets/img/snowflake-and-tree.png" alt="">
                        <div class="gift-info">
                            <p id="gift-name">Gift Name</p>
                            <p id="gift-price">10$</p>
                            <label class="radio-label">
                                <input type="checkbox" name="gift-choice" value="2">
                                Reload?
                            </label>
                        </div>
                    </div>
                    <div class="box">
                        <img id="card-img" src="assets/img/money.png" alt="">
                        <div class="gift-info">
                            <p id="gift-name">Gift Name</p>
                            <p id="gift-price">10$</p>
                            <label class="radio-label">
                                <input type="checkbox" name="gift-choice" value="2">
                                Reload?
                            </label>
                        </div>
                    </div> -->
                </div>
            </div>
        </form>
    </div>
</section>
<script>
    let total = 0;

    const validerButtons = document.querySelectorAll('.valider-btn');
    const totalElement = document.getElementById('total');
    var somme = document.getElementById("somme");
    validerButtons.forEach(button => {
        button.addEventListener('click', function() {
            const prix = parseFloat(this.getAttribute('data-prix'));

            if (this.textContent == "Valider") {

                total += prix;
                this.textContent = "Retirer";
            } else {
                total -= prix;
                this.textContent = "Valider";
            }

            totalElement.textContent = total.toFixed(2);
            somme.value = total.toFixed(2);
        });
    });
</script>